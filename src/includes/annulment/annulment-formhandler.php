<?php

// Include all necessary files
$includes = glob("../*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "./annulment-declarations.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $annulment_required_fields['spouse1'],
            $annulment_required_fields['spouse2'],
            $annulment_required_fields['marriage_annulment_details']
        ),
        $annulment_labels
    );

    handleErrors($errors_required_fields, "Required fields missing");

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($annulment_text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $annulment_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maximum allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes, and multiple option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($annulment_selection_controls as $field_name => $allowed_values) {
        $errors_selection_fields[] = checkAllowedValues(
            $field_name,
            $annulment_labels[$field_name],
            array_merge($annulment_selection_controls[$field_name])
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($annulment_phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $annulment_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Handle file upload validation
    if (isset($_FILES['annulment_reference'])) {
        $file_error = $_FILES['annulment_reference']['error'];
        $file_size = $_FILES['annulment_reference']['size'];
        $file_type = $_FILES['annulment_reference']['type'];

        if ($file_error !== UPLOAD_ERR_OK) {
            handleErrors([new FormError('annulment_reference', $annulment_labels['annulment_reference'], 'File upload error.')], 'File upload error');
        }

        if ($file_size > MAX_UPLOAD_FILE_SIZE) {
            handleErrors([new FormError('annulment_reference', $annulment_labels['annulment_reference'], 'File size exceeds the maximum allowed size.')], 'File size error');
        }

        if (!in_array($file_type, ALLOWED_UPLOAD_FILE_TYPES)) {
            handleErrors([new FormError('annulment_reference', $annulment_labels['annulment_reference'], 'Invalid file type.')], 'Invalid file type');
        }
    }
}
