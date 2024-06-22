<!-- REMOVE Novalidate-->
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" novalidate>
    <h2>Child's Information</h2>
    <fieldset>
        <legend>Child's Information</legend>
        <div class="input">
            <label for="child_first_name">First Name:</label>
            <input type="text" name="child_first_name" id="child_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="child_middle_name">Middle Name</label>
            <input type="text" name="child_middle_name"
                id="child_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input"><label for="child_last_name">Last Name:</label>
            <input type="text" name="child_last_name" id="child_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="child_sex">Sex</label>
            <select id="child_sex" name="child_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="child_dob">Date of Birth:</label>
            <input type="date" name="child_dob" id="child_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="child_place_of_birth">Place of Birth:</label>
            <input type="text" name="child_place_of_birth"
                id="child_place_of_birth"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="child_birth_plurality">Birth plurality (1 for
                single, 2
                for
                twins, etc.):</label>
            <input type="number" name="child_birth_plurality"
                id="child_birth_plurality" required>
        </div>
        <div class="input">
            <label for="child_weight_at_birth">Weight at Birth
                (grams):</label>
            <input type="number" name="child_weight_at_birth"
                id="child_weight_at_birth" required>
        </div>
        <div class="input">
            <label for="child_aid_rendered">Aid Rendered During Birth
                (Optional):</label>
            <textarea name="child_aid_rendered" id="child_aid_rendered"
                rows="1"
                maxlength="<?=TEXTAREA_MAXLENGTH_SMALL;?>"></textarea>
        </div>
    </fieldset>
    <h2>Parents' Information</h2>
    <fieldset>
        <legend>Mother's Information</legend>
        <div class="input">
            <label for="mother_first_name">First Name:</label>
            <input type="text" name="mother_first_name"
                id="mother_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="mother_middle_name">Middle Name:</label>
            <input type="text" name="mother_middle_name"
                id="mother_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="mother_last_name">Last Name:</label>
            <input type="text" name="mother_last_name" id="mother_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="mother_dob">Date of Birth:</label>
            <input type="date" name="mother_dob" id="mother_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="mother_place_of_birth">Place of Birth:</label>
            <input type="text" name="mother_place_of_birth"
                id="mother_place_of_birth" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="mother_residence">Principal Residence:</label>
            <input type="text" name="mother_residence" id="mother_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="mother_phone">Phone number:</label>
            <input type="tel" name="mother_phone" id="mother_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="mother_marital_status">Marital Status:</label>
            <select name="mother_marital_status" id="mother_marital_status"
                required>
                <option value selected>Select</option>
                <option value="married">Married</option>
                <option value="single">Single</option>
                <option value="widowed">Widowed</option>
                <option value="divorced">Divorced</option>
            </select>
        </div>
        <div class="input">
            <label for="mother_citizenship">Country of citizenship:</label>
            <input type="text" name="mother_citizenship"
                id="mother_citizenship"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>Father's Information</legend>
        <div class="input">
            <label for="father_first_name">First Name:</label>
            <input type="text" name="father_first_name"
                id="father_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="father_middle_name">Middle Name:</label>
            <input type="text" name="father_middle_name"
                id="father_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="father_last_name">Last Name:</label>
            <input type="text" name="father_last_name" id="father_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="father_dob">Date of Birth:</label>
            <input type="date" name="father_dob" id="father_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="father_place_of_birth">Place of Birth:</label>
            <input type="text" name="father_place_of_birth"
                id="father_place_of_birth" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="father_residence">Principal Residence:</label>
            <input type="text" name="father_residence" id="father_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="father_phone">Phone number:</label>
            <input type="tel" name="father_phone" id="father_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="father_marital_status">Marital Status:</label>
            <select name="father_marital_status" id="father_marital_status"
                required>
                <option value selected>Select</option>
                <option value="married">Married</option>
                <option value="single">Single</option>
                <option value="widowed">Widowed</option>
                <option value="divorced">Divorced</option>
            </select>
        </div>
        <div class="input">
            <label for="father_citizenship">Country of citizenship:</label>
            <input type="text" name="father_citizenship"
                id="father_citizenship"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
    </fieldset>
    <h2>Declarant Information (if applicable)</h2>
    <fieldset>
        <legend>Declarant Information</legend>
        <p class="notice">
            Complete this section only if you are registering the birth and are
            not a parent of the child.
        </p>
        <div class="input">
            <label for="declarant_first_name">First Name:</label>
            <input type="text" name="declarant_first_name"
                id="declarant_first_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="declarant_middle_name">Middle Name:</label>
            <input type="text" name="declarant_middle_name"
                id="declarant_middle_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="declarant_last_name">Last Name:</label>
            <input type="text" name="declarant_last_name"
                id="declarant_last_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="declarant_relation_to_child">Relationship to Child
                (Enter
                none
                if you have no relationship to the
                child)</label>
            <input type="text" name="declarant_relation_to_child"
                id="declarant_relation_to_child"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>" placeholder="None">
        </div>
        <div class="input">
            <label for="declarant_sex">Sex</label>
            <select id="declarant_sex" name="declarant_sex">
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="declarant_dob">Date of Birth:</label>
            <input type="date" name="declarant_dob" id="declarant_dob" max="<?= date('Y-m-d'); ?>">
        </div>
        <div class="input">
            <label for="declarant_place_of_birth">Place of Birth:</label>
            <input type="text" name="declarant_place_of_birth"
                id="declarant_place_of_birth"
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="declarant_residence">Principal Residence:</label>
            <input type="text" name="declarant_residence"
                id="declarant_residence"
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="declarant_phone">Phone number:</label>
            <input type="tel" name="declarant_phone" id="declarant_phone"
                pattern="<?=PHONE_REGEX;?>">
        </div>
    </fieldset>
    <button class="btn" type="submit">Submit Registration</button>
</form>