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
    <script src="<?= PROJECT_ROOT ?>src/public/js/site.js"></script>
    <script defer src="<?= PROJECT_ROOT ?>src/public/js/web-components.js"></script>
    <!-- Styles -->
    <link href="<?= PROJECT_ROOT ?>src/public/styles/site.css" rel="stylesheet">
    <link href="<?= PROJECT_ROOT ?>src/public/styles/home.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="<?= PROJECT_ROOT ?>src/public/styles/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="<?= PROJECT_ROOT ?>src/public/styles/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Registration success</title>

    <!-- Custom CSS for this page -->
    <style>
        .message-container {
            text-align: center;
            max-width: 600px;
            margin: 25vh auto;
            background-color: var(--color-neutral-1);
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success-icon {
            color: green;
            font-size: 48px;
            margin-bottom: 20px;
        }

        .success-text {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: var(--color-primary);
        }

        .home-link {
            display: block;
            margin-top: 20px;
            color: var(--color-primary);
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .home-link:hover {
            color: var(--color-secondary);
        }
    </style>
</head>
<div>
    <nav-bar title="Vital Event Registration System" <?= empty($_SESSION['user_id']) ? '' : 'logged-in' ?>>
        <a href="<?= PROJECT_ROOT ?>src/forms/adoption.php" rel="noopener noreferrer">Adoption</a>
        <a href="<?= PROJECT_ROOT ?>src/forms/birth.php" rel="noopener noreferrer">Live birth</a>
        <a href="<?= PROJECT_ROOT ?>src/forms/marriage.php" rel="noopener noreferrer">Marriage</a>
        <a href="<?= PROJECT_ROOT ?>src/forms/separation.php" rel="noopener noreferrer">Legal separation</a>
        <a href="<?= PROJECT_ROOT ?>src/forms/annulment.php" rel="noopener noreferrer">Annulment</a>
        <a href="<?= PROJECT_ROOT ?>src/forms/death.php" rel="noopener noreferrer">Death</a>
        <a href="<?= PROJECT_ROOT ?>src/forms/recognition.php" rel="noopener noreferrer">Parental recognition</a>
        <a href="<?= PROJECT_ROOT ?>src/forms/stillbirth.php" rel="noopener noreferrer">Stillbirth/Fetal deaths</a>
        <a href="<?= PROJECT_ROOT ?>src/forms/divorce.php" rel="noopener noreferrer">Divorce</a>
    </nav-bar>
    <div id="err-container"></div>
    <div class="content">
    <div class="message-container">
        <div class="message">
            <div class="success-text">
                Your data was submitted successfully.
            </div>
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <a href="<?= PROJECT_ROOT?>src/index.php" class="btn">Go to Home Page</a>
        </div>
    </div>
    </div>
    <site-footer></site-footer>
</body>
</html>
