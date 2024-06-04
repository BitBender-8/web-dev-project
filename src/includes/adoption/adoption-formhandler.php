<?php

$includes = glob("../*.php");
foreach ($includes as $file) {
    include_once $file;
}
include_once "./adoption-declarations.php";

//  TODO (Client-Js) In category of adopters, enable disabled fields when info for both adopters is entered.
//  TODO Enter the data into the database
//      - NOTE The only check you need to make before entering into the database is to make sure that
//        the fields are not empty.

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // CONSIDER Adding a check to make sure that all fields are not empty

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
    // option fields are submitting data that are allowed.
    $errors_option_fields = [];
    foreach ($multivalue_fields as $field_name => $allowed_values) {
        $errors_option_fields[] = checkAllowedValues(
            $field_name,
            $adoption_labels[$field_name],
            array_merge($multivalue_fields[$field_name])
        );
    }
    handleErrors($errors_option_fields, 'Invalid option submitted');

    // Make sure that either all of adopter2's required fields are submitted or none of them are
    $errors_adopter2_required_fields = checkFieldPresence($required_fields['adopter2'], $adoption_labels);
    if (count($errors_adopter2_required_fields) !== count($required_fields['adopter2'])) {
        handleErrors($errors_adopter2_required_fields, 'Missing fields for adopter 2: Submit either no fields or all required fields');
    }

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"];
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $adoption_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maxium allowed length for text exceeded');

    // Making sure that fields which require both adopters in 'Category of adopters' are not 
    // submitted without having both adopters.
    $errors_adopter_category = [];
    // adopter2's required fields have not all been filled and adopter_category is not empty
    if (!empty($errors_adopter2_required_fields) && !empty($_POST['adopter_category'])) {
        $field_name = 'adopter_category';
        $errors_adopter_category[] = new FormError(
            $field_name,
            $adoption_labels[$field_name],
            "Adopter 2 data is required to select option '" . $_POST[$field_name] . "'"
        );
    }
    handleErrors($errors_adopter_category, 'Adopter 2 data missing');

    // Validating phone number fields
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $errors_phone_fields[] = checkPhoneField(
            $field_name,
            $adoption_labels[$field_name],
            PHONE_REGEX
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');
} else {
    header("Location: ./adoption.php");
}
