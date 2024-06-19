<?php
// Include all files in includes folder
$includes = glob("../*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "./birth-declarations.php";

//  TODO Enter the data into the database
//      - NOTE The only check you need to make before entering into the database is to make sure that
//        the fields are not empty and that there are no errors.

if ($_SERVER['REQUEST_METHOD'] === "POST") {
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
        $errors_selection_fields[] = checkAllowedValues(
            $field_name,
            $birth_labels[$field_name],
            array_merge($selection_controls[$field_name])
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking number fields (excluding phone number fields)
    $errors_number_fields[] = checkNumberFormat(
        'child_birth_plurality',
        $birth_labels['child_birth_plurality'],
        '/^[1-9][0-9]?$/',
        'Must be a number between 1 and 99'
    );
    $errors_number_fields[] = checkNumberFormat(
        'child_weight_at_birth',
        $birth_labels['child_weight_at_birth'],
        '/^(1[5-9][0-9]|[2-9][0-9]{2,3}|1[0-4][0-9]{3}|15000)$/',
        'Must be a whole number between 150 and 15000. (Weight must be in grams)'
    );
    handleErrors($errors_number_fields, 'Invalid number format');

    // Checking phone number fields
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $birth_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Make sure that either all of the declarant's required fields are submitted or none of them are
    $errors_declarant_required_fields = checkFieldPresence($required_fields['declarant'], $birth_labels);
    if (count($errors_declarant_required_fields) !== count($required_fields['declarant'])) {
        handleErrors($errors_declarant_required_fields, 'Missing fields for Declarant: Submit either no fields or all required fields');
    }
} else {
    header("Location: ../../forms/birth.php");
}
