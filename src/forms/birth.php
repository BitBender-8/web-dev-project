<?php
include_once "../includes/declarations.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Birth Registration Form</title>
</head>

<body>
    <a href="index.php">Home</a>
    <h1>Birth Registration Form</h1>
    <form action="../includes/birth/birth-formhandler.php" method="post">
        <h2>Child's Information</h2>
        <label for="child_first_name">First Name:</label>
        <input type="text" name="child_first_name" id="child_first_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
        <label for="child_middle_name">Middle Name</label>
        <input type="text" name="child_middle_name" id="child_middle_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
        <label for="child_last_name">Last Name:</label>
        <input type="text" name="child_last_name" id="child_last_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
        <label for="child_sex">Sex</label>
        <select id="child_sex" name="child_sex" required>
            <option value="" selected>Select</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <fieldset>
            <legend>Birth information</legend>
            <label for="child_dob">Date of Birth:</label>
            <input type="date" name="child_dob" id="child_dob" required>
            <label for="child_place_of_birth">Place of Birth:</label>
            <input type="text" name="child_place_of_birth" id="child_place_of_birth" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            <br>
            <label for="child_birth_plurality">Birth plurality (1 for single, 2 for twins, etc.):</label>
            <input type="number" name="child_birth_plurality" id="child_birth_plurality" required>
            <label for="child_weight_at_birth">Weight at Birth (grams):</label>
            <input type="number" name="child_weight_at_birth" id="child_weight_at_birth" required>
            <label for="child_aid_rendered">Aid Rendered During Birth (Optional):</label>
            <textarea name="child_aid_rendered" id="child_aid_rendered" rows="1" maxlength="<?php echo TEXTAREA_MAXLENGTH_SMALL; ?>"></textarea>
        </fieldset>
        <h2>Parents' Information</h2>
        <fieldset>
            <legend>Mother's Information</legend>
            <label for="mother_first_name">First Name:</label>
            <input type="text" name="mother_first_name" id="mother_first_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            <label for="mother_middle_name">Middle Name:</label>
            <input type="text" name="mother_middle_name" id="mother_middle_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            <label for="mother_last_name">Last Name:</label>
            <input type="text" name="mother_last_name" id="mother_last_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            <label for="mother_dob">Date of Birth:</label>
            <input type="date" name="mother_dob" id="mother_dob" required>
            <label for="mother_place_of_birth">Place of Birth:</label>
            <input type="text" name="mother_place_of_birth" id="mother_place_of_birth" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            <label for="mother_residence">Principal Residence:</label>
            <input type="text" name="mother_residence" id="mother_residence" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            <label for="mother_phone">Phone number:</label>
            <input type="tel" name="mother_phone" id="mother_phone" required pattern="<?php echo PHONE_REGEX; ?>">
            <label for="mother_marital_status">Marital Status:</label>
            <select name="mother_marital_status" id="mother_marital_status" required>
                <option value="" selected>Select</option>
                <option value="married">Married</option>
                <option value="single">Single</option>
                <option value="widowed">Widowed</option>
                <option value="divorced">Divorced</option>
            </select>
            <label for="mother_citizenship">Country of citizenship:</label>
            <input type="text" name="mother_citizenship" id="mother_citizenship" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            <br>
        </fieldset>
        <fieldset>
            <legend>Father's Information</legend>
            <label for="father_first_name">First Name:</label>
            <input type="text" name="father_first_name" id="father_first_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            <label for="father_middle_name">Middle Name:</label>
            <input type="text" name="father_middle_name" id="father_middle_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            <label for="father_last_name">Last Name:</label>
            <input type="text" name="father_last_name" id="father_last_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            <label for="father_dob">Date of Birth:</label>
            <input type="date" name="father_dob" id="father_dob" required>
            <label for="father_place_of_birth">Place of Birth:</label>
            <input type="text" name="father_place_of_birth" id="father_place_of_birth" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            <label for="father_residence">Principal Residence:</label>
            <input type="text" name="father_residence" id="father_residence" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            <label for="father_phone">Phone number:</label>
            <input type="tel" name="father_phone" id="father_phone" required pattern="<?php echo PHONE_REGEX; ?>">
            <label for="father_marital_status">Marital Status:</label>
            <select name="father_marital_status" id="father_marital_status" required>
                <option value="" selected>Select</option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
            </select>
            <label for="father_citizenship">Country of citizenship:</label>
            <input type="text" name="father_citizenship" id="father_citizenship" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            <br>
        </fieldset>
        <h2>Declarant Information (if applicable)</h2>

        <!-- TODO (JS & PHP) Add form validation to either require all fields in this section or none of them at all. -->
        <p>
            **Complete this section only if you are registering the birth and are not a parent of the child.**
        </p>
        <label for="declarant_first_name">First Name:</label>
        <input type="text" name="declarant_first_name" id="declarant_first_name" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
        <label for="declarant_middle_name">Middle Name:</label>
        <input type="text" name="declarant_middle_name" id="declarant_middle_name" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
        <label for="declarant_last_name">Last Name:</label>
        <input type="text" name="declarant_last_name" id="declarant_last_name" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
        <label for="declarant_relation_to_child">Relationship to Child (Enter none if you have no relationship to the child)</label>
        <input type="text" name="declarant_relation_to_child" id="declarant_relation_to_child" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>" placeholder="None">
        <label for="declarant_sex">Sex</label>
        <select id="declarant_sex" name="declarant_sex">
            <option value="" selected>Select</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <label for="declarant_dob">Date of Birth:</label>
        <input type="date" name="declarant_dob" id="declarant_dob">
        <label for="declarant_place_of_birth">Place of Birth:</label>
        <input type="text" name="declarant_place_of_birth" id="declarant_place_of_birth" maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
        <label for="declarant_residence">Principal Residence:</label>
        <input type="text" name="declarant_residence" id="declarant_residence" maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
        <label for="declarant_phone">Phone number:</label>
        <input type="tel" name="declarant_phone" id="declarant_phone" pattern="<?php echo PHONE_REGEX; ?>">

        <button type="submit">Submit Registration</button>
    </form>
</body>

</html>
