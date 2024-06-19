<?php

// You can use function from validators.php to validate required fields
/**
 * require db connection file.
 * email validation
 * if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
 *      die("Email is required!");
 * }
 * password validation
 * if (strlen($_POST["password]) < 8) {
 *      die("Password must be at least 8 characters");
 * }
 * if (! preg_match("/[a-z]/i"), $_POST["password"])) {
 *      die("Password must contain at least one letter");
 * }
 * if (! preg_match("/[0-9]/i"), $_POST["password"])) {
 *      die("Password must contain at least one letter");
 * }
 * if ($_POST["password"] !== $_POST["password_confirmation"]) {
 *       die("Passwords must match");
 * }
 * password hashing
 * $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
 *
 * $sql = "INSERT INTO USER (...)
 * $stmt
 * store in database
 * get error code for duplicate email
 * when signup is successful redirect to another page.
 * exit after redirect
 */

require_once "{$_SERVER['DOCUMENT_ROOT']}/src/includes/db.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}/src/includes/validators.php";

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

    // Email validation
    if (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
} else {
    header('Location: ./signup.php');
    exit;
}