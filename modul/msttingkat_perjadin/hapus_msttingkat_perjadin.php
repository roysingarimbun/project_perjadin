<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/msttingkat_perjadin/aksi_msttingkat_perjadin.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'perjadin.php?module=msttingkat_perjadin';
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
                            <h4 class="mb-sm-0 font-size-18">Hapus Tingkat Perjalanan Dinas</h4>

                        </div>
                    </div>
                </div>
              
                        <div class="row">
                             <div class="col-xl-10">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=msttingkat_perjadin&act=hapus" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from msttingkat_perjadin where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
									
									<div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="kode_perjadin" class="form-label">Kode Perjalanan Dinas</label>
                                                <input type="text" name="kode_perjadin" class="form-control" id="kode_perjadin"
                                                   placeholder="Hapus Data Kode Perjalanan Dinas" value="<?php echo $r[kode_perjadin];?>" readonly>
                                            </div>
                                        </div>
									</div>
										
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="uraian" class="form-label">Uraian Perjalanan Dinas</label>
                                                <input type="text" name="uraian" class="form-control" id="uraian"
                                                   placeholder="Hapus Data Uraian Perjalanan Dinas" value="<?php echo $r[uraian];?>" readonly>
                                            </div>
                                        </div>
									</div>										
										
									<div class="col-md-10">
                                        <button name="hapus_data" class="btn btn-rounded btn-danger waves-effect waves-light">Hapus</button>
										 <a type="submit"  href="perjadin.php?module=msttingkat_perjadin" class="btn btn-rounded btn-primary waves-effect waves-light">Batal</a>
                                   
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

