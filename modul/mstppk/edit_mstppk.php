<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:../../404.php');
} else {
    $aksi = "modul/mstppk/aksi_mstppk.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';


    switch ($_GET['act']) {
            // Tampil List View
        default:
            if (isset($_POST['chk']) == "") {
?>
                <script>
                    alert('Opsi Belum Di pilih');
                    window.location.href = 'perjadin.php?module=mstppk';
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
                                    <h4 class="mb-sm-0 font-size-18">EDIT PPK</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-10">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstppk&act=update" method="POST">

                                            <?php
                                            for ($i = 0; $i < $chkcount; $i++) {
                                                $id = $chk[$i];
                                                $res = mysql_query("select * from mstppk where id=" . $id);
                                                $r = mysql_fetch_array($res);
                                            }
                                            ?>
                                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="nip" class="form-label">NIP</label>
                                                        <input type="text" name="nip" class="form-control" id="nip" placeholder="Isi NIP" value="<?php echo $r[nip]; ?>" required>
                                                        <div class="invalid-tooltip">
                                                            Data NIP Harus Diisi
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">NAMA</label>
                                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Isi Nama" value="<?php echo $r[nama]; ?>" required>
                                                        <div class="invalid-tooltip">
                                                            Data Nama Harus Diisi
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel-content">
                                                <div class="row">
                                                    <div class="col-md-5 mb-3">
                                                        <label class="form-label" for="validationTooltip04">NAMA UNIT<span class="text-danger">*</span></label>
                                                        <input type="text" name="namaunit_kerja" class="form-control" id="validationTooltip04" value="<?= $r['namaunit_kerja'] ?>" readonly>
                                                        <div class="invalid-tooltip">
                                                            Nama Unit Diisikan
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 mb-3">
                                                        <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                        <button type="button" class="btn btn-primary form-control mt-1" id="cariNamaunit">cari</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-10">
                                                <button name="edit_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
                                                <a type="submit" href="perjadin.php?module=mstppk" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>

                                            </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModalNamaunit" class="modal">
                <!-- Konten modal -->
                <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                            <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body container mt-2">
                            <div class="search-container">
                                <input type="text" class="search-input" placeholder="Cari..." id="searchInputNamaunit">
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
                                    $index = 1;
                                    $listKodeunit = mysql_query("SELECT * FROM mstunitkerja");
                                    while ($namaunit_kerja = mysql_fetch_array($listKodeunit)) { ?>
                                        <tr onclick="pilihNamaunit('<?= $namaunit_kerja['nama_unit']; ?>')">
                                            <td><?= $index++ ?></td>
                                            <td><?= $namaunit_kerja['kode_unit']; ?></td>
                                            <td><?= $namaunit_kerja['nama_unit']; ?></td>
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
<?php
    }
}
?>

<script src="assets4/js/pages/form-validation.init.js"></script>