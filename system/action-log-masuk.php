<?php
require_once('dbconnection.php');
$ID = false;
if(isset($_POST['ID'])){
    $ID = $_POST['ID'];
}
$password = false;
if(isset($_POST['password'])){
    $password = $_POST['password'];
}

$result_peserta = mysqli_query($con,"SELECT * FROM peserta where ID_peserta='$ID' and psw_peserta='$password';");
$result_hakim = mysqli_query($con,"SELECT * FROM hakim where ID_hakim='$ID' and psw_hakim='$password';");
session_start();
$user_type="";

if ($result_hakim -> num_rows>0){ 

    $user_type="hakim";
    $_SESSION['user_type']=$user_type;
    $_SESSION['ID']=$ID;
    $row = mysqli_fetch_array($result_hakim);
    $_SESSION['name']=$row['nama_hakim'];
    echo "<script>alert('Anda Berjaya Log Masuk!'); 
    window.location.href='main-menu.php';</script>";

} else if($result_peserta -> num_rows>0){

    $user_type="peserta";
    $_SESSION['user_type']=$user_type;
    $_SESSION['ID']=$ID;
    $row = mysqli_fetch_array($result_peserta);
    $_SESSION['name']=$row['nama_peserta'];
    echo "<script>alert('Anda Berjaya Log Masuk!'); 
    window.location.href='main-menu.php';</script>";

} else {
    echo "<script> alert ('Sila Cuba lagi!');
    window.location.href='index.php';</script>";
}
$con -> close();
?>