<?php

/**
 * Associative array that maps all fields of the still-birth form to a human-readable name.
 * @var array
 */
$stillbirth_labels = [
    // Child Information fields
    'child_first_name' => 'Child Information - First name',
    'child_middle_name' => 'Child Information - Middle name',
    'child_last_name' => 'Child Information - Last name',
    'child_sex' => 'Child Information - Sex',
    'child_gestational_age_wks' => 'Child Information - Gestational age (in weeks)',

    // Mother Information fields
    'mother_first_name' => 'Mother Information - First name',
    'mother_middle_name' => 'Mother Information - Middle name',
    'mother_last_name' => 'Mother Information - Last name',
    'mother_dob' => 'Mother Information - Date of birth',
    'mother_marital_status' => 'Mother Information - Marital status',
    'mother_residence' => 'Mother Information - Primary residence',
    'mother_citizenship' => 'Mother Information - Country of citizenship',
    'mother_phone' => 'Mother Information - Phone number',

    // Father Information fields
    'father_first_name' => 'Father Information - First name',
    'father_middle_name' => 'Father Information - Middle name',
    'father_last_name' => 'Father Information - Last name',
    'father_dob' => 'Father Information - Date of birth',
    'father_marital_status' => 'Father Information - Marital status',
    'father_residence' => 'Father Information - Primary residence',
    'father_citizenship' => 'Father Information - Country of citizenship',
    'father_phone' => 'Father Information - Phone number',

    // Pregnancy Information fields
    'delivery_date' => 'Pregnancy Information - Date of Delivery',
    'delivery_place' => 'Pregnancy Information - Place of Delivery',
    'pregnancy_plurality' => 'Pregnancy Information - Pregnancy plurality',
    'pregnancy_duration' => 'Pregnancy Information - Duration of Pregnancy (in weeks)',
    'birth_order' => 'Pregnancy Information - Birth Order',

    // Conditions Contributing to Fetal Death fields
    // Checkbox
    'fetal_death_conditions' => 'Conditions Contributing to Fetal Death',
    // Textareas
    'maternal_conditions' => 'Conditions Contributing to Fetal Death - Maternal conditions/diseases (Explanation)',
    'placenta_complications' => 'Conditions Contributing to Fetal Death - Complications of placenta, cord or membranes (Explanation)',
    'other_obstetrical_complications' => 'Conditions Contributing to Fetal Death - Other obstetrical or pregnancy complications (Explanation)',
    'fetal_anomaly' => 'Conditions Contributing to Fetal Death - Fetal anomaly (Explanation)',
    'fetal_injury' => 'Conditions Contributing to Fetal Death - Fetal injury (Explanation)',
    'fetal_infection' => 'Conditions Contributing to Fetal Death - Fetal infection (Explanation)',
    'other_fetal_conditions' => 'Conditions Contributing to Fetal Death - Other fetal conditions/disorders (Explanation)',

    // Reporting Person Information fields
    'reporter_first_name' => 'Reporting Person Information - First name',
    'reporter_middle_name' => 'Reporting Person Information - Middle name',
    'reporter_last_name' => 'Reporting Person Information - Last name',
    'reporter_sex' => 'Reporting Person Information - Sex',
    'reporter_residence' => 'Reporting Person Information - Primary residence',
    'reporter_phone' => 'Reporting Person Information - Phone number',
];

/**
 * @var array Uses an associative array to group fields in still-birth form by heading then lists fields required under each heading
 */
