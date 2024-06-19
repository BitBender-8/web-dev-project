<!-- -- Relationships
-- Users table has a one-to-many relationship with most event tables (e.g., LiveBirths, Marriages, Divorces) as users can be involved in multiple events.
-- Marriages and Divorces are related through a foreign key.
-- Users table acts as a central reference for individuals -->
<?php

require_once "../src/includes/declarations.php";
// The names of people have been combined into a single field that will be delimited by a semicolor
// Use MariaDB for your database since MYSQL needs to be configured to allow our large columns
$db_sql =
    "CREATE DATABASE vital_event_registration;
USE vital_event_registration;

CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    principal_residence VARCHAR(255),
    citizenship VARCHAR(255)
);

CREATE TABLE LiveBirthRegistrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    child_name VARCHAR(255) NOT NULL,
    child_sex ENUM('M', 'F') NOT NULL,
    child_dob DATE NOT NULL,
    child_place_of_birth VARCHAR(255) NOT NULL,
    child_birth_plurality INT NOT NULL,
    child_weight_at_birth FLOAT NOT NULL,
    child_aid_rendered TEXT,
    mother_name VARCHAR(255) NOT NULL,
    mother_dob DATE NOT NULL,
    mother_place_of_birth VARCHAR(255) NOT NULL,
    mother_residence VARCHAR(255) NOT NULL,
    mother_phone VARCHAR(20) NOT NULL,
    mother_marital_status ENUM('married', 'single', 'widowed', 'divorced') NOT NULL,
    mother_citizenship VARCHAR(100) NOT NULL,
    father_name VARCHAR(255) NOT NULL,
    father_dob DATE NOT NULL,
    father_place_of_birth VARCHAR(255) NOT NULL,
    father_residence VARCHAR(255) NOT NULL,
    father_phone VARCHAR(20) NOT NULL,
    father_marital_status ENUM('married', 'single', 'widowed', 'divorced') NOT NULL,
    father_citizenship VARCHAR(100) NOT NULL,
    declarant_name VARCHAR(255),
    declarant_relation_to_child VARCHAR(100),
    declarant_sex ENUM('M', 'F'),
    declarant_dob DATE,
    declarant_place_of_birth VARCHAR(255),
    declarant_residence VARCHAR(255),
    declarant_phone VARCHAR(20),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);

CREATE TABLE MarriageRegistrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    spouse1_full_name VARCHAR(255) NOT NULL,
    spouse1_sex ENUM('M', 'F') NOT NULL,
    spouse1_dob DATE NOT NULL,
    spouse1_place_of_birth VARCHAR(255) NOT NULL,
    spouse1_citizenship VARCHAR(100) NOT NULL,
    spouse1_previous_marital ENUM('single', 'divorced', 'widowed') NOT NULL,
    spouse1_phone VARCHAR(20) NOT NULL,
    spouse1_residence VARCHAR(255) NOT NULL,
    spouse2_full_name VARCHAR(255) NOT NULL,
    spouse2_sex ENUM('M', 'F') NOT NULL,
    spouse2_dob DATE NOT NULL,
    spouse2_place_of_birth VARCHAR(255) NOT NULL,
    spouse2_citizenship VARCHAR(100) NOT NULL,
    spouse2_previous_marital ENUM('single', 'divorced', 'widowed') NOT NULL,
    spouse2_phone VARCHAR(20) NOT NULL,
    spouse2_residence VARCHAR(255) NOT NULL,
    witness1_full_name VARCHAR(255) NOT NULL,
    witness1_sex ENUM('M', 'F') NOT NULL,
    witness1_dob DATE NOT NULL,
    witness1_citizenship VARCHAR(100) NOT NULL,
    witness1_phone VARCHAR(20) NOT NULL,
    witness1_residence VARCHAR(255) NOT NULL,
    witness2_full_name VARCHAR(255) NOT NULL,
    witness2_sex ENUM('M', 'F') NOT NULL,
    witness2_dob DATE NOT NULL,
    witness2_citizenship VARCHAR(100) NOT NULL,
    witness2_phone VARCHAR(20) NOT NULL,
    witness2_residence VARCHAR(255) NOT NULL,
    marriage_date DATE NOT NULL,
    marriage_place VARCHAR(255) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);


