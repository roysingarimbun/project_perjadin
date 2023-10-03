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

  if ($module == 'mstdata_satker' and $act == 'input') {
    if (isset($_POST['simpan_data'])) {

      $insert = "insert into mstdata_satker (kode_satker, nama_satker)  
										values('$_POST[kode_satker]',
										'$_POST[nama_satker]')";

      $result = mysql_query($insert);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Satker',
              text: 'Data Satker Berhasil Disimpan',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstdata_satker');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Satker',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstdata_satker');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'mstdata_satker' and $act == 'update') {
    if (isset($_POST['edit_data'])) {

      $update = "UPDATE mstdata_satker SET kode_satker = '$_POST[kode_satker]',
										nama_satker = '$_POST[nama_satker]'
                                   WHERE id = '$_POST[id]'";


      $result = mysql_query($update);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Satker',
              text: 'Data Satker Berhasil Diupdate',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstdata_satker');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Satker',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstdata_satker');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'mstdata_satker' and $act == 'hapus') {
    if (isset($_POST['hapus_data'])) {

      $del = "DELETE FROM mstdata_satker WHERE id = '$_POST[id]'";


      $result = mysql_query($del);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Satker',
              text: 'Data Satker Berhasil Dihapus',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstdata_satker');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Satker',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstdata_satker');
        }, 2000);
      </script>

<?php
    }
    mysql_close($koneksi);
  }
}
?>