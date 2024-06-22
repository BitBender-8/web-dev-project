<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"
    novalidate>
    <h2>Couple Information</h2>
    <fieldset>
        <legend>First spouse information</legend>
        <div class="input">
            <label for="spouse1_first_name">First name:</label>
            <input type="text" id="spouse1_first_name" name="spouse1_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse1_middle_name">Middle name:</label>
            <input type="text" id="spouse1_middle_name"
                name="spouse1_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse1_last_name">Last name:</label>
            <input type="text" id="spouse1_last_name" name="spouse1_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse1_sex">Sex</label>
            <select id="spouse1_sex" name="spouse1_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="spouse1_dob">Date of Birth:</label>
            <input type="date" name="spouse1_dob" id="spouse1_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="spouse1_place_of_birth">Place of Birth:</label>
            <input type="text" name="spouse1_place_of_birth"
                id="spouse1_place_of_birth" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="spouse1_citizenship">Country of citizenship:</label>
            <input type="text" name="spouse1_citizenship"
                id="spouse1_citizenship"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <!-- Legally separated is not an option because legally separated couple cannot get married. -->
            <label for="spouse1_previous_marital">Previous marital
                status:</label>
            <select id="spouse1_previous_marital"
                name="spouse1_previous_marital"
                required>
                <option value selected>Select</option>
                <option value="single">Single</option>
                <option value="divorced">Divorced</option>
                <option value="widowed">Widowed</option>
            </select>
        </div>
        <div class="input">
            <label for="spouse1_phone">Phone:</label>
            <input type="tel" id="spouse1_phone" name="spouse1_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="spouse1_residence">Principal Residence:</label>
            <input type="text" name="spouse1_residence" id="spouse1_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>Second spouse information</legend>
        <div class="input">
            <label for="spouse2">First name:</label>
            <input type="text" id="spouse2_first_name" name="spouse2_first_name"
                required maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse2_middle_name">Middle name:</label>
            <input type="text" id="spouse2_middle_name"
                name="spouse2_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse2_last_name">Last name:</label>
            <input type="text" id="spouse2_last_name" name="spouse2_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="spouse2_sex">Sex</label>
            <select id="spouse2_sex" name="spouse2_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="spouse2_dob">Date of Birth:</label>
            <input type="date" name="spouse2_dob" id="spouse2_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="spouse2_place_of_birth">Place of Birth:</label>
            <input type="text" name="spouse2_place_of_birth"
                id="spouse2_place_of_birth" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="spouse2_citizenship">Country of citizenship:</label>
            <input type="text" name="spouse2_citizenship"
                id="spouse2_citizenship"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <!-- Legally separated is not an option because legally separated couple cannot get married. -->
            <label for="spouse2_previous_marital">Previous marital
                status:</label>
            <select id="spouse2_previous_marital"
                name="spouse2_previous_marital"
                required>
                <option value selected>Select</option>
                <option value="single">Single</option>
                <option value="divorced">Divorced</option>
                <option value="widowed">Widowed</option>
            </select>
        </div>
        <div class="input">
            <label for="spouse2_phone">Phone:</label>
            <input type="tel" id="spouse2_phone" name="spouse2_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="spouse2_residence">Principal Residence:</label>
            <input type="text" name="spouse2_residence" id="spouse2_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <h2>Witnesses</h2>
    <fieldset>
        <legend>Witness 1</legend>
        <div class="input"><label for="witness1_first_name">First name:</label>
            <input type="text" id="witness1_first_name"
                name="witness1_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>"></div>
        <div class="input">
            <label for="witness1_middle_name">Middle name:</label>
            <input type="text" id="witness1_middle_name"
                name="witness1_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="witness1_last_name">Last name:</label>
            <input type="text" id="witness1_last_name" name="witness1_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="witness1_sex">Sex</label>
            <select id="witness1_sex" name="witness1_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="witness1_dob">Date of Birth:</label>
            <input type="date" name="witness1_dob" id="witness1_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="witness1_citizenship">Country of citizenship:</label>
            <input type="text" name="witness1_citizenship"
                id="witness1_citizenship"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="witness1_phone">Phone:</label>
            <input type="tel" id="witness1_phone" name="witness1_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="witness1_residence">Principal Residence:</label>
            <input type="text" name="witness1_residence" id="witness1_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>Witness 2</legend>
        <div class="input">
            <label for="witness2_first_name">First name:</label>
            <input type="text" id="witness2_first_name"
                name="witness2_first_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="witness2_middle_name">Middle name:</label>
            <input type="text" id="witness2_middle_name"
                name="witness2_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="witness2_last_name">Last name:</label>
            <input type="text" id="witness2_last_name" name="witness2_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="witness2_sex">Sex</label>
            <select id="witness2_sex" name="witness2_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="witness2_dob">Date of Birth:</label>
            <input type="date" name="witness2_dob" id="witness2_dob" max="<?= date('Y-m-d'); ?>" required>
        </div>
        <div class="input">
            <label for="witness2_citizenship">Country of citizenship:</label>
            <input type="text" name="witness2_citizenship"
                id="witness2_citizenship"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="witness2_phone">Phone:</label>
            <input type="tel" id="witness2_phone" name="witness2_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="witness2_residence">Principal Residence:</label>
            <input type="text" name="witness2_residence" id="witness2_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <h2>Marriage Details</h2>
    <fieldset>
        <legend>Marriage Information</legend>
        <div class="input">
            <label for="marriage_date">Date of Marriage:</label>
            <input type="date" name="marriage_date" id="marriage_date" max="<?= date('Y-m-d'); ?>" required>

        </div>
        <div class="input">
            <label for="marriage_place">Place of Marriage:</label>
            <input type="text" name="marriage_place" id="marriage_place"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <button class="btn" type="submit">Submit Registration</button>
</form>