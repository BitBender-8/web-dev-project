<?php

/**
 * Check the presence of fields in $_POST[] and return an array of Error objects if fields are missing.
 * Otherwise, return an empty array. Note that this function does not apply for file fields because their
 * data is stored in $_FILES[].
 *
 * @param array $field_names An array containing the names of fields to check.
 * @param array $field_labels An array that maps each field in $fields to a human readable name
 * @return FormError[]|array An array of Error objects if fields are missing, or an empty array if all fields are present.
 */
function checkFieldPresence(array $field_names, array $field_labels): array
{
    $errors = [];
    // Check if any required fields are missing and add Error objects to the $errors array
    foreach ($field_names as $field_name) {
        if (empty($_POST[$field_name])) {
            $err_msg = "Missing field.";

            if (is_array($_POST[$field_name])) {
                $field_values = $_POST[$field_name] ?? [];
                $all_empty = true;

                // This ensures that at least one value of the array is not an empty string
                foreach ($field_values ?? [] as $field_value) {
                    if (!empty($field_value)) {
                        $all_empty = false;
                    }
                }

                if ($all_empty) {
                    $err_msg .= ' At least one value must be submitted for this field.';
                }
            }
            $errors[] = new FormError($field_name, $field_labels[$field_name], $err_msg);
        }
    }

    return $errors;
}

/**
 * Checks that file for $file_field is present in $_FILES with no errors.
 *
 * @param $file_field The file field to check.
 * @param string $field_label A human readable name for $file_field
 * @return FormError[]|array An array of Error objects if files are absent or have errors, an empty array otherwise
 */
function checkFileUpload(string $file_field, string $field_label): array
{
    $errors = [];
    $finfo = new finfo(FILEINFO_MIME_TYPE);

    if (empty($_FILES[$file_field])) {
        $errors[] = new FormError(
            $file_field,
            $field_label,
            "No file was uploaded."
        );

        return $errors;
    }

    $file = $_FILES[$file_field];

    if (!is_string($file['name'])) {
        $errors[] = new FormError(
            $file_field,
            $field_label,
            "Multiple files uploaded. Only one file is allowed."
        );

        return $errors;
    }

    // Check for file upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        switch ($_FILES[$file_field]['error']) {
            case UPLOAD_ERR_PARTIAL:
                $errors[] = new FormError(
                    $file_field,
                    $field_label,
                    "The uploaded file was only partially uploaded."
                );
                break;
            case UPLOAD_ERR_NO_FILE:
                $errors[] = new FormError(
                    $file_field,
                    $field_label,
                    "No file was uploaded."
                );
                break;
            // The max file size set in php.ini is different from the max file size in code.
            // The one in php.ini is much larger and needs to be handled separately
            case UPLOAD_ERR_INI_SIZE:
                $errors[] = new FormError(
                    $file_field,
                    $field_label,
                    "The file size exceeds the maximum size allowed by the server."
                );
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $errors[] = new FormError(
                    $file_field,
                    $field_label,
                    "File size " . $file['size'] / BYTES_IN_KB . "KB - exceeds the maximum size allowed (" . MAX_UPLOAD_FILE_SIZE / BYTES_IN_KB . ") KB."
                );
                break;
            default:
                $errors[] = new FormError(
                    $file_field,
                    $field_label,
                    "Unknown file upload error."
                );
                break;
        }
    } else {
        // Check file size
        if ($file['size'] > MAX_UPLOAD_FILE_SIZE) {
            $errors[] = new FormError(
                $file_field,
                $field_label,
                "File size " . $file['size'] / BYTES_IN_KB . "KB - exceeds the maximum size allowed (" . MAX_UPLOAD_FILE_SIZE / BYTES_IN_KB . ") KB."
            );
        }

        // Check file type
        $mime_type = $finfo->file($file['tmp_name']);

        if (!in_array($mime_type, ALLOWED_UPLOAD_FILE_TYPES)) {
            $errors[] = new FormError(
                $file_field,
                $field_label,
                "File type not allowed. Allowed mime types are " . rtrim(implode(", ", ALLOWED_UPLOAD_FILE_TYPES), ', ')
            );
        }

        // Sanitize file name to prevent directory traversal attacks
        $santized_file_name = basename($file['name']);

        // Ensure sanitized file name does not contain special characters
        if ($santized_file_name !== $file['name']) {
            $errors[] = new FormError(
                $file_field,
                $field_label,
                "Invalid file name."
            );
        }
    }

    return $errors;
}

