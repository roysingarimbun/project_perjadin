 <?php
    if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
        header('location:404.php');
    } else {
        $aksi = "modul/mstsubunitkerja/aksi_mstsubunitkerja.php";

        $act = isset($_GET['act']) ? $_GET['act'] : '';

        switch ($act) {
            default:
                $mstsubunitkerja = mysql_query("SELECT * FROM mstsubunitkerja ");
                $count = mysql_num_rows($mstsubunitkerja);
    ?>
             <div class="main-content">
                 <div class="page-content">
                     <div class="container-fluid">
                         <form method="post" name="frm">
                             <div class="panel-heading">
                                 <h4 class="panel-title">DATA SUB UNIT KERJA</h4>
                                 <p></p>
                                 <?php
                                    $level = $_SESSION['ses_level'];
                                    ?>
                                 <?php if ($level == 'admin') { ?>
                                     <div class="col-xl-12">
                                         <a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>

                                         <a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstsubunitkerja&act=tambahmstsubunitkerja"><i class="fa fa-send"></i> Tambah</a>
                                         <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_mstsubunitkerja();"><i class="fa fa-edit"></i> Edit</button>
                                         <button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_mstsubunitkerja();"><i class="fa fa-remove"></i> Hapus </button>
                                     <?php } ?>

                                     <?php
                                        if ($count > 0) {
                                        ?>
                                         <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_mstsubunitkerja();"><i class="fa fa-desktop"></i> Lihat</button>

                                     <?php } ?>

                                     </div>

                                     <div class="panel-container show">
                                         <div class="panel-content" style="overflow-x: auto">

                                             <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100" style="text-align: center; vertical-align: middle;">
                                                 <thead>
                                                     <tr>
                                                         <th rowspan="2"><input type="checkbox" name="select_all" id="select_all" value="" /></th>
                                                         <th rowspan="2">No</th>
                                                         <th colspan="2">UNIT KERJA</th>
                                                         <th colspan="2">SUB UNIT KERJA</th>

                                                     </tr>
                                                     <tr>
                                                         <th>Kode Unit</th>
                                                         <th>Nama Unit</th>
                                                         <th>Kode Sub Unit</th>
                                                         <th>Nama Sub Unit</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php
                                                        $no = 1;
                                                        $bag = mysql_query("select * from mstsubunitkerja order by id ");
                                                        while ($bg = mysql_fetch_array($bag)) { ?>
                                                         <tr>
                                                             <td style='text-align:center'>
                                                                 <input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $bg['id']; ?>" />
                                                             </td>
                                                             <td><?php echo " $no"; ?></td>
                                                             <td><?php echo " $bg[kodeunit]"; ?></td>
                                                             <td><?php echo " $bg[nama_unit_kerja]"; ?></td>
                                                             <td><?php echo " $bg[kodesub_unit]"; ?></td>
                                                             <td><?php echo " $bg[namasub_unit]"; ?></td>
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
            case "tambahmstsubunitkerja":
            ?>

             <div class="main-content">
                 <div class="page-content">
                     <div class="container-fluid">

                         <div class="row">
                             <div class="col-12">
                                 <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                     <h4 class="mb-sm-0 font-size-18">Tambah Sub Unit Kerja</h4>

                                 </div>
                             </div>
                         </div>
                         <div class="panel-container show">

                             <div class="panel-content p-0">
                                 <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstsubunitkerja&act=input" id="js-simpandata" method="POST">

                                     <div class="panel-content">
                                         <div class="row">
                                             <div class="col-md-5 mb-3">
                                                 <label class="form-label" for="validationTooltip04">Nama Unit Kerja<span class="text-danger">*</span></label>
                                                 <input type="text" name="nama_unit_kerja" class="form-control" id="validationTooltip04" readonly>
                                                 <div class="invalid-tooltip">
                                                     Nama Unit Harus Diisikan
                                                 </div>
                                             </div>
                                             <div class="col-md-1 mb-3">
                                                 <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                 <button type="button" class="btn btn-primary form-control mt-1" id="cariNamaSubUnit">cari</button>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-md-6 mb-3">
                                                 <label class="form-label" for="validationTooltip04">Kode Sub Unit <span class="text-danger">*</span></label>
                                                 <input type="text" name="kodesub_unit" class="form-control" id="validationTooltip04" placeholder="Kode Sub Unit" required>
                                                 <div class="invalid-tooltip">
                                                     Kode Sub Unit Harus Diisikan
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-6 mb-3">
                                                 <label class="form-label" for="validationTooltip04">Nama Sub Unit <span class="text-danger">*</span></label>
                                                 <input type="text" name="namasub_unit" class="form-control" id="validationTooltip04" placeholder="Nama Sub Unit" required>
                                                 <div class="invalid-tooltip">
                                                     Nama Sub Unit Harus Diisikan
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="form-row form-group">
                                         <div class="col-md-6 mb-3">
                                             <a type="submit" href="perjadin.php?module=mstsubunitkerja" class="btn btn-danger"></i> Kembali</a>
                                             <button type="submit" id="js-simpandata-btn" name="simpan_data" class="btn btn-info pull-right"></i> Simpan</button>
                                         </div>
                                     </div>
                                 </form>

                             </div>
                         </div>
                     </div>

                     <div id="myModalSubunit" class="modal">
                         <!-- Konten modal -->
                         <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                             <div class="modal-content">
                                 <div class="modal-header bg-primary">
                                     <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                                     <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                                 </div>
                                 <div class="modal-body container mt-2">
                                     <div class="search-container">
                                         <input type="text" class="search-input" placeholder="Cari..." id="searchInputSubunit">
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
                                         <tbody>
                                             <?php
                                                $listSubUnit = mysql_query("SELECT DISTINCT kode_unit, nama_unit FROM mstunitkerja");
                                                $i = 1;
                                                while ($kodeunit = mysql_fetch_array($listSubUnit)) { ?>
                                                 <tr onclick="pilihNamasubunit('<?= $kodeunit['nama_unit'] ?>')">
                                                     <td><?= $i++ ?></td>
                                                     <td><?= $kodeunit['kode_unit'] ?></td>
                                                     <td><?= $kodeunit['nama_unit'] ?></td>
                                                 </tr>
                                             <?php } ?>
                                         </tbody>
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

