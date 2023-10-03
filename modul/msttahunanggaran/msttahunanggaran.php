 <?php
  if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:404.php');
  } else {
    $aksi = "modul/msttahunanggaran/aksi_msttahunanggaran.php";

    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($act) {
      default:
        $msttahunanggaran = mysql_query("SELECT * FROM msttahunanggaran");
        $count = mysql_num_rows($msttahunanggaran);
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
                 <h4 class="panel-title">DATA TAHUN ANGGARAN</h4>
                 <p></p>
                 <?php
                  $level = $_SESSION['ses_level'];
                  ?>
                 <?php if ($level == 'admin') { ?>


                   <div class="col-xl-12">
                     <a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>

                     <a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=msttahunanggaran&act=tambahmsttahunanggaran"><i class="fa fa-send"></i> Tambah</a>
                     <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onclick="update_records_msttahunanggaran();"><i class="fa fa-edit"></i> Edit</button>
                     <button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_msttahunanggaran();"><i class="fa fa-remove"></i> Hapus </button>
                   <?php } ?>

                   <?php
                    if ($count > 0) {
                    ?>
                     <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_msttahunanggaran();"><i class="fa fa-desktop"></i> Lihat</button>

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
                                   <div align="center" class="style1">TAHUN ANGGARAN </div>
                                 </th>
                               </tr>
                               <tr>
                                 <th scope="col" style="width: 10px;">
                                   <div class="form-check">
                                     <input class="form-check-input fs-15" type="checkbox" name="select_all" id="select_all" value="">
                                   </div>
                                 </th>
                                 <th width="127" data-ordering="false">No</th>
                                 <th width="493">Kode Tahun</th>
                                 <th width="602">Tahun Anggaran</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                                $no = 1;
                                $unt = mysql_query("select * from msttahunanggaran order by id ");
                                while ($un = mysql_fetch_array($unt)) {
                                ?>
                                 <tr>
                                   <td style='text-align:center'>
                                     <input type="checkbox" name="chk[]" class="form-check-input fs-15" value="<?php echo $un['id']; ?>" />
                                   </td>
                                   <td><?php echo " $no"; ?></td>
                                   <td><?php echo " $un[kode_tahun]"; ?></td>
                                   <td><?php echo " $un[thn_anggaran]"; ?></td>
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
      case "tambahmsttahunanggaran":
        ?>

         <div class="main-content">
           <div class="page-content">
             <div class="container-fluid">

               <div class="row">
                 <div class="col-12">
                   <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                     <h4 class="mb-sm-0 font-size-18">Tambah Tahun Anggaran</h4>

                   </div>
                 </div>
               </div>

               <div class="row">
                 <div class="col-xl-10">

                   <div class="card">
                     <div class="card-body">
                       <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=msttahunanggaran&act=input" method="POST">

                         <div class="row">
                           <div class="col-md-3">
                             <div class="mb-3">
                               <label for="kode_tahun" class="form-label">Kode Tahun</label>
                               <input type="text" name="kode_tahun" class="form-control" id="kode_tahun" placeholder="Isi Kode Tahun" required>
                               <div class="invalid-tooltip">
                                 Data Kode Tahun Harus Diisi
                               </div>
                             </div>
                           </div>
                         </div>

                         <div class="row">
                           <div class="col-md-6">
                             <div class="mb-3">
                               <label for="thn_anggaran" class="form-label">Tahun Anggaran</label>
                               <input type="text" name="thn_anggaran" class="form-control" id="thn_anggaran" placeholder="Isi Tahun Anggaran" required>
                               <div class="invalid-tooltip">
                                 Data Tahun Anggaran Harus Diisi
                               </div>
                             </div>
                           </div>
                         </div>

                         <div class="col-md-10">
                           <button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
                           <a type="submit" href="perjadin.php?module=msttahunanggaran" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>

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
