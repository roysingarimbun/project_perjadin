 <?php
	if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
		header('location:404.php');
	} else {
		$aksi = "modul/mstkota/aksi_mstkota.php";

		$act = isset($_GET['act']) ? $_GET['act'] : '';

		switch ($act) {
			default:
				$mstkota = mysql_query("SELECT * FROM mstkota ");
				$count = mysql_num_rows($mstkota);
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
 								<h4 class="panel-title">DATA KABUPATEN / KOTA</h4>
 								<p></p>
 								<?php
									$level = $_SESSION['ses_level'];
									?>
 								<?php if ($level == 'admin') { ?>
 									<div class="col-xl-12">
 										<a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>

 										<a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstkota&act=tambahmstkota"><i class="fa fa-send"></i> Tambah</a>
 										<button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_mstkota();"><i class="fa fa-edit"></i> Edit</button>
 										<button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_mstkota();"><i class="fa fa-remove"></i> Hapus </button>
 									<?php } ?>

 									<?php
										if ($count > 0) {
										?>
 										<button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_mstkota();"><i class="fa fa-desktop"></i> Lihat</button>

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
 																	<div align="center" class="style1">KABUPATEN / KOTA</div>
 																</th>
 															</tr>
 															<tr>
 																<th>
 																	<input type="checkbox" name="select_all" id="select_all" value="" />
 																</th>
 																<th>No</th>
 																<th>Kode Kabupaten / Kota</th>
 																<th>Nama Kabupaten / Kota</th>
 															</tr>
 														</thead>
 														<tbody>
 															<?php
																$no = 1;
																$bag = mysql_query("select * from mstkota order by id ");
																while ($bg = mysql_fetch_array($bag)) {
																?>
 																<tr>
 																	<td style='text-align:center'>
 																		<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $bg['id']; ?>" />
 																	</td>
 																	<td><?php echo " $no"; ?></td>
 																	<td><?php echo " $bg[kode_kota]"; ?></td>
 																	<td><?php echo " $bg[nama_kota]"; ?></td>
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
			case "tambahmstkota":
			?>

 			<div class="main-content">
 				<div class="page-content">
 					<div class="container-fluid">

 						<div class="row">
 							<div class="col-12">
 								<div class="page-title-box d-sm-flex align-items-center justify-content-between">
 									<h4 class="mb-sm-0 font-size-18">Tambah Kabupaten / Kota</h4>

 								</div>
 							</div>
 						</div>

 						<div class="row">
 							<div class="col-xl-10">

 								<div class="card">
 									<div class="card-body">
 										<form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstkota&act=input" method="POST">

 											<div class="row">
 												<div class="col-md-3">
 													<div class="mb-3">
 														<label for="kode_kota" class="form-label">KODE KABUPATEN / KOTA</label>
 														<input type="text" name="kode_kota" class="form-control" id="kode_kota" placeholder="Isi Kode Kabupaten / Kota" required>
 														<div class="invalid-tooltip">
 															Data Kode Kabupaten / Kota Harus Diisi
 														</div>
 													</div>
 												</div>
 											</div>

 											<div class="row">
 												<div class="col-md-6">
 													<div class="mb-3">
 														<label for="nama_kota" class="form-label">NAMA KABUPATEN / KOTA</label>
 														<input type="text" name="nama_kota" class="form-control" id="nama_kota" placeholder="Isi Nama Kabupaten / Kota" required>
 														<div class="invalid-tooltip">
 															Data Nama Kabupaten / Kota Harus Diisi
 														</div>
 													</div>
 												</div>
 											</div>

 											<div class="col-md-10">
 												<button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
 												<a type="submit" href="perjadin.php?module=mstkota" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>

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
