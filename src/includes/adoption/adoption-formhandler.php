<?php
// session_start(); // Ensure the session is started

// Include all files in includes folder

$includes = glob("{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/adoption/adoption-declarations.php";

//  TODO (Client-Js) In category of adopters, enable disabled radios when info for both adopters is entered.
//  CONSIDER Either remove the field 'relationship_to_adopter_x' or add validation to make sure the adopter is present.

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $errors = [];
    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['adoption'],
            $required_fields['adopter1'],
            $required_fields['child']
        ),
        $adoption_labels
    );
    handleErrors($errors_required_fields, 'Required fields missing');

    // Check whether all dropdowns, radio buttons, checkboxes and multiple
    // option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($selection_controls as $field_name => $allowed_values) {
        $errors_selection_fields[] = checkAllowedValues($field_name, $adoption_labels[$field_name], $allowed_values);
    }

    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $adoption_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maxium allowed length for text field(s) exceeded');

    // Checking phone number fields
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $error = checkNumberFormat(
            $field_name,
            $adoption_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
        if ($error !== null) {
            $errors_phone_fields[] = $error;
        }
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Make sure that either all of adopter2's required fields are submitted or none of them are
    $errors_parent2_required_fields = checkFieldPresence($required_fields['adopter2'], $adoption_labels);
    if (count($errors_parent2_required_fields) !== count($required_fields['adopter2'])) {
        $errors[] = $errors_parent2_required_fields;
        handleErrors($errors_parent2_required_fields, 'Missing fields for Adopter 2: Submit either no fields or all required fields');
    }

    // Making sure that fields which require both adopters in 'Category of adopters' are not
    // submitted without having both adopters. Didn't do other way around because the server will just assume that the first two options of adopter category refer to adopter 1
    $errors_adopter_category = [];
    // adopter2's required fields have not all been filled and adopter_category is either married couple or cohabitants
    if (!empty($errors_parent2_required_fields) && in_array($_POST['adopter_category'], ['couple', 'cohabitants'])) {
        $field_name = 'adopter_category';
        $errors_adopter_category[] = new FormError(
            $field_name,
            $adoption_labels[$field_name],
            "Adopter 2 data is required to select option '" . $_POST[$field_name] . "'"
        );
    }
    handleErrors($errors_adopter_category, 'Adopter 2 data missing'); // If no errors, proceed to insert the data into the database

    // Adopter 2 errors are added before this stage
    $errors = array_merge(
        $errors_required_fields,
        $errors_selection_fields,
        $errors_maxlength,
        $errors_phone_fields,
        $errors_adopter_category,
        $errors // Contains Adopter 2 errors
    );

    $errors = array_filter($errors);
    if (empty($errors)) {
        try {
            // Concatenate the names
            $adopter1_full_name = $_POST['adopter1_first_name'] . ';' . $_POST['adopter1_middle_name'] . ';' . $_POST['adopter1_last_name'];
            // Initialize $adopter2_full_name as null
            $adopter2_full_name = null;

            // Check each part of the name and concatenate if not empty
            if (!empty($_POST['adopter2_first_name']) || !empty($_POST['adopter2_middle_name']) || !empty($_POST['adopter2_last_name'])) {
                // Concatenate parts with semicolons, ensuring each part is non-empty
                $adopter2_full_name = implode(';', array_filter([
                    $_POST['adopter2_first_name'],
                    $_POST['adopter2_middle_name'],
                    $_POST['adopter2_last_name'],
                ]));
            }
            $child_full_name = $_POST['child_first_name'] . ';' . $_POST['child_middle_name'] . ';' . $_POST['child_last_name'];

            // Get the user ID from the session
            $rgstrnt_user = $_SESSION['user_id'];

            // Prepare the SQL insert statement
            $sql = "INSERT INTO AdoptionRegistrations (
                        adopter1_full_name, adopter1_dob, adopter1_sex, adopter1_birthplace,
                        adopter1_citizenship, adopter1_phone, adopter1_residence, adopter1_occupation,
                        adopter1_relationship_child, adopter1_relationship_adopter2, adopter1_relationship_chlds_parent,
                        adopter2_full_name, adopter2_dob, adopter2_sex, adopter2_birthplace,
                        adopter2_citizenship, adopter2_phone, adopter2_residence, adopter2_occupation,
                        adopter2_relationship_child, adopter2_relationship_adopter1, adopter2_relationship_chlds_parent,
                        category_of_adopters, child_full_name, child_dob, child_birthplace,
                        child_sex, received_child_from, child_placer_address, child_placer_phone,
                        adoption_date, adoption_type, rgstrnt_user
                    ) VALUES (
                        :adopter1_full_name, :adopter1_dob, :adopter1_sex, :adopter1_birthplace,
                        :adopter1_citizenship, :adopter1_phone, :adopter1_residence, :adopter1_occupation,
                        :adopter1_relationship_child, :adopter1_relationship_adopter2, :adopter1_relationship_chlds_parent,
                        :adopter2_full_name, :adopter2_dob, :adopter2_sex, :adopter2_birthplace,
                        :adopter2_citizenship, :adopter2_phone, :adopter2_residence, :adopter2_occupation,
                        :adopter2_relationship_child, :adopter2_relationship_adopter1, :adopter2_relationship_chlds_parent,
                        :category_of_adopters, :child_full_name, :child_dob, :child_birthplace,
                        :child_sex, :received_child_from, :child_placer_address, :child_placer_phone,
                        :adoption_date, :adoption_type, :rgstrnt_user
                    )";

            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':adopter1_full_name', $adopter1_full_name);
            $stmt->bindParam(':adopter1_dob', $_POST['adopter1_dob']);
            $stmt->bindParam(':adopter1_sex', $_POST['adopter1_sex']);
            $stmt->bindParam(':adopter1_birthplace', $_POST['adopter1_birthplace']);
            $stmt->bindParam(':adopter1_citizenship', $_POST['adopter1_citizenship']);
            $stmt->bindParam(':adopter1_phone', $_POST['adopter1_phone']);
            $stmt->bindParam(':adopter1_residence', $_POST['adopter1_residence']);
            $stmt->bindParam(':adopter1_occupation', $_POST['adopter1_occupation']);
            $stmt->bindParam(':adopter1_relationship_child', $_POST['adopter1_relationship_child']);
            $stmt->bindParam(':adopter1_relationship_adopter2', $_POST['adopter1_relationship_adopter2']);
            $stmt->bindParam(':adopter1_relationship_chlds_parent', $_POST['adopter1_relationship_chlds_parent']);
            $stmt->bindParam(':adopter2_full_name', $adopter2_full_name);
            $tempDate = !empty($_POST['adopter2_dob']) ? $_POST['adopter2_dob'] : null;
            $stmt->bindParam(':adopter2_dob', $tempDate, PDO::PARAM_STR);
            $tempSex = !empty($_POST['adopter2_sex']) ? $_POST['adopter2_sex'] : null;
            $stmt->bindParam(':adopter2_sex', $tempSex, PDO::PARAM_STR);
            $stmt->bindParam(':adopter2_birthplace', $_POST['adopter2_birthplace']);
            $stmt->bindParam(':adopter2_citizenship', $_POST['adopter2_citizenship']);
            $stmt->bindParam(':adopter2_phone', $_POST['adopter2_phone']);
            $stmt->bindParam(':adopter2_residence', $_POST['adopter2_residence']);
            $stmt->bindParam(':adopter2_occupation', $_POST['adopter2_occupation']);
            $stmt->bindParam(':adopter2_relationship_child', $_POST['adopter2_relationship_child']);
            $stmt->bindParam(':adopter2_relationship_adopter1', $_POST['adopter2_relationship_adopter1']);
            $stmt->bindParam(':adopter2_relationship_chlds_parent', $_POST['adopter2_relationship_chlds_parent']);
            $stmt->bindParam(':category_of_adopters', $_POST['adopter_category']);
            $stmt->bindParam(':child_full_name', $child_full_name);
            $stmt->bindParam(':child_dob', $_POST['child_dob']);
            $stmt->bindParam(':child_birthplace', $_POST['child_birthplace']);
            $stmt->bindParam(':child_sex', $_POST['child_sex']);
            $stmt->bindParam(':received_child_from', $_POST['received_child_from']);
            $stmt->bindParam(':child_placer_address', $_POST['child_placer_address']);
            $stmt->bindParam(':child_placer_phone', $_POST['child_placer_phone']);
            $stmt->bindParam(':adoption_date', $_POST['adoption_date']);
            $stmt->bindParam(':adoption_type', $_POST['adoption_type']);
            $stmt->bindParam(':rgstrnt_user', $rgstrnt_user);

            // Execute the statement
            $stmt->execute();

            // Redirect to show a success message
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
    // ENV
    header("Location: " . PROJECT_ROOT . "src/forms/adoption.php");
    exit;
}
