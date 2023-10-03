<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/mstbendahara/aksi_mstbendahara.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
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
                            <h4 class="mb-sm-0 font-size-18">HAPUS PPK</h4>

                        </div>
                    </div>
                </div>
              
                        <div class="row">
                             <div class="col-xl-10">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=mstbendahara&act=hapus" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from mstbendahara where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
									
									   	<div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="nip_bend" class="form-label">NIP</label>
                                                    <input type="text" name="nip_bend" class="form-control" id="nip_bend"
                                                    value="<?php echo $r[nip_bend];?>" readonly>
                                                </div>
                                            </div>
									    </div>
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nama_bend" class="form-label">NAMA</label>
                                                    <input type="text" name="nama_bend" class="form-control" id="nama_bend"
                                                    value="<?php echo $r[nama_bend];?>" readonly>
                                                </div>
                                            </div>
									   </div>
                                       <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="namaunit" class="form-label">NAMA UNIT</label>
                                                    <input type="text" name="namaunit" class="form-control" id="namaunit"
                                                    value="<?php echo $r[namaunit];?>" readonly>
                                                </div>
                                            </div>
									    </div>										
									<div class="col-md-10">
                                        <button name="hapus_data" class="btn btn-rounded btn-danger waves-effect waves-light">Hapus</button>
										 <a type="submit"  href="perjadin.php?module=mstbendahara" class="btn btn-rounded btn-primary waves-effect waves-light">Batal</a>
                                   
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

