<?php

// Include all files in includes folder
$includes = glob("../*.php");
foreach ($includes as $file) {
    include_once $file;
}
include_once "./stillbirth-declarations.php";

//  TODO Enter the data into the database
//      - NOTE The only check you need to make before entering into the database is to make sure that
//        the fields are not empty and that there are no errors.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['child'],
            $required_fields['mother'],
            $required_fields['pregnancy'],
            $required_fields['fetal_death_conditions'],
            $required_fields['reporting_person']
        ),
        $stillbirth_labels
    );

    // Making sure that textareas corresponding to checkboxes checked for 'fetal_death_conditions' are not
    // empty
    handleErrors($errors_required_fields, 'Required fields missing');

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $stillbirth_labels["$field_name"],
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
            $stillbirth_labels[$field_name],
            $selection_controls[$field_name]
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $stillbirth_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Checking number fields
    $errors_number_fields = [];
    foreach ($number_fields as $field_name) {
        checkNumberFormat(
            $field_name,
            $stillbirth_labels[$field_name],
            '/^[1-9][0-9]?[0-9]?$/',
            'Field must be a number between 1 and 999'
        );
    }

    // Father is optional so this makes sure that either all fields of father are submitted or none of them are
    $errors_father_required_fields = checkFieldPresence($required_fields['father'], $stillbirth_labels);
    if (count($errors_father_required_fields) !== count($required_fields['father'])) {
        handleErrors(
            $errors_father_required_fields,
            'Missing fields: Submit either no fields or all required fields under "Father" heading.'
        );
    }

    // In 'fetal death conditions' section this check makes sure that if checkbox is checked
    // then the corresponding explanation is submitted. This check is only performed if the values
    // of 'fetal_death_conditions' submitted exist
    $errors_empty_explanation = [];
    if (empty($errors_selection_fields)) {
        foreach ($_POST['fetal_death_conditions'] ?? [] as $fetal_death_condition) {
            // Get the key of the explanation
            $explanation_key = $condition_key_to_explanation_key[$fetal_death_condition] ?? '';
            $fetal_death_explanation = $_POST[$explanation_key] ?? '';

            if (!empty($fetal_death_condition) && empty($_POST[$fetal_death_explanation])) {
                $errors_empty_explanation[] = new FormError(
                    $fetal_death_condition,
                    $stillbirth_labels[$fetal_death_condition],
                    "Since the option was checked, its explanation is required."
                );
            }
        }
    }
    handleErrors($errors_empty_explanation, "Missing explanation");

}
