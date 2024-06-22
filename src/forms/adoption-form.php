<!-- 
    // REMOVE Add 'novalidate' to form to temporarily turn off clientside html validation 
    // CONSIDER Adding value attribute so that entered data is remembered between sessions.
-->
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" novalidate>
    <h2>Adopter Information</h2>
    <fieldset>
        <legend>Adopter 1</legend>
        <div class="input">
            <label for="adopter1_first_name">First name</label>
            <input type="text" id="adopter1_first_name"
                name="adopter1_first_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"
                value="<?=$POST_['adopter1_first_name'] ?? ''?>">
        </li>
        <div class="input">
            <label for="adopter1_middle_name">Middle name:</label>
            <input type="text" id="adopter1_middle_name"
                name="adopter1_middle_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter1_last_name">Last name:</label>
            <input type="text" id="adopter1_last_name" name="adopter1_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter1_dob">Date of Birth:</label>
            <input type="date" id="adopter1_dob" name="adopter1_dob" max="<?= date('Y-m-d'); ?>" required>
        </li>
        <div class="input">
            <label for="adopter1_sex">Sex</label>
            <select id="adopter1_sex" name="adopter1_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </li>
        <div class="input">
            <label for="adopter1_birthplace">Place of Birth:</label>
            <input type="text" id="adopter1_birthplace"
                name="adopter1_birthplace" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </li>
        <div class="input">
            <label for="adopter1_citizenship">Country of citizenship:</label>
            <input type="text" id="adopter1_citizenship"
                name="adopter1_citizenship" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter1_phone">Phone:</label>
            <input type="tel" id="adopter1_phone" name="adopter1_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </li>
        <div class="input">
            <label for="adopter1_residence">Primary residence:</label>
            <input type="text" id="adopter1_residence" name="adopter1_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </li>
        <div class="input">
            <label for="adopter1_occupation">Occupation:</label>
            <input type="text" id="adopter1_occupation"
                name="adopter1_occupation" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter1_relationship_child">Relationship to Child (if
                any):</label>
            <input type="text" id="adopter1_relationship_child"
                name="adopter1_relationship_child"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter1_relationship_adopter2">Relationship to adopter
                2 (if applicable):</label>
            <input type="text" id="adopter1_relationship_adopter2"
                name="adopter1_relationship_adopter2"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter1_relationship_chld_parent">Relationship to
                Child's Parent (if any):</label>
            <input type="text" id="adopter1_relationship_chld_parent"
                name="adopter1_relationship_chlds_parent"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
    </fieldset>
    <fieldset>
        <legend>Adopter 2 (Optional)</legend>
        <div class="input">
            <label for="adopter_name">First name:</label>
            <input type="text" id="adopter2_first_name"
                name="adopter2_first_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter2_middle_name">Middle name:</label>
            <input type="text" id="adopter2_middle_name"
                name="adopter2_middle_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter2_last_name">Last name:</label>
            <input type="text" id="adopter2_last_name" name="adopter2_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter2_dob">Date of Birth:</label>
            <input type="date" id="adopter2_dob" name="adopter2_dob" max="<?= date('Y-m-d'); ?>" required>
        </li>
        <div class="input">
            <label for="adopter2_sex">Sex</label>
            <select id="adopter2_sex" name="adopter2_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </li>
        <div class="input">
            <label for="adopter2_birthplace">Place of Birth:</label>
            <input type="text" id="adopter2_birthplace"
                name="adopter2_birthplace" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter2_citizenship">Country of citizenship:</label>
            <input type="text" id="adopter2_citizenship"
                name="adopter2_citizenship" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter2_phone">Phone:</label>
            <input type="tel" id="adopter2_phone" name="adopter2_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </li>
        <div class="input">
            <label for="adopter2_residence">Primary residence:</label>
            <input type="text" id="adopter2_residence" name="adopter2_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </li>
        <div class="input">
            <label for="adopter2_occupation">Occupation:</label>
            <input type="text" id="adopter2_occupation"
                name="adopter2_occupation" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter2_relationship_child">Relationship to Child (if
                any):</label>
            <input type="text" id="adopter2_relationship_child"
                name="adopter2_relationship_child"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter2_relationship_adopter2">Relationship to adopter
                1 (if applicable):</label>
            <input type="text" id="adopter2_relationship_adopter2"
                name="adopter2_relationship_adopter1"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="adopter2_relationship_chld_parent">Relationship to
                Child's Parent (if any):</label>
            <input type="text" id="adopter2_relationship_parent"
                name="adopter2_relationship_chlds_parent"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
    </fieldset>
    <h2>Category of Adopters</h2>
    <fieldset>
        <legend>Adopter category</legend>
        <!-- An empty radio button that ensures that a default value is submitted to the server. -->
        <input type="radio" id="adopter_category_default"
            name="adopter_category" value style="display: none;"
            required checked>
        <div class="input">
            <input type="radio" id="adopter_category_stepparent"
                name="adopter_category" value="stepparent"
                required>
            <label class="inline-label" for="adopter_category_stepparent">Stepparent</label>
        </li>
        <div class="input">
            <input type="radio" id="adopter_category_sole" name="adopter_category" value="sole" required>
            <label class="inline-label" for="adopter_category_sole">Sole adopter (adopter 1)</label>
        </li>
        <!-- TODO (CLIENT-JS) Disabing these two fields and enabling them via js when adopter 2 info is entered -->
        <div class="input">
            <input type="radio" id="adopter_category_couple"
                name="adopter_category" value="couple"
                required>
            <label class="inline-label" for="adopter_category_couple">Married Couple (requires both
                adopters)</label>
        </li>
        <div class="input">
            <input type="radio" id="adopter_category_cohabitants"
                name="adopter_category" value="cohabitants"
                required>
            <label class="inline-label" for="adopter_category_cohabitants">Cohabitants (requires both
                adopters)</label>
        </li>
    </fieldset>
    <h2>Child Information</h2>
    <fieldset>
        <div class="input">
            <p>Full Name of Child (if known):</p>
            <label for="child_first_name">First name:</label>
            <input type="text" id="child_first_name" name="child_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="child_middle_name">Middle name:</label>
            <input type="text" id="child_middle_name" name="child_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="child_last_name">Last name:</label>
            <input type="text" id="child_last_name" name="child_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </li>
        <div class="input">
            <label for="child_dob">Date of Birth:</label>
            <input type="date" id="child_dob" name="child_dob" max="<?= date('Y-m-d'); ?>" required>
        </li>
        <div class="input">
            <label for="child_birthplace">Place of Birth:</label>
            <input type="text" id="child_birthplace" name="child_birthplace"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </li>
        <div class="input">
            <label for="child_sex">Sex:</label>
            <select id="child_sex" name="child_sex" required>
                <option value>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </li>
        <div>
            <p>Was the child placed in your care? If so, please provide details:
                (Optional)</p>
                <div class="input">
                    <label for="received_child_from">Fullname of person or name
                        of organization from whom you
                        received the child:</label>
                    <input type="text" id="received_child_from"
                        name="received_child_from"
                        maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
                </li>
                <div class="input">
                    <label for="child_placer_address">Placement address:</label>
                    <input type="text" id="child_placer_address"
                        name="child_placer_address"
                        maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
                </li>
                <div class="input">
                    <label for="child_placer_phone">Phone:</label>
                    <input type="tel" id="child_placer_phone"
                        name="child_placer_phone" required
                        pattern="<?=PHONE_REGEX;?>">
                </li>
        </li>
    </fieldset>
    <h2>Adoption information</h2>
    <fieldset>
        <div class="input">
            <label for="adoption_date">Date of Adoption:</label>
            <input type="date" id="adoption_date" name="adoption_date" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <fieldset class="radio-fieldset" style="margin-top: 16px;">
            <legend>Adoption type</legend>
            <!-- An empty radio button that ensures that a default value is submitted to the server. -->
            <input type="radio" id="adoption_type_default" name="adoption_type"
                value style="display: none;" required
                checked>
            <div class="input">
            <input type="radio" id="adoption_type_domestic" name="adoption_type"
                value="domestic" required>
            <label class="inline-label" for="adoption_type_domestic">Domestic Adoption:</label>
            </div>
            <div>
            <input type="radio" id="adoption_type_intercountry" name="adoption_type"
                value="intercountry" required>
            <label class="inline-label" for="adoption_type_intercountry">Intercountry Adoption:</label>
            </div>
        </fieldset>
    </fieldset>
    <button class="btn" type="submit">Submit Registration</button>
</form>