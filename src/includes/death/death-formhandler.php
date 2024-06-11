<?php

// Include all files in includes folder
$includes = glob("../*.php");
foreach ($includes as $file) {
    include_once $file;
}
include_once "./death-declarations.php";

//  TODO Enter the data into the database
//      - NOTE The only check you need to make before entering into the database is to make sure that
//        the fields are not empty and that there are no errors.
//      - Store file path in database
//  TODO (Client) Enable 'Other' input field in declarant information section if 'I know about the death' is selected.

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['deceased_information'],
            $required_fields['death_information'],
            $required_fields['declarant_information']
        ),
        $dth_labels
    );
    // Checks for required file inputs
    if (empty($_FILE['$death_evidence'])) {
        $errors_required_fields[] = new FormError(
            'death_evidence',
            $dth_labels['death_evidence'],
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
                $dth_labels["$field_name"],
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
            $dth_labels[$field_name],
            $selection_controls[$field_name]
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $dth_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Checking age
    $errors_number_fields[] = checkNumberFormat(
        'deceased_age',
        $dth_labels['deceased_age'],
        '/^[1-9][0-9]?[0-9]?$/',
        'Age must be a number between 1 and 999'
    );
    handleErrors($errors_number_fields, 'Invalid number format');

    // File upload check
    $errors_file_fields = [];
    foreach ($file_fields as $file_field) {
        $errors_file_fields = checkFileUpload(
            $file_field,
            $dth_labels[$file_field]
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
            $dth_labels,
        );
    }
    handleErrors($errors_declarant_relation_other_text, 'Please specify how you know about the death');

    // TODO File upload save and write to database. Add a mechanism to get the filename from the function below
    // if (empty($errors_file_fields)) {
    //     $errors_file_fields[] = saveFileUpload($file_field, $death_labels[$file_field], UPLOAD_DIRECTORY);
    // } else {
    //     $errors_file_fields = array_merge($errors_file_fields, $errors);
    // }

} else {
    header("Location: ../../forms/death.php");
}
