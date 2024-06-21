<?php

/**
 * Generates Live birth reports for a given time period.
 *
 * @param array $time_period Time period condition for filtering data.
 */
function liveBirthReports(array $time_period)
{
    echo '<div class="report-grp">';
    global $pdo;

    // Optional Where clause for live birth SQL queries
    $time_period_conditional = (!empty($time_period['start_date']) && !empty($time_period['end_date'])) ?
    "child_dob BETWEEN :start_date AND :end_date " : 'true';

    // SQL query to list total live births by year
    $live_birth_year_sql =
        "SELECT YEAR(child_dob) AS year, COUNT(*) AS total
     FROM LiveBirthRegistrations
     WHERE $time_period_conditional
     GROUP BY YEAR(child_dob)
     ORDER BY year DESC;";

    $result = queryDatabase(
        $pdo,
        $live_birth_year_sql,
        $time_period
    );
    displayResults(
        $result,
        'Total live birth by year',
        [
            'year' => 'Year',
            'total' => 'Total Live Birth Count per Year',
        ]
    );

    // SQL query to list total live births per sex by year
    $live_birth_per_sex_sql =
        "SELECT child_sex, COUNT(*) AS total
     FROM LiveBirthRegistrations
     WHERE $time_period_conditional
     GROUP BY child_sex";

    $result = queryDatabase(
        $pdo,
        $live_birth_per_sex_sql,
        $time_period
    );
    displayResults(
        $result,
        'Total number of live births by sex',
        [
            'child_sex' => 'Sex',
            'total' => 'Live Birth Count',
        ]
    );

    // SQL query to list total live births by mother's age group in a given date if specified
    $live_birth_per_mthr_age_gr_sql =
        "SELECT
        CASE
            WHEN TIMESTAMPDIFF(YEAR, mother_dob, CURDATE()) BETWEEN 15 AND 19 THEN '15-19'
            WHEN TIMESTAMPDIFF(YEAR, mother_dob, CURDATE()) BETWEEN 20 AND 24 THEN '20-24'
            WHEN TIMESTAMPDIFF(YEAR, mother_dob, CURDATE()) BETWEEN 25 AND 29 THEN '25-29'
            WHEN TIMESTAMPDIFF(YEAR, mother_dob, CURDATE()) BETWEEN 30 AND 34 THEN '30-34'
            WHEN TIMESTAMPDIFF(YEAR, mother_dob, CURDATE()) BETWEEN 35 AND 39 THEN '35-39'
            ELSE '40+'
            END AS AgeGroup,
        COUNT(*) AS Total
        FROM LiveBirthRegistrations
        WHERE $time_period_conditional
        GROUP BY AgeGroup
        ORDER BY AgeGroup";

    $result = queryDatabase(
        $pdo,
        $live_birth_per_mthr_age_gr_sql,
        $time_period
    );
    displayResults(
        $result,
        "Live Births by Mother's Age Group",
        [
            'AgeGroup' => "Mother's Age group",
            'Total' => 'Live Birth Count',
        ]
    );
    echo '</div>';
}

/**
 * Generates still birth reports for a given time period.
 *
 * @param array $time_period Time period condition for filtering data.
 */
