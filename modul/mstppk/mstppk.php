 <?php
    if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
        header('location:404.php');
    } else {
        $aksi = "modul/mstppk/aksi_mstppk.php";

        $act = isset($_GET['act']) ? $_GET['act'] : '';

        switch ($act) {
            default:
                $mstppk = mysql_query("SELECT * FROM mstppk ");
                $count = mysql_num_rows($mstppk);
    ?>
<style type="text/css">
<!--
.style2 {font-size: 18px}
.style3 {font-size: 36px}
-->
</style>

             <div class="main-content">
                 <div class="page-content">
                     <div class="container-fluid">
                         <form method="post" name="frm">
                             <div class="panel-heading">
                                 <h4 class="panel-title style3">PPK</h4>
                                 <p></p>
                                 <?php
                                    $level = $_SESSION['ses_level'];
                                    ?>
                                 <?php if ($level == 'admin') { ?>
                                     <div class="col-xl-12">
                                         <a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>

                                         <a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstppk&act=tambahmstppk"><i class="fa fa-send"></i> Tambah</a>
                                         <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_mstppk();"><i class="fa fa-edit"></i> Edit</button>
                                         <button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_mstppk();"><i class="fa fa-remove"></i> Hapus </button>
                                     <?php } ?>

                                     <?php
                                        if ($count > 0) {
                                        ?>
                                         <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_mstppk();"><i class="fa fa-desktop"></i> Lihat</button>

                                     <?php } ?>

                                     </div>

                                     <div class="panel-container show">
                                       <div class="panel-content" style="overflow-x: auto">

<table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100" style="text-align: center; vertical-align: middle;">
                                                 <thead>
                                                     <tr>
                                                         <th colspan="6"><span class="style2">PPK</span></th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                 <tr>
                                                   <td width="20" rowspan="2" style='text-align:center'><input type="checkbox" name="select_all" id="select_all" value="" /></td>
                                                   <td width="20" rowspan="2"><strong>No</strong></td>
                                                   <th width="131" rowspan="2"><strong>NIP</strong></th>
                                                   <th width="225" rowspan="2"><strong>NAMA</strong></th>
                                                   <th colspan="2">UNIT KERJA </th>
                                                 </tr>
                                                 <tr>
                                                     <th width="212"><strong>KODE</strong></th>
                                                     <th width="303"><strong>NAMA UNIT </strong></th>
                                                 </tr>
                                                     <?php
                                                        $no = 1;
                                                        $bag = mysql_query("select * from mstppk order by id ");
                                                        while ($bg = mysql_fetch_array($bag)) { ?>
                                                         <tr>
                                                             <td style='text-align:center'>
                                                                 <input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $bg['id']; ?>" />                                                             </td>
                                                             <td><?php echo " $no"; ?></td>
                                                             <td><?php echo " $bg[nip]"; ?></td>
                                                             <td><?php echo " $bg[nama]"; ?></td>
                                                             <td><?php echo " $bg[kdunit]"; ?></td>
                                                             <td><?php echo " $bg[namaunit_kerja]"; ?></td>
                                                         </tr>
                                                     <?php
                                                            $no++;
                                                        } ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                             </div>
                     </div>
                 </div>
             </div>
             </form>

         <?php
                break;
            case "tambahmstppk":
            ?>

             <div class="main-content">
                 <div class="page-content">
                     <div class="container-fluid">

                         <div class="row">
                             <div class="col-12">
                                 <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                     <h4 class="mb-sm-0 font-size-18">Tambah PPK</h4>

                                 </div>
                             </div>
                         </div>
                         <div class="panel-container show">

                             <div class="panel-content p-0">
                                 <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstppk&act=input" id="js-simpandata" method="POST">

                                     <div class="panel-content">
                                         <div class="row">
                                             <div class="col-md-5 mb-10">
                                                 <label class="form-label" for="validationTooltip03">NIP <span class="text-danger">*</span>
                                                 </label>
                                                 <div class="input-group">
                                                     <input type="text" name="nip" class="form-control" id="validationTooltip03" placeholder="Isi NIP" aria-describedby="inputGroupPrepend2" required>
                                                     <div class="invalid-tooltip"> NIP Harus Diisikan </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-5 mb-10">
                                                 <label class="form-label" for="validationTooltip03">NAMA <span class="text-danger">*</span>
                                                 </label>
                                                 <div class="input-group">
                                                     <input type="text" name="nama" class="form-control" id="validationTooltip03" placeholder="Isi Nama" aria-describedby="inputGroupPrepend2" required>
                                                     <div class="invalid-tooltip"> Nama Harus Diisikan </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-5 mb-3">
                                                 <label class="form-label" for="validationTooltip03">NAMA UNIT <span class="text-danger">*</span>
                                                 </label>
                                                 <input type="text" name="namaunit_kerja" class="form-control" id="validationTooltip03" aria-describedby="inputGroupPrepend2" value="
														<?= $namaunit_kerja['nama_unit'] ?>" readonly>
                                                 <div class="invalid-tooltip"> Nama Unit Diisikan </div>
                                             </div>
                                             <div class="col-md-1 mb-3">
                                                 <label class="form-label" for="validationTooltip04">
                                                     <span class="text-danger"></span>
                                                 </label>
                                                 <button type="button" class="btn btn-primary form-control mt-1" id="cariNamaunit">cari</button>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="form-row form-group">
                                         <div class="col-md-6 mb-3">
                                             <a type="submit" href="perjadin.php?module=mstppk" class="btn btn-danger"></i> Kembali</a>
                                             <button type="submit" id="js-simpandata-btn" name="simpan_data" class="btn btn-info pull-right"></i> Simpan</button>
                                         </div>
                                     </div>
                                 </form>

                             </div>
                         </div>
                     </div>

                     <div id="myModalNamaunit" class="modal">
                         <!-- Konten modal -->
                         <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                             <div class="modal-content">
                                 <div class="modal-header bg-primary">
                                     <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                                     <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                                 </div>
                                 <div class="modal-body container mt-2">
                                     <div class="search-container">
                                         <input type="text" class="search-input" placeholder="Cari..." id="searchInputNamaunit">
                                         <button class="search-button">
                                             <i class="fa-solid fa-magnifying-glass" class="search-icon"></i>
                                         </button>
                                     </div>
                                     <table id="dataTable" class="table table-bordered table-hover table-striped popup-table">
                                         <thead>
                                             <tr>
                                                 <th>No. </th>
                                                 <th>Kode Unit</th>
                                                 <th>Nama Unit</th>
                                             </tr>
                                         </thead>
                                         <tbody> <?php
                                                    $index = 1;
                                                    $listKodeunit = mysql_query("SELECT * FROM mstunitkerja");
                                                    while ($namaunit_kerja = mysql_fetch_array($listKodeunit)) { ?>
                                                     <tr onclick="pilihNamaunit('<?= $namaunit_kerja['nama_unit']; ?>')">
                                                     <td> <?= $index++ ?> </td>
                                                     <td> <?= $namaunit_kerja['kode_unit']; ?> </td>
                                                     <td> <?= $namaunit_kerja['nama_unit']; ?> </td>
                                                 </tr> <?php } ?> </tbody>
                                     </table>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Tutup</button>
                                 </div>
                             </div>
                         </div>
                     </div>

                     </main>
                 </div>
             </div>
             </div>

 <?php

        }
    }
    ?>