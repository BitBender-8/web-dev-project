<?php
/**
 * Associative array that maps all fields of the divorce form to a human-readable name.
 * @var array
 */
$divorce_labels = [
    // Spouse 1 information fields
    'spouse1_first_name' => 'First spouse - First name',
    'spouse1_middle_name' => 'First spouse - Middle name',
    'spouse1_last_name' => 'First spouse - Last name',
    'spouse1_sex' => 'First spouse - Sex',
    'spouse1_dob' => 'First spouse - Date of Birth',
    'spouse1_place_of_birth' => 'First spouse - Place of Birth',
    'spouse1_citizenship' => 'First spouse - Country of citizenship',
    'spouse1_previous_marital' => 'First spouse - Previous marital status',
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
    'spouse2_previous_marital' => 'Second spouse - Previous marital status',
    'spouse2_phone' => 'Second spouse - Phone',
    'spouse2_residence' => 'Second spouse - Principal Residence',

    // Marriage and Divorce information fields
    'marriage_date' => 'Date of Conclusion of Marriage',
    'marriage_place' => 'Place of Conclusion of Marriage',
    'divorce_date' => 'Date of Divorce',
    'divorce_reference' => 'Reference to Court Decision',
    'divorce_reason' => 'Reason for divorce (Optional)',
];

/**
 * @var array Uses an associative array to group fields in divorce form by heading then lists fields required under each heading
 */
$divorce_required_fields = [
    'spouse1' => [
        'spouse1_first_name',
        'spouse1_middle_name',
        'spouse1_last_name',
        'spouse1_sex',
        'spouse1_dob',
        'spouse1_place_of_birth',
        'spouse1_citizenship',
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
        'spouse2_phone',
        'spouse2_residence',
    ],
    'marriage_divorce_details' => [
        'marriage_date',
        'marriage_place',
        'divorce_date',
        'divorce_reference',
    ],
];

/**
 * @var array Uses an associative array to relate each dropdown, radio button or checkbox of divorce form to a list of its allowed values.
 */
$divorce_selection_controls = [
    'spouse1_sex' => ['Male', 'Female'],
    'spouse1_previous_marital' => ['single', 'divorced', 'widowed'],
    'spouse2_sex' => ['Male', 'Female'],
    'spouse2_previous_marital' => ['single', 'divorced', 'widowed'],
];

/**
 * @var array Uses an associative array to relate each text field of divorce form to its maximum character length
 */
$divorce_text_maxlengths = [
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

    // Marriage and Divorce information
    'marriage_date' => INPUT_MAXLENGTH_DEFAULT,
    'marriage_place' => INPUT_MAXLENGTH_LONG,
    'divorce_date' => INPUT_MAXLENGTH_DEFAULT,
    'divorce_reason' => TEXTAREA_MAXLENGTH_SMALL,
];

/**
 * @var array Provides a list of all phone number fields for divorce form
 */
$divorce_phone_fields = [
    'spouse1_phone',
    'spouse2_phone',
];

?>