/**
 * Saves a file uploaded to $_FILES to a specified directory. Upload checks must be performed before file is passed.
 *
 * @param string $field_name The field name of the file input
 * @param string $human_readable_name A human readable name for $field_name
 * @param string $upload_directory The directory to save the file in
 * @return FormError | string[] Returns a FormError if an error occurred when saving the file or an array containing the field_name and destionation directory otherwise.
 */
function saveFileUpload(string $field_name, string $human_readable_name, string $upload_directory): FormError | array
{
    $error = null;

    // Get the temporary filename of the uploaded file
    $temp_file = $_FILES[$field_name]['tmp_name'];

    // Get the base name of the uploaded file and sanitize it
    $base_name = basename($_FILES[$field_name]['name']);
    $sanitized_base_name = preg_replace('/[^\w.-]/', '_', $base_name); // Replace non-word characters with underscores

    // Specify the destination path and filename for the uploaded file
    $destination_filename = $upload_directory . $sanitized_base_name;


    // Check if the file already exists
    while (file_exists($destination_filename)) {
        // Generate a unique filename by appending a number
        $filename_parts = pathinfo($destination_filename);
        $filename = $filename_parts['filename'] . '_' . uniqid() . '.' . $filename_parts['extension'];
        $destination_filename = $upload_directory . $filename;
    }

    // Move the uploaded file from the temp directory to the save directory
    if (!move_uploaded_file($temp_file, $destination_filename)) {
        $error = new FormError(
            $field_name,
            $human_readable_name,
            "The file $base_name could not be saved."
        );
    }

    if (!empty($error)) {
        return $error;
    }

    return [$field_name, $destination_filename];
}

/**
 * Check whether the data in $_POST[$field_name] for a given $field_name is in
 * the $allowed_values array
 * @param string $field_name The name of the form field to check in $_POST[]
 * @param string $field_label A human readable name for $field_name for use in error messages.
 * @param array $allowed_options The array of allowed options for $field_name
 * @return FormError|null If unallowed value is submitted returns FormError otherwise returns null
 */
function checkAllowedValues(string $field_name, string $field_label, array $allowed_options): FormError | null
{
    $submitted = $_POST[$field_name];
    $error = null;

    // Multiple allowed options for given field
    // CONSIDER mapping each option in $allowed_options to a human readable name
    if (is_array($submitted)) {
        foreach ($submitted as $value) {
            if ($value !== '' && !in_array($value, $allowed_options)) {
                $error = new FormError(
                    $field_name,
                    $field_label,
                    "<ul><li>Submitted value '$value' is not in the list of allowed values for
                 field '$field_label'.</li> <li>Allowed values are <b>'" . rtrim(implode(', ', $allowed_options), ', ') . "</b> </ul>"
                );
            }
        }
    } else if ($submitted !== '' && !in_array($submitted, $allowed_options)) {
        $error = new FormError(
            $field_name,
            $field_label,
            "<ul><li>Submitted value '$submitted' is not in the list of allowed values for
                 field '$field_label'.</li> <li>Allowed values are <b>" . rtrim(implode(', ', $allowed_options), ', ') . "</b> </ul>"
        );

    }

    return $error;
}

/**
 * Print the contents of each FormError in the array or do nothing if the array is empty
 *
 * @param FormError[]|array $errors The array of form errors to print
 * @param string $error_heading A Heading that describes all of the errors in the error array
 * @return void Returns nothing
 */
function handleErrors(array $errors, string $error_heading): void
{
    // Removes null elements just in case.
    $errors = array_filter($errors);

    if (!empty($errors)) {
        // echo "<h2>$error_heading</h2>";

        // Output JavaScript function call for each error
        foreach ($errors as $error) {
            $field = htmlspecialchars($error->getFieldLabel()); // Sanitize field label
            $message = htmlspecialchars($error->getErrorMsg()); // Sanitize error message

            // Output JavaScript to call showError function
            echo "<script>showError('$field', '$message');</script>";
        }
    }
}

/**
 * Checks that number submitted in $_POST[$phone_field] matches $regex or is empty
 * @param string $phone_field Phone field to check
 * @param string $phone_field_label Human readable name of $phone_field
 * @param string $regex Regular expression to validate against
 * @param string $err_msg Message to display if regex doesn't match
 * @return FormError|null Returns an array of form errors if $phone_field doesn't match $regex is found otherwise returns an empty array
 */
function checkNumberFormat(string $phone_field, string $phone_field_label, string $regex, string $err_msg): FormError | null
{
    $error = null;
    $field_value = $_POST[$phone_field];
    if (!preg_match($regex, $field_value) && !empty($field_value)) {
        $error = new FormError(
            $phone_field,
            $phone_field_label,
            "Provided value '$field_value' is not of a correct format. " . $err_msg
        );
    }
    return $error;
}
