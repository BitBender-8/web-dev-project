<!-- REMOVE Remove novalidate when done with debugging -->
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"
    enctype='multipart/form-data' novalidate>
    <input type="hidden" name="MAX_FILE_SIZE"
        value="<?=MAX_UPLOAD_FILE_SIZE;?>" />
    <h2>Deceased Information</h2>
    <fieldset>
        <legend>Deceased Information</legend>
        <div class="input">
            <label for="deceased_first_name">First name:</label>
            <input type="text" id="deceased_first_name"
                name="deceased_first_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="deceased_middle_name">Middle name:</label>
            <input type="text" id="deceased_middle_name"
                name="deceased_middle_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="deceased_last_name">Last name:</label>
            <input type="text" id="deceased_last_name" name="deceased_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <!-- Kept the title field because death registrations usually have honorifics attached to them. -->
            <label for="deceased_title">Title (Mr., Ms., etc.):</label>
            <input type="text" id="deceased_title" name="deceased_title"
                required
                maxlength="<?=INPUT_MAXLENGTH_SHORT?>">
        </div>
        <div class="input">
            <label for="deceased_sex">Sex:</label>
            <select id="deceased_sex" name="deceased_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="deceased_age">Age:</label>
            <input type="number" id="deceased_age" name="deceased_age" min="0"
                required>
        </div>
        <div class="input">
            <label for="deceased_citizenship">Country of citizenship:</label>
            <input type="text" id="deceased_citizenship"
                name="deceased_citizenship" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
    </fieldset>
    <h2>Death Information</h2>
    <fieldset>
        <legend>Death Information</legend>
        <div class="input">
            <label for="death_date">Date of Death:</label>
            <input type="date" id="death_date" name="death_date" required>
        </div>
        <div class="input">
            <label for="death_place">Place of Death:</label>
            <input type="text" id="death_place" name="death_place" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="death_cause">Cause of Death (if known):</label>
            <input type="text" id="death_cause" name="death_cause"
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="death_evidence">
                Reference to Evidence of Death (e.g., Medical Certificate):
            </label>
            <input type="file" id="death_evidence" name="death_evidence"
                accept="<?=rtrim(implode(',', ALLOWED_UPLOAD_FILE_TYPES), ',')?>"
                required>
        </div>
    </fieldset>
    <h2>Declarant Information</h2>
    <fieldset>
        <legend>Declarant Information</legend>
        <div class="input">
            <label for="declarant_first_name">First name:</label>
            <input type="text" id="declarant_first_name"
                name="declarant_first_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="declarant_middle_name">Middle name:</label>
            <input type="text" id="declarant_middle_name"
                name="declarant_middle_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="declarant_last_name">Last name:</label>
            <input type="text" id="declarant_last_name"
                name="declarant_last_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="declarant_sex">Sex:</label>
            <select id="declarant_sex" name="declarant_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="declarant_phone">Phone:</label>
            <input type="tel" id="declarant_phone" name="declarant_phone"
                required pattern="<?=PHONE_REGEX;?>">
        </div>
        <div class="input">
            <label for="declarant_residence">Principal Residence:</label>
            <input type="text" id="declarant_residence"
                name="declarant_residence" required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>
            Please select your relationship to the deceased
        </legend>
        <!-- An empty radio button that ensures that a default value is submitted to the server. -->
        <input type="radio" id="declarant_relation_default"
            name="declarant_relation" value required checked
            style="display: none;">
        <div class="input">
            <input type="radio" id="declarant_relation_lived"
                name="declarant_relation" value="lived_together"
                required>
            <label class="inline-label" for="declarant_relation_lived">
                I used to live with the deceased
            </label>
        </div>
        <div class="input">
            <input type="radio" id="declarant_relation_relative"
                name="declarant_relation" value="relative"
                required>
            <label class="inline-label" for="declarant_relation_relative">
                I am a relative by blood or marriage
            </label>
        </div>
        <div class="input">
            <input type="radio" id="declarant_relation_neighbor"
                name="declarant_relation" value="neighbor"
                required>
            <label class="inline-label" for="declarant_relation_neighbor">I am a close
                neighbor</label>
        </div>
        <div class="input">
            <input type="radio" id="declarant_relation_other"
                name="declarant_relation" value="other" required>
            <label class="inline-label" for="declarant_relation_other">
                I know about the death (Other, please specify):
            </label>
            <!-- TODO (CLIENT-JS) Make this required in client if other is selected above. -->
        </div>
        <div class="input">
            <textarea id="declarant_relation_other_text"
                name="declarant_relation_other_text"
                maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT?>" value>
            </textarea>
        </div>
    </fieldset>
    <button class="btn" type="submit">Submit Registration</button>
</form>