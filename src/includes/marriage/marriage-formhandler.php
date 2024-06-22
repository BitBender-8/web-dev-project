<?php
// session_start(); // Ensure the session is started
// Include all files in includes folder
$includes = glob("{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/marriage/marriage-declarations.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check whether universally required fields were submitted correctly
    $errors_required_fields = checkFieldPresence(
        array_merge(
            $required_fields['spouse1'],
            $required_fields['spouse2'],
            $required_fields['witness1'],
            $required_fields['marriage_details']
        ),
        $marriage_labels
    );

    handleErrors($errors_required_fields, "Required fields missing");

    // Check string lengths: make sure that text fields don't have more than their corresponding maximum number of allowed characters.
    $errors_maxlength = [];
    foreach ($text_maxlengths as $field_name => $maxlength) {
        $submitted_text = $_POST["$field_name"] ?? '';
        if (strlen($submitted_text) > $maxlength) {
            $errors_maxlength[] = new FormError(
                $field_name,
                $marriage_labels["$field_name"],
                "Submitted text '$submitted_text' exceeds the maximum allowed length"
            );
        }
    }
    handleErrors($errors_maxlength, 'Maximum allowed length for text field(s) exceeded');

    // Check whether all dropdowns, radio buttons, checkboxes and multiple
    // option fields are submitting data that is allowed.
    $errors_selection_fields = [];
    foreach ($selection_controls as $field_name => $allowed_values) {
        $errors_selection_fields[] = checkAllowedValues($field_name, $marriage_labels[$field_name], $allowed_values);
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $error = checkNumberFormat(
            $field_name,
            $marriage_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
        if ($error !== null) {
            $errors_phone_fields[] = $error;
        }
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    $errors = array_merge(
        $errors_required_fields,
        $errors_maxlength,
        $errors_selection_fields,
        $errors_phone_fields
    );

    if (empty(array_filter($errors))) {
        try {
            // Concatenate the names
            $spouse1_full_name = $_POST['spouse1_first_name'] . ';' . $_POST['spouse1_middle_name'] . ';' . $_POST['spouse1_last_name'];
            $spouse2_full_name = $_POST['spouse2_first_name'] . ';' . $_POST['spouse2_middle_name'] . ';' . $_POST['spouse2_last_name'];
            $witness1_full_name = $_POST['witness1_first_name'] . ';' . $_POST['witness1_middle_name'] . ';' . $_POST['witness1_last_name'];
            $witness2_full_name = $_POST['witness2_first_name'] . ';' . $_POST['witness2_middle_name'] . ';' . $_POST['witness2_last_name'];

            // Get the user ID from the session
            $rgstrnt_user = $_SESSION['user_id'];

            // Prepare the SQL insert statement
            $sql = "INSERT INTO MarriageRegistrations (
                spouse1_full_name, spouse1_sex, spouse1_dob, spouse1_place_of_birth,
                spouse1_citizenship, spouse1_previous_marital, spouse1_phone, spouse1_residence,
                spouse2_full_name, spouse2_sex, spouse2_dob, spouse2_place_of_birth,
                spouse2_citizenship, spouse2_previous_marital, spouse2_phone, spouse2_residence,
                witness1_full_name, witness1_sex, witness1_dob, witness1_citizenship,
                witness1_phone, witness1_residence,
                witness2_full_name, witness2_sex, witness2_dob, witness2_citizenship,
                witness2_phone, witness2_residence,
                marriage_date, marriage_place, rgstrnt_user
            ) VALUES (
                :spouse1_full_name, :spouse1_sex, :spouse1_dob, :spouse1_place_of_birth,
                :spouse1_citizenship, :spouse1_previous_marital, :spouse1_phone, :spouse1_residence,
                :spouse2_full_name, :spouse2_sex, :spouse2_dob, :spouse2_place_of_birth,
                :spouse2_citizenship, :spouse2_previous_marital, :spouse2_phone, :spouse2_residence,
                :witness1_full_name, :witness1_sex, :witness1_dob, :witness1_citizenship,
                :witness1_phone, :witness1_residence,
                :witness2_full_name, :witness2_sex, :witness2_dob, :witness2_citizenship,
                :witness2_phone, :witness2_residence,
                :marriage_date, :marriage_place, :rgstrnt_user
            )";

            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':spouse1_full_name', $spouse1_full_name);
            $stmt->bindParam(':spouse1_sex', $_POST['spouse1_sex']);
            $stmt->bindParam(':spouse1_dob', $_POST['spouse1_dob']);
            $stmt->bindParam(':spouse1_place_of_birth', $_POST['spouse1_place_of_birth']);
            $stmt->bindParam(':spouse1_citizenship', $_POST['spouse1_citizenship']);
            $stmt->bindParam(':spouse1_previous_marital', $_POST['spouse1_previous_marital']);
            $stmt->bindParam(':spouse1_phone', $_POST['spouse1_phone']);
            $stmt->bindParam(':spouse1_residence', $_POST['spouse1_residence']);
            $stmt->bindParam(':spouse2_full_name', $spouse2_full_name);
            $stmt->bindParam(':spouse2_sex', $_POST['spouse2_sex']);
            $stmt->bindParam(':spouse2_dob', $_POST['spouse2_dob']);
            $stmt->bindParam(':spouse2_place_of_birth', $_POST['spouse2_place_of_birth']);
            $stmt->bindParam(':spouse2_citizenship', $_POST['spouse2_citizenship']);
            $stmt->bindParam(':spouse2_previous_marital', $_POST['spouse2_previous_marital']);
            $stmt->bindParam(':spouse2_phone', $_POST['spouse2_phone']);
            $stmt->bindParam(':spouse2_residence', $_POST['spouse2_residence']);
            $stmt->bindParam(':witness1_full_name', $witness1_full_name);
            $stmt->bindParam(':witness1_sex', $_POST['witness1_sex']);
            $stmt->bindParam(':witness1_dob', $_POST['witness1_dob']);
            $stmt->bindParam(':witness1_citizenship', $_POST['witness1_citizenship']);
            $stmt->bindParam(':witness1_phone', $_POST['witness1_phone']);
            $stmt->bindParam(':witness1_residence', $_POST['witness1_residence']);
            $stmt->bindParam(':witness2_full_name', $witness2_full_name);
            $stmt->bindParam(':witness2_sex', $_POST['witness2_sex']);
            $stmt->bindParam(':witness2_dob', $_POST['witness2_dob']);
            $stmt->bindParam(':witness2_citizenship', $_POST['witness2_citizenship']);
            $stmt->bindParam(':witness2_phone', $_POST['witness2_phone']);
            $stmt->bindParam(':witness2_residence', $_POST['witness2_residence']);
            $stmt->bindParam(':marriage_date', $_POST['marriage_date']);
            $stmt->bindParam(':marriage_place', $_POST['marriage_place']);
            $stmt->bindParam(':rgstrnt_user', $rgstrnt_user);

            // Execute the statement
            $stmt->execute();

            // Redirect or show a success message
            header("Location: " . PROJECT_ROOT . "src/success.php");
        } catch (PDOException $e) {
            // Handle other PDO exceptions
            $error_unknown_error = [];
            $error_unknown_error[] = new FormError(
                'Server Error',
                "Error Code: {$e->getCode()}",
                "Something went wrong. Error Message: {$e->getMessage()}"
            );
            handleErrors($error_unknown_error, "Server Error");
        }
    }
} else {
    header("Location: .././src/forms/marriage.php");
}
