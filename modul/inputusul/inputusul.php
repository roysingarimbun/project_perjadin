 <?php
	if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
		header('location:404.php');
	} else {
		$aksi = "modul/inputusul/aksi_inputusul.php";

		$act = isset($_GET['act']) ? $_GET['act'] : '';

		switch ($act) {
			default:
				$inputusul = mysql_query("SELECT * FROM inputusul ");
				$count = mysql_num_rows($inputusul);
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
 								<h4 class="panel-title">DATA USULAN PERJALANAN DINAS</h4>
 								<?php
									$level = $_SESSION['ses_level'];
									?>
 								<?php if ($level == 'admin') { ?>
 									<div class="col-xl-12">
 										<a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=inputusul&act=tambahinputusul"><i class="fa fa-send"></i> Tambah</a>
 										<a class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Detail" onClick="entrydetail_records_inputusul();"><i class="fa fa-send"></i> Entry Detail</a>
 										<button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" onClick="update_records_inputusul();"><i class="fa fa-edit"></i> Edit</button>
 										<button class="btn btn-rounded btn-danger waves-effect waves-light" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_inputusul();"><i class="fa fa-remove"></i> Hapus </button>
 										<button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat" onClick="view_records_inputusul();"><i class="fa fa-desktop"></i> Lihat</button>
 									<?php } ?>
 									<button class="btn btn-info rounded-pill" title="Cetak" data-toggle="tooltip" data-placement="top" onClick="print_records_inputusul();"><i class="ri ri-printer-line"></i> Cetak </button>
 									</div>
 									<div class="row">
 										<div class="col-lg-12">
 											<div class="card">
 												<div class="card-body">
 													<table width="111%" class="table table-bordered dt-responsive nowrap table-striped align-middle" id="example" style="width:100%">

 														<tr>
 															<th colspan="14">&nbsp;</th>
 															<th colspan="2"><span class="text-center">VERIFIKASI ATASAN</span></th>
 															<th colspan="2">
 																<div align="center">KELENGKAPAN DOKUMEN </div>
 															</th>
 														</tr>
 														<tr>
 															<th> <input type="checkbox" name="select_all" id="select_all" value="" /> </th>
 															<th>NO.</th>
 															<th>ID PERJADIN</th>
 															<th>TAHUN</th>
 															<th>NIP</th>
 															<th>NAMA</th>
 															<th>JABATAN</th>
 															<th>PANGKAT/GOLONGAN</th>
 															<th>UNIT KERJA</th>
 															<th>LAMA PERJALANAN</th>
 															<th>TANGGAL BERANGKAT</th>
 															<th>TANGGAL KEMBALI</th>
 															<th>TUJUAN</th>
 															<th>DETAIL KEGIATAN</th>
 															<th>STATUS</th>
 															<th>TANGGAL</th>
 															<th>DOKUMEN SURAT</th>
 															<th>LAMPIRAN UNDANGAN</th>
 														</tr>
 														<tbody>
 															<?php
																$no = 1;
																$bag = mysql_query("select * from inputusul order by id ");
																while ($bg = mysql_fetch_array($bag)) {
																?>
 														</tbody>
 														<td style='text-align:center'><input type="checkbox" name="chk[]" class="chk-box" value="<?= $hasil['id']; ?>" /></td>
 														<td><?= $no++; ?></td>
 														<th><?php echo " $bg[id_perjadin]"; ?></th>
 														<td><?= $hasil['tahun']; ?></td>
 														<th><?php echo " $bg[nip]"; ?></th>
 														<th><?php echo " $bg[nama]"; ?></th>
 														<th><?php echo " $bg[jabat]"; ?></th>
 														<th><?php echo " $bg[pangkat_gol]"; ?></th>
 														<th><?php echo " $bg[unitker]"; ?></th>
 														<th><?php echo " $bg[lamaperjadin]"; ?></th>
 														<th><?php echo " $bg[tglberangkat]"; ?></th>
 														<th><?php echo " $bg[tglkembali]"; ?></th>
 														<th><?php echo " $bg[tujuan]"; ?></th>
 														<th><?php echo " $bg[kegiatan]"; ?></th>
 														<th><?php echo " $bg[statusverifi]"; ?></th>
 														<th><?php echo " $bg[tanggalverifi]"; ?></th>
 														<th><?php echo " $bg[fuploadsurat]"; ?></th>
 														<th><?php echo " $bg[fuploadundangan]"; ?></th>
 														</tr>
 													<?php
																	$no++;
																}
														?>
 													<thead>
 													</thead>
 													</table>
 												</div>
 											</div>
 										</div>
 									</div>
 							</div>
 						</form>
 					</div>
 				</div>
 			</div>


 			<div class="modal fade" id="multiContentModal" tabindex="-1" role="dialog" aria-labelledby="multiContentModalLabel" aria-hidden="true">
 				<div class="modal-dialog" role="document">
 					<div class="modal-content" style="width:700px">
 						<div class="modal-header">
 							<h5 class="modal-title" id="multiContentModalLabel">Bukti</h5>
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 								<span aria-hidden="true"><i class="fa fa-times-circle fa-xl" aria-hidden="true"></i></span>
 							</button>
 						</div>
 						<div class="modal-body" id="contentContainer">
 						</div>
 					</div>
 				</div>
 			</div>

 		<?php
				break;
			case "tambahinputusul":
			?>

 			<div id="panel-5" class="panel">
 				<div class="panel-container show">
 					<div class="panel-content p-0">
 						<div class="main-content">
 							<div class="page-content">
 								<div class="container-fluid">

 									<div class="row">
 										<div class="col-12">
 											<div class="page-title-box d-sm-flex align-items-center justify-content-between">
 												<h1 class="fw-bold" class="mb-sm-0 font-size-31">Tambah Usulan Perjalanan Dinas</h1>
 											</div>
 										</div>
 									</div>

 									<div class="row">
 										<div class="col-xl-10">
 											<div class="card">
 												<div class="card-body">
 													<form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=inputusul&act=input" method="POST" enctype="multipart/form-data">
 														<h2 style="text-align:center" class="fw-bold"><ins>ENTRY DATA USULAN SURAT TUGAS DAN SPD</ins></h2>
 														<div class="panel-content">
 															<div class="form-group row">
 																<div class="col-sm-4">
 																	<label for=" tglpengajuan" class="col-sm-4 col-form-label">TANGGAL<span class="text-danger">*</span></label>
 																	<div class="col-sm-12">
 																		<input type="date" class="validate[required,custom[date]] form-control col-sm-10" name="tglpengajuan" id="tglpengajuan" placeholder="yyyy/mm/dd">
 																	</div>
 																</div>
 																<div class="col-sm-4">
 																	<label for="id_perjadin" class="col-sm-4 col-form-label">ID PERJADIN<span class="text-danger">*</span></label>
 																	<input type="text" name="id_perjadin" class="form-control col-sm-10" id="id_perjadin" placeholder="Isi ID Perjadin" aria-describedby="inputGroupPrepend2" required>
 																	<div class="invalid-tooltip">
 																		Data ID Perjadin Harus Diisi
 																	</div>
 																</div>

 																<div class="form-group">
 																	<label for="subkat" class="col-sm-4 control-label">Nama Operator<span class="text-danger"> *</span></label>
 																	<div class="col-sm-4">
 																		<input type="hidden" id="id6" name="id6" class="form-control" />
 																		<input type="text" class="val=====idate[required] form-control" name="subkat" id="subkat" placeholder="Kode Sub Kategori" value="<?php echo $r[subkat]; ?>" readonly>
 																	</div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal6"><i class="fa fa-search"></i> Cari</button>
 																</div>

 																<div class="col-sm-4">
 																	<label for="tahun" class="col-sm-4 col-form-label">TAHUN<span class="text-danger">*</span></label>
 																	<input type="text" name="tahun" class="form-control col-sm-10" id="tahun" placeholder="Isi Tahun" aria-describedby="inputGroupPrepend2" required>
 																	<div class="invalid-tooltip">
 																		Data Tahun Harus Diisi
 																	</div>
 																</div>
 															</div>
 															<div class="panel-content">
 																<div class="form-group row">
 																	<div class="col-md-6">
 																		<div class="mb-10">
 																			<label for="namaoperator" class="form-label">NAMA OPERATOR<span class="text-danger">*</span></label>
 																			<input type="text" name="namaoperator" class="form-control" id="namaoperator" placeholder="Isi Nama Operator" required>
 																			<div class="invalid-tooltip">
 																				Data Nama Operator Harus Diisi
 																			</div>
 																		</div>
 																	</div>
 																	<div class="col-md-6">
 																		<div class="mb-10">
 																			<label for="nip" class="form-label">NIP<span class="text-danger">*</span></label>
 																			<input type="text" name="nip" class="form-control" id="nip" placeholder="Isi NIP" required></input>
 																			<div class="invalid-tooltip">
 																				Data NIP Harus Diisi
 																			</div>
 																		</div>
 																	</div>
 																</div>
 															</div>

 															<h3 class="fw-bold"><ins>Unit Kerja</ins></h3>
 															<div class="panel-content">
 																<div class="form-group row">
 																	<div class="col-sm-6">
 																		<label class="col-sm-2 col-form-label" for="validationTooltip03">UNIT KERJA<span class="text-danger">*</span></label>
 																		<input type="text" name="unitker" class="form-control" id="validationTooltip03" placeholder="Isi Unit Kerja" aria-describedby="inputGroupPrepend2" value="<?= $unitker['nama_unit'] ?>" required>
 																		<div class="invalid-tooltip">
 																			Nama Unit Kerja Diisikan
 																		</div>
 																	</div>
 																	<div class="col-md-1 mb-3">
 																		<label class="col-sm-2 col-form-label" for="validationTooltip04"><span class="text-danger"></span></label>
 																		<button type="button" class="btn btn-primary form-control mt-1" id="carinamauntkerja">cari</button>
 																	</div>
 																	<div class="col-sm-6">
 																		<label class="col-sm-3 col-form-label" for="validationTooltip03">SUB UNIT KERJA<span class="text-danger">*</span></label>
 																		<input type="text" name="subunitker" class="form-control col-sm-10" id="validationTooltip03" placeholder="Isi Sub Unit Kerja" aria-describedby="inputGroupPrepend2" value="<?= $subunitker['nama_unit'] ?>" required>
 																		<div class="invalid-tooltip">
 																			Nama Sub Unit Kerja Diisikan
 																		</div>
 																	</div>
 																	<div class="col-md-1 mb-3">
 																		<label class="col-sm-2 col-form-label" for="validationTooltip04"><span class="text-danger"></span></label>
 																		<button type="button" class="btn btn-primary form-control mt-1" id="carisubunitkerja">cari</button>
 																	</div>
 																</div>
 															</div>
 															<h3 class="fw-bold"><ins>Detail Kegiatan</ins></h3>
 															<div class="col-md-6">
 																<label for="kegiatan" class="col-sm-3 col-form-label">DETAIL KEGIATAN<span class="text-danger">*</span></label>
 																<textarea type="text" name="kegiatan" class="form-control col-sm-10" id="kegiatan" placeholder="Isi Detail Kegiatan" rows="3" required></textarea>
 																<div class="invalid-tooltip">
 																	Data Detail Kegiatan Harus Diisi
 																</div>
 															</div>
 															<h3 class="fw-bold"><ins>Waktu Pelaksanaan</ins></h3>
 															<div class="panel-content">
 																<div class="form-group row">
 																	<div class="col-md-4">
 																		<label for="lamaperjadin" class="form-label">LAMA PERJALANAN<span class="text-danger">*</span></label>
 																		<input type="text" name="lamaperjadin" class="form-control col-md-10" id="lamaperjadin" placeholder="Isi Lama Perjalanan" required>
 																		<div class="invalid-tooltip">
 																			Data Lama Perjalanan Harus Diisi
 																		</div>
 																	</div>
 																	<div class="col-md-4">
 																		<label for="tglberangkat" class="col-sm-10 control-label">TANGGAL BERANGKAT<span class="text-danger">*</span></label>
 																		<div class="col-sm-10">
 																			<input type="date" class="validate[required,custom[date]] form-control" name="tglberangkat" id="tglberangkat" placeholder="yyyy/mm/dd">
 																		</div>
 																	</div>
 																	<div class="col-md-4">
 																		<label for="tglkembali" class="col-sm-6 control-label">TANGGAL KEMBALI<span class="text-danger">*</span></label>
 																		<div class="col-sm-10">
 																			<input type="date" class="validate[required,custom[date]] form-control" name="tglkembali" id="tglkembali" placeholder="yyyy/mm/dd">
 																		</div>
 																	</div>
 																</div>
 															</div>
 															<h3 class="fw-bold"><ins>Lokasi Pelaksanaan</ins></h3>
 															<div class="panel-content">
 																<div class="form-group row">
 																	<div class="col-sm-6">
 																		<label class="col-sm-3 col-form-label" for="validationTooltip03">NAMA KOTA / KABUPATEN<span class="text-danger">*</span></label>
 																		<input type="text" name="namakota" class="form-control" id="validationTooltip03" placeholder="Isi Nama Kota / Kabupaten" aria-describedby="inputGroupPrepend2" value="<?= $namakota['nama_kota'] ?>" required>
 																		<div class="invalid-tooltip">
 																			Nama Kota Diisikan
 																		</div>
 																	</div>
 																	<div class="col-md-1 mb-3">
 																		<label class="col-sm-3 col-form-label" for="validationTooltip04"><span class="text-danger"></span></label>
 																		<button type="button" class="btn btn-primary form-control mt-1" id="carinamakota">cari</button>
 																	</div>
 																</div>
 															</div>
 															<div class="col-md-4">
 																<div class="mb-3">
 																	<label for="alamatlengkap" class="form-label">ALAMAT LENGKAP<span class="text-danger">*</span></label>
 																	<textarea type="text" name="alamatlengkap" class="form-control" id="alamatlengkap" placeholder="Isi Alamat Lengkap" rows="5" required></textarea>
 																	<div class="invalid-tooltip">
 																		Data Alamat Lengkap Harus Diisi
 																	</div>
 																</div>
 															</div>
 															<div class="form-group row">
 																<div class="col-sm-6">
 																	<label class="col-sm-3 col-form-label" for="validationTooltip03">NAMA PROVINSI<span class="text-danger">*</span></label>
 																	<input type="text" name="prov" class="form-control" id="validationTooltip03" placeholder="Isi Nama Provinsi" aria-describedby="inputGroupPrepend2" value="<?= $prov['nama_provinsi'] ?>" required>
 																	<div class="invalid-tooltip">
 																		Nama Provinsi Diisikan
 																	</div>
 																</div>
 																<div class="col-md-1 mb-3">
 																	<label class="col-sm-3 col-form-label" for="validationTooltip04"><span class="text-danger"></span></label>
 																	<button type="button" class="btn btn-primary form-control mt-1" id="carinamaprov">cari</button>
 																</div>
 															</div>

 															<h3 class="fw-bold"><ins>Upload Kelengkapan Dokumen Usulan</ins></h3>
 															<div class="panel-content">
 																<div class="form-group row">
 																	<div class="col-md-6">
 																		<div class="box-body">
 																			<div class="form-group">
 																				<div class="col-md-12">
 																					<label for="filepdf" class="control-label">UPLOAD DOKUMEN SURAT PERMOHONAN<span class="text-danger">*</span></label>
 																					<div class="col-sm-9 col-md-5">
 																						<input type="file" id="fupload" name="fupload" placeholder="Upload Dokumen Surat Permohonan" readonly>
 																					</div>
 																				</div>
 																			</div>

 																			<div class="form-group">
 																				<label for="" class="col-sm-5 control-label">Dokumen Surat Permohonan (PDF)<span class="text-danger">*</span></label>
 																				<?php
																					$ftdok = $r['surat'];
																					if (empty($ftdok)) {
																					?>
 																					<br></br>
 																					<img src="img/foto_user/kosong.jpg">
 																				<?php
																					} else {
																					?>
 																					<embed width="450" height="400" src="files/<?php echo $r['surat']; ?>" type="application/pdf"></embed>

 																				<?php
																					}
																					?>
 																			</div>
 																		</div><!-- /.box-body -->
 																	</div>

 																	<div class="col-md-6">
 																		<div class="box-body">

 																			<div class="col-md-12">
 																				<label for="filepdf" class="col-sm-4 control-label">UPLOAD LAMPIRAN UNDANGAN<span class="text-danger">*</span></label>
 																				<div class="col-sm-9 col-md-5">
 																					<input type="file" id="fupload2" name="fupload2" placeholder="Upload Lampiran Undangan" readonly>
 																				</div>
 																			</div>


 																			<div class="form-group">
 																				<label for="" class="col-sm-5 control-label">Dokumen (PDF)</label>
 																				<?php
																					$ftdok = $r['undangan'];
																					if (empty($ftdok)) {
																					?>
 																					<br></br>
 																					<img src="img/foto_user/kosong.jpg">
 																				<?php
																					} else {
																					?>
 																					<embed width="450" height="400" src="files/<?php echo $r['undangan']; ?>" type="application/pdf"></embed>

 																				<?php
																					}
																					?>
 																			</div>
 																		</div>
 																		<!-- /.box-body -->
 																	</div>
 																</div>
 															</div>

 															<div class="col-md-10">
 																<button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
 																<a type="submit" href="perjadin.php?module=inputusul" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>
 															</div>
 														</div>

 													</form>
 												</div>
 											</div>
 										</div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div id="myModalnamaunitkerja" class="modal">
 				<!-- Konten modal -->
 				<div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
 					<div class="modal-content">
 						<div class="modal-header bg-primary">
 							<h5 class="modal-title text-white">Pencarian Otomatis</h5>
 							<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
 						</div>
 						<div class="modal-body container mt-2">
 							<div class="search-container">
 								<input type="text" class="search-input" placeholder="Cari..." id="searchInputnamaunitkerja">
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
										$listnamaunitkerja = mysql_query("SELECT * FROM mstunitkerja");
										while ($data = mysql_fetch_array($listnamaunitkerja)) { ?>
 										<tr onclick="pilihnamaunitkerja('<?= $data['nama_unit']; ?>')">
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

 			<div id="myModalnamasubunitkerja" class="modal">
 				<!-- Konten modal -->
 				<div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
 					<div class="modal-content">
 						<div class="modal-header bg-primary">
 							<h5 class="modal-title text-white">Pencarian Otomatis</h5>
 							<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
 						</div>
 						<div class="modal-body container mt-2">
 							<div class="search-container">
 								<input type="text" class="search-input" placeholder="Cari..." id="searchInputsubnamaunitkerja">
 								<button class="search-button">
 									<i class="fa-solid fa-magnifying-glass" class="search-icon"></i>
 								</button>
 							</div>
 							<table id="dataTable" class="table table-bordered table-hover table-striped popup-table">
 								<thead>
 									<tr>
 										<th>No. </th>
 										<th>Nama Sub Unit Kerja</th>
 									</tr>
 								</thead>
 								<tbody>

 									<?php
										$index = 1;
										$listsubnamaunitkerja = mysql_query("SELECT * FROM mstsubunitkerja");
										while ($data = mysql_fetch_array($listsubnamaunitkerja)) { ?>
 										<tr onclick="pilihsubnamaunitkerja('<?= $data['namasub_unit']; ?>')">
 											<td><?= $index++ ?></td>
 											<td><?= $data['namasub_unit'] ?></td>
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

 			<div id="myModalnamakota" class="modal">
 				<!-- Konten modal -->
 				<div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
 					<div class="modal-content">
 						<div class="modal-header bg-primary">
 							<h5 class="modal-title text-white">Pencarian Otomatis</h5>
 							<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
 						</div>
 						<div class="modal-body container mt-2">
 							<div class="search-container">
 								<input type="text" class="search-input" placeholder="Cari..." id="searchInputnamakota">
 								<button class="search-button">
 									<i class="fa-solid fa-magnifying-glass" class="search-icon"></i>
 								</button>
 							</div>
 							<table id="dataTable" class="table table-bordered table-hover table-striped popup-table">
 								<thead>
 									<tr>
 										<th>No. </th>
 										<th>Nama Kota</th>
 									</tr>
 								</thead>
 								<tbody>

 									<?php
										$index = 1;
										$listnamakota = mysql_query("SELECT * FROM mstkota");
										while ($data = mysql_fetch_array($listnamakota)) { ?>
 										<tr onclick="pilihnamakota('<?= $data['nama_kota']; ?>')">
 											<td><?= $index++ ?></td>
 											<td><?= $data['nama_kota'] ?></td>
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

 			<div id="myModalnamaprov" class="modal">
 				<!-- Konten modal -->
 				<div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
 					<div class="modal-content">
 						<div class="modal-header bg-primary">
 							<h5 class="modal-title text-white">Pencarian Otomatis</h5>
 							<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
 						</div>
 						<div class="modal-body container mt-2">
 							<div class="search-container">
 								<input type="text" class="search-input" placeholder="Cari..." id="searchInputnamaprov">
 								<button class="search-button">
 									<i class="fa-solid fa-magnifying-glass" class="search-icon"></i>
 								</button>
 							</div>
 							<table id="dataTable" class="table table-bordered table-hover table-striped popup-table">
 								<thead>
 									<tr>
 										<th>No. </th>
 										<th>Nama Provinsi</th>
 									</tr>
 								</thead>
 								<tbody>

 									<?php
										$index = 1;
										$listnamaprov = mysql_query("SELECT * FROM mstprovinsi");
										while ($data = mysql_fetch_array($listnamaprov)) { ?>
 										<tr onclick="pilihnamaprov('<?= $data['nama_provinsi']; ?>')">
 											<td><?= $index++ ?></td>
 											<td><?= $data['nama_provinsi'] ?></td>
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