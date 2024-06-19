<?php
session_start();
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
    <h1>Home</h1>
    <?php if (isset($_SESSION["user_id"])): ?>

    <?php else: ?>
    <?php endif; ?>
</body>

</html>