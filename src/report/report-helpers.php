<?php
/**
 * @param PDO $pdo The PDO connection object
 * @param string $query_sql The SQL query to execute
 * @param array $query_params An array of parameters for $query_sql
 * @return null | array Returns null if the query doesn't return anything or the result array otherwise.
 */
function queryDatabase(PDO $pdo, string $query_sql, array $query_params): null | array
{
    if ($pdo) {
        try {
            $stmt = $pdo->prepare($query_sql);
            $stmt->execute($query_params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("<div class=err-box>{$e->getMessage()}</div>");
        }
    } else {
        die('<div class="err-box">Something went wrong with the database connection.</div>');
    }
}

/**
 * @param array $results An array of results from the query
 * @param string $title A title for the result table
 * @param array $col_names An associative array that maps each column name in the
 * result array to a human readable column heading
 * @return void
 */
function displayResults(array $results, string $title, array $col_names): void
{
    // Table container for styling
    echo "<div class=\"report-table-container\">
            <div class=\"table-title\">" . htmlspecialchars($title ?? '') . "</div>";

    if (count($results) > 0) {
        echo "<table class=\"report-table\"><thead><tr>";
        // Populate the table heading with the names of columns
        foreach ($col_names as $key => $col_name) {
            echo "<td>" . htmlspecialchars($col_name ?? '') . "</td>";
        }
        echo "</tr></thead>";

        // Populate the table data
        foreach ($results as $row) {
            echo '<tr>';
            foreach ($col_names as $key => $col_name) {
                echo "<td>" . htmlspecialchars((is_numeric($row[$key]))
                    ? floor($row[$key]) : $row[$key] ?? 'No record') . "</td>";
            }
            echo '</tr>';
        }
        echo "</table>";
    } else {
        echo "<p>There are no records</p>";
    }
    echo "</div>";
}
