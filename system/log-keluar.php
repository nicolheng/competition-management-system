<?php

session_start();
session_unset();
session_destroy();

echo "<script> alert('Anda sudah log keluar! Terima kasih kerana menggunakan sistem ini.');
window.location.href='index.php';</script>";

?>
 