<?php
require_once('dbconnection.php');

$ID_peserta = $_GET['id'];
$nama_peserta=$_POST['nama-peserta'];
$no_kp=$_POST['no-kad-pengenalan'];
$jantina=$_POST['jantina'];
$umur=$_POST['umur'];
$no_telefon=$_POST['no-telefon'];
$kod_kategori=$_POST['kategori'];
$kod_sekolah=$_POST['kod-sekolah'];
$nama_sekolah=$_POST['nama-sekolah'];
$psw_peserta=$_POST['password'];

$result_checkSek = mysqli_query($con,"SELECT * FROM sekolah where kod_sekolah ='$kod_sekolah'");
if ($result_checkSek->num_rows==0) {
    $result_sek = mysqli_query($con,"INSERT INTO sekolah(kod_sekolah,nama_sekolah) VALUES ('$kod_sekolah', '$nama_sekolah'");
}

$sql="UPDATE peserta 
SET nama_peserta ='$nama_peserta', no_kp='$no_kp', jantina='$jantina', umur='$umur', no_telefon='$no_telefon', kod_kategori='$kod_kategori', kod_sekolah='$kod_sekolah', psw_peserta='$psw_peserta'
WHERE ID_peserta=$ID_peserta;";

if ($con->query($sql)==True){
    echo "<script>alert('Maklumat peserta dikemaskini.');
    window.location.href='peserta.php';</script>";
} else {
    echo "<script>alert('Pengubahan maklumat peserta telah gagal.');
    window.location.href='peserta.php';</script>";
}
?>
