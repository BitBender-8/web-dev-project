<?php

/**
 * @var string SQL query string to insert data of annulment.php
 */
$insert_sql =
    "INSERT INTO AnnulmentRegistrations (
    petitioner_full_name,
    petitioner_dob,
    petitioner_sex,
    petitioner_residence,
    petitioner_citizenship,
    petitioner_phone,
    petitioner_birthplace,
    respondent_full_name,
    respondent_dob,
    respondent_sex,
    respondent_residence,
    respondent_citizenship,
    respondent_phone,
    respondent_birthplace,
    marriage_date,
    marriage_place,
    annulment_reasons,
    annulment_reference_file_path,
    annulment_date,
    rgstrnt_user
) VALUES (
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?
);";
