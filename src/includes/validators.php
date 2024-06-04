<?php

/**
 * Check the presence of fields and return an array of Error objects if fields are missing. Otherwise, return an empty array.
 * 
 * @param array $fields The array of fields to check.
 * @return FormError[]|array An array of Error objects if fields are missing, or an empty array if all fields are present.
 */
function checkFieldPresence(array $fields, array $field_labels): array {
    $errors = [];
    // Check if any required fields are missing and add Error objects to the $errors array
    foreach ($fields as $field_name) {
        if (empty($_POST["$field_name"])) {
            $errors[] = new FormError($field_name, $field_labels[$field_name], "Missing field.");
        }
    }

    return $errors;
}

/**
 * Check whether the data in $_POST[$field_name] for a given $field_name is in
 * the $allowed_values array
 * @param string $field_name The name of the form field to check in $_POST[]
 * @param string $field_label A human readable name for $field_name for use in error messages. 
 * @param array $allowed_options The array of allowed options for $field_name
 * @return FormError|null If unallowed value is submitted returns FormError otherwise returns null
 */
function checkAllowedValues(string $field_name, string $field_label, array $allowed_options): FormError | null {
    $submitted_value = $_POST["$field_name"];
    $error = null;
    if (!in_array($submitted_value, $allowed_options)) {
        $error = new FormError(
            $field_name,
            $field_label,
            "<ul><li>Submitted value '$submitted_value' is not in the list of allowed values for
             field '$field_label'.</li> <li>Allowed values are " . rtrim(implode(', ', $allowed_options), ', ') . " </ul>"
        );
        return $error;
    }
}

/**
 * Print the contents of each FormError in the array or do nothing if the array is empty
 * 
 * @param FormError[]|array $errors The array of form errors to print
 * @param string $error_heading A Heading that describes all of the errors in the error array
 * @return void Returns nothing
 */

function handleErrors(array $errors, string $error_heading): void {
    // Removes null elements just in case.
    $errors = array_filter($errors);

    if (!empty($errors)) {
        echo "<h2>$error_heading:</h2>";

        // TODO Style your error messages
        foreach ($errors as $error) {
            echo "<div class=\"error\"><b style=\"color: red;\">Error:</b>
                    <ul> 
                        <li><b>Field:</b> {$error->getFieldLabel()} </li>
                        <li><b>Message:</b> {$error->getErrorMsg()} </li>
                    </ul>
                  </div>";
        }
    }
}

/**
 * Checks that phone number submitted in $_POST[$phone_field] matches $regex.
 * @param string $phone_field Phone field to check
 * @param string $phone_field_label Human readable name of $phone_field
 * @param string $regex Regular expression to validate against
 * @return FormError|null Returns an array of form errors if $phone_field doesn't match $regex is found otherwise returns an empty array
 */
function checkPhoneField(string $phone_field, string $phone_field_label, string $regex): FormError | null {
    $error = null;
    $field_value = $_POST[$phone_field];
    if (!preg_match($regex, $field_value)) {
        $error = new FormError(
            $phone_field,
            $phone_field_label,
            "Provided value '$field_value' is not of a correct format. Phone number must be a 10-digit number"
        );
    }
    return $error;
}
