<?php
require_once('dbconnection.php');
$ID_peserta = $_GET['id'];
$sql="DELETE FROM markah WHERE ID_peserta='$ID_peserta'";
$sql2="DELETE FROM peserta WHERE ID_peserta='$ID_peserta'";

if ($con->query($sql)==True){
    if ($con->query($sql2)==True) {
        echo "<script>alert('Maklumat peserta telah dipadam.');
        window.location.href='peserta.php';</script>";
    } else {
        echo "<script>alert('Pemadaman maklumat peserta telah gagal.');
        window.location.href='peserta.php';</script>";
    }
} else {
    echo "<script>alert('Pemadaman maklumat peserta telah gagal.');
    window.location.href='peserta.php';</script>";
}
?>
