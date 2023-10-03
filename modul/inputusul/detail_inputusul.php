<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) && empty($_SESSION['ses_password'])) {
    header('location:../../404.php');
} else {
    $aksi = "modul/mstusulankonkin/aksi_mstusulankonkin.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($_GET['act']) {
        default:
            if (empty($_POST['chk'])) {
                if (empty($_GET['chk'])) {
                    ?>
                    <script>
                        alert('Opsi Belum Dipilih');
                        window.location.href = 'sipinter.php?module=mstusulankonkin';
                    </script>
                    <?php
                }else{
                    $chk = $_GET['chk'];
                    $id = $chk;
                }
   
            }else{
                $chk = $_POST['chk'];
                $chkcount = count($chk);
                for ($i = 0; $i < $chkcount; $i++) {
                    $id = $chk[$i];
                }
            }
            ?>

<script>
        // Use jQuery to handle the checkbox change event
        $(document).ready(function() {
            $('#edit_detail').on('click', function() {
            // Get the value of the checked checkbox
            var value = $('.chk-box:checked').val();

            // Check if a checkbox is checked
            if (value) {
                $.ajax({
                    method: 'GET',
                    url: 'modul/mstusulankonkin/aksi_mstusulankonkin.php',
                    data: {
                        id_detail: value
                    },
                    success: function(data) {
                        // Update the modal body with the retrieved data
                        $('#modalbodydetail').html(data);
                        // Show the modal
                        $('#editdetail').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    });
    </script>

<!-- SQL -->
<?php
$hasildetail = mysql_query("SELECT * FROM mstkonkinpegawai WHERE id='" . $id . "'");
$check = mysql_fetch_array($hasildetail);
$pangkat = mysql_query("SELECT * FROM mstpangkat WHERE kodegol='" . $check['kodegol'] . "'");
$tampilpangkat = mysql_fetch_array($pangkat);
$jabatan = mysql_query("SELECT * FROM mstjabatan WHERE kodejab='" . $check['kodejab'] . "'");
$tampiljabatan = mysql_fetch_array($jabatan);
//================= SQL FOR TABLE ==================//
$table = mysql_query("SELECT * FROM detailmstkonkinpegawai WHERE id_awal='" . $check['idkonkin'] . "'");
$hasrow = mysql_num_rows($table);
// ================ SQL MODAL =====================//
$mstss = mysql_query("SELECT * FROM mstindikator_kinerja");
$mstsat = mysql_query("SELECT * FROM mstsatuan");
?>

            <div class="page-wrapper">
                <div class="page-inner">
                    <div class="page-content-wrapper">
                        <main id="js-page-content" role="main" class="page-content">
                        <div class="p-1">
                                <a href="sipinter.php?module=mstusulankonkin" class="btn btn-secondary btn-pills text-white">Kembali</a>
                                </div>
                            <div id="panel-5" class="panel">
                                <div class="panel-hdr">
                                    <h2>DETAIL USULAN KONTRAK KINERJA</h2>
                                </div>
                                <div class="panel-container show">
                                        <div class="p-5">
                                            <div class="form-row form-group">
                                                <div class="col-md-3 mb-3">
                                                    <label for="formid" class="form-label">ID</label>
                                                    <div class="input-group">
                                                        <input type="text" name="idkonkin" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['idkonkin']; ?>" readonly>
                                                        <input type="text" name="id" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['id']; ?>" hidden>
                                                        <div class="invalid-tooltip">Id Kosong</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="formtahun" class="form-label">Tahun</label>
                                                    <div class="input-group">
                                                    <input type="text" name="tahun" id="formtahun" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['tahun']; ?>" readonly>
                                                    <div class="invalid-tooltip">Tahun Kosong</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="formid" class="form-label"> Unit Kerja</label>
                                                    <div class="input-group">
                                                    <input type="text" name="unitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_unit']; ?>" readonly>
                                                    <div class="invalid-tooltip">Unit Kerja Kosong</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row form-group">
                                                <div class="col-md-6 mb-3">
                                                    <label for="formid" class="form-label">Sub Unit Kerja</label>
                                                    <div class="input-group">
                                                    <input type="text" name="subunitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_sub_unit']; ?>" readonly>
                                                    <div class="invalid-tooltip">Sub Unit Kerja Kosong</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="formid" class="form-label">Sub Sub Unit Kerja</label>
                                                    <div class="input-group">
                                                    <input type="text" name="subsubunitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2"  value="<?= $check['nama_sub_sub_unit']; ?>" readonly>
                                                    <div class="invalid-tooltip">Sub Sub Unit Kerja Kosong</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row form-group">
                                                <div class="col-md-8 mb-3">
                                                    <label for="formid" class="form-label">Nama</label>
                                                    <div class="input-group">
                                                    <input type="text" name="nama" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_pegawai']; ?>" readonly>
                                                    <div class="invalid-tooltip">Nama Kosong</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="formid" class="form-label">NIP / NIB</label>
                                                    <div class="input-group">
                                                    <input type="text" name="nip" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nip_pegawai']; ?>" readonly>
                                                    <div class="invalid-tooltip">NIP / NIB Kosong</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row form-group">
                                                <div class="col-md-6 mb-3">
                                                    <label for="formid" class="form-label">Pangkat / Golongan</label>
                                                    <div class="input-group">
                                                    <input type="text" name="pangkat" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $tampilpangkat['pangkat'] ?>" readonly>
                                                    <div class="invalid-tooltip">Pangkat Kosong</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="formid" class="form-label">Jabatan</label>
                                                    <div class="input-group">
                                                    <input type="text" name="jabatan" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $tampiljabatan['namajab']; ?>" readonly>
                                                    <div class="invalid-tooltip">Jabatan Kosong</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-container show">
                                            <div class="panel-content">
                                                <div class="panel-hdr mb-2">
                                                    <h2>DETAIL USULAN KONTRAK KINERJA PEGAWAI | <?= $check['nama_pegawai'] ?></h2>
                                                </div>
                                                <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstusulankonkin&act=detail" id="js-simpandata" method="POST" enctype="multipart/form-data" name="frm">
                                                <div class="float-right">
                                                    <a data-toggle="modal" data-target="#themodal" class="btn btn-success text-white">Entry</a>
                                                <?php if ($hasrow > 0) { ?>
                                                    <a id="edit_detail" class="btn btn-info text-white">Edit</a>
                                                    <button type="submit" class="btn btn-danger text-white" data-toggle="tooltip" name="hapus_detail" data-placement="top" title="Hapus Detail">Hapus</button>
                                                <?php } ?>
                                                </div>
                                                    <table id="example13" class="table table-bordered table-striped w-100">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="align-middle"><input type="checkbox" name="select_all" id="select_all" value=""></th>
                                                                <th rowspan="2" class="align-middle">NO</th>
                                                                <th colspan="2">SASARAN STRATEGIS</th>
                                                                <th colspan="2">INDIKATOR KINERJA</th>
                                                                <th rowspan="2" class="align-middle">SAT</th>
                                                                <th rowspan="2" class="align-middle">VOL</th>
                                                                <th colspan="2">TARGET</th>
                                                                <th rowspan="2" class="align-middle">VERIFIKASI</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Kode</th>
                                                                <th>Uraian</th>
                                                                <th>Kode</th>
                                                                <th>Uraian</th>
                                                                <th>SEM I</th>
                                                                <th>TAHUN</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            while ($hasiltable= mysql_fetch_array($table)) {
                                                            ?>
                                                                <tr>
                                                                    <td><input type="checkbox" name="chk[]" class="chk-box" value="<?= $hasiltable['id']; ?>"></td>
                                                                    <td><?= $no++ ?></td>
                                                                    <td><?= $hasiltable['kode_ss'] ?></td>
                                                                    <td><?= $hasiltable['uraian_ss'] ?></td>
                                                                    <td><?= $hasiltable['kode_ik'] ?></td>
                                                                    <td><?= $hasiltable['uraian_ik'] ?></td>
                                                                    <td><?= $hasiltable['sat'] ?></td>
                                                                    <td><?= $hasiltable['vol'] ?></td>
                                                                    <td><?= $hasiltable['target_sem1'] ?></td>
                                                                    <td><?= $hasiltable['target_tahun'] ?></td>
                                                                    <td class = "center"><?php if (empty($hasiltable['verifikasi'])) {
                                                                        ?>
                                                                        <span class="text-warning fas fa-question"></span>
                                                                        <?php
                                                                    }else if($hasiltable['verifikasi']=='Diterima'){
                                                                        ?>
                                                                        <span class="text-success fas fa-check"></span>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <span class="text-danger fas fa-xmark"></span>
                                                                        <?php
                                                                    } ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>

<?php
            break;
    }
}
?>


<!-- Modal Entry Detail -->
<div class="modal fade" id="themodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr">
                <h5 class="modal-title" id="exampleModalLabel">ENTRY DETAIL KONTRAK KINERJA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-2">
                    <div class="form-row form-group">
                        <div class="col-md-3 mb-3">
                            <label for="formid" class="form-label">ID</label>
                            <div class="input-group">
                            <input type="text" name="idkonkin" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['idkonkin']; ?>" readonly>
                            <input type="text" name="id" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['id']; ?>" hidden>
                            <div class="invalid-tooltip">Id Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="formtahun" class="form-label">Tahun</label>
                            <div class="input-group">
                            <input type="text" name="tahun" id="formtahun" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['tahun']; ?>" readonly>
                            <div class="invalid-tooltip">Tahun Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formid" class="form-label"> Unit Kerja</label>
                            <div class="input-group">
                            <input type="text" name="unitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_unit']; ?>" readonly>
                            <div class="invalid-tooltip">Unit Kerja Kosong</div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-6 mb-3">
                            <label for="formid" class="form-label">Sub Unit Kerja</label>
                            <div class="input-group">
                            <input type="text" name="subunitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_sub_unit']; ?>" readonly>
                            <div class="invalid-tooltip">Sub Unit Kerja Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formid" class="form-label">Sub Sub Unit Kerja</label>
                            <div class="input-group">
                            <input type="text" name="subsubunitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_sub_sub_unit']; ?>" readonly>
                            <div class="invalid-tooltip">Sub Sub Unit Kerja Kosong</div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-8 mb-3">
                            <label for="formid" class="form-label">Nama</label>
                            <div class="input-group">
                            <input type="text" name="nama" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_pegawai']; ?>" readonly>
                            <div class="invalid-tooltip">Nama Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="formid" class="form-label">NIP / NIB</label>
                            <div class="input-group">
                            <input type="text" name="nip" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nip_pegawai']; ?>" readonly>
                            <div class="invalid-tooltip">NIP / NIB Kosong</div>
                        </div>
                        </div>
                    </div>
                <div class="border rounded p-5 mb-3">
                    <div class="panel-hdr mb-3">
                        <h2>SASARAN STRATEGIS</h2>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-5">
                            <label for="validationTooltip03" class="form-label">Kode</label>
                            <div class="input-group">
                            <input type="text" name="kode_ss" id="validationTooltip03" placeholder="Kode Sasaran Strategis" class="form-control" aria-describedby="inputGroupPrepend2" onkeypress="return false;" required>
                            <div class="invalid-tooltip">Kode Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-7">
                            <label for="validationTooltip03" class="form-label">Uraian</label>
                            <div class="input-group">
                            <input type="text" name="uraian_ss" id="validationTooltip03" placeholder="Uraian Sasaran Strategis" class="form-control" aria-describedby="inputGroupPrepend2" onkeypress="return false;" required>
                            <div class="invalid-tooltip">Uraian Kosong</div>
                        </div>
                        </div>
                    </div>
                    <div class="panel-hdr mb-4">
                        <h2>INDIKATOR KINERJA</h2>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-5">
                            <label for="validationTooltip03" class="form-label">Kode</label>
                            <div class="input-group">
                            <input type="text" name="kode_ik" id="validationTooltip03" placeholder="Kode Indikator Kinerja" class="form-control" aria-describedby="inputGroupPrepend2" onkeypress="return false;" required>
                            <div class="invalid-tooltip">Kode Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-7">
                            <label for="validationTooltip03" class="form-label">Uraian</label>
                            <div class="input-group">
                            <input type="text" name="uraian_ik" id="validationTooltip03" placeholder="Uraian Indikator Kinerja" class="form-control" aria-describedby="inputGroupPrepend2" onkeypress="return false;" required>
                            <div class="invalid-tooltip">Uraian Kosong</div>
                        </div>
                        </div>
                    </div>
                    <a data-toggle="modal" data-target="#datafill" class="btn btn-success text-white w-100 mb-5">Cari</a>
                    <div class="form-row form-group">
                    <div class="col-md-6 mb-3">
                            <label for="validationTooltip03" class="form-label">Volume</span></label>
                            <div class="input-group">
                            <input type="number" min="0" name="vol" id="validationTooltip03" placeholder="Volume" class="form-control" aria-describedby="inputGroupPrepend2" required>
                            <div class="invalid-tooltip">Volume Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip03" class="form-label">Satuan</span></label>
                            <div class="input-group">
                                <input type="text" name="sat" id="validationTooltip03" placeholder="Satuan" class="form-control" aria-describedby="inputGroupPrepend2" readonly>
                                <div class="invalid-tooltip">Satuan Kosong</div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                        <a data-toggle="modal" data-target="#datafillsat" class="btn btn-success text-white w-100 mt-4">Cari</a>
                            
                        </div>
                    </div>
                </div>
                <div class="border rounded p-5">    
                    <div class="panel-hdr mb-3">
                        <h2>TARGET</h2>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip03" class="form-label">Semester I</span></label>
                        <div class="input-group">
                            <input type="number" min="0" name="target_sem" id="validationTooltip03" placeholder="Target Semester I" class="form-control" aria-describedby="inputGroupPrepend2" required>
                            <div class="invalid-tooltip">Target Semester I Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip03" class="form-label">Tahun</span></label>
                        <div class="input-group">
                            <input type="number" min="0" name="target_tahun" id="validationTooltip03" placeholder="Target Tahunan" class="form-control" aria-describedby="inputGroupPrepend2" required>
                            <div class="invalid-tooltip">Target Tahun Kosong</div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="entry_data_detail">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>    
        </div>
    </div>
</div>
</form>
<!-- Modal Edit Data Detail -->
<div class="modal fade" id="editdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr">
                <h5 class="modal-title" id="exampleModalLabel">EDIT DETAIL KONTRAK KINERJA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-2">
                <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstusulankonkin&act=editdetail" id="js-simpandata" method="POST" enctype="multipart/form-data">
                    <div class="form-row form-group">
                        <div class="col-md-3 mb-3">
                            <label for="formid" class="form-label">ID</label>
                            <div class="input-group">
                            <input type="text" name="idkonkin" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['idkonkin']; ?>" readonly>
                            <input type="text" name="id" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['id']; ?>" hidden>
                            <div class="invalid-tooltip">Id Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="formtahun" class="form-label">Tahun</label>
                            <div class="input-group">
                            <input type="text" name="tahun" id="formtahun" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['tahun']; ?>" readonly>
                            <div class="invalid-tooltip">Tahun Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formid" class="form-label"> Unit Kerja</label>
                            <div class="input-group">
                            <input type="text" name="unitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_unit']; ?>" readonly>
                            <div class="invalid-tooltip">Unit Kerja Kosong</div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-6 mb-3">
                            <label for="formid" class="form-label">Sub Unit Kerja</label>
                            <div class="input-group">
                            <input type="text" name="subunitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_sub_unit']; ?>" readonly>
                            <div class="invalid-tooltip">Sub Unit Kerja Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formid" class="form-label">Sub Sub Unit Kerja</label>
                            <div class="input-group">
                            <input type="text" name="subsubunitkerja" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_sub_sub_unit']; ?>" readonly>
                            <div class="invalid-tooltip">Sub Sub Unit Kerja Kosong</div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-8 mb-3">
                            <label for="formid" class="form-label">Nama</label>
                            <div class="input-group">
                            <input type="text" name="nama" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nama_pegawai']; ?>" readonly>
                            <div class="invalid-tooltip">Nama Kosong</div>
                        </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="formid" class="form-label">NIP / NIB</label>
                            <div class="input-group">
                            <input type="text" name="nip" id="formid" class="form-control" aria-describedby="inputGroupPrepend2" value="<?= $check['nip_pegawai']; ?>" readonly>
                            <div class="invalid-tooltip">NIP / NIB Kosong</div>
                        </div>
                        </div>
                    </div>
                    <div id="modalbodydetail">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="edit_data_detail">Edit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
</form>
        </div>
    </div>
</div>
<!-- Modal Data Fill Kinerja -->
<div class="modal fade" id="datafill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr">
                <h5 class="modal-title" id="exampleModalLabel">INDIKATOR KINERJA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-container">
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped" style="text-align: center; vertical-align: middle;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Strategis</th>
                                <th>Uraian Strategis</th>
                                <th>Kode Indikator</th>
                                <th>Uraian Indikator</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1; 
                            while ($hasil_mstss = mysql_fetch_array($mstss)) { ?>
                                <tr onclick="selectss(['<?=$hasil_mstss['kdstrategis'];?>','<?=$hasil_mstss['ketstrategis'];?>','<?=$hasil_mstss['kdindikator'];?>','<?= $hasil_mstss['namaindikator'];?>'])">
                                    <td><?= $no++ ?></td>
                                    <td><?= $hasil_mstss['kdstrategis']; ?></td>
                                    <td><?= $hasil_mstss['ketstrategis']; ?></td>
                                    <td><?= $hasil_mstss['kdindikator']; ?></td>
                                    <td><?= $hasil_mstss['namaindikator']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Data Fill satuan -->
<div class="modal fade" id="datafillsat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header panel-hdr">
                <h5 class="modal-title" id="exampleModalLabel">DATA SATUAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-container">
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped" style="text-align: center; vertical-align: middle;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Satuan</th>
                                <th>Deskripsi Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1; 
                            while ($hasil_mstsat = mysql_fetch_array($mstsat)) { ?>
                                <tr onclick="selectsat(['<?= $hasil_mstsat['satuan']; ?>','<?= $hasil_mstsat['desk_satuan']; ?>'])">
                                    <td><?= $no++ ?></td>
                                    <td><?= $hasil_mstsat['satuan']; ?></td>
                                    <td><?= $hasil_mstsat['desk_satuan']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>