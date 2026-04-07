<?php
function Connect()
{
    $dbhost = "db";          // Must match MySQL service name in docker-compose
    $dbuser = "root";
    $dbpass = "root123";     // Root password in docker-compose
    $dbname = "foodorder";   // Database name

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>