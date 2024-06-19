<?php

/**
 * @var string SQL query string to insert data of death.php
 */
$insert_sql =
    "INSERT INTO DeathRegistrations (
    deceased_full_name,
    deceased_title,
    deceased_sex,
    deceased_age,
    deceased_citizenship,
    death_date,
    death_place,
    death_cause,
    death_evidence_filepath,
    declarant_full_name,
    declarant_sex,
    declarant_phone,
    declarant_residence,
    declarant_relation,
    declarant_relation_other_text,
    rgstrnt_user
) VALUES (
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?
)";