CREATE TABLE DivorceRegistrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    spouse1_full_name VARCHAR(100) NOT NULL,
    spouse1_sex ENUM('M', 'F') NOT NULL,
    spouse1_dob DATE NOT NULL,
    spouse1_place_of_birth VARCHAR(255) NOT NULL,
    spouse1_residence VARCHAR(255) NOT NULL,
    spouse1_phone VARCHAR(20) NOT NULL,
    spouse1_citizenship VARCHAR(100) NOT NULL,
    spouse2_full_name VARCHAR(100) NOT NULL,
    spouse2_sex ENUM('M', 'F') NOT NULL,
    spouse2_dob DATE NOT NULL,
    spouse2_place_of_birth VARCHAR(255) NOT NULL,
    spouse2_residence VARCHAR(255) NOT NULL,
    spouse2_phone VARCHAR(20) NOT NULL,
    spouse2_citizenship VARCHAR(100) NOT NULL,
    marriage_date DATE NOT NULL,
    marriage_place VARCHAR(255) NOT NULL,
    divorce_date DATE NOT NULL,
    divorce_reference_filepath VARCHAR(255) NOT NULL,
    divorce_reason TEXT,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);

CREATE TABLE DeathRegistrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deceased_full_name VARCHAR(100) NOT NULL,
    deceased_title VARCHAR(100) NOT NULL,
    deceased_sex ENUM('M', 'F') NOT NULL,
    deceased_age INT NOT NULL,
    deceased_citizenship VARCHAR(100) NOT NULL,
    death_date DATE NOT NULL,
    death_place VARCHAR(255) NOT NULL,
    death_cause VARCHAR(255),
    death_reference_filename VARCHAR(255) NOT NULL,
    death_reference_filepath VARCHAR(255) NOT NULL,
    declarant_full_name VARCHAR(100) NOT NULL,
    declarant_sex ENUM('M', 'F') NOT NULL,
    declarant_phone VARCHAR(20) NOT NULL,
    declarant_residence VARCHAR(255) NOT NULL,
    declarant_relation ENUM('lived_together', 'relative', 'neighbor', 'other') NOT NULL,
    declarant_relation_other_text TEXT,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);


CREATE TABLE StillbirthRegistrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    child_full_name VARCHAR(255) NOT NULL,
    child_sex ENUM('M', 'F') NOT NULL,
    child_gestational_age_wks INT NOT NULL,
    mother_full_name VARCHAR(255) NOT NULL,
    mother_dob DATE NOT NULL,
    mother_marital_status ENUM('married', 'single', 'widowed', 'divorced', 'separated') NOT NULL,
    mother_residence VARCHAR(255) NOT NULL,
    mother_citizenship VARCHAR(100) NOT NULL,
    mother_phone VARCHAR(20) NOT NULL,
    father_full_name VARCHAR(255),
    father_dob DATE,
    father_marital_status ENUM('married', 'single', 'widowed', 'divorced', 'separated'),
    father_residence VARCHAR(255),
    father_citizenship VARCHAR(100),
    father_phone VARCHAR(20),
    delivery_date DATE NOT NULL,
    delivery_place VARCHAR(255) NOT NULL,
    pregnancy_plurality INT NOT NULL,
    pregnancy_duration INT NOT NULL,
    birth_order INT,
    fetal_death_conditions ENUM(
        'maternal_conditions', 'placenta_complications', 'other_obstetrical_complications',
        'fetal_anomaly', 'fetal_injury', 'fetal_infection', 'other_fetal_conditions'
    ) NOT NULL,
    fetal_death_explanation TEXT DEFAULT NULL,
    reporter_full_name VARCHAR(255) NOT NULL,
    reporter_sex ENUM('M', 'F') NOT NULL,
    reporter_residence VARCHAR(255) NOT NULL,
    reporter_phone VARCHAR(20) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);


CREATE TABLE AdoptionRegistrations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    -- Adopter 1 Information
    adopter1_full_name VARCHAR(255) NOT NULL,
    adopter1_dob DATE NOT NULL,
    adopter1_sex ENUM('M', 'F') NOT NULL,
    adopter1_birthplace VARCHAR(255) NOT NULL,
    adopter1_citizenship VARCHAR(255) NOT NULL,
    adopter1_phone VARCHAR(20) NOT NULL,
    adopter1_residence VARCHAR(255) NOT NULL,
    adopter1_occupation VARCHAR(255) NOT NULL,
    adopter1_relationship_child VARCHAR(255) DEFAULT NULL,
    adopter1_relationship_adopter2 VARCHAR(255) DEFAULT NULL,
    adopter1_relationship_chlds_parent VARCHAR(255) DEFAULT NULL,

    -- Adopter 2 Information (nullable)
    adopter2_full_name VARCHAR(255) DEFAULT NULL,
    adopter2_dob DATE DEFAULT NULL,
    adopter2_sex ENUM('M', 'F') DEFAULT NULL,
    adopter2_birthplace VARCHAR(255) DEFAULT NULL,
    adopter2_citizenship VARCHAR(255) DEFAULT NULL,
    adopter2_phone VARCHAR(20) DEFAULT NULL,
    adopter2_residence VARCHAR(255) DEFAULT NULL,
    adopter2_occupation VARCHAR(255) DEFAULT NULL,
    adopter2_relationship_child VARCHAR(255) DEFAULT NULL,
    adopter2_relationship_adopter1 VARCHAR(255) DEFAULT NULL,
    adopter2_relationship_chlds_parent VARCHAR(255) DEFAULT NULL,

    -- Category of Adopters
    category_of_adopters ENUM('stepparent', 'sole', 'couple', 'cohabitants') NOT NULL,

    -- Child Information
    child_full_name VARCHAR(255) NOT NULL,
    child_dob DATE NOT NULL,
    child_birthplace VARCHAR(255) NOT NULL,
    child_sex ENUM('M', 'F') NOT NULL,
    received_child_from VARCHAR(255) DEFAULT NULL,
    child_placer_address VARCHAR(255) DEFAULT NULL,
    child_placer_phone VARCHAR(20) DEFAULT NULL,

    -- Adoption Information
    adoption_date DATE NOT NULL,
    adoption_type ENUM('domestic', 'intercountry') NOT NULL,

    -- Registration details
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);

