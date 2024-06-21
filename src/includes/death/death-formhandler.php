<?php
session_start();
// Include all files in includes folder
$includes = glob("../*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "./death-declarations.php";
require_once "./death-sql.php";

// TODO (Client) Enable 'Other' input field in declarant information section if 'I know about the death' is selected.
// TODO Redirect to page which says that form was inserted successfully

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['deceased_information'],
            $required_fields['death_information'],
            $required_fields['declarant_information']
        ),
        $death_labels
    );

    // Checks for required file inputs
    if (empty($_FILES['death_evidence'])) {
        $errors_required_fields[] = new FormError(
            'death_evidence',
            $death_labels['death_evidence'],
            'Missing field'
        );
    }
    handleErrors($errors_required_fields, 'Required fields missing');

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $death_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maxium allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes and multiple
    // option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($selection_controls as $field_name => $allowed_values) {
        $errors_selection_fields[] = checkAllowedValues(
            $field_name,
            $death_labels[$field_name],
            $selection_controls[$field_name]
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $death_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Checking age
    $errors_number_fields[] = checkNumberFormat(
        'deceased_age',
        $death_labels['deceased_age'],
        '/^[1-9][0-9]?[0-9]?$/',
        'Age must be a number between 1 and 999'
    );
    handleErrors($errors_number_fields, 'Invalid number format');

    // File upload check
    $errors_file_fields = [];
    foreach ($file_fields as $file_field) {
        $errors_file_fields = checkFileUpload(
            $file_field,
            $death_labels[$file_field]
        );
    }
    handleErrors($errors_file_fields, 'File upload error');

    // If 'other' is selected for declarant_relation then declarant_relation_other_text is required.
    // Note that text from 'declarant_relation_other_text' is quietly ignored if 'declarant_relation' is different from 'other'
    $errors_declarant_relation_other_text = [];
    if ($_POST['declarant_relation'] === 'other') {
        $declarant_text = ['declarant_relation_other_text'];
        $errors_declarant_relation_other_text = checkFieldPresence(
            $declarant_text,
            $death_labels,
        );
    }
    handleErrors($errors_declarant_relation_other_text, 'Please specify how you know about the death');

    // Combining all error arrays to check whether the data should be saved
    $errors = array_merge(
        $errors_maxlength,
        $errors_required_fields,
        $errors_selection_fields,
        $errors_phone_fields,
        $errors_number_fields,
        $errors_file_fields,
        $errors_declarant_relation_other_text
    );

    if (!empty(array_filter($errors))) {
        exit;
    }

    // Save file to directory
    $result = [];
    foreach ($file_fields as $file_field) {
        $result[] = saveFileUpload(
            $file_field,
            $death_labels[$file_field],
            UPLOAD_DIRECTORY
        );
    }

    // If something goes wrong while saving then exit the script
    $errors_file_save = array_filter($result, function ($value) {
        return $value instanceof FormError;
    });

    if (!empty($errors_file_save)) {
        handleErrors($errors_file_save, 'Something went wrong when saving the file');
        exit;
    }

    // The filters [field_name, destination_directory] pairs for all the file fields
    $temp = array_filter($result, function ($value) {
        return is_array($value);
    });

    // Combines the pairs into a single array
    $fields_to_dest_dirs = [];
    foreach ($temp as $field_to_dest_dir) {
        $fields_to_dest_dirs[$field_to_dest_dir[0]] = $field_to_dest_dir[1];
    }

    // Enter data into database
    if ($pdo) {
        try {
            $pdo->prepare($insert_sql)->execute([
                $_POST['deceased_first_name'] . ';' . $_POST['deceased_middle_name'] . ';' . $_POST['deceased_last_name'],
                $_POST['deceased_title'],
                $_POST['deceased_sex'],
                $_POST['deceased_age'],
                $_POST['deceased_citizenship'],
                $_POST['death_date'],
                $_POST['death_place'],
                $_POST['death_cause'],
                $fields_to_dest_dirs['death_evidence'],
                $_POST['declarant_first_name'] . ';' . $_POST['declarant_middle_name'] . ';' . $_POST['declarant_last_name'],
                $_POST['declarant_sex'],
                $_POST['declarant_phone'],
                $_POST['declarant_residence'],
                $_POST['declarant_relation'],
                $_POST['declarant_relation_other_text'] ?? null, // This is an optional field
                $_SESSION['user_id'],
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } else {
        die('<div class="err-box">Something went wrong with the database connection.</div>');
    }

} else {
    header("Location: /web-dev-project/src/forms/death.php");
    exit;
}
