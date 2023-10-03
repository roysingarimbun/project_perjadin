<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:../../404.php');
} else {
    $aksi = "modul/mstperaturan/aksi_mstperaturan.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';


    switch ($_GET['act']) {
            // Tampil List View
        default:
            if (isset($_POST['chk']) == "") {
?>
                <script>
                    alert('Opsi Belum Di pilih');
                    window.location.href = 'perjadin.php?module=mstperaturan';
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
                                    <h4 class="mb-sm-0 font-size-18">Lihat Dasar Peraturan</h4>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-10">

                                <div class="card">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate action="<?php echo $aksi; ?>?module=mstperaturan" method="POST">

                                            <?php
                                            for ($i = 0; $i < $chkcount; $i++) {
                                                $id = $chk[$i];
                                                $res = mysql_query("select * from mstperaturan where id=" . $id);
                                                $r = mysql_fetch_array($res);
                                            }
                                            ?>
                                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />


                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="kode_peraturan" class="form-label">KODE</label>
                                                        <input type="text" name="kode_peraturan" class="form-control" id="kode_peraturan" placeholder="Kode" value="<?php echo $r[kode_peraturan]; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel-content">
                                                <div class="form-row form-group">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="validationTooltip04">URAIAN<span class="text-danger">*</span></label>
                                                        <textarea type="text" name="uraian_peraturan" class="form-control" id="validationTooltip04" placeholder="Uraian" required><?php echo $r[uraian_peraturan]; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10">
                                                <a type="submit" href="perjadin.php?module=mstperaturan" class="btn btn-rounded btn-danger waves-effect waves-light">Kembali</a>

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