CREATE TABLE PaternityRecognitions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    child_full_name VARCHAR(255) NOT NULL,
    child_dob DATE NOT NULL,
    child_birthplace VARCHAR(255) NOT NULL,
    child_sex ENUM('M', 'F') NOT NULL,
    parent1_full_name VARCHAR(255) NOT NULL,
    parent1_dob DATE NOT NULL,
    parent1_sex ENUM('M', 'F') NOT NULL,
    parent1_birthplace VARCHAR(255) NOT NULL,
    parent1_citizenship VARCHAR(255) NOT NULL,
    parent1_occupation VARCHAR(255) NOT NULL,
    parent1_residence VARCHAR(255) NOT NULL,
    parent1_phone VARCHAR(20) NOT NULL,
    parent2_full_name VARCHAR(255) DEFAULT NULL,
    parent2_dob DATE DEFAULT NULL,
    parent2_sex ENUM('M', 'F') DEFAULT NULL,
    parent2_birthplace VARCHAR(255) DEFAULT NULL,
    parent2_citizenship VARCHAR(255) DEFAULT NULL,
    parent2_occupation VARCHAR(255) DEFAULT NULL,
    parent2_residence VARCHAR(255) DEFAULT NULL,
    parent2_phone VARCHAR(20) DEFAULT NULL,
    parents_married_at_birth ENUM('Yes', 'No') DEFAULT NULL,
    parents_married_at_rgstrn ENUM('single', 'married', 'separated', 'divorced') NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);

CREATE TABLE AnnulmentRegistrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    petitioner_full_name VARCHAR(255) NOT NULL,
    petitioner_dob DATE NOT NULL,
    petitioner_sex ENUM('M', 'F') NOT NULL,
    petitioner_residence VARCHAR(255) NOT NULL,
    petitioner_citizenship VARCHAR(255) NOT NULL,
    petitioner_phone VARCHAR(20) NOT NULL,
    petitioner_birthplace VARCHAR(255) NOT NULL,
    respondent_full_name VARCHAR(255) NOT NULL,
    respondent_dob DATE NOT NULL,
    respondent_sex ENUM('M', 'F') NOT NULL,
    respondent_residence VARCHAR(255) NOT NULL,
    respondent_citizenship VARCHAR(255) NOT NULL,
    respondent_phone VARCHAR(20) NOT NULL,
    respondent_birthplace VARCHAR(255) NOT NULL,
    marriage_date DATE NOT NULL,
    marriage_place VARCHAR(255) NOT NULL,
    annulment_reasons TEXT,
    annulment_reference_file_path VARCHAR(255) NOT NULL,
    annulment_date DATE NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);

CREATE TABLE JudicialSeparations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    petitioner_full_name VARCHAR(255) NOT NULL,
    petitioner_sex ENUM('M', 'F') NOT NULL,
    petitioner_dob DATE NOT NULL,
    petitioner_birthplace VARCHAR(255) NOT NULL,
    petitioner_citizenship VARCHAR(255) NOT NULL,
    petitioner_phone VARCHAR(20) NOT NULL,
    petitioner_residence VARCHAR(255) NOT NULL,
    respondent_full_name VARCHAR(255) NOT NULL,
    respondent_sex ENUM('M', 'F') NOT NULL,
    respondent_dob DATE NOT NULL,
    respondent_birthplace VARCHAR(255) NOT NULL,
    respondent_citizenship VARCHAR(255) NOT NULL,
    respondent_phone VARCHAR(20) NOT NULL,
    respondent_residence VARCHAR(255) NOT NULL,
    marriage_date DATE NOT NULL,
    marriage_place VARCHAR(255) NOT NULL,
    separation_reference_path VARCHAR(255) NOT NULL,
    separation_reason TEXT,
    separation_date DATE NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rgstrnt_user INT,
    FOREIGN KEY (rgstrnt_user) REFERENCES Users(user_id)
);";