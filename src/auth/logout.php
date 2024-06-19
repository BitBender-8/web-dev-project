<?php
session_start(); // need this anytime you use a session
session_destory();

header("Location: index.php");
exit;
