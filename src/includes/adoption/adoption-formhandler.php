<?php
// Include all files in includes folder
$includes = glob("../*.php");
foreach ($includes as $file) {
    include_once $file;
}
include_once "./adoption-declarations.php";

//  TODO (Client-Js) In category of adopters, enable disabled radios when info for both adopters is entered.
//  CONSIDER Either remove the field 'relationship_to_adopter_x' or add validation to make sure the adopter is present.
//  TODO Enter the data into the database
//      - NOTE The only checks you need to make before entering into the database is to make sure that
//        the fields are not empty and that there are no errors.

if ($_SERVER['REQUEST_METHOD'] === "POST") {
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
        $errors_selection_fields[] = checkAllowedValues(
            $field_name,
            $adoption_labels[$field_name],
            array_merge($selection_controls[$field_name])
        );
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
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $adoption_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Make sure that either all of adopter2's required fields are submitted or none of them are
    $errors_parent2_required_fields = checkFieldPresence($required_fields['adopter2'], $adoption_labels);
    if (count($errors_parent2_required_fields) !== count($required_fields['adopter2'])) {
        handleErrors($errors_parent2_required_fields, 'Missing fields for Adopter 2: Submit either no fields or all required fields');
    }

    // Making sure that fields which require both adopters in 'Category of adopters' are not
    // submitted without having both adopters.
    $errors_adopter_category = [];
    // adopter2's required fields have not all been filled and adopter_category is not empty
    if (!empty($errors_parent2_required_fields) && !empty($_POST['adopter_category'])) {
        $field_name = 'adopter_category';
        $errors_adopter_category[] = new FormError(
            $field_name,
            $adoption_labels[$field_name],
            "Adopter 2 data is required to select option '" . $_POST[$field_name] . "'"
        );
    }
    handleErrors($errors_adopter_category, 'Adopter 2 data missing');

} else {
    header("Location: ../../forms/adoption.php");
}