function stillBirthReports(array $time_period)
{
    echo '<div class="report-grp">';
    global $pdo;

    // Optional Where clause for still birth SQL queries
    $time_period_conditional = (!empty($_GET['start_date']) && !empty($_GET['end_date'])) ?
    "delivery_date BETWEEN :start_date AND :end_date " : 'true';

    // SQL query that counts the total number of stillbirths
    $still_birth_count_sql = "
    SELECT COUNT(*) AS total
    FROM StillBirthRegistrations
    WHERE $time_period_conditional";

    $result = queryDatabase(
        $pdo,
        $still_birth_count_sql,
        $time_period
    );
    displayResults(
        $result,
        'Total number of still births',
        [
            'total' => 'Total Stillbirth Count',
        ]
    );

    // SQL query that counts the number of stillbirths by gestational age ranges
    $still_birth_cnt_gest_sql =
        "SELECT
    CASE
        WHEN child_gestational_age_wks BETWEEN 1 AND 5 THEN '1-5'
        WHEN child_gestational_age_wks BETWEEN 6 AND 10 THEN '6-10'
        WHEN child_gestational_age_wks BETWEEN 11 AND 15 THEN '11-15'
        WHEN child_gestational_age_wks BETWEEN 16 AND 20 THEN '16-20'
        WHEN child_gestational_age_wks BETWEEN 21 AND 25 THEN '21-25'
        WHEN child_gestational_age_wks BETWEEN 26 AND 30 THEN '26-30'
        WHEN child_gestational_age_wks BETWEEN 31 AND 35 THEN '31-35'
        WHEN child_gestational_age_wks >= 36 THEN '36+'
    END AS AgeGroup,
    COUNT(*) AS Total
    FROM StillbirthRegistrations
    WHERE $time_period_conditional
    GROUP BY AgeGroup
    ORDER BY AgeGroup
    ";

    $result = queryDatabase(
        $pdo,
        $still_birth_cnt_gest_sql,
        $time_period
    );
    displayResults(
        $result,
        'Total number of still births by gestational age',
        [
            'AgeGroup' => "Gestational Age Range",
            'Total' => 'Total Stillbirth Count',
        ]
    );

    echo '</div>';
}

/**
 * Generates marriage reports for a given time period.
 *
 * @param array $time_period Time period condition for filtering data.
 */
function marriageReports(array $time_period)
{
    echo '<div class="report-grp">';
    global $pdo;

    // Optional Where clause for still birth SQL queries
    $time_period_conditional = (!empty($time_period['start_date']) && !empty($time_period['end_date'])) ?
    "marriage_date BETWEEN :start_date AND :end_date " : 'true';

    // SQL query to count couples married by age group
    $marriage_count_by_age_sql =
        "SELECT
    CASE
        WHEN TIMESTAMPDIFF(YEAR, marriage_date, CURDATE()) BETWEEN 15 AND 19 THEN '15-19'
        WHEN TIMESTAMPDIFF(YEAR, marriage_date, CURDATE()) BETWEEN 20 AND 24 THEN '20-24'
        WHEN TIMESTAMPDIFF(YEAR, marriage_date, CURDATE()) BETWEEN 25 AND 29 THEN '25-29'
        WHEN TIMESTAMPDIFF(YEAR, marriage_date, CURDATE()) BETWEEN 30 AND 34 THEN '30-34'
        WHEN TIMESTAMPDIFF(YEAR, marriage_date, CURDATE()) BETWEEN 35 AND 39 THEN '35-39'
        ELSE '40+'
    END AS AgeGroup,
    COUNT(*) AS Total
    FROM MarriageRegistrations
    WHERE $time_period_conditional
    GROUP BY AgeGroup
    ORDER BY AgeGroup;
    ";

    // SQL query to calculate average age of couples at marriage, returning nothing if no records match
    $avg_age_at_marriage_sql =
        "SELECT
    AVG(TIMESTAMPDIFF(YEAR, spouse1_dob, marriage_date)) AS AverageAgeCombined
    FROM MarriageRegistrations
    WHERE $time_period_conditional
    HAVING COUNT(*) > 0;
    ";

    // HACK
    // Optional Where clause for still birth SQL queries
    $time_period_conditional2 = (!empty($time_period['start_date']) && !empty($time_period['end_date'])) ?
    "marriage_date BETWEEN :start_date2 AND :end_date2 " : 'true';
    // SQL query to count marriages by previous marital status
    $marriage_count_by_prev_status_sql =
        "SELECT
    previous_marital_status,
    COUNT(*) AS Total
    FROM (
        SELECT spouse1_previous_marital AS previous_marital_status
        FROM MarriageRegistrations
        WHERE $time_period_conditional
        UNION ALL
        SELECT spouse2_previous_marital AS previous_marital_status
        FROM MarriageRegistrations
        WHERE $time_period_conditional2
    ) AS merged_data
    GROUP BY previous_marital_status;
    ";

    // Query to count couples married by age group
    $result = queryDatabase($pdo, $marriage_count_by_age_sql, $time_period);
    displayResults(
        $result,
        'Count of Couples Married by Age Group',
        [
            'AgeGroup' => 'Age Group',
            'Total' => 'Total Marriages',
        ]
    );

    // Query to calculate average age of couples at marriage
    $result = queryDatabase($pdo, $avg_age_at_marriage_sql, $time_period);
    displayResults(
        $result,
        'Average Age of Couple at Marriage',
        [
            'AverageAgeCombined' => 'Average Age of Spouses at Marriage',
        ]
    );

    if (!empty($time_period)) {
        $time_period['start_date2'] = $time_period['start_date'];
        $time_period['end_date2'] = $time_period['end_date'];
    }
    // Query to count marriages by previous marital status
    $result = queryDatabase($pdo, $marriage_count_by_prev_status_sql, $time_period);
    displayResults(
        $result,
        'Count of Marriages by Previous Marital Status',
        [
            'previous_marital_status' => 'Previous Marital Status',
            'Total' => 'Total Marriages',
        ]
    );

    echo '</div>';
}

