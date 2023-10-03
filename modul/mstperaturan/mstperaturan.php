 <?php
  if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:404.php');
  } else {
    $aksi = "modul/mstperaturan/aksi_mstperaturan.php";

    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($act) {
      default:
        $mstperaturan = mysql_query("SELECT * FROM mstperaturan");
        $count = mysql_num_rows($mstperaturan);
  ?>
       <div class="main-content">
         <div class="page-content">
           <div class="container-fluid">
             <form method="post" name="frm">
               <div class="panel-heading">
                 <h4 class="panel-title">DASAR PERATURAN</h4>
                 <p></p>
                 <?php
                  $level = $_SESSION['ses_level'];
                  ?>
                 <?php if ($level == 'admin') { ?>
                   <div class="col-xl-12">
                     <a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>
                     <a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstperaturan&act=tambahmstperaturan"><i class="fa fa-send"></i> Tambah</a>
                     <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onclick="update_records_mstperaturan();"><i class="fa fa-edit"></i> Edit</button>
                     <button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_mstperaturan();"><i class="fa fa-remove"></i> Hapus </button>
                   <?php } ?>

                   <?php
                    if ($count > 0) {
                    ?>
                     <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_mstperaturan();"><i class="fa fa-desktop"></i> Lihat</button>

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
                                   <div align="center" class="style2">DASAR PERATURAN</div>
                                 </th>
                               </tr>
                               <tr>
                                 <th scope="col" style="width: 10px;">
                                   <div class="form-check">
                                     <input class="form-check-input fs-15" type="checkbox" name="select_all" id="select_all" value="">
                                   </div>
                                 </th>
                                 <th width="59" data-ordering="false">NO.</th>
                                 <th width="446" data-ordering="false">KODE</th>
                                 <th width="717">URAIAN</th>
                               </tr>
                             </thead>
                             <tbody>
                               <?php
                                $no = 1;
                                $unt = mysql_query("select * from mstperaturan order by kode_peraturan ");
                                while ($un = mysql_fetch_array($unt)) {
                                ?>
                                 <tr>
                                   <td style='text-align:center'>
                                     <input type="checkbox" name="chk[]" class="form-check-input fs-15" value="<?php echo $un['id']; ?>" />
                                   </td>
                                   <td><?php echo " $no"; ?></td>
                                   <td><?php echo " $un[kode_peraturan]"; ?></td>
                                   <td><?php echo " $un[uraian_peraturan]"; ?></td>
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
      case "tambahmstperaturan":
        ?>

         <div class="main-content">
           <div class="page-content">
             <div class="container-fluid">

               <div class="row">
                 <div class="col-12">
                   <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                     <h4 class="mb-sm-0 font-size-18">Tambah Dasar Peraturan</h4>

                   </div>
                 </div>
               </div>

               <div class="row">
                 <div class="col-xl-10">

                   <div class="card">
                     <div class="card-body">
                       <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstperaturan&act=input" method="POST">

                         <div class="row">
                           <div class="col-md-3">
                             <div class="mb-3">
                               <label for="kode_peraturan" class="form-label">KODE</label>
                               <input type="text" name="kode_peraturan" class="form-control" id="kode_peraturan" placeholder="Isi Kode" required>
                               <div class="invalid-tooltip">
                                 Data Kode Harus Diisi
                               </div>
                             </div>
                           </div>
                         </div>

                         <div class="row">
                           <div class="col-md-8">
                             <div class="mb-4">
                               <label for="uraian_peraturan" class="form-label">URAIAN</label>
                               <textarea type="text" name="uraian_peraturan" class="form-control" id="validationTooltip04" placeholder="Uraian Peraturan" required></textarea>
                               <div class="invalid-tooltip">
                                 Data Uraian Harus Diisi
                               </div>
                             </div>
                           </div>
                         </div>



                         <div class="col-md-10">
                           <button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
                           <a type="submit" href="perjadin.php?module=mstperaturan" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>

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
