<link href="../../js/plugins/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
<script type="text/javascript" src="../../js/plugins/sweetalert/dist/sweetalert.min.js"></script>

<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../../index.php');
} else {
  include "../../config/koneksi.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  if ($module == 'inputusul' and $act == 'input') {
    if (isset($_POST['simpan_data'])) {

      $lokasi_file    = $_FILES['fupload']['tmp_name'];
      $nama_file     = $_FILES['fupload']['name'];    
      $error           =  $_FILES['fupload']['error'];
      $ukuran_file           =  $_FILES['fupload']['size'];;
      $nama_file_unik = $acak.$nama_file; 

      //check file yang di upload
      $extensifileValid =  ['pdf'];
      $extensifile =  explode('.',$nama_file);
      $extensifile = strtolower(end($extensifile));
    
      // folder untuk menyimpan file yang di upload
        $folder = "../../files/files_dokumen/";
        $file_upload = $folder . $nama_file_unik;
        // upload file
        move_uploaded_file($_FILES["fupload"]["tmp_name"], $file_upload);
 
        
        
        $lokasi_file2   = $_FILES['fupload2']['tmp_name'];
        $nama_file2    = $_FILES['fupload2']['name'];    
        $acak2       = rand(1,99);
        $nilrand2           = rand(1,99);
        $nama_file_unik2 = $acak2.$nilrand2.$nama_file2; 
      
      
        // folder untuk menyimpan file yang di upload
          $folder2 = "../../files/";
          $file_upload2 = $folder2 . $nama_file_unik2;
          // upload file
          move_uploaded_file($_FILES["fupload2"]["tmp_name"], $file_upload2);
     
      $idperjadin = null;
      $tahun = $_POST[tahun];

      $like = "JE." . $tahun;
      $maxId = mysql_fetch_row(mysql_query("SELECT MAX(id_perjadin) FROM inputusul WHERE id_perjadin LIKE '$like%'"));

      if (!$maxId[0]) {
        $idperjadin = "JE." . $tahun . ".0001";
      } else {
        $index = (int)end(explode(".", $maxId[0])) + 1;
        $maxId = str_pad($index, 4, "0", STR_PAD_LEFT);
        $idperjadin = "JE." . $tahun . "." . $maxId;
      }
     
      $tanggal = htmlspecialchars($_POST['tanggal']);
      $tahun =  htmlspecialchars($_POST['tahun']);
      $id_perjadin = htmlspecialchars($_POST['id_perjadin']);
      $namaoperator = htmlspecialchars($_POST['namaoperator']);
      $nip = htmlspecialchars($_POST['nip']);
      $unitker = htmlspecialchars($_POST['unitker']);
      $subunitker = htmlspecialchars($_POST['subunitker']);
      $kegiatan = htmlspecialchars($_POST['kegiatan']);
      $lamaperjadin = htmlspecialchars($_POST['lamaperjadin']);
      $tglberangkat = htmlspecialchars($_POST['tglberangkat']);
      $tglkembali = htmlspecialchars($_POST['tglkembali']);
      $namakota = htmlspecialchars($_POST['namakota']);
      $alamatlengkap = htmlspecialchars($_POST['alamatlengkap']);
      $prov = htmlspecialchars($_POST['prov']);
      $surat = upload_file();
      $undangan =  upload_file();;



      $insert = "insert into inputusul (tanggal, tahun, id_perjadin, namaoperator,
                                      nip, unitker, subunitker, kegiatan,
                                      lamaperjadin, tglberangkat, tglkembali, namakota,
                                      alamatlengkap, prov, surat, undangan)  
										values('$id', '$tanggal', '$tahun', '$id_perjadin', '$namaoperator',
                    '$nip','$unitker','$subunitker','$kegiatan',
                    '$lamaperjadin','$tglberangkat','$tglkembali','$namakota',
                    '$alamatlengkap','$prov','$surat','$undangan')";

      $result = mysql_query($insert);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Usulan Perjalanan Dinas',
              text: 'Data Usulan Perjalanan Dinas Berhasil Disimpan',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=inputusul');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Usulan Perjalanan Dinas',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=inputusul');
        }, 2000);
      </script>

