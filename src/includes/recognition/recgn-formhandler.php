<?php
// session_start(); // Ensure the session is started
// Include all files in the includes folder
$includes = glob("{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/*.php");
foreach ($includes as $file) {
    require_once $file;
}
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/recognition/recgn-declarations.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];
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
        $error = checkAllowedValues($field_name, $recgn_labels[$field_name], $allowed_values);
        if ($error !== null) {
            $errors_selection_fields[] = $error;
        }
    }
    handleErrors($errors_selection_fields, 'Invalid option submitted');

    // Checking phone number(s)
    $errors_phone_fields = [];
    foreach ($phone_fields as $field_name) {
        $error = checkNumberFormat(
            $field_name,
            $recgn_labels[$field_name],
            PHONE_REGEX,
            PHONE_ERR_MSG
        );
        if ($error !== null) {
            $errors_phone_fields[] = $error;
        }
    }
    handleErrors($errors_phone_fields, 'Invalid phone format');

    // Make sure that either all of parent2's required fields are submitted or none of them are
    $optionally_required_fields = array_merge(
        $required_fields['parent2'],
        $required_fields['marriage_info'],
    );
    $errors_parent2_required_fields = checkFieldPresence($optionally_required_fields, $recgn_labels);
    if (count($errors_parent2_required_fields) !== count($optionally_required_fields)) {
        $errors[] = $errors_parent2_required_fields;
        handleErrors($errors_parent2_required_fields, 'Missing fields: Submit either no fields or all required fields under Parent 2 and Marriage information');
    }

    $errors = array_merge(
        $errors_required_fields,
        $errors_selection_fields,
        $errors_maxlength,
        $errors_phone_fields,
        $errors
    );

    if (empty(array_filter($errors))) {
        try {
            // Concatenate the names
            $child_full_name = $_POST['child_first_name'] . ';' . $_POST['child_middle_name'] . ';' . $_POST['child_last_name'];
            $parent1_full_name = $_POST['parent1_first_name'] . ';' . $_POST['parent1_middle_name'] . ';' . $_POST['parent1_last_name'];
            $parent2_full_name = $_POST['parent2_first_name'] . ';' . $_POST['parent2_middle_name'] . ';' . $_POST['parent2_last_name'];

            // Get the user ID from the session
            $rgstrnt_user = $_SESSION['user_id'] ?? 8;

            // Prepare the SQL insert statement
            $sql = "INSERT INTO PaternityRecognitions (
                child_full_name, child_dob, child_birthplace, child_sex,
                parent1_full_name, parent1_dob, parent1_sex, parent1_birthplace,
                parent1_citizenship, parent1_occupation, parent1_residence, parent1_phone,
                parent2_full_name, parent2_dob, parent2_sex, parent2_birthplace,
                parent2_citizenship, parent2_occupation, parent2_residence, parent2_phone,
                parents_married_at_birth, parents_married_at_rgstrn, rgstrnt_user
            ) VALUES (
                :child_full_name, :child_dob, :child_birthplace, :child_sex,
                :parent1_full_name, :parent1_dob, :parent1_sex, :parent1_birthplace,
                :parent1_citizenship, :parent1_occupation, :parent1_residence, :parent1_phone,
                :parent2_full_name, :parent2_dob, :parent2_sex, :parent2_birthplace,
                :parent2_citizenship, :parent2_occupation, :parent2_residence, :parent2_phone,
                :parents_married_at_birth, :parents_married_at_rgstrn, :rgstrnt_user
            )";

            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':child_full_name', $child_full_name);
            $stmt->bindParam(':child_dob', $_POST['child_dob']);
            $stmt->bindParam(':child_birthplace', $_POST['child_birthplace']);
            $stmt->bindParam(':child_sex', $_POST['child_sex']);
            $stmt->bindParam(':parent1_full_name', $parent1_full_name);
            $stmt->bindParam(':parent1_dob', $_POST['parent1_dob']);
            $stmt->bindParam(':parent1_sex', $_POST['parent1_sex']);
            $stmt->bindParam(':parent1_birthplace', $_POST['parent1_birthplace']);
            $stmt->bindParam(':parent1_citizenship', $_POST['parent1_citizenship']);
            $stmt->bindParam(':parent1_occupation', $_POST['parent1_occupation']);
            $stmt->bindParam(':parent1_residence', $_POST['parent1_residence']);
            $stmt->bindParam(':parent1_phone', $_POST['parent1_phone']);
            $stmt->bindParam(':parent2_full_name', $parent2_full_name);
            $stmt->bindParam(':parent2_dob', $_POST['parent2_dob']);
            $stmt->bindParam(':parent2_sex', $_POST['parent2_sex']);
            $stmt->bindParam(':parent2_birthplace', $_POST['parent2_birthplace']);
            $stmt->bindParam(':parent2_citizenship', $_POST['parent2_citizenship']);
            $stmt->bindParam(':parent2_occupation', $_POST['parent2_occupation']);
            $stmt->bindParam(':parent2_residence', $_POST['parent2_residence']);
            $stmt->bindParam(':parent2_phone', $_POST['parent2_phone']);
            $stmt->bindParam(':parents_married_at_birth', $_POST['parents_married_at_birth']);
            $stmt->bindParam(':parents_married_at_rgstrn', $_POST['parents_rlnshp_at_rgstrn']);
            $stmt->bindParam(':rgstrnt_user', $rgstrnt_user);

            // Execute the statement
            $stmt->execute();

            // Redirect or show a success message
            header("Location: " . PROJECT_ROOT . "src/success.php");
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    }
} else {
    header("Location: .././src/forms/recognition.php");
}
