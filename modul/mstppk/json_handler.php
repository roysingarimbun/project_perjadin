<?php 
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../index.php'); 
}

else{
    include "../../config/koneksi.php";

    $kodeSubUnit = $_GET['kodeSub'];

    $r = mysql_fetch_array(mysql_query("SELECT sub_komponen, nama_unit, sub_unit_komponen, nama_sub_unit FROM mstsubunitkerja WHERE sub_unit_komponen = '$kodeSubUnit'"));

    echo json_encode($r);
}
?>