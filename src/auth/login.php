<?php
require_once "../includes/declarations.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/declarations.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/validators.php";
require_once "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "src/includes/db.php";

$errors_required_fields = [];
$errors_credentials = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST['password'])) {
        $errors_required_fields[] = new FormError(
            'email',
            'Email',
            'Email is required.'
        );
    }
    if (empty($_POST['email'])) {
        $errors_required_fields[] = new FormError(
            'password',
            'Password',
            'Password is required.'
        );
    }
    if (empty($errors_required_fields)) {
        $sql = "SELECT * FROM users WHERE email = ?";

        try {
            if (!empty($pdo)) {
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $_POST['email'],
                ]);

                $user = $stmt->fetch();

                if (!empty($user)) {
                    // Check password
                    if (password_verify($_POST['password'], $user['password_hash'])) {
                        session_start();
                        session_regenerate_id(); // To protect against session fixation attacks
                        $_SESSION['user_id'] = $user['user_id'];
                        header("Location: /src/index.php");
                    }
                } else {
                    $errors_credentials[] = new FormError(
                        'login',
                        'Password and Email',
                        'Invalid credentials'
                    );
                }
            } else {
                die('<p>Something went wrong with the db connection<p>');
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

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
    <link href="/src/public/styles/auth-styles/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Login</title>
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

    <body class="content">
        <div class="login-form">
            <h1>Login</h1>
            <!-- REMOVE Remove novalidate-->
            <form method="post" novalidate>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?=htmlspecialchars($_POST['email'] ?? '')?>"
                        required>
                </div class="input">
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button class="btn" type="submit">Log in</button>
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </form>
        </div>
        <div>
<?php
handleErrors($errors_required_fields, 'Required fields missing');
handleErrors($errors_credentials, 'Invalid credentials');
?>
        </div>
        </div>
    </body>

</html>