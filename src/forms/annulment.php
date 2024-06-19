<?php
require_once "../includes/declarations.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <title>Annulment Registration Form</title>
    </head>
    <!--
        # FORM VALIDATIONS
        - [ ] Universal validations 1 - 5
    -->
    <body>
        <a href="index.php">Home</a>
        <form action="../includes/annulment/annulment-formhandler.php" method="post">
        <h1>Annulment Registration Form</h1>
        <h2>Spouse Information</h2>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?=MAX_UPLOAD_FILE_SIZE;?>" />
        <h3>Petitioner (First Spouse)</h3>
        <ul>
            <li>
                <label for="petitioner_name">First name:</label>
                <input
                    type="text"
                    id="petitioner_first_name"
                    name="petitioner_first_name"
                    required
                >
            </li>
            <li>
                <label for="petitioner_name">Middle name:</label>
                <input
                    type="text"
                    id="petitioner_middle_name"
                    name="petitioner_middle_name"
                    required
                >
            </li>
            <li>
                <label for="petitioner_name">Last name:</label>
                <input
                    type="text"
                    id="petitioner_last_name"
                    name="petitioner_last_name"
                    required
                >
            </li>
            <li>
                <label for="petitioner_dob">Date of Birth:</label>
                <input
                    type="date"
                    id="petitioner_dob"
                    name="petitioner_dob"
                    required
                >
            </li>
            <li>
                <label for="petitioner_sex">Sex:</label>
                <select id="petitioner_sex" name="petitioner_sex">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="petitioner_residence">Petitioner residence:</label>
                <input
                    type="text"
                    id="petitioner_residence"
                    name="petitioner_residence"
                    required
                >
            </li>
            <li>
                <label for="petitioner_citizenship">Country of citizenship:</label>
                <input
                    type="text"
                    id="petitioner_citizenship"
                    name="petitioner_citizenship"
                    required
                >
            </li>
            <li>
                <label for="petitioner_phone">Phone Number:</label>
                <input
                    type="tel"
                    id="petitioner_phone"
                    name="petitioner_phone"
                    required
                    pattern="<?=PHONE_REGEX;?>"
                >
            </li>
            <li>
                <label for="petitioner_birthplace">Place of Birth:</label>
                <input
                    type="text"
                    id="petitioner_birthplace"
                    name="petitioner_birthplace"
                    required
                >
            </li>
        </ul>
        <h3>Respondent (Second Spouse)</h3>
        <ul>
            <li>
                <label for="respondent_name">First name:</label>
                <input
                    type="text"
                    id="respondent_first_name"
                    name="respondent_first_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
            </li>
            <li>
                <label for="respondent_name">Middle name:</label>
                <input
                    type="text"
                    id="respondent_middle_name"
                    name="respondent_middle_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
            </li>
            <li>
                <label for="respondent_name">Last name:</label>
                <input
                    type="text"
                    id="respondent_last_name"
                    name="respondent_last_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
            </li>
            <li>
                <label for="respondent_dob">Date of Birth:</label>
                <input
                    type="date"
                    id="respondent_dob"
                    name="respondent_dob"
                    required
                >
            </li>
            <li>
                <label for="respondent_sex">Sex:</label>
                <select id="respondent_sex" name="respondent_sex">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="respondent_residence">Respondent residence:</label>
                <input
                    type="text"
                    id="respondent_residence"
                    name="respondent_residence"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>"
                >
            </li>
            <li>
                <label for="respondent_citizenship">Country of citizenship:</label>
                <input
                    type="text"
                    id="respondent_citizenship"
                    name="respondent_citizenship"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
            </li>
            <li>
                <label for="respondent_phone">Phone Number:</label>
                <input
                    type="tel"
                    id="respondent_phone"
                    name="respondent_phone"
                    required
                    pattern="<?=PHONE_REGEX;?>"
                >
            </li>
            <li>
                <label for="respondent_birthplace">Place of Birth:</label>
                <input
                    type="text"
                    id="respondent_birthplace"
                    name="respondent_birthplace"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>"
                >
            </li>
        </ul>
        <h2>Marriage Information</h2>
        <ul>
            <li>
                <label for="marriage_date">Date of Marriage:</label>
                <input
                    type="date"
                    id="marriage_date"
                    name="marriage_date"
                    required
                >
            </li>
            <li>
                <label for="marriage_place">Place of Marriage:</label>
                <input
                    type="text"
                    id="marriage_place"
                    name="marriage_place"
                    required
                >
            </li>
        </ul>
        <h2>Annulment Information</h2>
        <ul>
            <li>
                <label for="annulment_reasons">Reasons for Annulment (Optional):</label>
                <textarea
                    id="annulment_reasons"
                    name="annulment_reasons"
                    rows="5"
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>"
                ></textarea>
            </li>
            <li>
                <label for="annulment_reference">Upload judicial reference file</label>
                <input
                    type="file"
                    id="annulment_reference"
                    name="annulment_reference"
                    accept="<?=rtrim(implode(',', ALLOWED_UPLOAD_FILE_TYPES), ',')?>"
                    required
                >
            </li>
            <li>
                <label for="annulment_date">Date of Annulment:</label>
                <input
                    type="date"
                    id="annulment_date"
                    name="annulment_date"
                    required
                >
            </li>
        </ul>
        <button type="submit">Submit Registration</button>
    </form>
    </body>
</html>
