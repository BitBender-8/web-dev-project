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
    <title>Recognition of Paternity Registration Form</title>
</head>
<!--
         # UI enhancement
         CONSIDER A way to hide/disable the second parent until the user presses some button to make it appear.
        - [ ] (CLIENT-JS) Making sure that 'Are both parents are married?' is asked only if the all required fields for both parents are submitted.
    -->

<body>
    <?php if (!empty($_SESSION["user_id"])): ?>
    <!-- REMOVE Remove novalidate when done with debugging -->
    <form action="../includes/recognition/recgn-formhandler.php" method="post" novalidate>
        <h1>Recognition of Paternity Registration Form</h1>
        <h2>Child Information</h2>
        <ul>
            <li>
                <label for="child_first_name">First Name:</label>
                <input type="text" name="child_first_name" id="child_first_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="child_middle_name">Middle Name</label>
                <input type="text" name="child_middle_name" id="child_middle_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="child_last_name">Last Name:</label>
                <input type="text" name="child_last_name" id="child_last_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="child_dob">Date of Birth:</label>
                <input type="date" id="child_dob" name="child_dob" required>
            </li>
            <li>
                <label for="child_birthplace">Place of Birth:</label>
                <input type="text" id="child_birthplace" name="child_birthplace" required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
            </li>
            <li>
                <label for="child_sex">Sex:</label>
                <select id="child_sex" name="child_sex" required>
                    <option value="" selected>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
        </ul>
        <h2>Parents Information</h2>
        <h3>First parent</h3>
        <ul>
            <li>
                <label for="parent1_first_name">First Name:</label>
                <input type="text" name="parent1_first_name" id="parent1_first_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="parent1_middle_name">Middle Name</label>
                <input type="text" name="parent1_middle_name" id="parent1_middle_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="parent1_last_name">Last Name:</label>
                <input type="text" name="parent1_last_name" id="parent1_last_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="parent1_dob">Date of Birth:</label>
                <input type="date" id="parent1_dob" name="parent1_dob" required>
            </li>
            <li>
                <label for="parent1_sex">Sex:</label>
                <select id="parent1_sex" name="parent1_sex" required>
                    <option value="" selected>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="parent1_birthplace">Place of Birth:</label>
                <input type="text" id="parent1_birthplace" name="parent1_birthplace" required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
            </li>
            <li>
                <label for="parent1_citizenship">Country of citizenship:</label>
                <input type="text" name="parent1_citizenship" id="parent1_citizenship" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="parent1_occupation">Occupation:</label>
                <input type="text" id="parent1_occupation" name="parent1_occupation" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="parent1_residence">Primary residence:</label>
                <input type="text" id="parent1_residence" name="parent1_residence" required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
            </li>
            <li>
                <label for="parent1_phone">Phone Number:</label>
                <input type="tel" id="parent1_phone" name="parent1_phone" required pattern="<?=PHONE_REGEX;?>">
            </li>
        </ul>
        <h3>Second parent (Optional)</h3>
        <ul>
            <li>
                <label for="parent2_first_name">First Name:</label>
                <input type="text" name="parent2_first_name" id="parent2_first_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="parent2_middle_name">Middle Name</label>
                <input type="text" name="parent2_middle_name" id="parent2_middle_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                <label for="parent2_last_name">Last Name:</label>
                <input type="text" name="parent2_last_name" id="parent2_last_name" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="parent2_dob">Date of Birth:</label>
                <input type="date" id="parent2_dob" name="parent2_dob" required>
            </li>
            <li>
                <label for="parent2_sex">Sex:</label>
                <select id="parent2_sex" name="parent2_sex" required>
                    <option value="" selected>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="parent2_birthplace">Place of Birth:</label>
                <input type="text" id="parent2_birthplace" name="parent2_birthplace" required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
            </li>
            <li>
                <label for="parent2_citizenship">Country of citizenship:</label>
                <input type="text" name="parent2_citizenship" id="parent2_citizenship" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="parent2_occupation">Occupation:</label>
                <input type="text" id="parent2_occupation" name="parent2_occupation" required
                    maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            </li>
            <li>
                <label for="parent2_residence">Primary residence:</label>
                <input type="text" id="parent2_residence" name="parent2_residence" required
                    maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
            </li>
            <li>
                <label for="parent2_phone">Phone Number:</label>
                <input type="tel" id="parent2_phone" name="parent2_phone" required pattern="<?=PHONE_REGEX;?>">
            </li>
            <li>
                <label for="parents_married_at_birth">Was the Second parent married to First parent at the <em>time of
                        birth</em> of the child? (Yes/No):</label>
                <select id="parents_married_at_birth" name="parents_married_at_birth" required>
                    <option value="" selected>Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </li>
        </ul>
        <h2>Other</h2>
        <ul>
            <li>
                <label for="parents_rlnshp_at_rgstrn">Current marital status of parents to each other</label>
                <select id="parents_rlnshp_at_rgstrn" name="parents_rlnshp_at_rgstrn" required>
                    <option value="" selected>Select</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="separated">Legally separated</option>
                    <option value="divorced">Divorced</option>
                </select>
            </li>
        </ul>
        <button type="submit">Submit</button>
    </form>
    <?php else: ?>
    You must log in first.
    <?php endif;?>
</body>

</html>