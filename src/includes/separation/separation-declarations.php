<?php

$required_fields = [
    'spouse1' => [
        'petitioner_first_name',
        'petitioner_middle_name',
        'petitioner_last_name',
        'petitioner_sex',
        'petitioner_dob',
        'petitioner_birthplace',
        'petitioner_citizenship',
        'petitioner_phone',
        'petitioner_residence',
    ],
    'spouse2' => [
        'respondent_first_name',
        'respondent_middle_name',
        'respondent_last_name',
        'respondent_sex',
        'respondent_dob',
        'respondent_birthplace',
        'respondent_citizenship',
        'respondent_phone',
        'respondent_residence',
    ],
    'marriage_details' => [
        'marriage_date',
        'marriage_place',
    ],
    'separation_details' => [
        // 'separation_reference', This is handled separately
        'separation_date',
    ],
];

$text_maxlengths = [
    'petitioner_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_birthplace' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_residence' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_birthplace' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_residence' => INPUT_MAXLENGTH_DEFAULT,
    'separation_reason' => TEXTAREA_MAXLENGTH_SMALL,
];

$selection_controls = [
    'petitioner_sex' => ['M', 'F'],
    'respondent_sex' => ['M', 'F'],
];

$phone_fields = [
    'petitioner_phone',
    'respondent_phone',
];

$separation_labels = [
    'petitioner_first_name' => 'Petitioner First Name',
    'petitioner_middle_name' => 'Petitioner Middle Name',
    'petitioner_last_name' => 'Petitioner Last Name',
    'petitioner_sex' => 'Petitioner Sex',
    'petitioner_dob' => 'Petitioner Date of Birth',
    'petitioner_birthplace' => 'Petitioner Place of Birth',
    'petitioner_citizenship' => 'Petitioner Country of Citizenship',
    'petitioner_phone' => 'Petitioner Phone Number',
    'petitioner_residence' => 'Petitioner Primary Residence',
    'respondent_first_name' => 'Respondent First Name',
    'respondent_middle_name' => 'Respondent Middle Name',
    'respondent_last_name' => 'Respondent Last Name',
    'respondent_sex' => 'Respondent Sex',
    'respondent_dob' => 'Respondent Date of Birth',
    'respondent_birthplace' => 'Respondent Place of Birth',
    'respondent_citizenship' => 'Respondent Country of Citizenship',
    'respondent_phone' => 'Respondent Phone Number',
    'respondent_residence' => 'Respondent Primary Residence',
    'marriage_date' => 'Date of Marriage',
    'marriage_place' => 'Place of Marriage',
    'separation_reference' => 'Reference to Court Decision',
    'separation_reason' => 'Reason for Separation',
    'separation_date' => 'Date of Separation',
];

$file_fields = [
    'separation_reference',
];
