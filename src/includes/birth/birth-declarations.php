<?php

/**
 * Associative array that maps all fields of the birth form to a human-readable name.
 * @var array
 */
$birth_labels = [
    // Child
    'child_first_name' => 'Child - First Name',
    'child_middle_name' => 'Child - Middle Name',
    'child_last_name' => 'Child - Last Name',
    'child_sex' => 'Child - Sex',
    'child_dob' => 'Child - Date of Birth',
    'child_place_of_birth' => 'Child - Place of Birth',
    'child_birth_plurality' => 'Child - Birth Plurality',
    'child_aid_rendered' => 'Aid Rendered During Birth',
    'child_weight_at_birth' => 'Child - Weight at Birth',
    // Mother
    'mother_first_name' => 'Mother - First Name',
    'mother_middle_name' => 'Mother - Middle Name',
    'mother_last_name' => 'Mother - Last Name',
    'mother_dob' => 'Mother - Date of Birth',
    'mother_place_of_birth' => 'Mother - Place of Birth',
    'mother_residence' => 'Mother - Principal Residence',
    'mother_phone' => 'Mother - Phone Number',
    'mother_marital_status' => 'Mother - Marital Status',
    'mother_citizenship' => 'Mother - Country of Citizenship',
    // Father
    'father_first_name' => 'Father - First Name',
    'father_middle_name' => 'Father - Middle Name',
    'father_last_name' => 'Father - Last Name',
    'father_dob' => 'Father - Date of Birth',
    'father_place_of_birth' => 'Father - Place of Birth',
    'father_residence' => 'Father - Principal Residence',
    'father_phone' => 'Father - Phone Number',
    'father_marital_status' => 'Father - Marital Status',
    'father_citizenship' => 'Father - Country of Citizenship',
    // Declarant
    'declarant_first_name' => 'Declarant - First Name',
    'declarant_middle_name' => 'Declarant - Middle Name',
    'declarant_last_name' => 'Declarant - Last Name',
    'declarant_relation_to_child' => 'Declarant - Relationship to Child',
    'declarant_sex' => 'Declarant - Sex',
    'declarant_dob' => 'Declarant - Date of Birth',
    'declarant_place_of_birth' => 'Declarant Place of Birth',
    'declarant_residence' => 'Declarant - Principal Residence',
    'declarant_phone' => 'Declarant - Phone Number',
];

/**
 * @var array Uses an associative array to group fields in birth form by heading then lists fields required under each heading
 */
$required_fields = [
    'child' => [
        'child_first_name',
        'child_middle_name',
        'child_last_name',
        'child_sex',
        'child_dob',
        'child_place_of_birth',
        'child_birth_plurality',
        'child_weight_at_birth',
    ],
    'mother' => [
        'mother_first_name',
        'mother_middle_name',
        'mother_last_name',
        'mother_dob',
        'mother_place_of_birth',
        'mother_residence',
        'mother_phone',
        'mother_marital_status',
        'mother_citizenship',
    ],
    'father' => [
        'father_first_name',
        'father_middle_name',
        'father_last_name',
        'father_dob',
        'father_place_of_birth',
        'father_residence',
        'father_phone',
        'father_marital_status',
        'father_citizenship',
    ],
    'declarant' => [
        'declarant_first_name',
        'declarant_middle_name',
        'declarant_last_name',
        'declarant_relation_to_child',
        'declarant_sex',
        'declarant_dob',
        'declarant_place_of_birth',
        'declarant_residence',
        'declarant_phone',
    ],
];

/**
 * @var array Uses an associative array to relate each dropdown, radio button or checkbox of birth form to a list of its allowed values.
 */

$selection_controls = [
    'child_sex' => ['M', 'F'],
    'mother_marital_status' => ['married', 'single', 'widowed', 'divorced'],
    'father_marital_status' => ['married', 'single', 'widowed', 'divorced'],
    'declarant_sex' => ['M', 'F'],
];

/**
 * @var array Uses an associative array to relate each text field of birth form to its maximum character length
 */
$text_maxlengths = [
    // Child
    'child_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_place_of_birth' => INPUT_MAXLENGTH_LONG,
    'child_aid_rendered' => TEXTAREA_MAXLENGTH_SMALL,
    // Mother
    'mother_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'mother_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'mother_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'mother_place_of_birth' => INPUT_MAXLENGTH_LONG,
    'mother_residence' => INPUT_MAXLENGTH_LONG,
    'mother_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    // Father
    'father_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'father_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'father_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'father_place_of_birth' => INPUT_MAXLENGTH_LONG,
    'father_residence' => INPUT_MAXLENGTH_LONG,
    'father_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    // Declarant
    'declarant_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'declarant_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'declarant_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'declarant_relation_to_child' => INPUT_MAXLENGTH_DEFAULT,
    'declarant_place_of_birth' => INPUT_MAXLENGTH_LONG,
    'declarant_residence' => INPUT_MAXLENGTH_LONG,
];

/**
 * @var array Provides a list of all phone number fields for birth form
 */
$phone_fields = [
    'mother_phone',
    'father_phone',
    'declarant_phone',
];
