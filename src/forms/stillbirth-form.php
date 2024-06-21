<!-- REMOVE Remove novalidate when done with debugging -->
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"
    enctype="multipart/form-data"
    novalidate>
    <h2>Child Information</h2>
    <fieldset>
        <legend>Child Information</legend>
        <div class="input">
            <p>Enter the full name of the child if known</p>
            <label for="child_first_name">First name:</label>
            <input type="text" id="child_first_name" name="child_first_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="child_middle_name">Middle name:</label>
            <input type="text" id="child_middle_name" name="child_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="child_last_name">Last name:</label>
            <input type="text" id="child_last_name" name="child_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="child_sex">Sex:</label>
            <select id="child_sex" name="child_sex" required>
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="child_gestational_age_wks">Gestational age (in
                weeks):</label>
            <input type="number" id="child_gestational_age_wks"
                name="child_gestational_age_wks" min="1" max="999"
                required>
        </div>
    </fieldset>
    <h2>Parents' Information</h2>
    <fieldset>
        <legend>Mother's Information</legend>
        <div class="input">
            <label for="mother_first_name">First name:</label>
            <input type="text" id="mother_first_name" name="mother_first_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="mother_middle_name">Middle name:</label>
            <input type="text" id="mother_middle_name" name="mother_middle_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="mother_last_name">Last name:</label>
            <input type="text" id="mother_last_name" name="mother_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="mother_dob">Date of birth</label>
            <input type="date" id="mother_dob" name="mother_dob" min="0"
                required>
        </div>
        <div class="input">
            <label for="mother_marital_status">Marital status:</label>
            <select id="mother_marital_status" name="mother_marital_status"
                required>
                <option value selected>Select</option>
                <option value="married">Married</option>
                <option value="single">Single</option>
                <option value="widowed">Widowed</option>
                <option value="divorced">Divorced</option>
                <option value="separated">Legally separated</option>
            </select>
        </div>
        <div class="input">
            <label for="mother_residence">Primary residence:</label>
            <input type="text" id="mother_residence" name="mother_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="mother_citizenship">Country of citizenship:</label>
            <input type="text" id="mother_citizenship" name="mother_citizenship"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="mother_phone">Phone number:</label>
            <input type="tel" id="mother_phone" name="mother_phone" required
                pattern="<?=PHONE_REGEX;?>">
        </div>
    </fieldset>
    <fieldset>
        <legend>Father's Information (Optional)</legend>
        <div class="input">
            <label for="father_first_name">First name:</label>
            <input type="text" id="father_first_name" name="father_first_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="father_middle_name">Middle name:</label>
            <input type="text" id="father_middle_name" name="father_middle_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="father_last_name">Last name:</label>
            <input type="text" id="father_last_name" name="father_last_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="father_dob">Date of birth</label>
            <input type="date" id="father_dob" name="father_dob" min="0">
        </div>
        <div class="input">
            <label for="father_marital_status">Marital status:</label>
            <select id="father_marital_status" name="father_marital_status">
                <option value selected>Select</option>
                <option value="married">Married</option>
                <option value="single">Single</option>
                <option value="widowed">Widowed</option>
                <option value="divorced">Divorced</option>
                <option value="separated">Legally separated</option>
            </select>
        </div>
        <div class="input">
            <label for="father_residence">Primary residence:</label>
            <input type="text" id="father_residence" name="father_residence"
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="father_citizenship">Country of citizenship:</label>
            <input type="text" id="father_citizenship" name="father_citizenship"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="father_phone">Phone number:</label>
            <input type="tel" id="father_phone" name="father_phone"
                pattern="<?=PHONE_REGEX;?>">
        </div>
    </fieldset>
    <h2>Pregnancy Information</h2>
    <fieldset>
        <legend>Pregnancy Information</legend>
        <div class="input">
            <label for="delivery_date">Date of Delivery:</label>
            <input type="date" id="delivery_date" name="delivery_date" required>
        </div>
        <div class="input">
            <label for="delivery_place">Place of Delivery:</label>
            <input type="text" id="delivery_place" name="delivery_place"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="pregnancy_plurality">
                Pregnancy plurality (1 if Single, 2 if Twins, 3 = if Triplets,
                etc.):
            </label>
            <input type="number" id="pregnancy_plurality"
                name="pregnancy_plurality" required min="1" max="999">
        </div>
        <div class="input">
            <label for="pregnancy_duration">Duration of Pregnancy (in
                weeks):</label>
            <input type="number" id="pregnancy_duration"
                name="pregnancy_duration" min="1" max="999" required>
        </div>
        <div class="input">
            <label for="birth_order">
                If not single birth, specify order (1 if Born First, 2 if
                Second, 3 if Third, etc.):
            </label>
            <input type="number" id="birth_order" name="birth_order" min="1"
                max="999">
        </div>
    </fieldset>
    <h2>Conditions Contributing to Fetal Death</h2>
    <p class="notice">
        Check all that apply and provide details in the explanation box.
        At least one checkbox must be checked but explainations are optional for
        each condition chosen
        chosen.
    </p>
    <fieldset>
        <legend>
            Fetal death conditions
        </legend>
        <div class="input">
            <input type="checkbox" id="reason_maternal_conditions"
                name="fetal_death_conditions[]"
                value="maternal_conditions" required>
            <label class="inline-label" for="reason_maternal_conditions">
                Maternal conditions/diseases (Explain):
            </label>
            <div class="input">
                <textarea id="explanation_maternal_conditions"
                    name="explanation_maternal_conditions" rows="4"
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>">
                </textarea>
            </div>
        </div>
        <div class="input">
            <input type="checkbox" id="reason_placenta_complications"
                name="fetal_death_conditions[]"
                value="placenta_complications" required>
            <label class="inline-label" for="reason_placenta_complications">
                Complications of placenta, cord or membranes (Explain):
            </label>
            <div class="input">
                <textarea id="explanation_placenta_complications"
                    name="explanation_placenta_complications" rows="4"
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>"></textarea>
            </div>
        </div>
        <div class="input">
            <input type="checkbox"
                id="reason_other_obstetrical_complications"
                name="fetal_death_conditions[]"
                value="other_obstetrical_complications" required>
            <label class="inline-label"
                for="reason_other_obstetrical_complications">
                Other obstetrical or pregnancy complications (Explain):
            </label>
            <div class="input">
                <textarea id="explanation_other_obstetrical_complications"
                    name="explanation_other_obstetrical_complications"
                    rows="4"
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>"></textarea>
            </div>
        </div>
        <div class="input">
            <input type="checkbox" id="reason_fetal_anomaly"
                name="fetal_death_conditions[]" value="fetal_anomaly"
                required>
            <label class="inline-label" for="reason_fetal_anomaly">Fetal
                anomaly
                (Explain):</label>
            <div class="input">
                <textarea id="explanation_fetal_anomaly"
                    name="explanation_fetal_anomaly" rows="4"
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>"></textarea>
            </div>
        </div>
        <div class="input">
            <input type="checkbox" id="reason_fetal_injury"
                name="fetal_death_conditions[]" value="fetal_injury"
                required>
            <label class="inline-label" for="reason_fetal_injury">Fetal
                injury
                (Explain):</label>
            <div class="input">
                <textarea id="explanation_fetal_injury"
                    name="explanation_fetal_injury" rows="4"
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>"></textarea>
            </div>
        </div>
        <div class="input">
            <input type="checkbox" id="reason_fetal_infection"
                name="fetal_death_conditions[]"
                value="fetal_infection" required>
            <label class="inline-label" for="reason_fetal_infection">
                Fetal infection (Explain):
            </label>
            <div class="input">
                <textarea id="explanation_fetal_infection"
                    name="explanation_fetal_infection" rows="4"
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>"></textarea>
            </div>
        </div>
        <div class="input">
            <input type="checkbox" id="reason_other_fetal_conditions"
                name="fetal_death_conditions[]"
                value="other_fetal_conditions" required>
            <label class="inline-label" for="reason_other_fetal_conditions">
                Other fetal conditions/disorders (Explain):
            </label>
            <div class="input">
                <textarea id="explanation_other_fetal_conditions"
                    name="explanation_other_fetal_conditions" rows="4"
                    maxlength="<?=TEXTAREA_MAXLENGTH_DEFAULT;?>"></textarea>
            </div>
        </div>
    </fieldset>
    <h2>Reporting Person Information</h2>
    <fieldset>
        <div class="input">
            <label for="reporter_first_name">First name:</label>
            <input type="text" id="reporter_first_name"
                name="reporter_first_name"
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>" required>
            <label for="reporter_middle_name">Middle name:</label>
            <input type="text" id="reporter_middle_name"
                name="reporter_middle_name" required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
            <label for="reporter_last_name">Last name:</label>
            <input type="text" id="reporter_last_name"
                name="reporter_last_name"
                required
                maxlength="<?=INPUT_MAXLENGTH_DEFAULT;?>">
        </div>
        <div class="input">
            <label for="reporter_sex">Sex:</label>
            <select name="reporter_sex" id="reporter_sex">
                <option value selected>Select</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="input">
            <label for="reporter_residence">Primary residence:</label>
            <input type="text" id="reporter_residence"
                name="reporter_residence"
                required
                maxlength="<?=INPUT_MAXLENGTH_LONG;?>">
        </div>
        <div class="input">
            <label for="reporter_phone">Phone number:</label>
            <input type="tel" id="reporter_phone" name="reporter_phone"
                required
                pattern="<?=PHONE_REGEX;?>">
        </div>
    </fieldset>
    <button class="btn" type="submit">Submit Registration</button>
</form>