<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "databasename";
$dsn = "mysql:host=$host;dbname=$dbname";
try {
    $conn = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOExeception $e) {
    echo "Connection failed".$e->get_message();
}
