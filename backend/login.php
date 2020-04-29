<?php 

// config dosyasini ekliyoruz
$conn = require "config.php";


// gelen istek de body kisminda kullanici adi ve sifresi aliyoruz
// yoksa zaten undefiend geliyor
$kullaniciAd = $_POST["kullaniciAd"];
$kullaniciSifre = $_POST["kullaniciSifre"];


// query stringimiz veri tabanina yapilacak sorgu
$query = "SELECT kullaniciAd, kullaniciSifre from tbllogin WHERE kullaniciAd='$kullaniciAd' AND kullaniciSifre='$kullaniciSifre'";

// pdo da prepare diye bir sey var emin degilim ne oldunu degistire biliriz.
$kullanicilar = $conn->prepare($query);
// quereyi calistiriyoruz 
$kullanicilar->execute();


// sorgu 1 kisi getirecegi icin fetch dememiz yeterli olucaktir eger bos ise loginden ayrilmayacaktir.
// ayri ayri sorgular yapila bilir inputlarin bos olmasi vb.
if($kullanicilar->fetch()){
    header("location:../views/anaSayfa.html");
    // session yada cookie yaratimi burada olucak cunku kullanici buldu ve ana sayfaya yonlendiriliyor.
}
else{
    header("Location:../login.html");
    // response olarak hata dondurulebilir boyle bir kullanici bulunamadi diye ama 4 gun var.
}