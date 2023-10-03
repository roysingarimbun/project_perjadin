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

  if ($module=='mstdatapegawai' AND $act=='input'){
    if(isset($_POST['simpan_data'])){	


      $jab = htmlspecialchars($_POST['jab']);
      $namajab = mysql_query("SELECT namajab FROM mstjabatan WHERE namajab = '$jab'");
      $namajab = mysql_fetch_array($namajab);
      $namajab = $namajab[0];

      $namaunit = htmlspecialchars($_POST['namaunit']);
      $nama_unit = mysql_query("SELECT nama_unit FROM mstunitkerja WHERE nama_unit = '$namaunit'");
      $nama_unit = mysql_fetch_array($nama_unit);
      $nama_unit = $nama_unit[0];
	
      $insert = "insert into mstdatapegawai (peg_iduser,
                                             namapeg, nip, jab, namaunit)  
                                              values('$_POST[peg_iduser]',
                                              '$_POST[namapeg]','$_POST[nip]', '$namajab','$nama_unit')";

   
	$result = mysql_query($insert);
   
if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Data Pegawai Berhasil Disimpan',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstdatapegawai');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstdatapegawai');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='mstdatapegawai' AND $act=='update'){
    if(isset($_POST['edit_data'])){		
      
      $jab = htmlspecialchars($_POST['jab']);
      $namajab = mysql_query("SELECT namajab FROM mstjabatan WHERE namajab = '$jab'");
      $namajab = mysql_fetch_array($namajab);
      $namajab = $namajab[0];

      $namaunit = htmlspecialchars($_POST['namaunit']);
      $nama_unit = mysql_query("SELECT nama_unit FROM mstunitkerja WHERE nama_unit = '$namaunit'");
      $nama_unit = mysql_fetch_array($nama_unit);
      $nama_unit = $nama_unit[0];
  
      $update= "UPDATE mstdatapegawai SET peg_iduser = '$_POST[peg_iduser]',
										                      namapeg = '$_POST[namapeg]',
										                      nip = '$_POST[nip]',
                                          jab = '$jab',
                                          namaunit = '$nama_unit'
                                          WHERE id = '$_POST[id]'";
      $result = mysql_query($update);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Data Pegawai Berhasil Diupdate',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstdatapegawai');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstdatapegawai');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }
	
	elseif ($module=='mstdatapegawai' AND $act=='hapus'){
    if(isset($_POST['hapus_data'])){		  
  
      $del= "DELETE FROM mstdatapegawai WHERE id = '$_POST[id]'";
      
	
      $result = mysql_query($del);

if(!$result){
  echo mysql_error($koneksi);
} else {
  
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Data Pegawai Berhasil Dihapus',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstdatapegawai');
  } ,2000); 
 </script>
	
	<?php
	
}

	} else {
		?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Data Pegawai',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../../perjadin.php?module=mstdatapegawai');
  } ,2000); 
    
    </script>
	
	<?php
	}	
      mysql_close($koneksi);
    }

}
?>
