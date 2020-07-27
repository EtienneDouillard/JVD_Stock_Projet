<?php
/**
 * User: prof
 * Version : 1.0
 */

//Database parameters
$servername = 'mysql:host=localhost;dbname=jvd;charset=utf8';
$username = "root";
$password = "";

mb_internal_encoding('UTF-8');

// Create database connection
try{
$bdd = new PDO($servername, $username, $password);
// Check connection
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>