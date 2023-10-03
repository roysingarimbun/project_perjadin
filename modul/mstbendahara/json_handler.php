<?php 
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../index.php'); 
}

else{
    include "../../config/koneksi.php";

    $kodeSubUnit = $_GET['kodeSub'];

    $r = mysql_fetch_array(mysql_query("SELECT kode_unit, nama_unit FROM mstunitkerja WHERE nama_unit = '$namaunit'"));

    echo json_encode($r);
}
?>