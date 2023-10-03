<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:../../404.php');
} else {
    $aksi = "modul/msttandatangan/aksi_msttandatangan.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';


    switch ($_GET['act']) {
            // Tampil List View
        default:
            if (isset($_POST['chk']) == "") {
?>
                <script>
                    alert('Opsi Belum Di pilih');
                    window.location.href = 'perjadin.php?module=msttandatangan';
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
                                    EDIT PENANDATANGANAN DOKUMEN<span class="fw-300"></span>
                                </h2>
                            </div>
                            <div class="panel-container show">

                                <div class="panel-content p-0">
                                    <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=msttandatangan&act=update" id="js-editdata" method="POST" enctype="multipart/form-data">
                                        <?php
                                        for ($i = 0; $i < $chkcount; $i++) {
                                            $id = $chk[$i];
                                            $res = mysql_query("select * from msttandatangan where id=" . $id);
                                            $r = mysql_fetch_array($res);
                                        }
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
                                        <div class="panel-content">                                          
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="kode" class="form-label">KODE</label>
                                                        <input type="text" name="kode" class="form-control" id="kode" placeholder="Isi Kode" value="<?php echo $r[kode];?>"required>
                                                        <div class="invalid-tooltip">
                                                            Data Kode Harus Diisi
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">NAMA</label>
                                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Isi Nama" value="<?php echo $r[nama];?>" required>
                                                        <div class="invalid-tooltip">
                                                            Data Nama Harus Diisi
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 mb-3">
                                                    <label class="form-label" for="validationTooltip04">NAMA JABATAN<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_jab" class="form-control" id="validationTooltip04" value="<?php echo $r[nama_jab];?>"readonly>
                                                    <div class="invalid-tooltip">
                                                        Nama Jabatan Harus Diisikan
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mb-3">
                                                    <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                    <button type="button" class="btn btn-primary form-control mt-1" id="cariNamajabatan">cari</button>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5 mb-3">
                                                    <label class="form-label" for="validationTooltip04">NAMA UNIT KERJA<span class="text-danger">*</span></label>
                                                    <input type="text" name="unitkerja" class="form-control" id="validationTooltip04" value="<?php echo $r[unitkerja];?>" readonly>
                                                    <div class="invalid-tooltip">
                                                        Nama Unit Harus Diisikan
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mb-3">
                                                    <label class="form-label" for="validationTooltip04"><span class="text-danger"></span></label>
                                                    <button type="button" class="btn btn-primary form-control mt-1" id="cariUnitkerja">cari</button>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-row form-group">
                                            <div class="col-md-6 mb-3">
                                                <a type="submit" href="perjadin.php?module=msttandatangan" class="btn btn-danger"></i> Kembali</a>
                                                <button type="submit" id="js-editdata-btn" name="edit_data" class="btn btn-info pull-right"></i> simpan</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div id="myModalNamajabatan" class="modal">
                            <!-- Konten modal -->
                            <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                                        <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body container mt-2">
                                        <div class="search-container">
                                            <input type="text" class="search-input" placeholder="Cari..." id="searchInputNamajabatan">
                                            <button class="search-button">
                                                <i class="fa-solid fa-magnifying-glass" class="search-icon"></i>
                                            </button>
                                        </div>
                                        <table id="dataTable" class="table table-bordered table-hover table-striped popup-table">
                                            <thead>
                                                <tr>
                                                    <th>No. </th>
                                                    <th>Kode Jabatan</th>
                                                    <th>Nama Jabatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $listNamajabatan = mysql_query("SELECT DISTINCT kodejab, namajab FROM mstjabatan");
                                                $i = 1;
                                                while ($data = mysql_fetch_array($listNamajabatan)) { ?>
                                                    <tr onclick="pilihNamajabatan('<?= $data['namajab'] ?>')">
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $data['kodejab'] ?></td>
                                                        <td><?= $data['namajab'] ?></td>
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

                        <div id="myModalUnitkerja" class="modal">
                            <!-- Konten modal -->
                            <div class="modal-dialog modal-dialog-scrollable" style="height: 500px; width: 500px">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white">Pencarian Otomatis</h5>
                                        <button type="button" class="close text-white close-btn" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body container mt-2">
                                        <div class="search-container">
                                            <input type="text" class="search-input" placeholder="Cari..." id="searchInputUnitkerja">
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
                                                $listUnitkerja = mysql_query("SELECT DISTINCT kode_unit, nama_unit FROM mstunitkerja");
                                                $i = 1;
                                                while ($data = mysql_fetch_array($listUnitkerja)) { ?>
                                                    <tr onclick="pilihUnitkerja('<?= $data['nama_unit'] ?>')">
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $data['kode_unit'] ?></td>
                                                        <td><?= $data['nama_unit'] ?></td>
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