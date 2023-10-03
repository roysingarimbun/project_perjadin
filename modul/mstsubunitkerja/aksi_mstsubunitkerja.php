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

  if ($module=='mstsubunitkerja' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	
	
	
	$nama_unit_kerja = htmlspecialchars($_POST['nama_unit_kerja']);
	$kode_unit = mysql_query("SELECT kode_unit FROM mstunitkerja WHERE nama_unit = '$nama_unit_kerja'");
	$kode_unit = mysql_fetch_array($kode_unit);
	$kode_unit = $kode_unit[0];
	$insert = "insert into mstsubunitkerja (kodeunit,
										nama_unit_kerja, kodesub_unit, namasub_unit)  
										values('$kode_unit',
										'$_POST[nama_unit_kerja]','$_POST[kodesub_unit]', '$_POST[namasub_unit]')";
   
	$result = mysql_query($insert);
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Sub Unit Kerja',
    text:  'Data Sub Unit Kerja Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstsubunitkerja');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Sub Unit Kerja',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstsubunitkerja');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='mstsubunitkerja' AND $act=='update'){
    if(isset($_POST['edit_data'])){		  
  
  $nama_unit_kerja = htmlspecialchars($_POST['nama_unit_kerja']);
	$kode_unit = mysql_query("SELECT kode_unit FROM mstunitkerja WHERE nama_unit = '$nama_unit_kerja'");
	$kode_unit = mysql_fetch_array($kode_unit);
	$kode_unit = $kode_unit[0];

  $update= "UPDATE mstsubunitkerja SET kodeunit = '$kode_unit',
                                      nama_unit_kerja = '$nama_unit_kerja',
                                      kodesub_unit = '$_POST[kodesub_unit]',
	                                    namasub_unit = '$_POST[namasub_unit]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($update);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Sub Unit Kerja',
    text:  'Data Sub Unit Kerja Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstsubunitkerja');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Sub Unit Kerja',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstsubunitkerja');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
	
	elseif ($module=='mstsubunitkerja' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
      $del= "DELETE FROM mstsubunitkerja WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($del);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Sub Unit Kerja',
    text:  'Data Sub Unit Kerja Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstsubunitkerja');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Sub Unit Kerja',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstsubunitkerja');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

}
?>
