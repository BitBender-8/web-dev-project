<?php

// Including all files in includes folder
$includes = glob("../*.php");
foreach ($includes as $file) {
    include_once $file;
}
include_once "./divorce-declarations.php";

//  TODO Enter the data into the database
//      - NOTE The only check you need to make before entering into the database is to make sure that
//        the fields are not empty and that there are no errors.

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $divorce_required_fields['spouse1'],
            $divorce_required_fields['spouse2'],
            $divorce_required_fields['marriage_divorce_details']
        ),
        $divorce_labels
    );

    handleErrors($errors_required_fields, "Required fields missing");

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($divorce_text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $divorce_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maximum allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes and multiple
    // option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($divorce_selection_controls as $field_name => $allowed_values) {
        $errors_selection_fields[] = checkAllowedValues(
            $field_name,
            $divorce_labels[$field_name],
            array_merge($divorce_selection_controls[$field_name])
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($divorce_phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $divorce_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');
}
?>