/**
 * Generate reports for divorces based on the given time period.
 *
 * @param array $time_period An array containing start_date and end_date for filtering the data.
 */
function divorceReports(array $time_period)
{
    echo '<div class="report-grp">';
    global $pdo;

    // Optional Where clause for divorce SQL queries
    $time_period_conditional = (!empty($time_period['start_date']) && !empty($time_period['end_date'])) ?
    "divorce_date BETWEEN :start_date AND :end_date " : 'true';

    // SQL query that counts the total number of divorces
    $divorce_count_sql =
        "SELECT COUNT(*) AS total
    FROM DivorceRegistrations
    WHERE $time_period_conditional
    ";

    // SQL query that calculates the average duration of marriages ending in divorce
    $avg_divorce_duration_sql =
        "SELECT AVG(DATEDIFF(marriage_date, divorce_date)) AS avg_duration_years
    FROM DivorceRegistrations
    WHERE $time_period_conditional
    ";

    // Query and display divorce counts
    $result = queryDatabase(
        $pdo,
        $divorce_count_sql,
        $time_period
    );
    displayResults(
        $result,
        'Total number of divorces',
        ['total' => 'Total Divorce Count']
    );

    // Query and display average duration of marriages ending in divorce
    $result = queryDatabase(
        $pdo,
        $avg_divorce_duration_sql,
        $time_period
    );
    displayResults(
        $result,
        'Average duration of marriages ending in divorce (in years)',
        ['avg_duration_years' => 'Average Duration (Years)']
    );

    echo '</div>';
}

/**
 * Generates various reports related to adoptions in the given time period.
 *
 * @param array $time_period An array containing start_date and end_date for time-based filtering.
 */
