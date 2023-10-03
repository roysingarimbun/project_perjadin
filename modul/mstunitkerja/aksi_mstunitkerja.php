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

  if ($module=='mstunitkerja' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
      
      $kode_unit = htmlspecialchars($_POST['kode_unit']);
      $nama_unit = htmlspecialchars($_POST['nama_unit']);
      
      $insert = "insert into mstunitkerja (kode_unit
                  , nama_unit)  
                      values('$kode_unit',
                      '$nama_unit'
                      )";
   
	$result = mysql_query($insert);
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Unit Kerja',
    text:  'Data Unit Kerja Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstunitkerja');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Jabatan',
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
  
  elseif ($module=='mstunitkerja' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
 
  $kode_unit = htmlspecialchars($_POST['kode_unit']);
  $nama_unit = htmlspecialchars($_POST['nama_unit']);

  

      $update= "UPDATE mstunitkerja SET kode_unit = '$kode_unit',
                  nama_unit = '$nama_unit'
                                WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($update);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Unit Kerja',
    text:  'Data Unit Kerja Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstunitkerja');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Unit Kerja',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstunitkerja');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

  elseif ($module=='mstunitkerja' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
 
		$hapusdata= "DELETE from mstunitkerja WHERE id = '$_POST[id]'";
      
      $result = mysql_query($hapusdata);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Unit Kerja',
    text:  'Data Unit Kerja Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstunitkerja');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Unit Kerja',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstunitkerja');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

}
?>
