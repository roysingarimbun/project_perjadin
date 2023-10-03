<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:../../404.php');
} else {
    $aksi = "modul/mstbendahara/aksi_mstbendahara.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';


    switch ($_GET['act']) {
            // Tampil List View
        default:
            if (isset($_POST['chk']) == "") {
?>
                <script>
                    alert('Opsi Belum Di pilih');
                    window.location.href = 'perjadin.php?module=mstbendahara';
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
                                    <h4 class="mb-sm-0 font-size-18">EDIT BENDAHARA</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-10">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstbendahara&act=update" method="POST">

                                            <?php
                                            for ($i = 0; $i < $chkcount; $i++) {
                                                $id = $chk[$i];
                                                $res = mysql_query("select * from mstbendahara where id=" . $id);
                                                $r = mysql_fetch_array($res);
                                            }
                                            ?>
                                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="nip_bend" class="form-label">NIP</label>
                                                        <input type="text" name="nip_bend" class="form-control" id="nip_bend" placeholder="Isi NIP" value="<?php echo $r[nip_bend]; ?>" required>
                                                        <div class="invalid-tooltip">
                                                            Data NIP Harus Diisi
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nama_bend" class="form-label">NAMA</label>
                                                        <input type="text" name="nama_bend" class="form-control" id="nama_bend" placeholder="Isi Nama" value="<?php echo $r[nama_bend]; ?>" required>
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
                                                        <input type="text" name="namaunit" class="form-control" id="validationTooltip04" value="<?= $r['namaunit'] ?>" readonly>
                                                        <div class="invalid-tooltip">
                                                            Nama Unit Diisikan
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 mb-3">
                                                        <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                        <button type="button" class="btn btn-primary form-control mt-1" id="cariNamaunitkerja">cari</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <button name="edit_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
                                                <a type="submit" href="perjadin.php?module=mstbendahara" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>

                                            </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModalNamaunitkerja" class="modal">
                <!-- Konten modal -->
                <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                            <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body container mt-2">
                            <div class="search-container">
                                <input type="text" class="search-input" placeholder="Cari..." id="searchInputNamaunitkerja">
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
                                <tbody> <?php
                                        $index = 1;
                                        $listKodeunitkerja = mysql_query("SELECT * FROM mstunitkerja");
                                        while ($data = mysql_fetch_array($listKodeunitkerja)) { ?>
                                        <tr onclick="pilihNamaunitkerja('<?= $data['nama_unit']; ?>')">
                                            <td> <?= $index++ ?> </td>
                                            <td> <?= $data['kode_unit']; ?> </td>
                                            <td> <?= $data['nama_unit']; ?> </td>
                                        </tr> <?php } ?>
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