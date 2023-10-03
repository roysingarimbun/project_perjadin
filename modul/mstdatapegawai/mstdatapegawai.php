 <?php
    if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
        header('location:404.php');
    } else {
        $aksi = "modul/mstdatapegawai/aksi_mstdatapegawai.php";

        $act = isset($_GET['act']) ? $_GET['act'] : '';

        switch ($act) {
            default:
                $mstdatapegawai = mysql_query("SELECT * FROM mstdatapegawai ");
                $count = mysql_num_rows($mstdatapegawai);
    ?>
             <style type="text/css">
                 <!--
                 .style1 {
                     font-size: 18px
                 }
                 -->
             </style>



             <div class="main-content">
                 <div class="page-content">
                     <div class="container-fluid">
                         <form method="post" name="frm">
                             <div class="panel-heading">
                                 <h4 class="panel-title">DATA PEGAWAI</h4>
                                 <p></p>
                                 <?php
                                    $level = $_SESSION['ses_level'];
                                    ?>
                                 <?php if ($level == 'admin') { ?>
                                     <div class="col-xl-12">
                                         <a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>

                                         <a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstdatapegawai&act=tambahmstdatapegawai"><i class="fa fa-send"></i> Tambah</a>
                                         <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_mstdatapegawai();"><i class="fa fa-edit"></i> Edit</button>
                                         <button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_mstdatapegawai();"><i class="fa fa-remove"></i> Hapus </button>
                                     <?php } ?>

                                     <?php
                                        if ($count > 0) {
                                        ?>
                                         <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_mstdatapegawai();"><i class="fa fa-desktop"></i> Lihat</button>

                                     <?php } ?>

                                     </div>

                                     <div class="row">
                                         <div class="col-lg-12">
                                             <div class="card">
                                                 <div class="card-body">
                                                     <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                                         <thead>
                                                             <tr>
                                                                 <th width="20" style="width: 10px;" scope="col">&nbsp;</th>
                                                                 <th colspan="3" data-ordering="false">
                                                                     <div align="center" class="style1">DATA PEGAWAI</div>
                                                                 </th>
                                                             </tr>
                                                             <tr>
                                                                 <th>
                                                                     <input type="checkbox" name="select_all" id="select_all" value="" />
                                                                 </th>
                                                                 <th>No</th>
                                                                 <th>Kode Pegawai</th>
                                                                 <th>Nama Pegawai</th>
                                                                 <th>NIP</th>
                                                                 <th>Jabatan</th>
                                                                 <th>Nama Unit Kerja</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody>
                                                             <?php
                                                                $no = 1;
                                                                $bag = mysql_query("select * from mstdatapegawai order by id ");
                                                                while ($bg = mysql_fetch_array($bag)) {
                                                                ?>
                                                                 <tr>
                                                                     <td style='text-align:center'>
                                                                         <input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $bg['id']; ?>" />
                                                                     </td>
                                                                     <td><?php echo " $no"; ?></td>
                                                                     <td><?php echo " $bg[peg_iduser]"; ?></td>
                                                                     <td><?php echo " $bg[namapeg]"; ?></td>
                                                                     <td><?php echo " $bg[nip]"; ?></td>
                                                                     <td><?php echo " $bg[jab]"; ?></td>
                                                                     <td><?php echo " $bg[namaunit]"; ?></td>
                                                                 </tr>
                                                             <?php
                                                                    $no++;
                                                                }
                                                                ?>
                                                         </tbody>
                                                     </table>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                             </div>
                     </div>
                 </div>
             </div>
             </form>

         <?php
                break;
            case "tambahmstdatapegawai":
            ?>

             <div class="main-content">
                 <div class="page-content">
                     <div class="container-fluid">

                         <div class="row">
                             <div class="col-12">
                                 <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                     <h4 class="mb-sm-0 font-size-18">Tambah Data Pegawai</h4>

                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-xl-10">

                                 <div class="card">
                                     <div class="card-body">
                                         <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstdatapegawai&act=input" method="POST">

                                             <div class="row">
                                                 <div class="col-md-3">
                                                     <div class="mb-3">
                                                         <label for="peg_iduser" class="form-label">KODE</label>
                                                         <input type="text" name="peg_iduser" class="form-control" id="peg_iduser" placeholder="Isi Kode Pegawai" required>
                                                         <div class="invalid-tooltip">
                                                             Data Kode Pegawai Harus Diisi
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="mb-3">
                                                         <label for="namapeg" class="form-label">NAMA</label>
                                                         <input type="text" name="namapeg" class="form-control" id="namapeg" placeholder="Isi Nama Pegawai" required>
                                                         <div class="invalid-tooltip">
                                                             Data Nama Pegawai Harus Diisi
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="mb-3">
                                                         <label for="nip" class="form-label">NIP</label>
                                                         <input type="text" name="nip" class="form-control" id="nip" placeholder="Isi NIP Jabatan" required>
                                                         <div class="invalid-tooltip">
                                                             Data NIP Jabatan Harus Diisi
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="panel-content">
                                                 <div class="row">
                                                     <div class="col-md-5 mb-3">
                                                         <label class="form-label" for="validationTooltip03">JABATAN<span class="text-danger">*</span></label>
                                                         <input type="text" name="jab" class="form-control" id="validationTooltip03" aria-describedby="inputGroupPrepend2" value="<?= $jab['namajab'] ?>" readonly>
                                                         <div class="invalid-tooltip">
                                                             Nama Jabatan Diisikan
                                                         </div>
                                                     </div>
                                                     <div class="col-md-1 mb-3">
                                                         <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                         <button type="button" class="btn btn-primary form-control mt-1" id="cariNamaJabatan">cari</button>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="panel-content">
                                                 <div class="row">
                                                     <div class="col-md-5 mb-3">
                                                         <label class="form-label" for="validationTooltip03">UNIT KERJA<span class="text-danger">*</span></label>
                                                         <input type="text" name="namaunit" class="form-control" id="validationTooltip03" aria-describedby="inputGroupPrepend2" value="<?= $namaunit['nama_unit'] ?>" readonly>
                                                         <div class="invalid-tooltip">
                                                             Nama Unit Kerja Diisikan
                                                         </div>
                                                     </div>
                                                     <div class="col-md-1 mb-3">
                                                         <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                         <button type="button" class="btn btn-primary form-control mt-1" id="cariUnitKerja">cari</button>
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="col-md-10">
                                                 <button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
                                                 <a type="submit" href="perjadin.php?module=mstdatapegawai" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>

                                             </div>
                                     </div>
                                 </div>
                                 </form>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>

             <div id="myModalnamajabatan" class="modal">
                 <!-- Konten modal -->
                 <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                     <div class="modal-content">
                         <div class="modal-header bg-primary">
                             <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                             <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                         </div>
                         <div class="modal-body container mt-2">
                             <div class="search-container">
                                 <input type="text" class="search-input" placeholder="Cari..." id="searchInputnamajabatan">
                                 <button class="search-button">
                                     <i class="fa-solid fa-magnifying-glass" class="search-icon"></i>
                                 </button>
                             </div>
                             <table id="dataTable" class="table table-bordered table-hover table-striped popup-table">
                                 <thead>
                                     <tr>
                                         <th>No. </th>
                                         <th>Nama Jabatan</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                     <?php
                                        $index = 1;
                                        $listNamaJabatan = mysql_query("SELECT * FROM mstjabatan");
                                        while ($data = mysql_fetch_array($listNamaJabatan)) { ?>
                                         <tr onclick="pilihNamaJabatan('<?= $data['namajab']; ?>')">
                                             <td><?= $index++ ?></td>
                                             <td><?= $data['namajab']; ?></td>
                                         </tr>

                                     <?php } ?>

                                 </tbody>
                             </table>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary close" data-dismiss="modal">Tutup</button>
                         </div>
                     </div>
                 </div>
             </div>

             <div id="myModalnamaunit" class="modal">
                 <!-- Konten modal -->
                 <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                     <div class="modal-content">
                         <div class="modal-header bg-primary">
                             <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                             <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                         </div>
                         <div class="modal-body container mt-2">
                             <div class="search-container">
                                 <input type="text" class="search-input" placeholder="Cari..." id="searchInputnamaunit">
                                 <button class="search-button">
                                     <i class="fa-solid fa-magnifying-glass" class="search-icon"></i>
                                 </button>
                             </div>
                             <table id="dataTable" class="table table-bordered table-hover table-striped popup-table">
                                 <thead>
                                     <tr>
                                         <th>No. </th>
                                         <th>Nama Unit</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                     <?php
                                        $index = 1;
                                        $listNamaUnit = mysql_query("SELECT * FROM mstunitkerja");
                                        while ($data = mysql_fetch_array($listNamaUnit)) { ?>
                                         <tr onclick="pilihNamaUnit('<?= $data['nama_unit']; ?>')">
                                             <td><?= $index++ ?></td>
                                             <td><?= $data['nama_unit'] ?></td>
                                         </tr>

                                     <?php } ?>

                                 </tbody>
                             </table>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary close" data-dismiss="modal">Tutup</button>
                         </div>
                     </div>
                 </div>
             </div>

 <?php

        }
    }
    ?>