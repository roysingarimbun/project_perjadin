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

  if ($module=='mstjabatan' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	$insert = "insert into mstjabatan (kodejab,
										namajab, klasifikasi)  
										values('$_POST[kodejab]',
										'$_POST[namajab]','$_POST[klasifikasi]')";
   
	$result = mysql_query($insert);
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Nama Jabatan',
    text:  'Data Nama Jabatan Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstjabatan');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Nama Jabatan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstjabatan');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='mstjabatan' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
  
      $update= "UPDATE mstjabatan SET kodejab = '$_POST[kodejab]',
										namajab = '$_POST[namajab]',
										klasifikasi = '$_POST[klasifikasi]'
                                   WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($update);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Nama Jabatan',
    text:  'Data Nama Jabatan Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstjabatan');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Nama Jabatan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstjabatan');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
	
	elseif ($module=='mstjabatan' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
      $del= "DELETE FROM mstjabatan WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($del);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Nama Jabatan',
    text:  'Data Nama Jabatan Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstjabatan');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Nama Jabatan',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstjabatan');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

}
?>
