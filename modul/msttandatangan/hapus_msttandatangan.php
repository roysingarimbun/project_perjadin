<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/msttandatangan/aksi_msttandatangan.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
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
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Hapus Penandatanganan Dokumen</h4>

                        </div>
                    </div>
                </div>
              
                        <div class="row">
                             <div class="col-xl-10">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=msttandatangan&act=hapus" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from msttandatangan where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
									
									<div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="kode" class="form-label">KODE</label>
                                                <input type="text" name="kode" class="form-control" id="kode"
                                                   placeholder="Kode" value="<?php echo $r[kode];?>" readonly>
                                            </div>
                                        </div>
									</div>
										
									<div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">NAMA</label>
                                                <input type="text" name="nama" class="form-control" id="nama"
                                                   placeholder="Nama" value="<?php echo $r[nama];?>" readonly>
                                            </div>
                                        </div>
									</div>
									
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">NAMA</label>
                                                <input type="text" name="nama" class="form-control" id="nama"
                                                   placeholder="Nama" value="<?php echo $r[nama];?>" readonly>
                                            </div>
                                        </div>
									</div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="kode_jab" class="form-label">KODE JABATAN</label>
                                                <input type="text" name="kode_jab" class="form-control" id="kode_jab"
                                                   placeholder="Kode Jabatan" value="<?php echo $r[kode_jab];?>" readonly>
                                            </div>
                                        </div>
									</div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="nama_jab" class="form-label">NAMA JABATAN</label>
                                                <input type="text" name="nama_jab" class="form-control" id="nama_jab"
                                                   placeholder="Nama Jabatan" value="<?php echo $r[nama_jab];?>" readonly>
                                            </div>
                                        </div>
									</div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="kodeunit" class="form-label">KODE UNIT</label>
                                                <input type="text" name="kodeunit" class="form-control" id="kodeunit"
                                                   placeholder="Kode Unit" value="<?php echo $r[kodeunit];?>" readonly>
                                            </div>
                                        </div>
									</div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="unitkerja" class="form-label">UNIT KERJA</label>
                                                <input type="text" name="unitkerja" class="form-control" id="unitkerja"
                                                   placeholder="Unit Kerja" value="<?php echo $r[unitkerja];?>" readonly>
                                            </div>
                                        </div>
									</div>
										
									<div class="col-md-10">
                                        <button name="hapus_data" class="btn btn-rounded btn-danger waves-effect waves-light">Hapus</button>
										 <a type="submit"  href="perjadin.php?module=msttandatangan" class="btn btn-rounded btn-primary waves-effect waves-light">Batal</a>
                                   
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

