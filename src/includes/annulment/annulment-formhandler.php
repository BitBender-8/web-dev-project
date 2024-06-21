<?php
// session_start();

// Include all necessary files
$includes = glob("{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/annulment/annulment-declarations.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/annulment/annulment-sql.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['spouse1'],
            $required_fields['spouse2'],
            $required_fields['marriage_annulment_details']
        ),
        $annulment_labels
    );

    // Checks for required file inputs
    if (empty($_FILES['annulment_reference'])) {
        $errors_required_fields[] = new FormError(
            'annulment_reference',
            $annulment_labels['annulment_reference'],
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
                $annulment_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maximum allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes, and multiple option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($selection_controls as $field_name => $allowed_values) {
        $errors_selection_fields[] = checkAllowedValues(
            $field_name,
            $annulment_labels[$field_name],
            array_merge($selection_controls[$field_name])
        );
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $errors_phone_fields[] = checkNumberFormat(
            $field_name,
            $annulment_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // File upload check
    $errors_file_fields = [];
    foreach ($file_fields as $file_field) {
        $errors_file_fields = checkFileUpload(
            $file_field,
            $annulment_labels[$file_field]
        );
    }
    handleErrors($errors_file_fields, 'File upload error');

    $errors = array_merge(
        $errors_required_fields,
        $errors_maxlength,
        $errors_selection_fields,
        $errors_phone_fields,
        $errors_file_fields
    );

    if (empty(array_filter($errors))) {

        // Save file to directory
        $result = [];
        foreach ($file_fields as $file_field) {
            $result[] = saveFileUpload(
                $file_field,
                $annulment_labels[$file_field],
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

        // Enter data into the database
        if ($pdo) {
            try {
                $pdo->prepare($insert_sql)->execute([
                    $_POST['petitioner_first_name'] . ';' . $_POST['petitioner_middle_name'] . ';' . $_POST['petitioner_last_name'],
                    $_POST['petitioner_dob'],
                    $_POST['petitioner_sex'],
                    $_POST['petitioner_residence'],
                    $_POST['petitioner_citizenship'],
                    $_POST['petitioner_phone'],
                    $_POST['petitioner_birthplace'],
                    $_POST['respondent_first_name'] . ';' . $_POST['respondent_middle_name'] . ';' . $_POST['respondent_last_name'],
                    $_POST['respondent_dob'],
                    $_POST['respondent_sex'],
                    $_POST['respondent_residence'],
                    $_POST['respondent_citizenship'],
                    $_POST['respondent_phone'],
                    $_POST['respondent_birthplace'],
                    $_POST['marriage_date'],
                    $_POST['marriage_place'],
                    $_POST['annulment_reasons'] ?? null, // This is an optional field
                    $fields_to_dest_dirs['annulment_reference'],
                    $_POST['annulment_date'],
                    $_SESSION['user_id'],
                ]);

                header("Location: " . PROJECT_ROOT . "src/success.php");
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
} else {
    header("Location: /src/forms/annulment.php");
    exit;
}
