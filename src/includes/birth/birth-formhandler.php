<?php
// session_start(); // Ensure the session is started
// Include all files in includes folder
$includes = glob("{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/birth/birth-declarations.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $errors = [];
    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['child'],
            $required_fields['mother'],
            $required_fields['father'],
        ),
        $birth_labels
    );
    handleErrors($errors_required_fields, 'Required fields missing');

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $birth_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maxium allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes and multiple
    // option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($selection_controls as $field_name => $allowed_values) {
        $error = checkAllowedValues($field_name, $birth_labels[$field_name], $allowed_values);
        if ($error !== null) {
            $errors_selection_fields[] = $error;
        }
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $error = checkNumberFormat(
            $field_name,
            $birth_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
        if ($error !== null) {
            $errors_phone_fields[] = $error;
        }
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Make sure that either all of the declarant's required fields are submitted or none of them are
    $errors_declarant_required_fields = checkFieldPresence($required_fields['declarant'], $birth_labels);
    if (count($errors_declarant_required_fields) !== count($required_fields['declarant'])) {
        $errors[] = $errors_declarant_required_fields;
        handleErrors($errors_declarant_required_fields, 'Missing fields for Declarant: Submit either no fields or all required fields');
    }

    $errors = array_merge(
        $errors_required_fields,
        $errors_selection_fields,
        $errors_maxlength,
        $errors_phone_fields,
        $errors // Already contains declarant errors
    );

    if (empty(array_filter($errors))) {
        try {
            // Concatenate the names
            $mother_full_name = $_POST['mother_first_name'] . ';' . $_POST['mother_middle_name'] . ';' . $_POST['mother_last_name'];
            $father_full_name = $_POST['father_first_name'] . ';' . $_POST['father_middle_name'] . ';' . $_POST['father_last_name'];
            $child_full_name = $_POST['child_first_name'] . ';' . $_POST['child_middle_name'] . ';' . $_POST['child_last_name'];

            // Get the user ID from the session
            $rgstrnt_user = $_SESSION['user_id'];

            // Prepare the SQL insert statement
            $sql = "INSERT INTO LiveBirthRegistrations (
                    child_name, child_sex, child_dob, child_place_of_birth,
                    child_birth_plurality, child_weight_at_birth, child_aid_rendered,
                    mother_name, mother_dob, mother_place_of_birth, mother_residence,
                    mother_phone, mother_marital_status, mother_citizenship,
                    father_name, father_dob, father_place_of_birth, father_residence,
                    father_phone, father_marital_status, father_citizenship,
                    declarant_name, declarant_relation_to_child, declarant_sex,
                    declarant_dob, declarant_place_of_birth, declarant_residence,
                    declarant_phone, rgstrnt_user
                ) VALUES (
                    :child_full_name, :child_sex, :child_dob, :child_place_of_birth,
                    :child_birth_plurality, :child_weight_at_birth, :child_aid_rendered,
                    :mother_full_name, :mother_dob, :mother_place_of_birth, :mother_residence,
                    :mother_phone, :mother_marital_status, :mother_citizenship,
                    :father_full_name, :father_dob, :father_place_of_birth, :father_residence,
                    :father_phone, :father_marital_status, :father_citizenship,
                    :declarant_full_name, :declarant_relation_to_child, :declarant_sex,
                    :declarant_dob, :declarant_place_of_birth, :declarant_residence,
                    :declarant_phone, :rgstrnt_user
            )";

            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':child_full_name', $child_full_name);
            $stmt->bindParam(':child_sex', $_POST['child_sex']);
            $stmt->bindParam(':child_dob', $_POST['child_dob']);
            $stmt->bindParam(':child_place_of_birth', $_POST['child_place_of_birth']);
            $stmt->bindParam(':child_birth_plurality', $_POST['child_birth_plurality']);
            $stmt->bindParam(':child_weight_at_birth', $_POST['child_weight_at_birth']);
            $stmt->bindParam(':child_aid_rendered', $_POST['child_aid_rendered']);
            $stmt->bindParam(':mother_full_name', $mother_full_name);
            $stmt->bindParam(':mother_dob', $_POST['mother_dob']);
            $stmt->bindParam(':mother_place_of_birth', $_POST['mother_place_of_birth']);
            $stmt->bindParam(':mother_residence', $_POST['mother_residence']);
            $stmt->bindParam(':mother_phone', $_POST['mother_phone']);
            $stmt->bindParam(':mother_marital_status', $_POST['mother_marital_status']);
            $stmt->bindParam(':mother_citizenship', $_POST['mother_citizenship']);
            $stmt->bindParam(':father_full_name', $father_full_name);
            $stmt->bindParam(':father_dob', $_POST['father_dob']);
            $stmt->bindParam(':father_place_of_birth', $_POST['father_place_of_birth']);
            $stmt->bindParam(':father_residence', $_POST['father_residence']);
            $stmt->bindParam(':father_phone', $_POST['father_phone']);
            $stmt->bindParam(':father_marital_status', $_POST['father_marital_status']);
            $stmt->bindParam(':father_citizenship', $_POST['father_citizenship']);

            // Check if declarant information is provided
            $declarant_full_name = !empty($_POST['declarant_first_name']) && !empty($_POST['declarant_middle_name']) && !empty($_POST['declarant_last_name'])
            ? $_POST['declarant_first_name'] . ';' . $_POST['declarant_middle_name'] . ';' . $_POST['declarant_last_name']
            : null;

            $stmt->bindParam(':declarant_full_name', $declarant_full_name);
            $stmt->bindParam(':declarant_relation_to_child', $_POST['declarant_relation_to_child']);
            // Determine the value for declarant_sex
            $tempSex = !empty($_POST['declarant_sex']) ? $_POST['declarant_sex'] : null;
            $stmt->bindParam(':declarant_sex', $tempSex, PDO::PARAM_STR);

            // Determine the value for declarant_dob
            $tempDate = !empty($_POST['declarant_dob']) ? $_POST['declarant_dob'] : null;
            $stmt->bindParam(':declarant_dob', $tempDate, PDO::PARAM_STR);
            $stmt->bindParam(':declarant_place_of_birth', $_POST['declarant_place_of_birth']);
            $stmt->bindParam(':declarant_residence', $_POST['declarant_residence']);
            $stmt->bindParam(':declarant_phone', $_POST['declarant_phone']);
            $stmt->bindParam(':rgstrnt_user', $rgstrnt_user);

            // Execute the statement
            $stmt->execute();

            // Redirect or show a success message
            header("Location: " . PROJECT_ROOT . "src/success.php");
        } catch (PDOException $e) {
            // Handle other PDO exceptions
            $error_unknown_error = [];
            $error_unknown_error[] = new FormError(
                'Server Error',
                "Error Code: {$e->getCode()}",
                "Something went wrong. Error Message: {$e->getMessage()}"
            );
            handleErrors($error_unknown_error, "Server Error");
        }
    }
} else {
    header("Location: ../src/forms/birth.php");
}
