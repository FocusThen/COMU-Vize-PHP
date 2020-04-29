<?php
// burada sorgu yapilabilir istek atan kisi login olmusmu olmamissa eger login sayfasina yonlendirilir.
// Session yada cookie okunmasi burada yapilabilir.

// config dosyasini ekliyoruz
$conn = require "config.php";

//butun tabloyu gelir diyoruz
$query = "SELECT tblkisiler.kisilerId, 
tblkisiler.ad, 
tblkisiler.telNo,
tblkisiler.cepNo, 
tblkisiler.soyad, 
tblkisiler.unvan, 
tblkisiler.email, 
tblgrups.grupAd FROM tblkisiler INNER JOIN tblgrups
ON tblkisiler.groupId=tblgrups.id ORDER BY tblkisiler.kisilerId";

// bu da diger pdo kullanimi query
// fetchAll dedigimiz icin bize array donduruyor.
$kullanicilar = $conn->query($query)->fetchAll();

// kullanicilari basit kontrolu yappiliyor
// yoksa hata donduruyoruz.
if($kullanicilar){
    // kullanicilari data degiskenine atiyoruz cunku array icinde kullaninca bos gosteriyor.
    $data= $kullanicilar;
    // response array olustuyoruz bunu json cevirmek icin kullanicaz
    // json cunku kolay erisilebiliyor ve frontend kisminda kolaylikla islem yapabilmemize yariyor.
    
    $response = array('kullanicilar' => $data);
    // jsona cevirip gelen istege yolluyoruz.
    echo json_encode($response);
}else{
    $response = array('hata' => "Kullanicilari Getiremedi.");
    echo json_encode($response);
}


