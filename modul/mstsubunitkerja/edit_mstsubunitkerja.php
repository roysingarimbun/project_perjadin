<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:../../404.php');
} else {
    $aksi = "modul/mstsubunitkerja/aksi_mstsubunitkerja.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';


    switch ($_GET['act']) {
            // Tampil List View
        default:
            if (isset($_POST['chk']) == "") {
?>
                <script>
                    alert('Opsi Belum Di pilih');
                    window.location.href = 'perjadin.php?module=mstsubunitkerja';
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
                                <h2>
                                    Edit Sub Unit Kerja<span class="fw-300"></span>
                                </h2>
                            </div>
                            <div class="panel-container show">

                                <div class="panel-content p-0">
                                    <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstsubunitkerja&act=update" id="js-editdata" method="POST" enctype="multipart/form-data">
                                        <?php
                                        for ($i = 0; $i < $chkcount; $i++) {
                                            $id = $chk[$i];
                                            $res = mysql_query("select * from mstsubunitkerja where id=" . $id);
                                            $r = mysql_fetch_array($res);
                                        }
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
                                        <div class="panel-content">

                                            <div class="row">
                                                <div class="col-md-5 mb-3">
                                                    <label class="form-label" for="validationTooltip04">Nama Unit Kerja<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_unit_kerja" class="form-control" id="validationTooltip04" value="<?= $r['nama_unit_kerja'] ?>" readonly>
                                                    <div class="invalid-tooltip">
                                                        Nama Unit Harus Diisikan
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mb-3">
                                                    <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                    <button type="button" class="btn btn-primary form-control mt-1" id="cariNamaSubUnit">cari</button>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="validationTooltip04">Kode Sub Unit <span class="text-danger">*</span></label>
                                                    <input type="text" name="kodesub_unit" class="form-control" id="validationTooltip03" placeholder="Kode Strategi" aria-describedby="inputGroupPrepend2" value="<?php echo $r[kodesub_unit]; ?>" required>
                                                    <div class="invalid-tooltip">
                                                        Kode Sub Unit Harus Diisikan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" for="validationTooltip04">Nama Sub Unit <span class="text-danger">*</span></label>
                                                    <input type="text" name="namasub_unit" class="form-control" id="validationTooltip04" placeholder="Nama Sub Unit" value="<?= $r['namasub_unit'] ?>" required>
                                                    <div class="invalid-tooltip">
                                                        Nama Sub Unit Harus Diisikan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-group">
                                            <div class="col-md-6 mb-3">
                                                <a type="submit" href="perjadin.php?module=mstsubunitkerja" class="btn btn-danger"></i> Kembali</a>
                                                <button type="submit" id="js-editdata-btn" name="edit_data" class="btn btn-info pull-right"></i> simpan</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div id="myModalSubunit" class="modal">
                            <!-- Konten modal -->
                            <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                                        <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body container mt-2">
                                        <div class="search-container">
                                            <input type="text" class="search-input" placeholder="Cari..." id="searchInputSubunit">
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
                                                $listSubUnit = mysql_query("SELECT DISTINCT kode_unit, nama_unit FROM mstunitkerja");
                                                $i = 1;
                                                while ($kodeunit = mysql_fetch_array($listSubUnit)) { ?>
                                                    <tr onclick="pilihNamasubunit('<?= $kodeunit['nama_unit'] ?>')">
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $kodeunit['kode_unit'] ?></td>
                                                        <td><?= $kodeunit['nama_unit'] ?></td>
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
                    </div>
                </div>
            </div>
            </main>



<?php
    }
}
?>