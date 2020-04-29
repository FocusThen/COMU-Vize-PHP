<?php 

$conn = require "config.php";

$kisiAd = $_POST["kisiAd"];
$kisiSoyad = $_POST["kisiSoyad"];
$email = $_POST["email"];
$telNo = $_POST["telNo"];
$cepNo = $_POST["cepNo"];
$kisiUnvan = $_POST["kisiUnvan"];
$groupId = $_POST["groupAd"];



try{
    
    $query = "INSERT INTO tblkisiler (ad, soyad, unvan, telNo, cepNo, email, groupId)
    VALUES ('$kisiAd','$kisiSoyad','$kisiUnvan', '$telNo', '$cepNo', '$email', '$groupId')";
    
    $conn->exec($query);
    
    echo "New record created successfully";
    header("location: ../views/anaSayfa.html");

}catch(PDOException $e){

    echo $query . "<br>" . $e->getMessage();
}

$conn = null;