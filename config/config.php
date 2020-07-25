<?php
/**
 * User: prof
 * Version : 1.0
 */

//Database parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jvd";

mb_internal_encoding('UTF-8');

// Create database m2l connection
$conn = new PDO('mysql:host=localhost;dbname=jvd;charset=utf8', $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>