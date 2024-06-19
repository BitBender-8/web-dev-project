<?php
// invalid variable to conditionally display formatted html
// include database connection file
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "SELECT * FROM user WHERE email= userinput";

    // after check if a record was found
    // if (password_verify($_POST["password"], $user["password_hash"])) {
    //  die("Login successful"); // for testing
    // session_start();
    // session_regenerate_id();
    // $_SESSION['USER_ID'] = $USER["ID"];
    // header("location: ..index);
    // }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login</title>
</head>

<body>
    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?=htmlspecialchars($_POST['email'] ?? '')?>">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Log in</button>
    </form>
</body>

</html>