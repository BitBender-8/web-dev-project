<?php
include_once "../includes/declarations.php";
?>
<!DOCTYPE html>
<html lang="en">
<!--.  
    TODO Add js that enables disabled fields in category of adopters when adopter 2's information is filled.
    CONSIDER Getting your form labels and your allowed options for multiple-choice fields from '../includes/adoption/adoption-declarations.php'; 
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Adoption Registration Form</title>
</head>

<body>
    <a href="index.php">Home</a>
    <h1>Adoption Registration Form</h1>
    <!-- REMOVE Add 'novalidate' to form to temporarily turn off clientside html validation -->
    <form action="../includes/adoption/adoption-formhandler.php" method="post" novalidate>
        <h2>Adopter Information</h2>
        <hr>
        <h3>Adopter 1</h3>
        <ul>
            <li>
                <label for="adopter1_firstname">First name:</label>
                <input type="text" id="adopter1_firstname" name="adopter1_firstname" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter1_middlename">Middle name:</label>
                <input type="text" id="adopter1_middlename" name="adopter1_middlename" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter1_lastname">Last name:</label>
                <input type="text" id="adopter1_lastname" name="adopter1_lastname" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter1_dob">Date of Birth:</label>
                <input type="date" id="adopter1_dob" name="adopter1_dob" required>
            </li>
            <li>
                <label for="adopter1_sex">Sex</label>
                <select id="adopter1_sex" name="adopter1_sex" required>
                    <option value="" selected>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="adopter1_birthplace">Place of Birth:</label>
                <input type="text" id="adopter1_birthplace" name="adopter1_birthplace" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            </li>
            <li>
                <label for="adopter1_citizenship">Country of citizenship:</label>
                <input type="text" id="adopter1_citizenship" name="adopter1_citizenship" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter1_phone">Phone:</label>
                <input type="tel" id="adopter1_phone" name="adopter1_phone" required pattern="<?php echo PHONE_REGEX; ?>">
            </li>
            <li>
                <label for="adopter1_residence">Primary residence:</label>
                <input type="text" id="adopter1_residence" name="adopter1_residence" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            </li>
            <li>
                <label for="adopter1_occupation">Occupation:</label>
                <input type="text" id="adopter1_occupation" name="adopter1_occupation" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter1_relationship_child">Relationship to Child (if any):</label>
                <input type="text" id="adopter1_relationship_child" name="adopter1_relationship_child" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter1_relationship_adopter2">Relationship to adopter 2 (if applicable):</label>
                <input type="text" id="adopter1_relationship_adopter2" name="adopter1_relationship_adopter2" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter1_relationship_chld_parent">Relationship to Child's Parent (if any):</label>
                <input type="text" id="adopter1_relationship_chld_parent" name="adopter1_relationship_chlds_parent" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
        </ul>
        <h3>Adopter 2 (Optional)</h3>
        <ul>
            <li>
                <label for="adopter_name">First name:</label>
                <input type="text" id="adopter2_firstname" name="adopter2_firstname" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter2_middlename">Middle name:</label>
                <input type="text" id="adopter2_middlename" name="adopter2_middlename" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter2_lastname">Last name:</label>
                <input type="text" id="adopter2_lastname" name="adopter2_lastname" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter2_dob">Date of Birth:</label>
                <input type="date" id="adopter2_dob" name="adopter2_dob" required>
            </li>
            <li>
                <label for="adopter2_sex">Sex</label>
                <select id="adopter2_sex" name="adopter2_sex" required>
                    <option value="" selected>Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <label for="adopter2_birthplace">Place of Birth:</label>
                <input type="text" id="adopter2_birthplace" name="adopter2_birthplace" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter2_citizenship">Country of citizenship:</label>
                <input type="text" id="adopter2_citizenship" name="adopter2_citizenship" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter2_phone">Phone:</label>
                <input type="tel" id="adopter2_phone" name="adopter2_phone" required pattern="<?php echo PHONE_REGEX; ?>">
            </li>
            <li>
                <label for="adopter2_residence">Primary residence:</label>
                <input type="text" id="adopter2_residence" name="adopter2_residence" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            </li>
            <li>
                <label for="adopter2_occupation">Occupation:</label>
                <input type="text" id="adopter2_occupation" name="adopter2_occupation" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter2_relationship_child">Relationship to Child (if any):</label>
                <input type="text" id="adopter2_relationship_child" name="adopter2_relationship_child" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter2_relationship_adopter2">Relationship to adopter 1 (if applicable):</label>
                <input type="text" id="adopter2_relationship_adopter2" name="adopter2_relationship_adopter1" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="adopter2_relationship_chld_parent">Relationship to Child's Parent (if any):</label>
                <input type="text" id="adopter2_relationship_parent" name="adopter2_relationship_chlds_parent" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
        </ul>
        <h2>Category of Adopters</h2>
        <ul>
            <!-- An empty radio button that ensures that a default value is submitted to the server. -->
            <input type="radio" id="adopter_category_default" name="adopter_category" value="" style="display: none;" required checked>
            <li>
                <input type="radio" id="adopter_category_stepparent" name="adopter_category" value="stepparent" required>
                <label for="adopter_category_stepparent">Stepparent</label>
            </li>
            <li>
                <input type="radio" id="adopter_category_sole" name="adopter_category" value="sole" required>
                <label for="adopter_category_sole">Sole adopter (adopter 1)</label>
            </li>
            <li>
                <input type="radio" id="adopter_category_couple" name="adopter_category" value="couple" disabled required>
                <label for="adopter_category_couple">Married Couple (requires both adopters)</label>
            </li>
            <li>
                <input type="radio" id="adopter_category_cohabitants" name="adopter_category" value="cohabitants" disabled required>
                <label for="adopter_category_cohabitants">Cohabitants (requires both adopters)</label>
            </li>
        </ul>
        <h2>Child Information</h2>
        <ul>
            <li>
                <p>Full Name of Child (if known):</p>
                <label for="child_first_name">First name:</label>
                <input type="text" id="child_first_name" name="child_first_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
                <label for="child_middle_name">Middle name:</label>
                <input type="text" id="child_middle_name" name="child_middle_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
                <label for="child_last_name">Last name:</label>
                <input type="text" id="child_last_name" name="child_last_name" required maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
            </li>
            <li>
                <label for="child_dob">Date of Birth:</label>
                <input type="date" id="child_dob" name="child_dob" required>
            </li>
            <li>
                <label for="child_birthplace">Place of Birth:</label>
                <input type="text" id="child_birthplace" name="child_birthplace" required maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
            </li>
            <li>
                <label for="child_sex">Sex:</label>
                <select id="child_sex" name="child_sex" required>
                    <option value="">Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </li>
            <li>
                <p>Was the child placed in your care? If so, please provide details: (Optional)</p>
                <ul>
                    <li>
                        <label for="received_child_from">Fullname of person or name of organization from whom you
                            received the child:</label>
                        <input type="text" id="received_child_from" name="received_child_from" maxlength="<?php echo INPUT_MAXLENGTH_DEFAULT; ?>">
                    </li>
                    <li>
                        <label for="child_placer_address">Placement address:</label>
                        <input type="text" id="child_placer_address" name="child_placer_address" maxlength="<?php echo INPUT_MAXLENGTH_LONG; ?>">
                    </li>
                    <li>
                        <label for="child_placer_phone">Phone:</label>
                        <input type="tel" id="child_placer_phone" name="child_placer_phone" required pattern="<?php echo PHONE_REGEX; ?>">
                    </li>
                </ul>
            </li>
        </ul>
        <h2>Adoption information</h2>
        <ul>
            <li>
                <label for="adoption_date">Date of Adoption:</label>
                <input type="date" id="adoption_date" name="adoption_date" required>
            </li>
        </ul>
        <fieldset>
            <legend>Adoption type</legend>
            <!-- An empty radio button that ensures that a default value is submitted to the server. -->
            <input type="radio" id="adoption_type_default" name="adoption_type" value="" style="display: none;" required checked>
            <input type="radio" id="adoption_type_domestic" name="adoption_type" value="domestic" required>
            <label for="adoption_type_domestic">Domestic Adoption:</label>
            <br>
            <input type="radio" id="adoption_type_intercountry" name="adoption_type" value="intercountry" required>
            <label for="adoption_type_intercountry">Intercountry Adoption:</label>
        </fieldset>
        <button type="submit">Submit</button>
    </form>
</body>

</html>