<?php

require_once('dbconnection.php');

$nama_peserta=$_POST['nama-peserta'];
$no_kp=$_POST['no-kad-pengenalan'];
$jantina=$_POST['jantina'];
$umur=$_POST['umur'];
$no_telefon=$_POST['no-telefon'];
$kod_kategori=$_POST['kategori'];
$kod_sekolah=$_POST['kod-sekolah'];
$nama_sekolah=$_POST['nama-sekolah'];
$psw_peserta=$_POST['password'];

$result_select = mysqli_query($con, "SELECT MAX(CAST(SUBSTRING(ID_peserta, 2, 1) AS int))AS num FROM peserta;");
$row = $result_select -> fetch_assoc();
$ID_peserta = $kod_kategori.(($row['num'])+1);

$result_checkSek = mysqli_query($con,"SELECT * FROM sekolah where kod_sekolah ='$kod_sekolah';");
if ($result_checkSek->num_rows==0) {
    $result_sek = mysqli_query($con,"INSERT INTO sekolah VALUES ('$kod_sekolah', '$nama_sekolah');");
}
$sql="INSERT INTO peserta(ID_peserta, nama_peserta, `no_kp`, jantina, umur, `no_telefon`, kod_kategori, kod_sekolah, psw_peserta)
VALUES ('$ID_peserta', '$nama_peserta', '$no_kp', '$jantina', '$umur', '$no_telefon', '$kod_kategori', '$kod_sekolah', '$psw_peserta')";

$result = mysqli_query($con,$sql);
if ($result) {
    echo "<script>alert('Anda Berjaya mendaftarkan akaun! ID anda ialah ".$ID_peserta."'); 
        window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Pendaftaran gagal! Sila cuba lagi'); 
        window.location.href='sign-up.php';</script>";
}

mysqli_close($con);

?>