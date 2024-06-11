<?php
// PDO connection has to be made strictly once! There must be no
// connections inside each function. Multiple connections will kill
// your db.

// Data source name (dsn) param-value pairs.
$dsn_host = 'localhost';
$dsn_dbname = 'vital_events';

// Setting charset through DSN to allow proper handling of characters
$dsn_charset = 'utf8mb4';

$dsn_driver = 'mysql';
$dsn_port = '3306';

// PDO options
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,            // Sets how errors are handled
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Results from query are returned as associative arrays
    PDO::ATTR_EMULATE_PREPARES => false,                    // This is okay as long as you set your charset beforehand - (Look into: Emulated prepares vs Native prepares)
];

$db_passwd = '';
$db_user = 'root';
$dsn = "$dsn_driver:host=$dsn_host;dbname=$dsn_dbname;port=$dsn_port;charset=$dsn_charset";

$pdo = new PDO($dsn, $db_user, $db_passwd, $options);
