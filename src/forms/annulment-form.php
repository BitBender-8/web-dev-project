<!-- REMOVE Add 'novalidate' to form to temporarily turn off clientside html validation -->
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data"
    novalidate>
    <h2>Annuler Information</h2>
    <input type="hidden" name="MAX_FILE_SIZE"
        value="<?=MAX_UPLOAD_FILE_SIZE;?>" />

    <fieldset>
        <legend>Petitioner (First Spouse)</legend>
        <div class="input">
            <label for="petitioner_first_name">First name:</label>
            <input type="text" id="petitioner_first_name"
                name="petitioner_first_name" required maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="petitioner_middle_name">Middle name:</label>
            <input type="text" id="petitioner_middle_name"
                name="petitioner_middle_name" required maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="petitioner_last_name">Last name:</label>
            <input type="text" id="petitioner_last_name"
                name="petitioner_last_name" required maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="petitioner_dob">Date of Birth:</label>
            <input type="date" id="petitioner_dob" name="petitioner_dob"
                required>
        </div>
        <div class="input">
            <label for="petitioner_sex">Sex:</label>
            <select id="petitioner_sex" name="petitioner_sex">
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="petitioner_residence">Primary residence:</label>
            <input type="text" id="petitioner_residence"
                name="petitioner_residence" required maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="petitioner_citizenship">Country of citizenship:</label>
            <input type="text" id="petitioner_citizenship"
                name="petitioner_citizenship" required maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="petitioner_phone">Phone Number:</label>
            <input type="tel" id="petitioner_phone" name="petitioner_phone"
                required pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="petitioner_birthplace">Place of Birth:</label>
            <input type="text" id="petitioner_birthplace"
                name="petitioner_birthplace" required maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>Respondent (Second Spouse)</legend>
        <div class="input">
            <label for="respondent_first_name">First name:</label>
            <input type="text" id="respondent_first_name"
                name="respondent_first_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="respondent_middle_name">Middle name:</label>
            <input type="text" id="respondent_middle_name"
                name="respondent_middle_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="respondent_last_name">Last name:</label>
            <input type="text" id="respondent_last_name"
                name="respondent_last_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="respondent_dob">Date of Birth:</label>
            <input type="date" id="respondent_dob" name="respondent_dob"
                required>
        </div>
        <div class="input">
            <label for="respondent_sex">Sex:</label>
            <select id="respondent_sex" name="respondent_sex">
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="respondent_residence">Respondent residence:</label>
            <input type="text" id="respondent_residence"
                name="respondent_residence" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="respondent_citizenship">Country of citizenship:</label>
            <input type="text" id="respondent_citizenship"
                name="respondent_citizenship" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="respondent_phone">Phone Number:</label>
            <input type="tel" id="respondent_phone" name="respondent_phone"
                required pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="respondent_birthplace">Place of Birth:</label>
            <input type="text" id="respondent_birthplace"
                name="respondent_birthplace" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <h2>Marriage Information</h2>
    <fieldset>
        <div class="input">
            <label for="marriage_date">Date of Marriage:</label>
            <input type="date" id="marriage_date" name="marriage_date" required>
        </div>
        <div class="input">
            <label for="marriage_place">Place of Marriage:</label>
            <input type="text" id="marriage_place" name="marriage_place"
                required maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <h2>Annulment Information</h2>
    <fieldset>
        <div class="input">
            <label for="annulment_reasons">Reasons for Annulment
                (Optional):</label>
            <textarea id="annulment_reasons" name="annulment_reasons" rows="5"
                maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>"></textarea>
        </div>
        <div class="input">
            <label for="annulment_reference">Upload judicial reference
                file</label>
            <input type="file" id="annulment_reference"
                name="annulment_reference"
                accept="<?=rtrim(implode(',', ALLOWED_UPLOAD_FILE_TYPES), ',')?>"
                required>
        </div>
        <div class="input">
            <label for="annulment_date">Date of Annulment:</label>
            <input type="date" id="annulment_date" name="annulment_date"
                required>
        </div>
    </fieldset>
    <button class="btn" type="submit">Submit Registration</button>
</form>