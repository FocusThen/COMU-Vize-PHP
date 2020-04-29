<?php

$conn = require "config.php";


$query = "SELECT tblgrups.grupAd, tblgrups.id FROM tblgrups";

$grups = $conn->query($query)->fetchAll();

if($grups){
    $data= $grups;
    
    $response = array('gruplar' => $data);
    echo json_encode($response);
}else{
    $response = array('hata' => "Kullanicilari Getiremedi.");
    echo json_encode($response);
}


