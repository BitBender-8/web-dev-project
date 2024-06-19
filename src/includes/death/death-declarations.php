<?php
/**
 * Associative array that maps all fields of the death form to a human-readable name.
 * @var array
 */
$death_labels = [
    // Deceased information fields
    'deceased_first_name' => 'Deceased information - First name',
    'deceased_middle_name' => 'Deceased information - Middle name',
    'deceased_last_name' => 'Deceased information - Last name',
    'deceased_title' => 'Deceased information - Title',
    'deceased_sex' => 'Deceased information - Sex',
    'deceased_age' => 'Deceased information - Age',
    'deceased_occupation' => 'Deceased information - Occupation (when alive)',
    'deceased_residence' => 'Deceased information - Principal residence (when alive)',
    'deceased_citizenship' => 'Deceased information - Country of citizenship',

    // Death information fields
    'death_date' => 'Death information - Date of death',
    'death_place' => 'Death information - Place of death',
    'death_cause' => 'Death information - Cause of death',
    'death_evidence' => 'Death information - Reference to evidence of death',

    // Declarant information fields
    'declarant_first_name' => 'Declarant information - First name',
    'declarant_middle_name' => 'Declarant information - Middle name',
    'declarant_last_name' => 'Declarant information - Last name',
    'declarant_sex' => 'Declarant information - Sex',
    'declarant_phone' => 'Declarant information - Phone',
    'declarant_residence' => 'Declarant information - Principal residence',
    'declarant_relation' => 'Declarant information - Relationship to deceased',
    'declarant_relation_other_text' => 'Declarant information - Relationship to deceased (Other)',
];

/**
 * @var array Uses an associative array to group fields in death form by heading then lists fields required under each heading
 */
$required_fields = [
    'deceased_information' => [
        'deceased_first_name',
        'deceased_middle_name',
        'deceased_last_name',
        'deceased_title',
        'deceased_sex',
        'deceased_age',
        'deceased_citizenship',
    ],
    'death_information' => [
        'death_date',
        'death_place',
        // 'death_evidence', This is handled separately since it is a file field
    ],
    'declarant_information' => [
        'declarant_first_name',
        'declarant_middle_name',
        'declarant_last_name',
        'declarant_sex',
        'declarant_phone',
        'declarant_residence',
        'declarant_relation',
    ],
];

/**
 * @var array Uses an associative array to relate each dropdown, radio button or checkbox of death form to a list of its allowed values.
 */
$selection_controls = [
    'deceased_sex' => ['M', 'F'],
    'declarant_sex' => ['M', 'F'],
    'declarant_relation' => ['other', 'neighbor', 'relative', 'lived_together'],
];

/**
 * @var array Uses an associative array to relate each text field of death form to its maximum character length
 */
$text_maxlengths = [
    // Deceased information
    'deceased_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'deceased_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'deceased_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'deceased_title' => INPUT_MAXLENGTH_SHORT,
    'deceased_citizenship' => INPUT_MAXLENGTH_DEFAULT,

    // Death information
    'death_place' => INPUT_MAXLENGTH_LONG,
    'death_cause' => INPUT_MAXLENGTH_LONG,

    // Declarant information
    'declarant_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'declarant_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'declarant_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'declarant_residence' => INPUT_MAXLENGTH_LONG,
    'declarant_relation_other_text' => TEXTAREA_MAXLENGTH_DEFAULT,
];

/**
 * @var array Provides a list of all phone number fields for death form
 */
$phone_fields = [
    'declarant_phone',
];

/**
 * @var array Provides a list of all file fields for death form
 */
$file_fields = [
    'death_evidence',
];
