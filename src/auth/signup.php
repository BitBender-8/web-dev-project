<?php
require_once "../includes/declarations.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vital Event Registration - Signup</title>
    <script defer src="/src/public/js/web-components.js"></script>
    <link href="/src/public/styles/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/src/public/styles/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="/src/public/styles/site.css" rel="stylesheet">
    <link href="/src/public/styles/auth-styles/signup.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <nav-bar title="Vital Event Registration System" <?=empty($_SESSION['user_id']) ? '' : 'logged-in'?>>
        <a href="/src/forms/adoption.php" rel="noopener noreferrer">Adoption</a>
        <a href="/src/forms/birth.php" rel="noopener noreferrer">Live
            birth</a>
        <a href="/src/forms/marriage.php" rel="noopener noreferrer">Marriage</a>
        <a href="/src/forms/separation.php" rel="noopener noreferrer">Legal
            separation</a>
        <a href="/src/forms/annulment.php" rel="noopener noreferrer">Annulment</a>
        <a href="/src/forms/death.php" rel="noopener noreferrer">Death</a>
        <a href="/src/forms/recognition.php" rel="noopener noreferrer">Parental
            recognition</a>
        <a href="/src/forms/stillbirth.php" rel="noopener noreferrer">Stillbirth</a>
        <a href="/src/forms/divorce.php" rel="noopener noreferrer">Divorce</a>
    </nav-bar>
    <div class="content">
        <div class="sign-up-form">
            <h1>Sign up</h1>
            <!-- REMOVE remove novalidate when done with debugging -->
            <form action="process-signup.php" method="post" novalidate>
                <div>
                    <label for="first_name">First Name</label>
                    <input type="text" id="email" name="first_name" required maxlength="<?=INPUT_MAXLENGTH_DEFAULT?>">
                </div>
                <div>
                    <label for="middle_name">Middle name</label>
                    <input type="text" id="middle_name" name="middle_name" required
                        maxlength="<?=INPUT_MAXLENGTH_DEFAULT?>">
                </div>
                <div>
                    <label for="last_name">Last name</label>
                    <input type="text" id="last_name" name="last_name" required
                        maxlength="<?=INPUT_MAXLENGTH_DEFAULT?>">
                </div>
                <div>
                    <label for="dob">Date of birth</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div>
                    <label for="principal_residence">Principal residence</label>
                    <input type="text" id="principal_residence" name="principal_residence" required
                        maxlength="<?=INPUT_MAXLENGTH_LONG?>">
                </div>
                <div>
                    <label for="citizenship">Citizenship</label>
                    <input type="text" id="citizenship" name="citizenship" required
                        maxlength="<?=INPUT_MAXLENGTH_DEFAULT?>">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="password" name="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="password_confirm" name="password">Confirm Password</label>
                    <input type="password" id="password_confirm" name="password_confirm" required>
                </div>
                <button type="submit">Sign up</button>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
    <site-footer></site-footer>
</body>

</html>