function adoptionReports(array $time_period)
{
    echo '<div class="report-grp">';
    global $pdo;

    // Conditional WHERE clause based on time period
    $time_period_conditional = (!empty($time_period['start_date']) && !empty($time_period['end_date']))
    ? "adoption_date BETWEEN :start_date AND :end_date "
    : "true";

    // Query to get number of children adopted by age group
    $adopted_children_age_sql =
        "SELECT
            CASE
                WHEN TIMESTAMPDIFF(YEAR, child_dob, adoption_date) BETWEEN 0 AND 5 THEN '0-5'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, adoption_date) BETWEEN 6 AND 10 THEN '6-10'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, adoption_date) BETWEEN 11 AND 15 THEN '11-15'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, adoption_date) BETWEEN 16 AND 20 THEN '16-20'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, adoption_date) BETWEEN 21 AND 25 THEN '21-25'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, adoption_date) > 25 THEN '26+'
            END AS AgeGroup,
            COUNT(*) AS Total
        FROM AdoptionRegistrations
        WHERE $time_period_conditional
        GROUP BY AgeGroup
        HAVING COUNT(*) > 0  -- Ensures no rows are returned if no records match
        ORDER BY AgeGroup
    ";

    // Query to get number of adopters by age group
    $adopters_age_sql =
        "SELECT
            CASE
                WHEN adopter1_dob IS NOT NULL THEN TIMESTAMPDIFF(YEAR, adopter1_dob, adoption_date)
                WHEN adopter2_dob IS NOT NULL THEN TIMESTAMPDIFF(YEAR, adopter2_dob, adoption_date)
            END AS Age,
            COUNT(*) AS Total
        FROM AdoptionRegistrations
        WHERE $time_period_conditional
        GROUP BY Age
        HAVING COUNT(*) > 0  -- Ensures no rows are returned if no records match
        ORDER BY Age
    ";

    // Query to get average age of children adopted
    $avg_child_age_sql =
        "SELECT AVG(TIMESTAMPDIFF(YEAR, child_dob, adoption_date)) AS avg_age
        FROM AdoptionRegistrations
        WHERE $time_period_conditional
    ";

    // HACK
    // Optional Where clause for still birth SQL queries
    $time_period_conditional2 = (!empty($time_period['start_date']) && !empty($time_period['end_date'])) ?
    "adoption_date BETWEEN :start_date2 AND :end_date2 " : 'true';
    // Query to get average age of adoptive parents
    $avg_parent_age_sql =
        "SELECT AVG(age) AS avg_age
        FROM (
            SELECT TIMESTAMPDIFF(YEAR, adopter1_dob, adoption_date) AS age
            FROM AdoptionRegistrations
            WHERE $time_period_conditional AND adopter1_dob IS NOT NULL
            UNION ALL
            SELECT TIMESTAMPDIFF(YEAR, adopter2_dob, adoption_date) AS age
            FROM AdoptionRegistrations
            WHERE $time_period_conditional2 AND adopter2_dob IS NOT NULL
        ) AS ages
    ";

    // Execute queries and display results
    echo '<div class="report-grp">';

    // Number of children adopted by age group
    $result = queryDatabase($pdo, $adopted_children_age_sql, $time_period);
    displayResults($result, 'Number of Children Adopted by Age Group', ['AgeGroup' => 'Age Group', 'Total' => 'Number of Children Adopted']);

    // Number of adopters by age group
    $result = queryDatabase($pdo, $adopters_age_sql, $time_period);
    displayResults($result, 'Number of Adopters by Age Group', ['Age' => 'Age of Adopter', 'Total' => 'Number of Adopters']);

    // Average age of children adopted
    $result = queryDatabase($pdo, $avg_child_age_sql, $time_period);
    displayResults($result, 'Average Age of Children Adopted', ['avg_age' => 'Average Age of Children Adopted']);

    // Queries below this have 4 params
    if (!empty($time_period)) {
        $time_period['start_date2'] = $time_period['start_date'];
        $time_period['end_date2'] = $time_period['end_date'];
    }
    // Average age of adoptive parents
    $result = queryDatabase($pdo, $avg_parent_age_sql, $time_period);
    displayResults($result, 'Average Age of Adoptive Parents', ['avg_age' => 'Average Age of Adoptive Parents']);

    echo '</div>';
}

/**
 * Generates reports for Paternity Recognitions for a given time period.
 *
 * @param array $time_period Time period condition for filtering data.
 */
