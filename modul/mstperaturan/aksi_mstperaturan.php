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

  if ($module == 'mstperaturan' and $act == 'input') {
    if (isset($_POST['simpan_data'])) {

      $kode_peraturan = htmlspecialchars($_POST['kode_peraturan']);
      $uraian_peraturan = htmlspecialchars($_POST['uraian_peraturan']);

      $insert = "insert into mstperaturan (kode_peraturan,
      uraian_peraturan)  
                      values('$kode_peraturan',
                      '$uraian_peraturan')";

      $result = mysql_query($insert);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Dasar Peraturan',
              text: 'Data Dasar Peraturan Berhasil Disimpan',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstperaturan');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Dasar Peraturan',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstperaturan');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'mstperaturan' and $act == 'update') {
    if (isset($_POST['edit_data'])) {

      $kode_peraturan = htmlspecialchars($_POST['kode_peraturan']);
      $uraian_peraturan = htmlspecialchars($_POST['uraian_peraturan']);



      $update = "UPDATE mstperaturan SET kode_peraturan = '$kode_peraturan',
                  uraian_peraturan = '$uraian_peraturan'
                                WHERE id = '$_POST[id]'";


      $result = mysql_query($update);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Dasar Peraturan',
              text: 'Data Dasar Peraturan Berhasil Diupdate',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstperaturan');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Dasar Peraturan',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstperaturan');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'mstperaturan' and $act == 'hapus') {
    if (isset($_POST['hapus_data'])) {

      $hapusdata = "DELETE from mstperaturan WHERE id = '$_POST[id]'";

      $result = mysql_query($hapusdata);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Dasar Peraturan',
              text: 'Data Dasar Peraturan Berhasil Dihapus',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstperaturan');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Dasar Peraturan',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstperaturan');
        }, 2000);
      </script>

<?php
    }
    mysql_close($koneksi);
  }
}
?>