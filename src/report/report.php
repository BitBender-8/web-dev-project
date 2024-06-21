<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/src/includes/declarations.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Scripts and custom components -->
        <script src="<?=PROJECT_ROOT?>src/public/js/site.js"></script>
        <script defer
            src="<?=PROJECT_ROOT?>src/public/js/web-components.js"></script>
        <!-- Styles -->
        <link href="<?=PROJECT_ROOT?>src/public/styles/site.css"
            rel="stylesheet">
        <link href="<?=PROJECT_ROOT?>src/public/styles/forms.css"
            rel="stylesheet">
        <link href="<?=PROJECT_ROOT?>src/public/styles/report.css"
            rel="stylesheet">
        <!-- Icons -->
        <link
            href="<?=PROJECT_ROOT?>src/public/styles/fontawesome/css/all.min.css"
            rel="stylesheet">
        <link
            href="<?=PROJECT_ROOT?>src/public/styles/fontawesome/css/fontawesome.min.css"
            rel="stylesheet">
        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
            rel="stylesheet">
        <title>Vital Event Registration System</title>
    </head>

    <body>
        <nav-bar title="Vital Event Registration System"
            <?=empty($_SESSION['user_id']) ? '' : 'logged-in'?>>
            <a href="/src/forms/adoption.php"
                rel="noopener noreferrer">Adoption</a>
            <a href="/src/forms/birth.php" rel="noopener noreferrer">Live
                birth</a>
            <a href="/src/forms/marriage.php"
                rel="noopener noreferrer">Marriage</a>
            <a href="/src/forms/separation.php" rel="noopener noreferrer">Legal
                separation</a>
            <a href="/src/forms/annulment.php"
                rel="noopener noreferrer">Annulment</a>
            <a href="/src/forms/death.php" rel="noopener noreferrer">Death</a>
            <a href="/src/forms/recognition.php"
                rel="noopener noreferrer">Parental recognition</a>
            <a href="/src/forms/stillbirth.php"
                rel="noopener noreferrer">Stillbirth</a>
            <a href="/src/forms/divorce.php"
                rel="noopener noreferrer">Divorce</a>
        </nav-bar>
        <div id="err-container"></div>
        <div class="content">
            <h1>Vital Event Reports</h1>
            <p>
                Choose the event to generate reports on
                (If you don't specify the start and end date,
                the report will be generated for the lifetime of the event):
            </p>
            <div class="report-selection-form">
                <form method="get">
                    <fieldset>
                        <legend>Event parameters</legend>
                        <div class="input">
                            <label for="event_type">Select Event
                                Type:</label>
                            <select id="event_type" name="event_type">
                                <option value>Select</option>
                                <option value="all">All Events</option>
                                <option value="live_births">Live Births</option>
                                <option value="deaths">Deaths</option>
                                <option value="still_births">Fetal
                                    Deaths/Stillbirths</option>
                                <option value="marriages">Marriages</option>
                                <option value="divorces">Divorces</option>
                                <option value="adoptions">Adoptions</option>
                                <option
                                    value="recognitions">Recognitions</option>
                                <option value="annulments">Annulments</option>
                                <option value="judicial_separations">Judicial
                                    Separations</option>
                            </select>
                        </div>
                        <div class="input"><label for="start_date">Registration
                                start Date (optional):</label>
                            <input type="date" id="start_date"
                                name="start_date">
                        </div>
                        <div class="input"><label for="end_date">
                                Registration end Date (optional):</label>
                            <input type="date" id="end_date" name="end_date">
                        </div>
                    </fieldset>
                    <button class="btn" type="submit">Generate
                        Report</button>
                </form>

                <div class="report-container">
                    <?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' &&
    !empty($_GET['event_type'])) {
    ob_start();
    include "generate-report.php";
    $reportOutput = ob_get_clean();
    echo $reportOutput;
}
?>
                </div>
            </div>
        </div>
    </body>
</html>