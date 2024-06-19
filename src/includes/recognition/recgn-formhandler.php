<?php

// Include all files in the includes folder
$includes = glob("../*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "./recgn-declarations.php";

//  TODO Enter the data into the database
//      - NOTE The only check you need to make before entering into the database is to make sure that
//        the fields are not empty and that there are no errors.

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['child'],
            $required_fields['parent1']
        ),
        $recgn_labels
    );
    handleErrors($errors_required_fields, "Missing required fields");

    // Check string lengths: make sure that text fields don't have more than their corresponding maxlength
    $errors_maxlength = [];
    foreach ($text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST[$field_name] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $recgn_labels[$field_name],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }

    handleErrors($errors_maxlength, 'Maximum allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes and multiple
    // option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($selection_controls as $field_name => $allowed_values) {
        $errors_selection_fields[] = checkAllowedValues(
            $field_name,
            $recgn_labels[$field_name],
            array_merge($selection_controls[$field_name])
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $recgn_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Make sure that either all of parent2's required fields are submitted or none of them are
    $optionally_required_fields = array_merge(
        $required_fields['parent2'],
        $required_fields['marriage_info'],
    );
    $errors_parent2_required_fields = checkFieldPresence($optionally_required_fields, $recgn_labels);
    if (count($errors_parent2_required_fields) !== count($optionally_required_fields)) {
        handleErrors($errors_parent2_required_fields, 'Missing fields: Submit either no fields or all required fields under Parent 2 and Marriage information');
    }
}
