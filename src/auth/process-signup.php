<?php

// You can use function from validators.php to validate required fields

require_once "{$_SERVER['DOCUMENT_ROOT']}/src/includes/db.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/src/includes/validators.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/src/includes/declarations.php";

/**
 * @var array Names of required fields for the signup form
 */
$required_fields = [
    'first_name',
    'middle_name',
    'last_name',
    'dob',
    'principal_residence',
    'citizenship',
    'email',
    'password',
    'password_confirm',
];

/**
 * @var array Mapping each input in signup form to a human readable name
 */
$signup_labels = [
    'first_name' => 'First Name',
    'middle_name' => 'Middle Name',
    'last_name' => 'Last Name',
    'dob' => 'Date of birth',
    'principal_residence' => 'Principal residence',
    'citizenship' => 'Citizenship',
    'email' => 'Email',
    'password' => 'Password',
    'password_confirm' => 'Password confirmation',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check required fields
    $errors_required_fields = checkFieldPresence(
        $required_fields,
        $signup_labels,
    );
    handleErrors($errors_required_fields, 'Required fields missing');

    // Email validation
    $errors_email_validation = [];
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors_email_validation[] = new FormError(
            'email',
            $signup_labels['email'],
            'This is not a valid email'
        );
    }
    handleErrors($errors_email_validation, 'Invalid email');

    // Password validation
    $errors_password_validation = [];
    if (strlen($_POST['password']) < MIN_PASSWORD_LENGTH) {
        $errors_password_validation[] = new FormError(
            'password',
            $signup_labels['password'],
            'Must be at least ' . MIN_PASSWORD_LENGTH . ' characters'
        );
    }
    if (!preg_match("/[a-z]/i", $_POST["password"])) {
        $errors_password_validation[] = new FormError(
            'password',
            $signup_labels['password'],
            'Must contain at least one letter'
        );
    }
    if (!preg_match("/[0-9]/i", $_POST["password"])) {
        $errors_password_validation[] = new FormError(
            'password',
            $signup_labels['password'],
            'Must contain at least one number'
        );
    }
    if ($_POST['password'] !== $_POST['password_confirm']) {
        $errors_password_validation[] = new FormError(
            'password, password_confirm',
            "{$signup_labels['password']}, {$signup_labels['password_confirm']}",
            'Passwords must match'
        );
    }
    handleErrors($errors_password_validation, 'Password error');

    // Kill the script if errors are found
    if (!empty(array_merge(
        $errors_password_validation,
        $errors_email_validation,
        $errors_required_fields
    ))) {
        exit;
    }

    // Enter the data into the database
    $sql = 'INSERT INTO Users (
                email,
                password_hash,
                full_name,
                dob,
                principal_residence,
                citizenship
            ) VALUES (?, ?, ?, ?, ?, ?);';

    try {
        if (!empty($pdo)) {
            $pdo->prepare($sql)->execute([
                $_POST['email'],
                password_hash($_POST['password'], PASSWORD_DEFAULT), // Hash the password
                $_POST['first_name'] . $_POST['middle_name'] . $_POST['last_name'],
                $_POST['dob'],
                $_POST['principal_residence'],
                $_POST['citizenship'],
            ]);
            header('Location: login.php');
            exit;
        } else {
            die('<p>Something went wrong with the db connection<p>');
        }
    } catch (PDOException $e) {
        // Get the SQLSTATE error code
        $errorCode = $e->getCode();

        // Check if the error code indicates a duplicate entry (unique constraint violation)
        if ($errorCode == '1061') {
            // Handle duplicate key violation
            echo "<p>Account with given email already exists.</p>";
        } else {
            // Handle other PDO exceptions
            echo "<p>Error code: $errorCode</p>";
        }
    }

} else {
    header('Location: ./signup.php');
    exit;
}
