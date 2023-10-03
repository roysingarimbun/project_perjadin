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

  if ($module=='msttingkat_perjadin' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
      
      $kode_perjadin = htmlspecialchars($_POST['kode_perjadin']);
      $uraian = htmlspecialchars($_POST['uraian']);

      $insert = "insert into msttingkat_perjadin (kode_perjadin,
      uraian)  
                      values('$kode_perjadin',
                      '$uraian')";
   
	$result = mysql_query($insert);
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Tingkat Perjalanan Dinas',
    text:  'Data Tingkat Perjalanan Dinas Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttingkat_perjadin');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Tingkat Perjalanan Dinas',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttingkat_perjadin');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='msttingkat_perjadin' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
 
  $kode_perjadin = htmlspecialchars($_POST['kode_perjadin']);
  $uraian = htmlspecialchars($_POST['uraian']);


  

      $update= "UPDATE msttingkat_perjadin SET kode_perjadin = '$kode_perjadin',
                  uraian = '$uraian'
                      WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($update);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Tingkat Perjalanan Dinas',
    text:  'Data Tingkat Perjalanan Dinas Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttingkat_perjadin');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Tingkat Perjalanan Dinas',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttingkat_perjadin');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

  elseif ($module=='msttingkat_perjadin' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
 
		$hapusdata= "DELETE from msttingkat_perjadin WHERE id = '$_POST[id]'";
      
      $result = mysql_query($hapusdata);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Tingkat Perjalanan Dinas',
    text:  'Data Tingkat Perjalanan Dinas Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttingkat_perjadin');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Tingkat Perjalanan Dinas',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=msttingkat_perjadin');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

}
?>
