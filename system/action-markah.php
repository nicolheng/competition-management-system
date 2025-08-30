<?php

require_once('dbconnection.php');

$ID_peserta=$_POST['ID-peserta'];
session_start();
$ID_hakim=$_SESSION['ID'];
$skor_isi=$_POST['skor-isi'];
$skor_bahasa=$_POST['skor-bahasa'];
$skor_gaya=$_POST['skor-gaya'];
$skor_etika=$_POST['skor-etika'];

$result = mysqli_query($con, "SELECT * FROM markah WHERE ID_peserta ='$ID_peserta' and ID_hakim='$ID_hakim'");

if ($result->num_rows >0) {
    $sql = "UPDATE markah
        SET skor_isi = '$skor_isi', skor_bahasa = '$skor_bahasa', skor_gaya = '$skor_gaya', skor_etika = '$skor_etika'
        WHERE ID_hakim = '$ID_hakim' and ID_peserta = '$ID_peserta';";
    $ubah_markah = mysqli_query($con,$sql);
    
    echo "<script>alert('Markah lama sudah diubah.');
        window.location.href='markah.php';</script>";
}
else {
    $sql = "INSERT INTO markah(ID_peserta, ID_hakim, skor_isi, skor_bahasa, skor_gaya, skor_etika)
        VALUES('$ID_peserta','$ID_hakim','$skor_isi','$skor_bahasa','$skor_gaya','$skor_etika')";
    $masuk_markah = mysqli_query($con,$sql);

    echo "<script>alert('Markah sudah dimasukkan dengan berjaya.');
        window.location.href='markah.php';</script>";
}
?>