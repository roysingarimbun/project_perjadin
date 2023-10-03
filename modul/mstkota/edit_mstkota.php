<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:../../404.php');
} else {
	$aksi = "modul/mstkota/aksi_mstkota.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';


	switch ($_GET['act']) {
			// Tampil List View
		default:
			if (isset($_POST['chk']) == "") {
?>
				<script>
					alert('Opsi Belum Di pilih');
					window.location.href = 'perjadin.php?module=mstkota';
				</script>
			<?php
			}
			$chk = $_POST['chk'];
			$chkcount = count($chk);

			?>

			<div class="main-content">
				<div class="page-content">
					<div class="container-fluid">

						<div class="row">
							<div class="col-12">
								<div class="page-title-box d-sm-flex align-items-center justify-content-between">
									<h4 class="mb-sm-0 font-size-18">EDIT KABUPATEN / KOTA</h4>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-10">
								<div class="card">
									<div class="card-body">
										<form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstkota&act=update" method="POST">

											<?php
											for ($i = 0; $i < $chkcount; $i++) {
												$id = $chk[$i];
												$res = mysql_query("select * from mstkota where id=" . $id);
												$r = mysql_fetch_array($res);
											}
											?>
											<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />

											<div class="row">
												<div class="col-md-3">
													<div class="mb-3">
														<label for="kode_kota" class="form-label">KODE KABUPATEN / KOTA</label>
														<input type="text" name="kode_kota" class="form-control" id="kode_kota" placeholder="Isi Kode Kabupaten / Kota" value="<?php echo $r[kode_kota]; ?>" required>
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
														<input type="text" name="nama_kota" class="form-control" id="nama_kota" placeholder="Isi Nama Kabupaten / Kota" value="<?php echo $r[nama_kota]; ?>" required>
														<div class="invalid-tooltip">
															Data Nama Kabupaten / Kota Harus Diisi
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-10">
												<button name="edit_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
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
