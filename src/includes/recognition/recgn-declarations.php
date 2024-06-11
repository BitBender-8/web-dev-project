<?php

/**
 * Associative array that maps all fields of the death form to a human-readable name.
 * @var array
 */
$recgn_labels = [
    // Child
    "child_first_name" => "Child - First Name",
    "child_middle_name" => "Child - Middle Name",
    "child_last_name" => "Child - Last Name",
    "child_dob" => "Child - Date of Birth",
    "child_birthplace" => "Child - Place of Birth",
    "child_sex" => "Child - Sex",
    // Parent 1
    "parent1_first_name" => "First Parent - First Name",
    "parent1_middle_name" => "First Parent - Middle Name",
    "parent1_last_name" => "First Parent - Last Name",
    "parent1_dob" => "First Parent - Date of Birth",
    "parent1_sex" => "First Parent - Sex",
    "parent1_birthplace" => "First Parent - Place of Birth",
    "parent1_citizenship" => "First Parent - Country of Citizenship",
    "parent1_occupation" => "First Parent - Occupation",
    "parent1_residence" => "First Parent - Primary Residence",
    "parent1_phone" => "First Parent - Phone Number",
    // Parent 2
    "parent2_first_name" => "Second Parent - First Name",
    "parent2_middle_name" => "Second Parent - Middle Name",
    "parent2_last_name" => "Second Parent - Last Name",
    "parent2_dob" => "Second Parent - Date of Birth",
    "parent2_sex" => "Second Parent - Sex",
    "parent2_birthplace" => "Second Parent - Place of Birth",
    "parent2_citizenship" => "Second Parent - Country of Citizenship",
    "parent2_occupation" => "Second Parent - Occupation",
    "parent2_residence" => "Second Parent - Primary Residence",
    "parent2_phone" => "Second Parent - Phone Number",
    "parent2_married" => "Was the Second Parent married to the First Parent at the time of birth of the child?",
    "prnts_married" => "Current marital status of parents to each other",
];

/**
 * @var array Uses an associative array to group fields in recognition form by heading then lists fields required under each heading
 */
$required_fields = [
    "child" => [
        "child_first_name",
        "child_middle_name",
        "child_last_name",
        "child_dob",
        "child_birthplace",
        "child_sex",
    ],
    "parent1" => [
        "parent1_first_name",
        "parent1_middle_name",
        "parent1_last_name",
        "parent1_dob",
        "parent1_sex",
        "parent1_birthplace",
        "parent1_citizenship",
        "parent1_occupation",
        "parent1_residence",
        "parent1_phone",
    ],
    "parent2" => [
        "parent2_first_name",
        "parent2_middle_name",
        "parent2_last_name",
        "parent2_dob",
        "parent2_sex",
        "parent2_birthplace",
        "parent2_citizenship",
        "parent2_occupation",
        "parent2_residence",
        "parent2_phone",
        "parent2_married",
    ],
    "marriage_info" => [
        "prnts_married",
    ],
];

/**
 * @var array Uses an associative array to relate each dropdown, radio button or checkbox of recognition form to a list of its allowed values.
 */
$selection_controls = [
    'child_sex' => ['Male', 'Female'],
    'parent1_sex' => ['Male', 'Female'],
    'parent2_sex' => ['Male', 'Female'],
    'parent2_married' => ['Yes', 'No'],
    'prnts_married' => ['Single', 'Married', 'Legally separated', 'Divorced'],
];

/**
 * @var array Uses an associative array to relate each text field of recognition form to its maximum character length
 */
$text_maxlengths = [
    // Child information
    'child_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_birthplace' => INPUT_MAXLENGTH_LONG,

    // Parent 1 information
    'parent1_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'parent1_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'parent1_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'parent1_birthplace' => INPUT_MAXLENGTH_LONG,
    'parent1_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'parent1_occupation' => INPUT_MAXLENGTH_DEFAULT,
    'parent1_residence' => INPUT_MAXLENGTH_LONG,

    // Parent 2 information
    'parent2_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'parent2_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'parent2_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'parent2_birthplace' => INPUT_MAXLENGTH_LONG,
    'parent2_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'parent2_occupation' => INPUT_MAXLENGTH_DEFAULT,
    'parent2_residence' => INPUT_MAXLENGTH_LONG,
];

/**
 * @var array Provides a list of all phone number fields for recognition form
 */
$phone_fields = [
    'parent1_phone',
    'parent2_phone',
];
