 <!-- REMOVE novalidate  -->
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"
    enctype="multipart/form-data" novalidate>
    <input type="hidden" name="MAX_FILE_SIZE"
        value="<?=MAX_UPLOAD_FILE_SIZE;?>">
    <h2>Spouse Information</h2>
    <fieldset>
        <legend>First spouse</legend>
        <div class="input">
            <label for="spouse1_first_name">First name:</label>
            <input type="text" id="spouse1_first_name" name="spouse1_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse1_middle_name">Middle name:</label>
            <input type="text" id="spouse1_middle_name"
                name="spouse1_middle_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse1_last_name">Last name:</label>
            <input type="text" id="spouse1_last_name" name="spouse1_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse1_dob">Date of Birth:</label>
            <input type="date" id="spouse1_dob" name="spouse1_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="spouse1_sex">Sex:</label>
            <select id="spouse1_sex" name="spouse1_sex" required>
                <option value>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="spouse1_place_of_birth">Place of Birth:</label>
            <input type="text" id="spouse1_place_of_birth"
                name="spouse1_place_of_birth" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="spouse1_residence">Principal Residence:</label>
            <input type="text" id="spouse1_residence" name="spouse1_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="spouse1_phone">Phone:</label>
            <input type="tel" id="spouse1_phone" name="spouse1_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="spouse1_citizenship">Country of citizenship:</label>
            <input type="text" id="spouse1_citizenship"
                name="spouse1_citizenship" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>Second spouse</legend>
        <div class="input">
            <label for="spouse2_first_name">First name:</label>
            <input type="text" id="spouse2_first_name" name="spouse2_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse2_middle_name">Middle name:</label>
            <input type="text" id="spouse2_middle_name"
                name="spouse2_middle_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input"><label for="spouse2_last_name">Last name:</label>
            <input type="text" id="spouse2_last_name" name="spouse2_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse2_dob">Date of Birth:</label>
            <input type="date" id="spouse2_dob" name="spouse2_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="spouse2_sex">Sex:</label>
            <select id="spouse2_sex" name="spouse2_sex" required>
                <option value>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="spouse2_place_of_birth">Place of Birth:</label>
            <input type="text" id="spouse2_place_of_birth"
                name="spouse2_place_of_birth" required maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="spouse2_residence">Principal Residence:</label>
            <input type="text" id="spouse2_residence" name="spouse2_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="spouse2_phone">Phone:</label>
            <input type="tel" id="spouse2_phone" name="spouse2_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="spouse2_citizenship">Country of citizenship:</label>
            <input type="text" id="spouse2_citizenship"
                name="spouse2_citizenship" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
    </fieldset>
    <h2>Marriage and Divorce Information</h2>
    <fieldset>
        <legend>Marraige Information</legend>
        <div class="input">
            <label for="marriage_date">Date of Conclusion of Marriage:</label>
            <input type="date" id="marriage_date" name="marriage_date" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="marriage_place">Place of Conclusion of Marriage:</label>
            <input type="text" id="marriage_place" name="marriage_place"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>Divorce Information</legend>
        <div class="input">
            <label for="divorce_date">Date of Divorce:</label>
            <input type="date" id="divorce_date" name="divorce_date" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="divorce_reference">
                Reference to Court Decision:
            </label>
            <input type="file" id="divorce_reference" name="divorce_reference"
                accept="<?=rtrim(implode(',', ALLOWED_UPLOAD_FILE_TYPES), ',')?>"
                required>
        </div>
        <div class="input">
            <label for="divorce_reason">Reason for divorce (Optional):</label>
            <textarea id="divorce_reason" name="divorce_reason" rows="2"
                maxlength="<?=TEXTAREA_MAXLENGTH_SMALL;?>"></textarea>
        </div>
    </fieldset>
    <button class="btn" type="submit">Submit Registration</button>
</form>