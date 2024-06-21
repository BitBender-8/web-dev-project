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
    <script defer src="<?=PROJECT_ROOT?>src/public/js/web-components.js"></script>
    <!-- Styles -->
    <link href="<?=PROJECT_ROOT?>src/public/styles/site.css" rel="stylesheet">
    <link href="<?=PROJECT_ROOT?>src/public/styles/home.css" rel="stylesheet">
    <!-- Icons -->
    <link href="<?=PROJECT_ROOT?>src/public/styles/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="<?=PROJECT_ROOT?>src/public/styles/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Vital Event Registration System</title>
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
        <div class="banner">
            <div class="banner-content">
                <h1>Welcome to Our Service</h1>
                <p>Our platform provides a secure and straightforward way to register vital events. Whether it's the birth of a child, marriage, divorce, or recognition, we ensure accurate and reliable records.</p>
                <?php if (empty($_SESSION['user_id'])) {?>
                <a href="<?= PROJECT_ROOT ?>src/auth/login.php" class="btn btn-log-in">Login</a>
                <a href="<?= PROJECT_ROOT ?>src/auth/signup.php" class="btn btn-register">Register</a>
                <?php }?>
            </div>
        </div>

        <h2>Services Offered</h2>
        <dl class="services-list">
            <dt>Live Birth</dt>
            <dd>Register the birth of a child with comprehensive details including the child's full name, sex, date and place of birth, parents' information, and more.</dd>

            <dt>Marriage</dt>
            <dd>Register legal unions with details of the couple, marriage date and place, and witness information.</dd>

            <dt>Divorce</dt>
            <dd>Record the legal dissolution of a marriage with details of both partners, marriage details, and court references.</dd>

            <dt>Death</dt>
            <dd>Register the passing of an individual, including personal details, cause of death, and evidence if available.</dd>

            <dt>Stillbirth</dt>
            <dd>Capture information related to fetal deaths, including gestational details, parents' information, and conditions contributing to fetal death.</dd>

            <dt>Adoption</dt>
            <dd>Register adoptions, specifying domestic or intercountry adoption, details of applicants, and child's information.</dd>

            <dt>Recognitions</dt>
            <dd>Acknowledge paternity of an illegitimate child with details of both parents, marital status, and conditions at the time of birth.</dd>

            <dt>Annulments</dt>
            <dd>Record the annulment of marriages with details of the couple, marriage details, and court decisions.</dd>

            <dt>Legal Separations</dt>
            <dd>Document legal separations of married couples, including reasons for separation and court references if applicable.</dd>
        </dl>

        <h2>About Us</h2>
        <p>We cater to the general public, facilitating the registration of vital events such as births, marriages, deaths, adoptions, recognitions, annulments, and legal separations. Please note that we handle only registration, not processing.</p>

        <div class="important-notes">
            <h2>Important Notes</h2>
            <p>Once submitted, data cannot be corrected, and records cannot be annulled. Each submission receives a unique registration ID, and users review their data before finalizing submissions. For any assistance or inquiries, please contact our support team.</p>
        </div>

        <div class="additional-info">
            <h2>Additional Information</h2>
            <p>Our platform prioritizes data security and confidentiality. All personal information submitted is encrypted and stored securely. We ensure compliance with data protection laws and regulations to safeguard your information.</p>
            <p>For detailed instructions on filling out each form, please refer to our user guides and FAQs available on our website. Our customer support team is available to assist you during business hours.</p>
            <p>We are committed to providing a user-friendly experience. If you encounter any issues or have feedback, please reach out to us via email or our support portal.</p>
        </div>
    </div>

    <site-footer></site-footer>
</body>
</html>