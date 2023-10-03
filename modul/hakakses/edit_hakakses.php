<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/hakakses/aksi_hakakses.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'mod.php?module=hakakses';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>

	<div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
			
                      <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Edit Hak Akses System</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                        <!-- Form Components Row -->
                        <div class="row">
                             <div class="col-xl-6">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=hakakses&act=update" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from hakakses where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
									
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-6">
                                                <label for="validationCustom01" class="form-label">Hak Akses</label>
                                                <input type="text" name="nama_hak_akses" class="form-control" id="validationCustom01"
                                                    placeholder="Hak Akses" value="<?php echo $r[nama_hak_akses];?>" required>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
									   </div>
										
									
								
									<div class="col-md-10">
                                        <button name="edit_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
										 <a type="submit"  href="mod.php?module=hakakses" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>
                                   
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

<script src="assets4/js/pages/form-validation.init.js"></script>