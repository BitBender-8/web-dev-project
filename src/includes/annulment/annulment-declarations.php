<?php
$annulment_labels = [
    'petitioner_first_name' => 'Petitioner First Name',
    'petitioner_middle_name' => 'Petitioner Middle Name',
    'petitioner_last_name' => 'Petitioner Last Name',
    'petitioner_dob' => 'Petitioner Date of Birth',
    'petitioner_sex' => 'Petitioner Sex',
    'petitioner_residence' => 'Petitioner Residence',
    'petitioner_citizenship' => 'Petitioner Citizenship',
    'petitioner_phone' => 'Petitioner Phone Number',
    'petitioner_birthplace' => 'Petitioner Place of Birth',
    'respondent_first_name' => 'Respondent First Name',
    'respondent_middle_name' => 'Respondent Middle Name',
    'respondent_last_name' => 'Respondent Last Name',
    'respondent_dob' => 'Respondent Date of Birth',
    'respondent_sex' => 'Respondent Sex',
    'respondent_residence' => 'Respondent Residence',
    'respondent_citizenship' => 'Respondent Citizenship',
    'respondent_phone' => 'Respondent Phone Number',
    'respondent_birthplace' => 'Respondent Place of Birth',
    'marriage_date' => 'Date of Marriage',
    'marriage_place' => 'Place of Marriage',
    'annulment_reasons' => 'Reasons for Annulment',
    'annulment_reference' => 'Judicial Reference File',
    'annulment_date' => 'Date of Annulment',
];

$annulment_required_fields = [
    'spouse1' => [
        'petitioner_first_name', 'petitioner_middle_name', 'petitioner_last_name', 'petitioner_dob', 'petitioner_sex',
        'petitioner_residence', 'petitioner_citizenship', 'petitioner_phone', 'petitioner_birthplace',
    ],
    'spouse2' => [
        'respondent_first_name', 'respondent_middle_name', 'respondent_last_name', 'respondent_dob', 'respondent_sex',
        'respondent_residence', 'respondent_citizenship', 'respondent_phone', 'respondent_birthplace',
    ],
    'marriage_annulment_details' => [
        'marriage_date', 'marriage_place', 'annulment_reference', 'annulment_date',
    ],
];

$annulment_text_maxlengths = [
    'petitioner_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_residence' => INPUT_MAXLENGTH_LONG,
    'petitioner_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_phone' => INPUT_MAXLENGTH_DEFAULT,
    'petitioner_birthplace' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_first_name' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_middle_name' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_last_name' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_residence' => INPUT_MAXLENGTH_LONG,
    'respondent_citizenship' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_phone' => INPUT_MAXLENGTH_DEFAULT,
    'respondent_birthplace' => INPUT_MAXLENGTH_DEFAULT,
    'marriage_place' => INPUT_MAXLENGTH_DEFAULT,
    'annulment_reasons' => TEXTAREA_MAXLENGTH_DEFAULT,
];

$annulment_selection_controls = [
    'petitioner_sex' => ['M', 'F'],
    'respondent_sex' => ['M', 'F'],
];

$annulment_phone_fields = [
    'petitioner_phone',
    'respondent_phone',
];
