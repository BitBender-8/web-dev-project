<?php

/**
 * @var string SQL query string to insert data of divorce.php
 */
$insert_sql =
    "INSERT INTO JudicialSeparations (
        petitioner_full_name,
        petitioner_sex,
        petitioner_dob,
        petitioner_birthplace,
        petitioner_citizenship,
        petitioner_phone,
        petitioner_residence,
        respondent_full_name,
        respondent_sex,
        respondent_dob,
        respondent_birthplace,
        respondent_citizenship,
        respondent_phone,
        respondent_residence,
        marriage_date,
        marriage_place,
        separation_reference_path,
        separation_reason,
        separation_date,
        rgstrnt_user
) VALUES (
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?
);";