function recognitionReports(array $time_period)
{
    global $pdo;

    // Conditional WHERE clause based on time period
    $time_period_conditional = (!empty($time_period['start_date']) && !empty($time_period['end_date']))
    ? "registration_date BETWEEN :start_date AND :end_date "
    : "true";

    // Query to get number of children recognized by age group
    $recognized_children_age_sql =
        "SELECT
            CASE
                WHEN TIMESTAMPDIFF(YEAR, child_dob, CURDATE()) BETWEEN 0 AND 5 THEN '0-5'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, CURDATE()) BETWEEN 6 AND 10 THEN '6-10'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, CURDATE()) BETWEEN 11 AND 15 THEN '11-15'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, CURDATE()) BETWEEN 16 AND 20 THEN '16-20'
                WHEN TIMESTAMPDIFF(YEAR, child_dob, CURDATE()) > 20 THEN '21+'
            END AS AgeGroup,
            COUNT(*) AS Total
         FROM PaternityRecognitions
         WHERE $time_period_conditional
         GROUP BY AgeGroup
         HAVING COUNT(*) > 0  -- Ensures no rows are returned if no records match
         ORDER BY AgeGroup";

    // Query to get number of recognizers by age group
    $recognizers_age_sql =
        "SELECT
            CASE
                WHEN parent1_dob IS NOT NULL THEN TIMESTAMPDIFF(YEAR, parent1_dob, CURDATE())
                WHEN parent2_dob IS NOT NULL THEN TIMESTAMPDIFF(YEAR, parent2_dob, CURDATE())
            END AS Age,
            COUNT(*) AS Total
         FROM PaternityRecognitions
         WHERE $time_period_conditional
         GROUP BY Age
         HAVING COUNT(*) > 0  -- Ensures no rows are returned if no records match
         ORDER BY Age";

    // Query to get average age of recognized children
    $avg_recognized_child_age_sql =
        "SELECT AVG(TIMESTAMPDIFF(YEAR, child_dob, CURDATE())) AS avg_age
         FROM PaternityRecognitions
         WHERE $time_period_conditional";

    // HACK
    $time_period_conditional2 = (!empty($time_period['start_date']) && !empty($time_period['end_date']))
    ? "registration_date BETWEEN :start_date2 AND :end_date2 "
    : "true";

    // Query to get average age of recognizers
    $avg_recognizer_age_sql =
        "SELECT AVG(age) AS avg_age
         FROM (
             SELECT TIMESTAMPDIFF(YEAR, parent1_dob, CURDATE()) AS age
             FROM PaternityRecognitions
             WHERE $time_period_conditional AND parent1_dob IS NOT NULL
             UNION ALL
             SELECT TIMESTAMPDIFF(YEAR, parent2_dob, CURDATE()) AS age
             FROM PaternityRecognitions
             WHERE $time_period_conditional2 AND parent2_dob IS NOT NULL
         ) AS ages
         ";

    // Execute queries and display results
    echo '<div class="report-grp">';

    // Number of children recognized by age group
    $result = queryDatabase($pdo, $recognized_children_age_sql, $time_period);
    displayResults($result, 'Number of Children Recognized by Age Group', ['AgeGroup' => 'Age Group', 'Total' => 'Number of Children Recognized']);

    // Number of recognizers by age group
    $result = queryDatabase($pdo, $recognizers_age_sql, $time_period);
    displayResults($result, 'Number of Recognizers by Age Group', ['Age' => 'Age of Recognizer', 'Total' => 'Number of Recognizers']);

    // Average age of recognized children
    $result = queryDatabase($pdo, $avg_recognized_child_age_sql, $time_period);
    displayResults($result, 'Average Age of Recognized Children', ['avg_age' => 'Average Age of Recognized Children']);

    // Queries below this have 4 params
    if (!empty($time_period)) {
        $time_period['start_date2'] = $time_period['start_date'];
        $time_period['end_date2'] = $time_period['end_date'];
    }
    // Average age of recognizers
    $result = queryDatabase($pdo, $avg_recognizer_age_sql, $time_period);
    displayResults($result, 'Average Age of Recognizers', ['avg_age' => 'Average Age of Recognizers']);

    echo '</div>';
}

/**
 * Generates reports for death registrations for a given time period.
 *
 * @param array $time_period Time period condition for filtering data.
 */
function deathReports(array $time_period)
{
    echo '<div class="report-grp">';
    global $pdo;

    // Optional Where clause for death SQL queries
    $time_period_conditional = (!empty($time_period['start_date']) && !empty($time_period['end_date'])) ?
    "death_date BETWEEN :start_date AND :end_date " : 'true';

    // SQL query to count total number of deaths
    $death_count_sql = "
        SELECT COUNT(*) AS total
        FROM DeathRegistrations
        WHERE $time_period_conditional
    ";

    $result = queryDatabase($pdo, $death_count_sql, $time_period);
    displayResults(
        $result,
        'Total number of deaths',
        [
            'total' => 'Total Deaths',
        ]
    );

    // SQL query to count deaths by sex
    $death_count_by_sex_sql = "
        SELECT deceased_sex, COUNT(*) AS Total
        FROM DeathRegistrations
        WHERE $time_period_conditional
        GROUP BY deceased_sex
    ";

    $result = queryDatabase($pdo, $death_count_by_sex_sql, $time_period);
    displayResults(
        $result,
        'Total number of deaths by sex',
        [
            'deceased_sex' => 'Sex',
            'Total' => 'Total Deaths',
        ]
    );

    // SQL query to count deaths by age group
    $death_count_by_age_sql = "
        SELECT
            CASE
                WHEN deceased_age BETWEEN 0 AND 5 THEN '0-5'
                WHEN deceased_age BETWEEN 6 AND 10 THEN '6-10'
                WHEN deceased_age BETWEEN 11 AND 20 THEN '11-20'
                WHEN deceased_age BETWEEN 21 AND 30 THEN '21-30'
                WHEN deceased_age BETWEEN 31 AND 40 THEN '31-40'
                WHEN deceased_age BETWEEN 41 AND 50 THEN '41-50'
                ELSE 'Over 50'
            END AS AgeGroup,
            COUNT(*) AS Total
        FROM DeathRegistrations
        WHERE $time_period_conditional
        GROUP BY AgeGroup
        ORDER BY FIELD(AgeGroup, '0-5', '6-10', '11-20', '21-30', '31-40', '41-50', 'Over 50')
    ";

    $result = queryDatabase($pdo, $death_count_by_age_sql, $time_period);
    displayResults(
        $result,
        'Total number of deaths by age group',
        [
            'AgeGroup' => 'Age Group',
            'Total' => 'Total Deaths',
        ]
    );

    echo '</div>';
}

