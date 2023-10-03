 <?php
  if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:404.php');
  } else {
    $aksi = "modul/mstpangkat/aksi_mstpangkat.php";

    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($act) {
      default:
        $mstpangkat = mysql_query("SELECT * FROM mstpangkat");
        $count = mysql_num_rows($mstpangkat);
  ?>
       <style type="text/css">
         <!--
         .style1 {
           font-size: 18px;
           font-weight: bold;
         }
         -->
       </style>


       <div class="main-content">
         <div class="page-content">
           <div class="container-fluid">
             <form method="post" name="frm">
               <div class="panel-heading">
                 <h4 class="panel-title">Data Pangkat Golongan</h4>
                 <p></p>
                 <?php
                  $level = $_SESSION['ses_level'];
                  ?>
                 <?php if ($level == 'admin') { ?>


                   <div class="col-xl-12">
                     <a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>

                     <a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstpangkat&act=tambahmstpangkat"><i class="fa fa-send"></i> Tambah</a>
                     <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onclick="update_records_mstpangkat();"><i class="fa fa-edit"></i> Edit</button>
                     <button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_mstpangkat();"><i class="fa fa-remove"></i> Hapus </button>
                   <?php } ?>

                   <?php
                    if ($count > 0) {
                    ?>
                     <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_mstpangkat();"><i class="fa fa-desktop"></i> Lihat</button>

                   <?php } ?>

                   </div>

                   <div class="row">
                     <div class="col-lg-12">
                       <div class="card">
                         <div class="card-body">
                           <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                             <thead>
                               <tr>
                                 <th scope="col" style="width: 10px;">&nbsp;</th>
                                 <th colspan="4" data-ordering="false">
                                   <div align="center" class="style1">PANGKAT GOLONGAN </div>
                                 </th>
                               </tr>
                               <tr>
                                 <th scope="col" style="width: 10px;">
                                   <div class="form-check">
                                     <input class="form-check-input fs-15" type="checkbox" name="select_all" id="select_all" value="">
                                   </div>
                                 </th>
                                 <th data-ordering="false">No</th>
                                 <th>Nama Pangkat</th>
                                 <th>Kode Golongan</th>
                                 <th>Ruang</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                                $no = 1;
                                $unt = mysql_query("select * from mstpangkat order by id ");
                                while ($un = mysql_fetch_array($unt)) {
                                ?>
                                 <tr>
                                   <td style='text-align:center'>
                                     <input type="checkbox" name="chk[]" class="form-check-input fs-15" value="<?php echo $un['id']; ?>" />
                                   </td>
                                   <td><?php echo " $no"; ?></td>
                                   <td><?php echo " $un[namapangkat]"; ?></td>
                                   <td><?php echo " $un[kodegol]"; ?></td>
                                   <td><?php echo " $un[ruang]"; ?></td>
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
         </form>

       <?php
        break;
      case "tambahmstpangkat":
        ?>

         <div class="main-content">
           <div class="page-content">
             <div class="container-fluid">

               <div class="row">
                 <div class="col-12">
                   <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                     <h4 class="mb-sm-0 font-size-18">Tambah Pangkat Golongan</h4>

                   </div>
                 </div>
               </div>

               <div class="row">
                 <div class="col-xl-10">

                   <div class="card">
                     <div class="card-body">
                       <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstpangkat&act=input" method="POST">

                         <div class="row">
                           <div class="col-md-3">
                             <div class="mb-3">
                               <label for="namapangkat" class="form-label">Nama Pangkat</label>
                               <input type="text" name="namapangkat" class="form-control" id="namapangkat" placeholder="Isi Nama Pangkat" required>
                               <div class="invalid-tooltip">
                                 Data Nama Pangkat Harus Diisi
                               </div>
                             </div>
                           </div>
                         </div>

                         <div class="row">
                           <div class="col-md-6">
                             <div class="mb-3">
                               <label for="kodegol" class="form-label">Kode Golongan</label>
                               <input type="text" name="kodegol" class="form-control" id="kodegol" placeholder="Isi Kode Golongan" required>
                               <div class="invalid-tooltip">
                                 Data Kode Golongan Harus Diisi
                               </div>
                             </div>
                           </div>
                         </div>

                         <div class="row">
                           <div class="col-md-6">
                             <div class="mb-3">
                               <label for="ruang" class="form-label">Ruang</label>
                               <input type="text" name="ruang" class="form-control" id="ruang" placeholder="Isi Ruang" required>
                               <div class="invalid-tooltip">
                                 Data Ruang Harus Diisi
                               </div>
                             </div>
                           </div>
                         </div>

                         <div class="col-md-10">
                           <button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
                           <a type="submit" href="perjadin.php?module=mstpangkat" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>

                         </div>
                     </div>
                   </div>
                   </form>
                 </div>


               </div>
             </div>
           </div>
         </div>

   <?php

    }
  }
    ?>
