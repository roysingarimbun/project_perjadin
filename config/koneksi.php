<?php 
//Localhost
$server = "localhost";
$username = "root";
$password = "";
$database = "perjadin";

//server Perjadin
//$server = "localhost";
//$username = "eperjadi_root";
//$password = "Ep3Rj@d12023**";
//$database = "eperjadi_data";



// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

?>