/**
 * Generates reports for annulment registrations, focusing on count and average duration of marriages ending in annulments.
 *
 * @param array $time_period Time period condition for filtering data.
 */
function annulmentReports(array $time_period)
{
    echo '<div class="report-grp">';
    global $pdo;

    // Optional Where clause for annulment SQL queries
    $time_period_conditional = (!empty($time_period['start_date']) && !empty($time_period['end_date'])) ?
    "annulment_date BETWEEN :start_date AND :end_date " : 'true';

    // SQL query to count total number of annulments
    $annulment_count_sql = "
        SELECT COUNT(*) AS total
        FROM AnnulmentRegistrations
        WHERE $time_period_conditional
    ";

    $result = queryDatabase($pdo, $annulment_count_sql, $time_period);
    displayResults(
        $result,
        'Total number of annulments',
        [
            'total' => 'Total Annulments',
        ]
    );

    // SQL query to calculate average duration of marriages ending in annulments
    $avg_duration_sql = "
        SELECT AVG(TIMESTAMPDIFF(YEAR, marriage_date, annulment_date)) AS avg_duration_years
        FROM AnnulmentRegistrations
        WHERE $time_period_conditional
        AND marriage_date IS NOT NULL
        AND annulment_date IS NOT NULL
    ";

    $result = queryDatabase($pdo, $avg_duration_sql, $time_period);
    displayResults(
        $result,
        'Average duration of marriages ending in annulments',
        [
            'avg_duration_years' => 'Average Duration (Years)',
        ]
    );

    echo '</div>';
}

/**
 * Generates reports for judicial separation registrations, focusing on count and average duration of marriages ending in judicial separations.
 *
 * @param array $time_period Time period condition for filtering data.
 */
function judicialSeparationReports(array $time_period)
{
    echo '<div class="report-grp">';
    global $pdo;

    // Optional Where clause for judicial separation SQL queries
    $time_period_conditional = (!empty($time_period['start_date']) && !empty($time_period['end_date'])) ?
    "separation_date BETWEEN :start_date AND :end_date " : 'true';

    // SQL query to count total number of judicial separations
    $separation_count_sql = "
        SELECT COUNT(*) AS total
        FROM JudicialSeparations
        WHERE $time_period_conditional
    ";

    $result = queryDatabase($pdo, $separation_count_sql, $time_period);
    displayResults(
        $result,
        'Total number of judicial separations',
        [
            'total' => 'Total Judicial Separations',
        ]
    );

    // SQL query to calculate average duration of marriages ending in judicial separations
    $avg_duration_sql = "
        SELECT AVG(TIMESTAMPDIFF(YEAR, marriage_date, separation_date)) AS avg_duration_years
        FROM JudicialSeparations
        WHERE $time_period_conditional
        AND marriage_date IS NOT NULL
        AND separation_date IS NOT NULL
    ";

    $result = queryDatabase($pdo, $avg_duration_sql, $time_period);
    displayResults(
        $result,
        'Average duration of marriages ending in judicial separations',
        [
            'avg_duration_years' => 'Average Duration (Years)',
        ]
    );

    echo '</div>';
}