// CONSIDER Marking other declarations as required and optional like done below
$required_fields = [
    // Required
    'child' => [
        'child_first_name',
        'child_middle_name',
        'child_last_name',
        'child_sex',
        'child_gestational_age_wks',
    ],
    // Required
    'mother' => [
        'mother_first_name',
        'mother_middle_name',
        'mother_last_name',
        'mother_dob',
        'mother_marital_status',
        'mother_residence',
        'mother_citizenship',
        'mother_phone',
    ],
    // Optional
    'father' => [
        'father_first_name',
        'father_middle_name',
        'father_last_name',
        'father_dob',
        'father_marital_status',
        'father_residence',
        'father_citizenship',
        'father_phone',
    ],
    // Required
    'pregnancy' => [
        'delivery_date',
        'delivery_place',
        'pregnancy_plurality',
        'pregnancy_duration',
        'birth_order',
    ],
    // Required
    'fetal_death_conditions' => [
        'fetal_death_conditions',
    ],
    // Required
    'reporting_person' => [
        'reporter_first_name',
        'reporter_middle_name',
        'reporter_last_name',
        'reporter_sex',
        'reporter_residence',
        'reporter_phone',
    ],
];

/**
 * @var array Uses an associative array to relate each dropdown, radio button or checkbox of still-birth form to a list of its allowed values.
 */
$selection_controls = [
    // Dropdowns
    'child_sex' => ['M', 'F'],
    'mother_marital_status' => ['married', 'single', 'widowed', 'divorced', 'separated'],
    'father_marital_status' => ['married', 'single', 'widowed', 'divorced', 'separated'],
    'reporter_sex' => ['M', 'F'],
    // Checkbox
    'fetal_death_conditions' => [
        'maternal_conditions',
        'placenta_complications',
        'other_obstetrical_complications',
        'fetal_anomaly',
        'fetal_injury',
        'fetal_infection',
        'other_fetal_conditions',
    ],
];

/**
 * @var array Uses an associative array to relate each text field of still-birth form to its maximum character length
 */
$text_maxlengths = [
    // Child Information
    'child_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_last_name' => INPUT_MAXLENGTH_DEFAULT,

    // Mother Information
    'mother_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'mother_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'mother_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'mother_residence' => INPUT_MAXLENGTH_LONG,
    'mother_citizenship' => INPUT_MAXLENGTH_DEFAULT,

    // Father Information
    'father_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'father_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'father_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'father_residence' => INPUT_MAXLENGTH_LONG,
    'father_citizenship' => INPUT_MAXLENGTH_DEFAULT,

    // Pregnancy Information
    'delivery_place' => INPUT_MAXLENGTH_LONG,

    // Fetal Death Conditions
    'explanation_maternal_conditions' => TEXTAREA_MAXLENGTH_DEFAULT,
    'explanation_placenta_complications' => TEXTAREA_MAXLENGTH_DEFAULT,
    'explanation_other_obstetrical_complications' => TEXTAREA_MAXLENGTH_DEFAULT,
    'explanation_fetal_anomaly' => TEXTAREA_MAXLENGTH_DEFAULT,
    'explanation_fetal_injury' => TEXTAREA_MAXLENGTH_DEFAULT,
    'explanation_fetal_infection' => TEXTAREA_MAXLENGTH_DEFAULT,
    'explanation_other_fetal_conditions' => TEXTAREA_MAXLENGTH_DEFAULT,

    // Reporting Person Information
    'reporter_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'reporter_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'reporter_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'reporter_residence' => INPUT_MAXLENGTH_LONG,
];

/**
 * @var array Provides a list of all phone number fields for still-birth form
 */
$phone_fields = [
    'mother_phone',
    'father_phone',
    'reporter_phone',
];

/**
 * @var array Maps each checkbox value in 'Fetal death condition' to the name of its corresponding explanation
 */
$condition_key_to_explanation_key = [
    'maternal_conditions' => 'explanation_maternal_conditions',
    'placenta_complications' => 'explanation_placenta_complications',
    'other_obstetrical_complications' => 'explanation_other_obstetrical_complications',
    'fetal_anomaly' => 'explanation_fetal_anomaly',
    'fetal_injury' => 'explanation_fetal_injury',
    'fetal_infection' => 'explanation_fetal_infection',
    'other_fetal_conditions' => 'explanation_other_fetal_conditions',
];
