<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:../../404.php');
} else {
	$aksi = "modul/inputusul/aksi_inputusul.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';


	switch ($_GET['act']) {
			// Tampil List View
		default:
			if (isset($_POST['chk']) == "") {
?>
				<script>
					alert('Opsi Belum Di pilih');
					window.location.href = 'perjadin.php?module=inputusul';
				</script>
			<?php
			}
			$chk = $_POST['chk'];
			$chkcount = count($chk);

			?>
			<main id="js-page-content" role="main" class="page-content">
				<div id="panel-5" class="panel">
					<div class="panel-hdr">
						<h2>
							Entry Pemeriksaan BKU BP<span class="fw-300"></span>
						</h2>
					</div>

					<div class="panel-container show">
						<div class="panel-content p-0">
							<form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=entryaudit_bkuadminauditbp&act=input" id="js-simpandata" method="POST">
								<?php
								for ($i = 0; $i < $chkcount; $i++) {
									$id = $chk[$i];

									$head = mysql_fetch_array(mysql_query("select * from bkupengeluaran where id=" . $id));

									$res = mysql_query("select * from auditbkuadmin where idbku=" . $id);
									$r = mysql_fetch_array($res);
									$count = count($r);
								}
								?>
								<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
								<div class="panel-content">
									<h3>Data Buku Kas Umum BP</h3>
									<div class="form-row">
										<div class="col-md-4 mb-4">
											<label class="form-label" for="validationTooltip03">ID</label>
											<input type="text" name="kode" class="form-control" id="validationTooltip03" placeholder="Kode" aria-describedby="inputGroupPrepend2" value="<?php echo $head[idbku]; ?>" readonly>
										</div>
										<div class="col-md-2 mb-4">
											<label class="form-label" for="validationTooltip04">Tahun</label>
											<input type="text" name="uraian" class="form-control" id="validationTooltip04" placeholder="Tahun" value="<?php echo $head[tahun]; ?>" readonly>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-4 mb-4">
											<label class="form-label" for="validationTooltip03">Unit Kerja</label>
											<div class="input-group">
												<input type="text" name="kode" class="form-control" id="validationTooltip03" placeholder="Unit Kerja" aria-describedby="inputGroupPrepend2" value="<?php echo $head[nama_unit]; ?>" readonly>
											</div>
										</div>
										<div class="col-md-2 mb-4">
											<label class="form-label" for="validationTooltip03">Kode Kerja</label>
											<div class="input-group">
												<input type="text" name="kode" class="form-control" id="validationTooltip03" placeholder="Unit Kerja" aria-describedby="inputGroupPrepend2" value="<?php echo $head[sub_komponen]; ?>" readonly>
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-4 mb-4">
											<label class="form-label" for="validationTooltip04">Uraian Bendahara</label>
											<input type="text" name="uraian" class="form-control" id="validationTooltip04" placeholder="Uraian Bendahara" value="<?php echo $head[uraianbend]; ?>" readonly>
										</div>
										<div class="col-md-2 mb-4">
											<label class="form-label" for="validationTooltip03">Jenis BKU</label>
											<div class="input-group">
												<input type="text" name="kode" class="form-control" id="validationTooltip03" placeholder="Jenis BKU" aria-describedby="inputGroupPrepend2" value="<?php echo $head[jenisbku]; ?>" readonly>
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-4 mb-4">
											<label class="form-label" for="validationTooltip03">Saldo</label>
											<div class="input-group">
												<input type="text" name="kode" class="form-control" id="validationTooltip03" placeholder="Saldo" aria-describedby="inputGroupPrepend2" value="Rp. <?= number_format($head[saldoakhir], 2, ',', '.'); ?>" readonly>
											</div>
										</div>
										<div class="col-md-2 mb-4">
											<label class="form-label" for="validationTooltip04">Bulan</label>
											<input type="text" name="uraian" class="form-control" id="validationTooltip04" placeholder="Bulan" value="<?php echo $head[bulan]; ?>" readonly>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-3 mb-3">
											<label class="form-label" for="validationTooltip04">Tanggal Upload</label>
											<input type="text" name="uraian" class="form-control" id="validationTooltip04" placeholder="Tanggal Upload" value="<?php echo $head[tglupload]; ?>" readonly>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-6">
											<label class="form-label" for="validationTooltip03">Bukti Upload</label>
											<div class="form-row">
												<?php
												$path = 'files/bku_pengeluaran/';
												$filePath = $path . $head['nama_file'];
												if (!file_exists($filePath)) {
													$filePath = 'img/corrupted.png';
												?>
													<img src="<?= $filePath ?>" alt="gambar tidak ditemukan" width="100px" height="100px">
													<?php
												} else {
													$ctr = end(explode('.', $filePath));
													if ($ctr === 'xlsx' || $ctr === 'xls') { ?>
														<div class="alert alert-warning">
															File jenis .xlsx tidak bisa di tampilkan <br>
															Silahkan download file <a href="<?= $filePath ?>" download><u>disini</u></a>
														</div>
													<?php } else { ?>
														<iframe src="<?= $filePath ?>" width="500" height="500" frameborder="5"></iframe>
													<?php } ?>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>

						<div class="panel-content">
							<form method="post" name="frm2">
								<div class="row">
									<div class="col-xl-12">
										<input type="hidden" name="id" value="<?= $id ?>">
										<a class="btn btn-dark btn-pills" data-toggle="tooltip" data-placement="top" title="Menu" href="?module=bkuadminauditbp"> Kembali</a>
										<button class="btn btn-primary btn-pills" data-toggle="tooltip" data-placement="top" title="Edit" onClick="add_records_auditpengeluaranbp();"> Entry</button>
										<?php if ($count > 0) { ?>
											<button class="btn btn-info btn-pills" data-toggle="tooltip" data-placement="top" title="Edit" onClick="edit_records_auditpengeluaranbp();"> Edit</button>
											<button class="btn btn-danger btn-pills" title="Hapus" data-toggle="tooltip" data-placement="top" onClick="delete_records_auditpengeluaranbp();"> Hapus </button>
										<?php } ?>

										<div id="panel-1" class="panel">
											<div class="panel-hdr">
												<h2>
													Entry Pemeriksaan BKU BP <span class="fw-300"><i></i></span>
												</h2>
											</div>

											<div class="panel-container show">
												<div class="panel-content">
													<table id="example1" class="table table-bordered table-hover table-striped w-100" style="vertical-align: middle;" border="1">
														<thead>
															<tr>
																<th style="text-align:center" class="align-middle" rowspan="2">
																	<input type="checkbox" name="select_all" id="select_all" value="" />
																</th>
																<th style="text-align:center">No</th>
																<th style="text-align:center">ID</th>
																<th style="text-align:center">TANGGAL</th>
																<th style="text-align:center">NAMA AUDIT</th>
																<th style="text-align:center">CATATAN AUDIT</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$no = 1;
															$bag = mysql_query("select * from auditbkuadmin where kd=2 and idbku = $id order by id ");
															while ($bg = mysql_fetch_array($bag)) { ?>
																<tr>
																	<td class="align-middle" style='text-align:center'>
																		<input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $bg['id']; ?>" />
																	</td>
																	<td class="align-middle"><?php echo " $no"; ?></td>
																	<td><?= $bg['idaudit'] ?></td>
																	<td><?= $bg['tglaudit'] ?></td>
																	<td><?= $bg['namaaudit'] ?></td>
																	<td><?= $bg['catatanaudit'] ?></td>
																</tr>
															<?php $no++;
															} ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
			</main>


<?php
	}
}
?>

<script src="assets4/js/pages/form-validation.init.js"></script>