<?php
session_start(); // need this anytime you use a session
session_destroy();

header("Location: /src/index.php");
exit;
