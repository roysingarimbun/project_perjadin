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

  if ($module == 'mstsatuan' and $act == 'input') {
    if (isset($_POST['simpan_data'])) {

      $insert = "insert into mstsatuan (kode_tahun, nama_satuan, keterangan)  
										values('$_POST[kode_tahun]',
										'$_POST[nama_satuan]','$_POST[keterangan]')";

      $result = mysql_query($insert);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Satuan',
              text: 'Data Satuan Berhasil Disimpan',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstsatuan');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Satuan',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstsatuan');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'mstsatuan' and $act == 'update') {
    if (isset($_POST['edit_data'])) {

      $update = "UPDATE mstsatuan SET kode_tahun = '$_POST[kode_tahun]',
										nama_satuan = '$_POST[nama_satuan]',
										keterangan = '$_POST[keterangan]'
                                   WHERE id = '$_POST[id]'";


      $result = mysql_query($update);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Satuan',
              text: 'Data Satuan Berhasil Diupdate',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstsatuan');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Satuan',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstsatuan');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'mstsatuan' and $act == 'hapus') {
    if (isset($_POST['hapus_data'])) {

      $del = "DELETE FROM mstsatuan WHERE id = '$_POST[id]'";


      $result = mysql_query($del);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Satuan',
              text: 'Data Satuan Berhasil Dihapus',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstsatuan');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Satuan',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstsatuan');
        }, 2000);
      </script>

<?php
    }
    mysql_close($koneksi);
  }
}
?>