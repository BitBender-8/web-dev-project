<?php

/**
 * @var string SQL query string to insert data of divorce.php
 */
$insert_sql =
    "INSERT INTO DivorceRegistrations (
    spouse1_full_name,
    spouse1_sex,
    spouse1_dob,
    spouse1_place_of_birth,
    spouse1_residence,
    spouse1_phone,
    spouse1_citizenship,
    spouse2_full_name,
    spouse2_sex,
    spouse2_dob,
    spouse2_place_of_birth,
    spouse2_residence,
    spouse2_phone,
    spouse2_citizenship,
    marriage_date,
    marriage_place,
    divorce_date,
    divorce_reference_filepath,
    divorce_reason,
    rgstrnt_user
) VALUES (
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?
);";
