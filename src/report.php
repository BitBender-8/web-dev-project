<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vital Events Reports</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <!-- 
        TODO Page returns total counts for each vital event.
        CONSIDER Refer to Requirements.md and add the rest of the form specific reports. 
    -->
    <body>
        <a href="index.php">Home</a>
        <h1>Vital Events Reports</h1>
        <form action="" method="get">
            <label for="event_type">Select Event Type:</label>
            <select id="event_type" name="event_type">
                <option value="">All Events</option>
                <option value="live_births">Live Births</option>
                <option value="deaths">Deaths</option>
                <option value="fetal_deaths">Fetal Deaths/Stillbirths</option>
                <option value="marriages">Marriages</option>
                <option value="divorces">Divorces</option>
                <option value="adoptions">Adoptions</option>
                <option value="recognitions">Recognitions</option>
                <option value="annulments">Annulments</option>
                <option value="judicial_separations">Judicial Separations</option>
            </select>
            <label for="start_date">Start Date (optional):</label>
            <input type="date" id="start_date" name="start_date">
            <label for="end_date">End Date (optional):</label>
            <input type="date" id="end_date" name="end_date">
            <button type="submit">Generate Report</button>
        </form>
        <div id="report_container"></div>
        <script src="script.js"></script>
        <div>
            <p>The date of registration is set to be the date the form was submitted to the website.</p>
        </div>
    </body>
</html>