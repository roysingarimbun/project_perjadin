<link href="../../js/plugins/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
<script type="text/javascript" src="../../js/plugins/sweetalert/dist/sweetalert.min.js"></script>   

<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../index.php'); 
}

else{
  include "../../config/koneksi.php";
  
  $module = $_GET['module'];
  $act    = $_GET['act'];

  if ($module=='users' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	$pass     = md5($_POST['password']);
	$passid   = $_POST['password'];
	
	$t = mysql_query("SELECT * FROM users WHERE username='$_POST[username]' ");
	  $ketemu=mysql_num_rows($t);
	  if ($ketemu > 0){
	    echo "<script language=\"Javascript\">\n";
			echo "window.alert('Username Sudah Pernah Terdaftar');";
			echo "window.location.href='../../mod.php?module=users';";
		echo "</script>";
		 }
		
    else{	
	
	$insert = "insert into users (username,
								 nama_lengkap,
								 password,
								 level,
								 nohp,
								 nip,
								 id_unit,
								 sub_komponen,
								 nama_unit,
								 sub_unit_komponen,
								 nama_sub_unit,
								 email,
								 status)  
										values('$_POST[email]',
												'$_POST[nama_lengkap]',
												'$pass',
												'$_POST[level]',
												'$_POST[nohp]',
												'$_POST[nip]',
												'$_POST[id_unit]',
												'$_POST[sub_komponen]',
												'$_POST[nama_unit]',
												'$_POST[sub_unit_komponen]',
												'$_POST[nama_sub_unit]',
												'$_POST[email]',
												'0')";
   
	$result = mysql_query($insert);
	
	$insert2 = "insert into usersid (username,
								 nama_lengkap,
								 password,
								 level,
								 nohp,
								 nip,
								 id_unit,
								 sub_komponen,
								 nama_unit,
								 sub_unit_komponen,
								 nama_sub_unit,
								 email,
								 status)  
										values('$_POST[email]',
												'$_POST[nama_lengkap]',
												'$passid',
												'$_POST[level]',
												'$_POST[nohp]',
												'$_POST[nip]',
												'$_POST[id_unit]',
												'$_POST[sub_komponen]',
												'$_POST[nama_unit]',
												'$_POST[sub_unit_komponen]',
												'$_POST[nama_sub_unit]',
												'$_POST[email]',
												'0')";
   
	$result = mysql_query($insert2);

	}
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data User System',
    text:  'Data User System Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../mod.php?module=users');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data User System',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../mod.php?module=users');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='users' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
	
	$pass     = md5($_POST['password']);
	$passid   = $_POST['password'];
	
      $update= "UPDATE users SET nama_lengkap = '$_POST[nama_lengkap]',
										level = '$_POST[level]',
										nip = '$_POST[nip]',
										nohp = '$_POST[nohp]',
										password = '$pass',
										id_unit = '$_POST[id_unit]',
										nama_unit = '$_POST[nama_unit]',
										sub_unit_komponen = '$_POST[sub_unit_komponen]',
										nama_sub_unit = '$_POST[nama_sub_unit]',
										email = '$_POST[email]'
                                   WHERE id = '$_POST[id]'";

      $result = mysql_query($update);
	  
	  $update2= "UPDATE usersid SET nama_lengkap = '$_POST[nama_lengkap]',
										level = '$_POST[level]',
										nip = '$_POST[nip]',
										nohp = '$_POST[nohp]',
										password = '$passid',
										id_unit = '$_POST[id_unit]',
										nama_unit = '$_POST[nama_unit]',
										sub_unit_komponen = '$_POST[sub_unit_komponen]',
										nama_sub_unit = '$_POST[nama_sub_unit]',
										email = '$_POST[email]'
                                   WHERE id = '$_POST[id]'";

      $result = mysql_query($update2);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data User System',
    text:  'Data User System Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../mod.php?module=users');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data User System',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../mod.php?module=users');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
	
	elseif ($module=='users' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
      $del= "DELETE FROM users WHERE id = '$_POST[id]'";
      
      $result = mysql_query($del);
	  
	   $del2= "DELETE FROM usersid WHERE id = '$_POST[id]'";
      
      $result = mysql_query($del2);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data User System',
    text:  'Data User System Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../mod.php?module=users');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data User System',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../mod.php?module=users');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
	
	elseif ($module=='users' AND $act=='kirim'){
    if(isset($_POST['kirim_data'])){		  
  
    
	$pass=$_POST['password'];
	$emailuser=$_POST['email'];
	$nmuser=$_POST['username'];
	
	
    $from = "sitisimaslp2m@gmail.com";    
    $to = $emailuser;    
    $subject = "Username dan Password";    
    $message = "Sitisimas UINSU Medan \nUsername :".$nmuser."\nPassword:".$pass;   
    $headers = "From:" . $from;    
    mail($to,$subject,$message, $headers);    
   
   
	  echo "<script language=\"Javascript\">\n";
			echo "window.alert('Kirim Email Telah Berhasil');";
			echo "window.location.href='../../mod.php?module=users';";
		echo "</script>";

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data User System',
    text:  'Data Kirim Email User System Berhasil',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../mod.php?module=users');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data User System',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../mod.php?module=users');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

}
?>
