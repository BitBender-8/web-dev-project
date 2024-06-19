<?php
require_once "../includes/declarations.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <title>Death Registration Form</title>
    </head>
    <body>
        <a href="index.php">Home</a>
        <h1>Death Registration Form</h1>
        <!-- REMOVE Remove novalidate when done with debugging -->
        <form action="../includes/death/death-formhandler.php" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?=MAX_UPLOAD_FILE_SIZE;?>" />
        <h2>Deceased Information</h2>
        <ul>
            <li>
                <label for="deceased_first_name">First name:</label>
                <input
                    type="text"
                    id="deceased_first_name"
                    name="deceased_first_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
                <label for="deceased_middle_name">Middle name:</label>
                <input
                    type="text"
                    id="deceased_middle_name"
                    name="deceased_middle_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
                <label for="deceased_last_name">Last name:</label>
                <input
                    type="text"
                    id="deceased_last_name"
                    name="deceased_last_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
            </li>
            <li>
                <!-- Kept the title field because death registrations usually have honorifics attached to them. -->
                <label for="deceased_title">Title (Mr., Ms., etc.):</label>
                <input
                    type="text"
                    id="deceased_title"
                    name="deceased_title"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_SHORT?>"
                >
            </li>
            <li>
                <label for="deceased_sex">Sex:</label>
                <select id="deceased_sex" name="deceased_sex" required>
                    <option value="" selected>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="deceased_age">Age:</label>
                <input
                    type="number"
                    id="deceased_age"
                    name="deceased_age"
                    min="0"
                    required
                >
            </li>
            <li>
                <label for="deceased_citizenship">Country of citizenship:</label>
                <input
                    type="text"
                    id="deceased_citizenship"
                    name="deceased_citizenship"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
            </li>
        </ul>
        <h2>Death Information</h2>
        <ul>
            <li>
                <label for="death_date">Date of Death:</label>
                <input
                    type="date"
                    id="death_date"
                    name="death_date"
                    required
                >
            </li>
            <li>
                <label for="death_place">Place of Death:</label>
                <input
                    type="text"
                    id="death_place"
                    name="death_place"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>"
                >
            </li>
            <li>
                <label for="death_cause">Cause of Death (if known):</label>
                <input
                    type="text"
                    id="death_cause"
                    name="death_cause"
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>"
                >
            </li>
            <li>
                <label for="death_evidence">
                    Reference to Evidence of Death (e.g., Medical Certificate):
                </label
        >
                <input
                    type="file"
                    id="death_evidence"
                    name="death_evidence"
                    accept="<?=rtrim(implode(',', ALLOWED_UPLOAD_FILE_TYPES), ',')?>"
                    required
                >
            </li>
        </ul>
        <h2>Declarant Information</h2>
        <ul>
            <li>
                <label for="declarant_first_name">First name:</label>
                <input
                    type="text"
                    id="declarant_first_name"
                    name="declarant_first_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
                <label for="declarant_middle_name">Middle name:</label>
                <input
                    type="text"
                    id="declarant_middle_name"
                    name="declarant_middle_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
                <label for="declarant_last_name">Last name:</label>
                <input
                    type="text"
                    id="declarant_last_name"
                    name="declarant_last_name"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                >
            </li>
            <li>
                <label for="declarant_sex">Sex:</label>
                <select id="declarant_sex" name="declarant_sex" required>
                    <option value="" selected>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="declarant_phone">Phone:</label>
                <input
                    type="tel"
                    id="declarant_phone"
                    name="declarant_phone"
                    required
                    pattern="<?=PHONE_REGEX;?>"
                >
            </li>
            <li>
                <label for="declarant_residence">Principal Residence:</label>
                <input
                    type="text"
                    id="declarant_residence"
                    name="declarant_residence"
                    required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>"
                >
            </li>
        </ul>
        <p>Please select your relationship to the deceased:</p>
        <ul>
            <li>
                <!-- An empty radio button that ensures that a default value is submitted to the server. -->
                <input
                    type="radio"
                    id="declarant_relation_default"
                    name="declarant_relation"
                    value=""
                    required
                    checked
                    style="display: none;"
                >
                <input
                    type="radio"
                    id="declarant_relation_lived"
                    name="declarant_relation"
                    value="lived_together"
                    required
                >
                <label for="declarant_relation_lived">
                    I used to live with the deceased
                </label>
            </li>
            <li>
                <input
                    type="radio"
                    id="declarant_relation_relative"
                    name="declarant_relation"
                    value="relative"
                    required
                >
                <label for="declarant_relation_relative">
                    I am a relative by blood or marriage
                </label>
            </li>
            <li>
                <input
                    type="radio"
                    id="declarant_relation_neighbor"
                    name="declarant_relation"
                    value="neighbor"
                    required
                >
                <label for="declarant_relation_neighbor">I am a close neighbor</label>
            </li>
            <li>
                <input
                    type="radio"
                    id="declarant_relation_other"
                    name="declarant_relation"
                    value="other"
                    required
                >
                <label for="declarant_relation_other">
                    I know about the death (Other, please specify):
                </label>
                <!-- TODO Make this required in client if other is selected above. -->
                <textarea
                    id="declarant_relation_other_text"
                    name="declarant_relation_other_text"
                    disabled
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT?>"
                    value=""
                >
                </textarea>
            </li>
        </ul>
        <button type="submit">Submit Registration</button>
        </form>
    </body>
</html>
