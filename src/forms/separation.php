<?php
require_once "../includes/declarations.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Legal Separation Registration Form</title>
</head>
<!--
         # FORM VALIDATIONS
         - [ ] Universal validations (1 - 5)
    -->

<body>
    <h1>Legal Separation Registration Form</h1>
    <?php if (!empty($_SESSION["user_id"])): ?>
    <form action="../includes/separation/separation-formhandler.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?=MAX_UPLOAD_FILE_SIZE;?>" />

        <h2>Spouse Information</h2>
        <h3>Petitioner (First Spouse)</h3>
        <ul>
            <li>
                <label for="petitioner_first_name">First name:</label>
                <input type="text" id="petitioner_first_name" name="petitioner_first_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="petitioner_middle_name">Middle name:</label>
                <input type="text" id="petitioner_middle_name" name="petitioner_middle_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="petitioner_last_name">Last name:</label>
                <input type="text" id="petitioner_last_name" name="petitioner_last_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="petitioner_sex">Sex</label>
                <select id="petitioner_sex" name="petitioner_sex" required>
                    <option value="">Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="petitioner_dob">Date of Birth:</label>
                <input type="date" id="petitioner_dob" name="petitioner_dob" required>
            </li>
            <li>
                <label for="petitioner_birthplace">Place of Birth:</label>
                <input type="text" id="petitioner_birthplace" name="petitioner_birthplace" required>
            </li>
            <li>
                <label for="petitioner_citizenship">Country of citizenship:</label>
                <input type="text" name="petitioner_citizenship" id="petitioner_citizenship" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="petitioner_phone">Phone Number:</label>
                <input type="tel" id="petitioner_phone" name="petitioner_phone" required pattern="<?=PHONE_REGEX;?>">
            </li>
            <li>
                <label for="petitioner_residence">Primary residence:</label>
                <input type="text" id="petitioner_residence" name="petitioner_residence" required>
            </li>
        </ul>
        <h3>Respondent (Second Spouse)</h3>
        <ul>
            <li>
                <label for="respondent_first_name">First name:</label>
                <input type="text" id="respondent_first_name" name="respondent_first_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="respondent_middle_name">Middle name:</label>
                <input type="text" id="respondent_middle_name" name="respondent_middle_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="respondent_last_name">Last name:</label>
                <input type="text" id="respondent_last_name" name="respondent_last_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="respondent_sex">Sex</label>
                <select id="respondent_sex" name="respondent_sex" required>
                    <option value="">Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="respondent_dob">Date of Birth:</label>
                <input type="date" id="respondent_dob" name="respondent_dob" required>
            </li>
            <li>
                <label for="respondent_birthplace">Place of Birth:</label>
                <input type="text" id="respondent_birthplace" name="respondent_birthplace" required>
            </li>
            <li>
                <label for="respondent_citizenship">Country of citizenship:</label>
                <input type="text" name="respondent_citizenship" id="respondent_citizenship" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="respondent_phone">Phone Number:</label>
                <input type="tel" id="respondent_phone" name="respondent_phone" required pattern="<?=PHONE_REGEX;?>">
            </li>
            <li>
                <label for="respondent_residence">Primary residence:</label>
                <input type="text" id="respondent_residence" name="respondent_residence" required>
            </li>
        </ul>
        <h2>Marriage Information</h2>
        <ul>
            <li>
                <label for="marriage_date">Date of Marriage:</label>
                <input type="date" id="marriage_date" name="marriage_date" required>
            </li>
            <li>
                <label for="marriage_place">Place of Marriage:</label>
                <input type="text" id="marriage_place" name="marriage_place" required>
            </li>
        </ul>
        <h2>Separation Information</h2>
        <ul>
            <li>
                <label for="separation_reference">
                    Reference to Court Decision:
                </label>
                <input type="file" id="separation_reference" name="separation_reference"
                    accept="<?=rtrim(implode(',', ALLOWED_UPLOAD_FILE_TYPES), ',')?>" required>
            </li>
            <li>
                <label for="separation_reason">Reason for separation (Optional):</label>
                <textarea id="separation_reason" name="separation_reason" rows="2"
                    maxlength="<?=TEXTAREA_MAXLENGTH_SMALL;?>"></textarea>
            </li>
            <li>
                <label for="separation_date">Date of Separation:</label>
                <input type="date" id="separation_date" name="separation_date" required>
            </li>
        </ul>
        <button type="submit">Submit Registration</button>
    </form>
    <?php else: ?>
    You must log in first.
    <?php endif;?>
</body>

</html>