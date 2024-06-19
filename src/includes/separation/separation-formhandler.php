<?php
// Include all files in includes folder
$includes = glob("../*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "./separation-declarations.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $separation_required_fields['spouse1'],
            $separation_required_fields['spouse2'],
            $separation_required_fields['marriage_details'],
            $separation_required_fields['separation_details']
        ),
        $separation_labels
    );
    handleErrors($errors_required_fields, 'Required fields missing');

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($separation_text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $separation_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maximum allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes and multiple option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($separation_selection_controls as $field_name => $allowed_values) {
        $errors_selection_fields[] = checkAllowedValues(
            $field_name,
            $separation_labels[$field_name],
            $separation_selection_controls[$field_name]
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($separation_phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $separation_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // // File upload check
    // $errors_file_fields = [];
    // foreach ($file_fields as $file_field) {
    //     $errors_file_fields = checkFileUpload(
    //         $file_field,
    //         $separation_labels[$file_field]
    //     );
    // }
    // handleErrors($errors_file_fields, 'File upload error');

} else {
    header("Location: ../../forms/separation.php");
    exit();
}
