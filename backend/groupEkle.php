<?php 

$conn = require "config.php";


// login olup olmadigi kontolu yapilir belki emin olmamak ben

$eklenecekGroup = $_POST["groupEkle"];


try{
    
    $query = "INSERT INTO tblgrups (grupAd)
    VALUES ('$eklenecekGroup')";
    
    $conn->exec($query);
    
    echo "New record created successfully";
    header("location: ../views/anaSayfa.html");

}catch(PDOException $e){

    echo $query . "<br>" . $e->getMessage();
}

$conn = null;