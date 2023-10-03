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

  if ($module=='mstppk' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	
  $namaunit_kerja = htmlspecialchars($_POST['namaunit_kerja']);
  $kode_unit = mysql_query("SELECT kode_unit FROM mstunitkerja WHERE nama_unit = '$namaunit_kerja'");
  $kode_unit = mysql_fetch_array($kode_unit);
  $kode_unit = $kode_unit[0];
  
  
	$insert = "insert into mstppk (nip, nama, kdunit, namaunit_kerja)  
									values ('$_POST[nip]','$_POST[nama]',
									'$kode_unit', '$_POST[namaunit_kerja]')";
   
	$result = mysql_query($insert);
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data PPK',
    text:  'Data PPK Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstppk');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data PPK',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstppk');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='mstppk' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
 
      $namaunit_kerja = htmlspecialchars($_POST['namaunit_kerja']);
      $kode_unit = mysql_query("SELECT kode_unit FROM mstunitkerja WHERE nama_unit = '$namaunit_kerja'");
      $kode_unit = mysql_fetch_array($kode_unit);
      $kode_unit = $kode_unit[0];

      $update= "UPDATE mstppk SET nip = '$_POST[nip]',
									nama = '$_POST[nama]',
									kdunit = '$kode_unit',
									namaunit_kerja = '$_POST[namaunit_kerja]'
									WHERE id = '$_POST[id]'";
	
      $result = mysql_query($update);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data PPK',
    text:  'Data PPK Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstppk');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data PPK',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstppk');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

  elseif ($module=='mstppk' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
 
		$hapusdata= "DELETE from mstppk WHERE id = '$_POST[id]'";
      
      $result = mysql_query($hapusdata);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data PPK',
    text:  'Data PPK Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstppk');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data PPK',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstppk');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

}
?>
