<?php

/**
 * Associative array that maps all fields of the adoption form to a human-readable name.
 * @var array
 */
$adoption_labels = [
    // Adopter 1
    'adopter1_firstname' => 'Adopter 1 First Name',
    'adopter1_middlename' => 'Adopter 1 Middle Name',
    'adopter1_lastname' => 'Adopter 1 Last Name',
    'adopter1_dob' => 'Adopter 1 Date of Birth',
    'adopter1_sex' => 'Adopter 1 Sex',
    'adopter1_birthplace' => 'Adopter 1 Place of Birth',
    'adopter1_citizenship' => 'Adopter 1 Country of Citizenship',
    'adopter1_phone' => 'Adopter 1 Phone',
    'adopter1_residence' => 'Adopter 1 Primary Residence',
    'adopter1_occupation' => 'Adopter 1 Occupation',
    'adopter1_relationship_child' => 'Adopter 1 Relationship to Child',
    'adopter1_relationship_adopter2' => 'Adopter 1 Relationship to Adopter 2)',
    'adopter1_relationship_chlds_parent' => 'Adopter 1 Relationship to Child\'s Parent',

    // Adopter 2
    'adopter2_firstname' => 'Adopter 2 First Name',
    'adopter2_middlename' => 'Adopter 2 Middle Name',
    'adopter2_lastname' => 'Adopter 2 Last Name',
    'adopter2_dob' => 'Adopter 2 Date of Birth',
    'adopter2_sex' => 'Adopter 2 Sex',
    'adopter2_birthplace' => 'Adopter 2 Place of Birth',
    'adopter2_citizenship' => 'Adopter 2 Country of Citizenship',
    'adopter2_phone' => 'Adopter 2 Phone',
    'adopter2_residence' => 'Adopter 2 Primary Residence',
    'adopter2_occupation' => 'Adopter 2 Occupation',
    'adopter2_relationship_child' => 'Adopter 2 Relationship to Child',
    'adopter2_relationship_adopter1' => 'Adopter 2 Relationship to Adopter 1',
    'adopter2_relationship_chlds_parent' => 'Adopter 2 Relationship to Child\'s Parent',

    // Child
    'child_first_name' => 'Child First Name',
    'child_middle_name' => 'Child Middle Name',
    'child_last_name' => 'Child Last Name',
    'child_dob' => 'Child Date of Birth',
    'child_birthplace' => 'Child Place of Birth',
    'child_sex' => 'Child Sex',
    'received_child_from' => 'Fullname of Person or Name of Organization from Whom You Received the Child',
    'child_placer_address' => 'Child Placement Address',
    'child_placer_phone' => 'Child Placer Phone',

    // Adoption
    'adopter_category' => 'Category of Adopters',
    'adoption_date' => 'Date of Adoption',
    'adoption_type' => 'Adoption Type',
];

/**
 * @var array Uses an associative array to group fields in adoption form by heading then show fields required under each heading
 */
$required_fields = [
    "adoption" => ["adoption_type", "adopter_category", "adoption_date"],
    "adopter1" => [
        "adopter1_firstname",
        "adopter1_middlename",
        "adopter1_lastname",
        "adopter1_dob",
        "adopter1_sex",
        "adopter1_birthplace",
        "adopter1_citizenship",
        "adopter1_phone",
        "adopter1_residence",
        "adopter1_occupation",
    ],
    "adopter2" => [
        "adopter2_firstname",
        "adopter2_middlename",
        "adopter2_lastname",
        "adopter2_dob",
        "adopter2_sex",
        "adopter2_birthplace",
        "adopter2_citizenship",
        "adopter2_phone",
        "adopter2_residence",
        "adopter2_occupation",
    ],
    "child" => [
        "child_first_name",
        "child_middle_name",
        "child_last_name",
        "child_dob",
        "child_birthplace",
        "child_sex",
    ]
];

/**
 * @var array Uses an associative array to relate each field_name of adoption form to a list of its allowed values.
 */
$multivalue_fields = [
    'adoption_type' => ['domestic', 'intercountry'],
    'adopter1_sex' => ['M', 'F'],
    'adopter2_sex' => ['M', 'F'],
    'adopter_category' => ['stepparent', 'sole', 'couple', 'cohabitants'],
    'child_sex' => ['M', 'F'],
];

/**
 * @var array Uses an associative array to relate each text field of adoption form to its maximum length
 */
$text_maxlengths = [
    // Adopter 1
    'adopter1_firstname' => INPUT_MAXLENGTH_DEFAULT,
    'adopter1_middlename' => INPUT_MAXLENGTH_DEFAULT,
    'adopter1_lastname'  => INPUT_MAXLENGTH_DEFAULT,
    'adopter1_birthplace'  => INPUT_MAXLENGTH_LONG,
    'adopter1_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'adopter1_residence'  => INPUT_MAXLENGTH_LONG,
    'adopter1_occupation'  => INPUT_MAXLENGTH_DEFAULT,
    'adopter1_relationship_child' => INPUT_MAXLENGTH_DEFAULT,
    'adopter1_relationship_adopter2' => INPUT_MAXLENGTH_DEFAULT,
    'adopter1_relationship_chlds_parent' => INPUT_MAXLENGTH_DEFAULT,

    // Adopter 2
    'adopter2_firstname' => INPUT_MAXLENGTH_DEFAULT,
    'adopter2_middlename' => INPUT_MAXLENGTH_DEFAULT,
    'adopter2_lastname'  => INPUT_MAXLENGTH_DEFAULT,
    'adopter2_birthplace'  => INPUT_MAXLENGTH_LONG,
    'adopter2_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'adopter2_residence'  => INPUT_MAXLENGTH_LONG,
    'adopter2_occupation'  => INPUT_MAXLENGTH_DEFAULT,
    'adopter2_relationship_child' => INPUT_MAXLENGTH_DEFAULT,
    'adopter2_relationship_adopter1' => INPUT_MAXLENGTH_DEFAULT,
    'adopter2_relationship_chlds_parent' => INPUT_MAXLENGTH_DEFAULT,

    // Child 
    'child_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'child_birthplace' => INPUT_MAXLENGTH_LONG,
    'received_child_from' => INPUT_MAXLENGTH_DEFAULT,
    'child_placer_address' => INPUT_MAXLENGTH_LONG,
];

/**
 * @var array Provides a list of all phone number fields for adoption form
 */
$phone_fields = [
    'adopter1_phone',
    'adopter2_phone',
    'child_placer_phone',
];
