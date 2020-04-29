<?php

// Xampp da localhost , root ve sisfresiz olur
$servername = "localhost";
$username = "root";
$password = "";
// benim olusturdugum odev database ismi
$dbname = "odev";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // connectionu return ettiriyorum
    return $conn;
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}