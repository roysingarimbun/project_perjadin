 <?php
	if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
		header('location:404.php');
	} else {
		$aksi = "modul/mstdata_satker/aksi_mstdata_satker.php";

		$act = isset($_GET['act']) ? $_GET['act'] : '';

		switch ($act) {
			default:
				$mstdata_satker = mysql_query("SELECT * FROM mstdata_satker ");
				$count = mysql_num_rows($mstdata_satker);
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
 								<h4 class="panel-title">DATA SATKER</h4>
 								<p></p>
 								<?php
									$level = $_SESSION['ses_level'];
									?>
 								<?php if ($level == 'admin') { ?>
 									<div class="col-xl-12">
 										<a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=beranda"> Menu</a>

 										<a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstdata_satker&act=tambahmstdata_satker"><i class="fa fa-send"></i> Tambah</a>
 										<button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_mstdata_satker();"><i class="fa fa-edit"></i> Edit</button>
 										<button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_mstdata_satker();"><i class="fa fa-remove"></i> Hapus </button>
 									<?php } ?>

 									<?php
										if ($count > 0) {
										?>
 										<button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_mstdata_satker();"><i class="fa fa-desktop"></i> Lihat</button>

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
 																	<div align="center" class="style1">DATA SATKER</div>
 																</th>
 															</tr>
 															<tr>
 																<th>
 																	<input type="checkbox" name="select_all" id="select_all" value="" />
 																</th>
 																<th>No</th>
 																<th>Kode Satker</th>
 																<th>Nama Satker</th>
 															</tr>
 														</thead>
 														<tbody>
 															<?php
																$no = 1;
																$bag = mysql_query("select * from mstdata_satker order by id ");
																while ($bg = mysql_fetch_array($bag)) {
																?>
 																<tr>
 																	<td style='text-align:center'>
 																		<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $bg['id']; ?>" />
 																	</td>
 																	<td><?php echo " $no"; ?></td>
 																	<td><?php echo " $bg[kode_satker]"; ?></td>
 																	<td><?php echo " $bg[nama_satker]"; ?></td>
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
			case "tambahmstdata_satker":
			?>

 			<div class="main-content">
 				<div class="page-content">
 					<div class="container-fluid">

 						<div class="row">
 							<div class="col-12">
 								<div class="page-title-box d-sm-flex align-items-center justify-content-between">
 									<h4 class="mb-sm-0 font-size-18">Tambah Data Satker</h4>

 								</div>
 							</div>
 						</div>

 						<div class="row">
 							<div class="col-xl-10">

 								<div class="card">
 									<div class="card-body">
 										<form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstdata_satker&act=input" method="POST">

 											<div class="row">
 												<div class="col-md-3">
 													<div class="mb-3">
 														<label for="kode_satker" class="form-label">KODE SATKER</label>
 														<input type="text" name="kode_satker" class="form-control" id="kode_satker" placeholder="Isi Kode Satker" required>
 														<div class="invalid-tooltip">
 															Data Kode Satker Harus Diisi
 														</div>
 													</div>
 												</div>
 											</div>

 											<div class="row">
 												<div class="col-md-6">
 													<div class="mb-3">
 														<label for="nama_satker" class="form-label">NAMA SATKER</label>
 														<input type="text" name="nama_satker" class="form-control" id="nama_satker" placeholder="Isi Nama Satker" required>
 														<div class="invalid-tooltip">
 															Data Nama Satker Harus Diisi
 														</div>
 													</div>
 												</div>
 											</div>

 											<div class="col-md-10">
 												<button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
 												<a type="submit" href="perjadin.php?module=mstdata_satker" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>

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