<?php
error_reporting(0);
include "config/koneksi.php";

function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}
$username = anti_injection($_POST['username']);
$password = anti_injection(md5($_POST['password']));


  $query  = "SELECT * FROM usersperjadin WHERE username='$username' AND password='$password'";
  $login  = mysql_query($query);
  $ketemu = mysql_num_rows($login);
  $r      = mysql_fetch_array($login);

// Apabila username dan password ditemukan
  if ($ketemu > 0){
    session_start();

    $_SESSION['ses_user']     = $r['username'];
    $_SESSION['ses_nama']     = $r['nama_lengkap'];
    $_SESSION['ses_password'] = $r['password'];
    $_SESSION['ses_foto']       = $r['foto'];
    $_SESSION['ses_level']    = $r['level'];
	$_SESSION['ses_nip']    = $r['nip'];
	$_SESSION['ses_id_unit']    = $r['id_unit'];
	$_SESSION['ses_sub_komponen']    = $r['sub_komponen'];
	$_SESSION['ses_nama_unit']    = $r['nama_unit'];
	$_SESSION['ses_sub_unit_komponen']    = $r['sub_unit_komponen'];
	$_SESSION['ses_nama_sub_unit']    = $r['nama_sub_unit'];
	$_SESSION['thnaktif']    = $_POST['tahunaktif'];
	$_SESSION['ses_nohp']    = $r['nohp'];
	$_SESSION['ses_email']    = $r['email'];
	
	
    session_regenerate_id();
    $sid_baru = session_id();
    mysql_query("UPDATE usersperjadin SET id_sesi='$sid_baru' WHERE username='$username'");


    header('location:perjadin.php?module=beranda');
  }
  else{
     echo "<script>alert('Username Atau Password Anda Salah'); window.location = 'index.php'</script>";
  }

?>
