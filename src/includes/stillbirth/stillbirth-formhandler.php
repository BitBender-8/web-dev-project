<?php
// session_start(); // Ensure the session is started
// Include all files in includes folder
$includes = glob("{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/stillbirth/stillbirth-declarations.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];
    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['child'],
            $required_fields['mother'],
            $required_fields['pregnancy'],
            $required_fields['fetal_death_conditions'],
            $required_fields['reporting_person']
        ),
        $stillbirth_labels
    );
    handleErrors($errors_required_fields, 'Required fields missing');

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $stillbirth_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maximum allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes, and multiple option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($selection_controls as $field_name => $allowed_values) {
        $error = checkAllowedValues($field_name, $stillbirth_labels[$field_name], $allowed_values);
        if ($error !== null) {
            $errors_selection_fields[] = $error;
        }
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $error = checkNumberFormat(
            $field_name,
            $stillbirth_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
        if ($error !== null) {
            $errors_phone_fields[] = $error;
        }
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Checking number fields
    $errors_number_fields = [];
    foreach ($number_fields as $field_name) {
        $error = checkNumberFormat(
            $field_name,
            $stillbirth_labels[$field_name],
            '/^[1-9][0-9]?[0-9]?$/',
            'Field must be a number between 1 and 999'
        );
        if ($error !== null) {
            $errors_number_fields[] = $error;
        }
    }
    handleErrors($errors_number_fields, 'Invalid number format');

    // Father is optional so this makes sure that either all required fields of father are submitted or none of them are
    $errors_father_required_fields = checkFieldPresence($required_fields['father'], $stillbirth_labels);
    if (count($errors_father_required_fields) !== count($required_fields['father'])) {
        $errors[] = $errors_father_required_fields;
        handleErrors(
            $errors_father_required_fields,
            'Missing fields: Submit either no fields or all required fields under "Father" heading.'
        );
    }

    // In 'fetal death conditions' section this check makes sure that if checkbox is checked then the corresponding explanation is submitted.
    $errors_empty_explanation = [];
    $fetal_death_explanations = [];

    if (empty($errors_selection_fields)) {
        foreach ($_POST['fetal_death_conditions'] ?? [] as $fetal_death_condition) {
            // Get the key of the explanation
            $explanation_key = $condition_key_to_explanation_key[$fetal_death_condition] ?? '';
            $fetal_death_explanation = $_POST[$explanation_key] ?? '';

            // Check if the condition is checked but explanation is missing
            if (!empty($fetal_death_condition) && empty($fetal_death_explanation)) {
                $errors_empty_explanation[] = new FormError(
                    $fetal_death_condition,
                    $stillbirth_labels[$fetal_death_condition],
                    "Since the option was checked, its explanation is required."
                );
            } else {
                // Add the explanation to the array
                $fetal_death_explanations[$fetal_death_condition] = $fetal_death_explanation;
            }
        }
    }

    handleErrors($errors_empty_explanation, "Missing explanation");

    // TODO Check that you didn't miss any special validations
    $errors = array_merge(
        $errors_required_fields,
        $errors_selection_fields,
        $errors_maxlength,
        $errors_phone_fields,
        $errors_number_fields,
        $errors, // Father fields errors added beforehand
        $errors_empty_explanation);

    if (empty(array_filter($errors))) {
        try {
            // Concatenate the names
            $mother_full_name = $_POST['mother_first_name'] . ' ' . $_POST['mother_middle_name'] . ' ' . $_POST['mother_last_name'];
            $father_full_name = $_POST['father_first_name'] . ' ' . $_POST['father_middle_name'] . ' ' . $_POST['father_last_name'];
            $child_full_name = $_POST['child_first_name'] . ' ' . $_POST['child_middle_name'] . ' ' . $_POST['child_last_name'];
            $reporter_full_name = $_POST['reporter_first_name'] . ' ' . $_POST['reporter_middle_name'] . ' ' . $_POST['reporter_last_name'];

            // Get the user ID from the session
            $rgstrnt_user = $_SESSION['user_id'];

            // Convert arrays to JSON strings
            $fetal_death_conditions_json = json_encode($_POST['fetal_death_conditions'] ?? []);
            $fetal_death_explanation_json = json_encode($fetal_death_explanations);

            // Prepare the SQL insert statement
            $sql = "INSERT INTO StillbirthRegistrations (
                child_full_name, child_sex, child_gestational_age_wks,
                mother_full_name, mother_dob, mother_marital_status, mother_residence, mother_citizenship, mother_phone,
                father_full_name, father_dob, father_marital_status, father_residence, father_citizenship, father_phone,
                delivery_date, delivery_place, pregnancy_plurality, pregnancy_duration, birth_order,
                fetal_death_conditions, fetal_death_explanation,
                reporter_full_name, reporter_sex, reporter_residence, reporter_phone, rgstrnt_user
            ) VALUES (
                :child_full_name, :child_sex, :child_gestational_age_wks,
                :mother_full_name, :mother_dob, :mother_marital_status, :mother_residence, :mother_citizenship, :mother_phone,
                :father_full_name, :father_dob, :father_marital_status, :father_residence, :father_citizenship, :father_phone,
                :delivery_date, :delivery_place, :pregnancy_plurality, :pregnancy_duration, :birth_order,
                :fetal_death_conditions, :fetal_death_explanation,
                :reporter_full_name, :reporter_sex, :reporter_residence, :reporter_phone, :rgstrnt_user
            )";

            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':child_full_name', $child_full_name);
            $stmt->bindParam(':child_sex', $_POST['child_sex']);
            $stmt->bindParam(':child_gestational_age_wks', $_POST['child_gestational_age_wks']);
            $stmt->bindParam(':mother_full_name', $mother_full_name);
            $stmt->bindParam(':mother_dob', $_POST['mother_dob']);
            $stmt->bindParam(':mother_marital_status', $_POST['mother_marital_status']);
            $stmt->bindParam(':mother_residence', $_POST['mother_residence']);
            $stmt->bindParam(':mother_citizenship', $_POST['mother_citizenship']);
            $stmt->bindParam(':mother_phone', $_POST['mother_phone']);
            $stmt->bindParam(':father_full_name', $father_full_name);
            $tempDate = !empty($_POST['father_dob']) ? $_POST['father_dob'] : null;
            $stmt->bindParam(':father_dob', $_POST[$tempDate], PDO::PARAM_STR);
            $tempMartialStatus = !empty($_POST['father_marital_status']) ? $_POST['father_marital_status'] : null;
            $stmt->bindParam(':father_marital_status', $tempMartialStatus, PDO::PARAM_STR);
            $stmt->bindParam(':father_residence', $_POST['father_residence']);
            $stmt->bindParam(':father_citizenship', $_POST['father_citizenship']);
            $stmt->bindParam(':father_phone', $_POST['father_phone']);
            $stmt->bindParam(':delivery_date', $_POST['delivery_date']);
            $stmt->bindParam(':delivery_place', $_POST['delivery_place']);
            $stmt->bindParam(':pregnancy_plurality', $_POST['pregnancy_plurality']);
            $stmt->bindParam(':pregnancy_duration', $_POST['pregnancy_duration']);
            $stmt->bindParam(':birth_order', $_POST['birth_order']);
            $stmt->bindParam(':fetal_death_conditions', $fetal_death_conditions_json, PDO::PARAM_STR);
            $stmt->bindParam(':fetal_death_explanation', $fetal_death_explanation_json);
            $stmt->bindParam(':reporter_full_name', $reporter_full_name);
            $stmt->bindParam(':reporter_sex', $_POST['reporter_sex']);
            $stmt->bindParam(':reporter_residence', $_POST['reporter_residence']);
            $stmt->bindParam(':reporter_phone', $_POST['reporter_phone']);
            $stmt->bindParam(':rgstrnt_user', $rgstrnt_user);

            // Execute the statement
            $stmt->execute();

            // Redirect to show a success message
            header("Location: " . PROJECT_ROOT . "src/success.php");
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../src/forms/stillbirth.php");
}
