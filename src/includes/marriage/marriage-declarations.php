<?php
/**
 * Associative array that maps all fields of the marriage form to a human-readable name.
 * @var array
 */
$marriage_labels = [
    // Spouse 1 information fields
    'spouse1_first_name' => 'First spouse - First name',
    'spouse1_middle_name' => 'First spouse - Middle name',
    'spouse1_last_name' => 'First spouse - Last name',
    'spouse1_sex' => 'First spouse - Sex',
    'spouse1_dob' => 'First spouse - Date of Birth',
    'spouse1_place_of_birth' => 'First spouse - Place of Birth',
    'spouse1_citizenship' => 'First spouse - Country of citizenship',
    'spouse1_previous_martial' => 'First spouse - Previous martial status',
    'spouse1_phone' => 'First spouse - Phone',
    'spouse1_residence' => 'First spouse - Principal Residence',

    // Spouse 2 information fields
    'spouse2_first_name' => 'Second spouse - First name',
    'spouse2_middle_name' => 'Second spouse - Middle name',
    'spouse2_last_name' => 'Second spouse - Last name',
    'spouse2_sex' => 'Second spouse - Sex',
    'spouse2_dob' => 'Second spouse - Date of Birth',
    'spouse2_place_of_birth' => 'Second spouse - Place of Birth',
    'spouse2_citizenship' => 'Second spouse - Country of citizenship',
    'spouse2_previous_martial' => 'Second spouse - Previous martial status',
    'spouse2_phone' => 'Second spouse - Phone',
    'spouse2_residence' => 'Second spouse - Principal Residence',

    // Witness 1 information fields
    'witness1' => 'Witness 1 - First name',
    'witness1_middle_name' => 'Witness 1 - Middle name',
    'witness1_last_name' => 'Witness 1 - Last name',
    'witness1_sex' => 'Witness 1 - Sex',
    'witness1_dob' => 'Witness 1 - Date of Birth',
    'witness1_citizenship' => 'Witness 1 - Country of citizenship',
    'witness1_phone' => 'Witness 1 - Phone',
    'witness1_residence' => 'Witness 1 - Principal Residence',

    // Witness 2 information fields
    'witness2' => 'Witness 2 - First name',
    'witness2_middle_name' => 'Witness 2 - Middle name',
    'witness2_last_name' => 'Witness 2 - Last name',
    'witness2_sex' => 'Witness 2 - Sex',
    'witness2_dob' => 'Witness 2 - Date of Birth',
    'witness2_citizenship' => 'Witness 2 - Country of citizenship',
    'witness2_phone' => 'Witness 2 - Phone',
    'witness2_residence' => 'Witness 2 - Principal Residence',

    // Marriage details
    'marriage_date' => 'Date of Marriage',
    'marriage_place' => 'Place of Marriage',
];

/**
 * @var array Uses an associative array to group fields in marriage form by heading then lists fields required under each heading
 */
$required_fields = [
    'spouse1' => [
        'spouse1_first_name',
        'spouse1_middle_name',
        'spouse1_last_name',
        'spouse1_sex',
        'spouse1_dob',
        'spouse1_place_of_birth',
        'spouse1_citizenship',
        'spouse1_previous_martial',
        'spouse1_phone',
        'spouse1_residence',
    ],
    'spouse2' => [
        'spouse2_first_name',
        'spouse2_middle_name',
        'spouse2_last_name',
        'spouse2_sex',
        'spouse2_dob',
        'spouse2_place_of_birth',
        'spouse2_citizenship',
        'spouse2_previous_martial',
        'spouse2_phone',
        'spouse2_residence',
    ],
    'witness1' => [
        'witness1',
        'witness1_middle_name',
        'witness1_last_name',
        'witness1_sex',
        'witness1_dob',
        'witness1_citizenship',
        'witness1_phone',
        'witness1_residence',
    ],
    'witness2' => [
        'witness2',
        'witness2_middle_name',
        'witness2_last_name',
        'witness2_sex',
        'witness2_dob',
        'witness2_citizenship',
        'witness2_phone',
        'witness2_residence',
    ],
    'marriage_details' => [
        'marriage_date',
        'marriage_place',
    ],
];

/**
 * @var array Uses an associative array to relate each dropdown, radio button or checkbox of marriage form to a list of its allowed values.
 */
$selection_controls = [
    'spouse1_sex' => ['Male', 'Female'],
    'spouse1_previous_martial' => ['single', 'divorced', 'widowed'],
    'spouse2_sex' => ['Male', 'Female'],
    'spouse2_previous_martial' => ['single', 'divorced', 'widowed'],
    'witness1_sex' => ['Male', 'Female'],
    'witness2_sex' => ['Male', 'Female'],
];

/**
 * @var array Uses an associative array to relate each text field of marriage form to its maximum character length
 */
$text_maxlengths = [
    // Spouse 1 information
    'spouse1_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'spouse1_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'spouse1_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'spouse1_place_of_birth' => INPUT_MAXLENGTH_LONG,
    'spouse1_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'spouse1_phone' => INPUT_MAXLENGTH_DEFAULT,
    'spouse1_residence' => INPUT_MAXLENGTH_LONG,

    // Spouse 2 information
    'spouse2_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'spouse2_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'spouse2_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'spouse2_place_of_birth' => INPUT_MAXLENGTH_LONG,
    'spouse2_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'spouse2_phone' => INPUT_MAXLENGTH_DEFAULT,
    'spouse2_residence' => INPUT_MAXLENGTH_LONG,

    // Witness 1 and 2 information
    'witness1_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'witness1_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'witness1_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'witness1_residence' => INPUT_MAXLENGTH_LONG,
    'witness1_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'witness1_phone' => INPUT_MAXLENGTH_DEFAULT,
    'witness1_relation' => INPUT_MAXLENGTH_DEFAULT,

    'witness2_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'witness2_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'witness2_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'witness2_residence' => INPUT_MAXLENGTH_LONG,
    'witness2_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'witness2_phone' => INPUT_MAXLENGTH_DEFAULT,
    'witness2_relation' => INPUT_MAXLENGTH_DEFAULT,

    // Marriage details
    'marriage_date' => INPUT_MAXLENGTH_DEFAULT,
    'marriage_place' => INPUT_MAXLENGTH_LONG,
];

/**
 * @var array Provides a list of all phone number fields for marriage form
 */
$phone_fields = [
    'spouse1_phone',
    'spouse2_phone',
    'witness1_phone',
    'witness2_phone',
];
