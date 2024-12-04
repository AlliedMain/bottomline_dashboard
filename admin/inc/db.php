<?php
// Database credentials
define('DB_HOST', 'localhost');  // Database Host
define('DB_USER', 'root');       // Database Username
define('DB_PASS', '');           // Database Password
define('DB_NAME', 'bottomline');     // Database Name

$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
?>
