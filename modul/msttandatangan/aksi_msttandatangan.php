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

  if ($module=='msttandatangan' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	
	$nama_jab = htmlspecialchars($_POST['nama_jab']);
	$kodejab = mysql_query("SELECT kodejab FROM mstjabatan WHERE namajab = '$nama_jab'");
	$kodejab = mysql_fetch_array($kodejab);
	$kodejab = $kodejab[0];


  $unitkerja = htmlspecialchars($_POST['unitkerja']);
	$kode_unit = mysql_query("SELECT kode_unit FROM mstunitkerja WHERE nama_unit = '$unitkerja'");
	$kode_unit = mysql_fetch_array($kode_unit);
	$kode_unit = $kode_unit[0];

	$insert = "insert into msttandatangan (kode, nama, kode_jab, nama_jab, kodeunit, unitkerja)  
										values('$_POST[kode]','$_POST[nama]','$kodejab','$nama_jab','$kode_unit','$unitkerja')";
   
	$result = mysql_query($insert);
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Penandatanganan Dokumen',
    text:  'Data Penandatanganan Dokumen Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttandatangan');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Penandatanganan Dokumen',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttandatangan');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='msttandatangan' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
  
      $nama_jab = htmlspecialchars($_POST['nama_jab']);
      $kodejab = mysql_query("SELECT kodejab FROM mstjabatan WHERE namajab = '$nama_jab'");
      $kodejab = mysql_fetch_array($kodejab);
      $kodejab = $kodejab[0];
    
    
      $unitkerja = htmlspecialchars($_POST['unitkerja']);
      $kode_unit = mysql_query("SELECT kode_unit FROM mstunitkerja WHERE nama_unit = '$unitkerja'");
      $kode_unit = mysql_fetch_array($kode_unit);
      $kode_unit = $kode_unit[0];

  $update= "UPDATE msttandatangan SET kode = '$_POST[kode]',                                      
                                      nama = '$_POST[nama]',	                                    
                                      kode_jab = '$kodejab',
                                      nama_jab = '$nama_jab',
                                      kodeunit = '$kode_unit',
                                      unitkerja = '$unitkerja'
                                WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($update);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Penandatanganan Dokumen',
    text:  'Data Penandatanganan Dokumen Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttandatangan');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Penandatanganan Dokumen',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttandatangan');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
	
	elseif ($module=='msttandatangan' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
      $del= "DELETE FROM msttandatangan WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($del);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Penandatanganan Dokumen',
    text:  'Data Penandatanganan Dokumen Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttandatangan');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Penandatanganan Dokumen',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttandatangan');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

}
?>