<?php
	}	
      mysql_close($koneksi);
    }
  
  elseif ($module=='inputusul' AND $act=='detail'){
    if(isset($_POST['entry_data_detail'])){
// =========== SQL PENGAMBILAN DATA KODE TERBESAR ============ //
$id_perjadin = htmlspecialchars($_POST['id_perjadin']);
$query = mysql_query ("SELECT MAX(id_detail) as kodemax FROM detail_inputusul WHERE id_awal = '$id_perjadin'");
$hasil_query = mysql_fetch_array($query);
$kodemax = $hasil_query['kodemax'];

if(empty($kodemax)){
  $hasil_urutan = '001';
}else{
  $urutan= (int)substr($kodemax,-3,3);
  $urutan++;
  $hasil_urutan = str_pad($urutan,3,"0",STR_PAD_LEFT);
};
      $kode_ss = htmlspecialchars($_POST['kode_ss']);
      $uraian_ss = htmlspecialchars($_POST['uraian_ss']);
      $kode_ik = htmlspecialchars($_POST['kode_ik']);
      $uraian_ik = htmlspecialchars($_POST['uraian_ik']);
      $sat = htmlspecialchars($_POST['sat']);
      $vol = htmlspecialchars($_POST['vol']);
      $target_sem = htmlspecialchars($_POST['target_sem']);
      $target_tahun = htmlspecialchars($_POST['target_tahun']);
      $id_detail = $idkonkin . '.' . $hasil_urutan; 
      $entry= "INSERT INTO detailmstkonkinpegawai(id_awal,id_detail,kode_ss,uraian_ss,kode_ik,uraian_ik,sat,vol,target_sem1,target_tahun)
                          VALUES('$idkonkin','$id_detail','$kode_ss','$uraian_ss','$kode_ik','$uraian_ik','$sat','$vol','$target_sem','$target_tahun')";
      
      
$result = mysql_query($entry);
if(!$result){
  ?>
	<script type="text/javascript">
	 
	   setTimeout(function () {  
   swal({
    title: 'Entry Detail Usulan Perjalanan Dinas',
    text:  'Link Tidak Valid',
    type: 'warning',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
    window.location = document.referrer + '&chk=<?php echo $_POST['id']; ?>'
  } ,2000); 
    
    </script>
	
	<?php
} else {
	?>
	<script type="text/javascript">
  setTimeout(function () {  
   swal({
    title: 'Entry Detail Usulan Konkin',
    text:  'Data Detail Usulan Konkin Berhasil DiEntry',
    type: 'success',
    timer: 4000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
    window.location = document.referrer + '&chk=<?php echo $_POST['id']; ?>'
  } ,2000); 
 </script>
	


      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'inputusul' and $act == 'update') {
    if (isset($_POST['edit_data'])) {

      $update = "UPDATE inputusul SET kodejab = '$_POST[kodejab]',
										namajab = '$_POST[namajab]',
										klasifikasi = '$_POST[klasifikasi]'
                                   WHERE id = '$_POST[id]'";


      $result = mysql_query($update);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Usulan Perjalanan Dinas',
              text: 'Data Usulan Perjalanan Dinas Berhasil Diupdate',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=inputusul');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Usulan Perjalanan Dinas',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=inputusul');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'inputusul' and $act == 'hapus') {
    if (isset($_POST['hapus_data'])) {

      $del = "DELETE FROM inputusul WHERE id = '$_POST[id]'";


      $result = mysql_query($del);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Usulan Perjalanan Dinas',
              text: 'Data Usulan Perjalanan Dinas Berhasil Dihapus',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=inputusul');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Usulan Perjalanan Dinas',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=inputusul');
        }, 2000);
      </script>
      elseif ($module=='inputusul' AND $act=='upload'){
      if(isset($_POST['upload_data'])){

      $lokasi_file = $_FILES['fupload']['tmp_name'];
      $nama_file = $_FILES['fupload']['name'];
      $acak = rand(1,99);
      $nilrand = rand(1,99);
      $nama_file_unik = $acak.$nilrand.$nama_file;

      $ftfile = "SELECT * from inputusul where id='$_POST[id]'";
      $lfile = mysqli_query($koneksi,$ftfile);
      $r = mysqli_fetch_array($lfile);

      if ($r['surat']!=''){
      $namafile = $r['surat'];

      // hapus filenya
      unlink("../../files/$namafile");

      }

      // folder untuk menyimpan file yang di upload
      $folder = "../../files/";
      $file_upload = $folder . $nama_file_unik;
      // upload file
      move_uploaded_file($_FILES["fupload"]["tmp_name"], $file_upload);


      $update= "UPDATE inputusul SET dokumen='$nama_file_unik'
      WHERE id = '$_POST[id]'";


      $result = mysqli_query($koneksi,$update);



      if(!$result){
      echo mysqli_error($koneksi);
      } else {

      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Upload Dokumen',
            text: 'Upload Dokumen Berhasil Disimpan',
            type: 'success',
            timer: 4000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../app.php?module=inputusul');
        }, 2000);
      </script>

    <?php

    }
  } else {
    ?>
    <script type="text/javascript">
      setTimeout(function() {
        swal({
          title: 'Upload Dokumen',
          text: 'Link Tidak Valid',
          type: 'warning',
          timer: 2000,
          showConfirmButton: true
        });
      }, 10);
      window.setTimeout(function() {
        window.location.replace('../../app.php?module=inputusul');
      }, 2000);
    </script>
<?php
  }
  mysql_close($koneksi);
}

?>