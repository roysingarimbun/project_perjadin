 <?php
    if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
        header('location:404.php');
    } else {
        $aksi = "modul/msttandatangan/aksi_msttandatangan.php";

        $act = isset($_GET['act']) ? $_GET['act'] : '';

        switch ($act) {
            default:
                $msttandatangan = mysql_query("SELECT * FROM msttandatangan ");
                $count = mysql_num_rows($msttandatangan);
    ?>
             <div class="main-content">
                 <div class="page-content">
                     <div class="container-fluid">
                         <form method="post" name="frm">
                             <div class="panel-heading">
                                 <h4 class="panel-title">DATA PENANDATANGANAN DOKUMEN</h4>
                                 <p></p>
                                 <?php
                                    $level = $_SESSION['ses_level'];
                                    ?>
                                 <?php if ($level == 'admin') { ?>
                                     <div class="col-xl-12">
                                         <a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>

                                         <a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=msttandatangan&act=tambahmsttandatangan"><i class="fa fa-send"></i> Tambah</a>
                                         <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_msttandatangan();"><i class="fa fa-edit"></i> Edit</button>
                                         <button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_msttandatangan();"><i class="fa fa-remove"></i> Hapus </button>
                                     <?php } ?>

                                     <?php
                                        if ($count > 0) {
                                        ?>
                                         <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_msttandatangan();"><i class="fa fa-desktop"></i> Lihat</button>

                                     <?php } ?>

                                     </div>

                                     <div class="panel-container show">
                                         <div class="panel-content" style="overflow-x: auto">

                                             <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100" style="text-align: center; vertical-align: middle;">
                                                 <thead>
                                                     <tr>
                                                         <th colspan="8">PENANDATANGANAN DOKUMEN </th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php
                                                        $no = 1;
                                                        $bag = mysql_query("select * from msttandatangan order by id ");
                                                        while ($bg = mysql_fetch_array($bag)) { ?>
                                                         <tr>
                                                           <td style='text-align:center'><input type="checkbox" name="select_all" id="select_all" value="" /></td>
                                                           <th>No.</th>
                                                           <th>KODE</th>
                                                           <th>NAMA</th>
                                                           <th>KODE JABATAN</th>
                                                           <th>NAMA JABATAN</th>
                                                           <th>KODE UNIT</th>
                                                           <th>UNIT KERJA</th>
                                                         </tr>
                                                         <tr>
                                                             <td style='text-align:center'>
                                                                 <input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $bg['id']; ?>" />                                                             </td>
                                                             <td><?php echo " $no"; ?></td>
                                                             <td><?php echo " $bg[kode]"; ?></td>
                                                             <td><?php echo " $bg[nama]"; ?></td>
                                                             <td><?php echo " $bg[kode_jab]"; ?></td>
                                                             <td><?php echo " $bg[nama_jab]"; ?></td>
                                                             <td><?php echo " $bg[kodeunit]"; ?></td>
                                                             <td><?php echo " $bg[unitkerja]"; ?></td>
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
            case "tambahmsttandatangan":
            ?>

             <div class="main-content">
                 <div class="page-content">
                     <div class="container-fluid">

                         <div class="row">
                             <div class="col-12">
                                 <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                     <h4 class="mb-sm-0 font-size-18">Tambah Penandatangan Dokumen</h4>

                                 </div>
                             </div>
                         </div>
                         <div class="panel-container show">

                             <div class="panel-content p-0">
                                 <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=msttandatangan&act=input" id="js-simpandata" method="POST">

                                     <div class="panel-content">

                                         <div class="row">
                                             <div class="col-md-3">
                                                 <div class="mb-3">
                                                     <label for="kode" class="form-label">KODE</label>
                                                     <input type="text" name="kode" class="form-control" id="kode" placeholder="Isi Kode" required>
                                                     <div class="invalid-tooltip">
                                                         Data Kode Harus Diisi
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="mb-3">
                                                     <label for="nama" class="form-label">NAMA</label>
                                                     <input type="text" name="nama" class="form-control" id="nama" placeholder="Isi Nama" required>
                                                     <div class="invalid-tooltip">
                                                         Data Nama Harus Diisi
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-md-5 mb-3">
                                                 <label class="form-label" for="validationTooltip04">NAMA JABATAN<span class="text-danger">*</span></label>
                                                 <input type="text" name="nama_jab" class="form-control" id="validationTooltip04" readonly>
                                                 <div class="invalid-tooltip">
                                                     Nama Jabatan Harus Diisikan
                                                 </div>
                                             </div>
                                             <div class="col-md-1 mb-3">
                                                 <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                 <button type="button" class="btn btn-primary form-control mt-1" id="cariNamajabatan">cari</button>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-md-5 mb-3">
                                                 <label class="form-label" for="validationTooltip04">NAMA UNIT KERJA<span class="text-danger">*</span></label>
                                                 <input type="text" name="unitkerja" class="form-control" id="validationTooltip04" readonly>
                                                 <div class="invalid-tooltip">
                                                     Nama Unit Harus Diisikan
                                                 </div>
                                             </div>
                                             <div class="col-md-1 mb-3">
                                                 <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                 <button type="button" class="btn btn-primary form-control mt-1" id="cariUnitkerja">cari</button>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-row form-group">
                                         <div class="col-md-6 mb-3">
                                             <a type="submit" href="perjadin.php?module=msttandatangan" class="btn btn-danger"></i> Kembali</a>
                                             <button type="submit" id="js-simpandata-btn" name="simpan_data" class="btn btn-info pull-right"></i> Simpan</button>
                                         </div>
                                     </div>
                                 </form>

                             </div>
                         </div>
                     </div>

                     <div id="myModalNamajabatan" class="modal">
                         <!-- Konten modal -->
                         <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                             <div class="modal-content">
                                 <div class="modal-header bg-primary">
                                     <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                                     <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                                 </div>
                                 <div class="modal-body container mt-2">
                                     <div class="search-container">
                                         <input type="text" class="search-input" placeholder="Cari..." id="searchInputNamajabatan">
                                         <button class="search-button">
                                             <i class="fa-solid fa-magnifying-glass" class="search-icon"></i>
                                         </button>
                                     </div>
                                     <table id="dataTable" class="table table-bordered table-hover table-striped popup-table">
                                         <thead>
                                             <tr>
                                                 <th>No. </th>
                                                 <th>Kode Jabatan</th>
                                                 <th>Nama Jabatan</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                                $listNamajabatan = mysql_query("SELECT DISTINCT kodejab, namajab FROM mstjabatan");
                                                $i = 1;
                                                while ($data = mysql_fetch_array($listNamajabatan)) { ?>
                                                 <tr onclick="pilihNamajabatan('<?= $data['namajab'] ?>')">
                                                     <td><?= $i++ ?></td>
                                                     <td><?= $data['kodejab'] ?></td>
                                                     <td><?= $data['namajab'] ?></td>
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

                     <div id="myModalUnitkerja" class="modal">
                         <!-- Konten modal -->
                         <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                             <div class="modal-content">
                                 <div class="modal-header bg-primary">
                                     <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                                     <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                                 </div>
                                 <div class="modal-body container mt-2">
                                     <div class="search-container">
                                         <input type="text" class="search-input" placeholder="Cari..." id="searchInputUnitkerja">
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
                                                $listUnitkerja = mysql_query("SELECT DISTINCT kode_unit, nama_unit FROM mstunitkerja");
                                                $i = 1;
                                                while ($data = mysql_fetch_array($listUnitkerja)) { ?>
                                                 <tr onclick="pilihUnitkerja('<?= $data['nama_unit'] ?>')">
                                                     <td><?= $i++ ?></td>
                                                     <td><?= $data['kode_unit'] ?></td>
                                                     <td><?= $data['nama_unit'] ?></td>
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