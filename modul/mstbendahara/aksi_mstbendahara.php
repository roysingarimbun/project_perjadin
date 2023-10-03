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

  if ($module == 'mstbendahara' and $act == 'input') {
    if (isset($_POST['simpan_data'])) {


      $namaunit = htmlspecialchars($_POST['namaunit']);
      $kode_unit = mysql_query("SELECT kode_unit FROM mstunitkerja WHERE nama_unit = '$namaunit'");
      $kode_unit = mysql_fetch_array($kode_unit);
      $kode_unit = $kode_unit[0];


      $insert = "insert into mstbendahara (nip_bend, nama_bend, kdunit_bend, namaunit)  
									values ('$_POST[nip_bend]','$_POST[nama_bend]',
									'$kode_unit', '$_POST[namaunit]')";

      $result = mysql_query($insert);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Bendahara',
              text: 'Data Bendahara Berhasil Disimpan',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstbendahara');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Bendahara',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstbendahara');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'mstbendahara' and $act == 'update') {
    if (isset($_POST['edit_data'])) {

      $namaunit = htmlspecialchars($_POST['namaunit']);
      $kode_unit = mysql_query("SELECT kode_unit FROM mstunitkerja WHERE nama_unit = '$namaunit'");
      $kode_unit = mysql_fetch_array($kode_unit);
      $kode_unit = $kode_unit[0];

      $update = "UPDATE mstbendahara SET nip_bend = '$_POST[nip_bend]',
									nama_bend = '$_POST[nama_bend]',
									kdunit_bend = '$kode_unit',
									namaunit = '$_POST[namaunit]'
									WHERE id = '$_POST[id]'";

      $result = mysql_query($update);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Bendahara',
              text: 'Data Bendahara Berhasil Diupdate',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstbendahara');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Bendahara',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstbendahara');
        }, 2000);
      </script>

      <?php
    }
    mysql_close($koneksi);
  } elseif ($module == 'mstbendahara' and $act == 'hapus') {
    if (isset($_POST['hapus_data'])) {

      $hapusdata = "DELETE from mstbendahara WHERE id = '$_POST[id]'";

      $result = mysql_query($hapusdata);

      if (!$result) {
        echo mysql_error($koneksi);
      } else {

      ?>
        <script type="text/javascript">
          setTimeout(function() {
            swal({
              title: 'Data Bendahara',
              text: 'Data Bendahara Berhasil Dihapus',
              type: 'success',
              timer: 4000,
              showConfirmButton: true
            });
          }, 10);
          window.setTimeout(function() {
            window.location.replace('../../perjadin.php?module=mstbendahara');
          }, 2000);
        </script>

      <?php

      }
    } else {
      ?>
      <script type="text/javascript">
        setTimeout(function() {
          swal({
            title: 'Data Bendahara',
            text: 'Link Tidak Valid',
            type: 'warning',
            timer: 2000,
            showConfirmButton: true
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('../../perjadin.php?module=mstbendahara');
        }, 2000);
      </script>

<?php
    }
    mysql_close($koneksi);
  }
}
?>