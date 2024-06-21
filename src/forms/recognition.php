<!-- <?php
require_once "../includes/declarations.php";
session_start();
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts and custom components -->
     <script src="<?=PROJECT_ROOT?>src/public/js/site.js"></script>
    <script defer src="<?=PROJECT_ROOT?>src/public/js/web-components.js"></script>
    <script defer src="<?=PROJECT_ROOT?>src/public/js/recognition/recognition.js"></script>
    <!-- Styles -->
    <link href="<?=PROJECT_ROOT?>src/public/styles/site.css" rel="stylesheet">
    <link href="<?=PROJECT_ROOT?>src/public/styles/forms.css" rel="stylesheet">
    <!-- Icons -->
    <link href="<?=PROJECT_ROOT?>src/public/styles/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="<?=PROJECT_ROOT?>src/public/styles/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Recognition Registration Form</title>
</head>
<body>
    <nav-bar title="Vital Event Registration System" <?=empty($_SESSION['user_id']) ? '' : 'logged-in'?>>
        <a href="<?=PROJECT_ROOT?>src/forms/adoption.php" rel="noopener noreferrer">Adoption</a>
        <a href="<?=PROJECT_ROOT?>src/forms/birth.php" rel="noopener noreferrer">Live birth</a>
        <a href="<?=PROJECT_ROOT?>src/forms/marriage.php" rel="noopener noreferrer">Marriage</a>
        <a href="<?=PROJECT_ROOT?>src/forms/separation.php" rel="noopener noreferrer">Legal separation</a>
        <a href="<?=PROJECT_ROOT?>src/forms/annulment.php" rel="noopener noreferrer">Annulment</a>
        <a href="<?=PROJECT_ROOT?>src/forms/death.php" rel="noopener noreferrer">Death</a>
        <a href="<?=PROJECT_ROOT?>src/forms/recognition.php" rel="noopener noreferrer">Parental recognition</a>
        <a href="<?=PROJECT_ROOT?>src/forms/stillbirth.php" rel="noopener noreferrer">Stillbirth/Fetal deaths</a>
        <a href="<?=PROJECT_ROOT?>src/forms/divorce.php" rel="noopener noreferrer">Divorce</a>
    </nav-bar>
    <div id="err-container"></div><div class="content">
    <h1>Recognition of Paternity Registration Form</h1>
<?php
// REMOVE 'true'
if (true || !empty($_SESSION["user_id"])) {

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        // Prevents premature header sends
        ob_start();
        require_once "../includes/recognition/recgn-formhandler.php";
        $output = ob_get_clean();
        echo $output;
    }

    require_once "./recognition-form.php";
} else {
    echo "You must log in first.";
}
?>
    </div>
    <site-footer></site-footer>
</body>
</html>