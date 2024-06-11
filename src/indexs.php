<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital Event Registration Website</title>
    <link rel="stylesheet" href="./public/styles/styles.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="navbar">
                <div class="brand">
                    <h1>Vital Events</h1>
                </div>
                <button class="hamburger" onclick="toggleSidebar()">&#9776;</button>
            </div>
        </div>
    </header>

    <div class="sidebar" id="sidebar">
        <nav>
            <ul>
                <li><a href="live-birth.html">Live Birth</a></li>
                <li><a href="marriage.html">Marriage</a></li>
                <li><a href="divorce.html">Divorce</a></li>
                <li><a href="death.html">Death</a></li>
                <li><a href="adoption.html">Adoption</a></li>
                <li><a href="recognition.html">Recognitions</a></li>
                <li><a href="annulments.html">Annulments</a></li>
                <li><a href="separation.html">Judicial Separations</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
    <h2>Welcome to the Vital Event Registration Website</h2>
        <p>This website serves as a platform for the general public to register vital events, such as live births, marriages, divorces, deaths, adoptions, recognitions, annulments, and judicial separations. Please note that this site is solely for registration purposes; institutions like the military, police, hospitals, and other related organizations must use alternative means.</p>

        <h2>How It Works</h2>
        <ol>
            <li><strong>Forms:</strong> We offer various forms tailored to different vital events, each with specific fields to capture relevant information accurately.</li>
            <li><strong>Submission Confirmation:</strong> Before final submission, users are presented with a simple report summarizing the entered data. This allows users to review and confirm their submission.</li>
            <li><strong>Reports:</strong> Our website generates reports based on event types and date ranges. These reports provide valuable insights into vital events and can be viewed or downloaded in printable formats like PDF.</li>
        </ol>

        <h2>Forms Available</h2>
        <ol>
        <li>
            <a href="./forms/adoption.php" rel="noopener noreferrer">Adoption</a>
        </li>
        <li>
            <a href="./forms/birth.php" rel="noopener noreferrer">Live birth</a>
        </li>
        <li>
            <a href="./forms/marriage.php" rel="noopener noreferrer">Marriage</a>
        </li>
        <li>
            <a href="./forms/separation.php" rel="noopener noreferrer">Legal separation</a>
        </li>
        <li>
            <a href="./forms/annulment.php" rel="noopener noreferrer">Annulment</a>
        </li>
        <li>
            <a href="./forms/death.php" rel="noopener noreferrer">Death</a>
        </li>
        <li>
            <a href="./forms/recognition.php" rel="noopener noreferrer">Parental recognition</a>
        </li>
        <li>
            <a href="./forms/stillbirth.php" rel="noopener noreferrer">Stillbirth</a>
        </li>
        <li>
            <a href="./forms/divorce.php" rel="noopener noreferrer">Divorce</a>
        </li>
        <li>
            <a href="./report.php" rel="noopener noreferrer">Report</a>
        </li>
    </ol>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
</body>

</html>
