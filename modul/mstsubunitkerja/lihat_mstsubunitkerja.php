<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/mstsubunitkerja/aksi_mstsubunitkerja.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
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
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Lihat Sub Unit Kerja</h4>

                        </div>
                    </div>
                </div>
               
                        <div class="row">
                             <div class="col-xl-10">
                              
                              <div class="card">
                                <div class="card-body">
                                   <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=mstsubunitkerja" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from mstsubunitkerja where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
								
										
									<div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="kodeunit" class="form-label">Kode Unit Kerja</label>
                                                <input type="text" name="kodeunit" class="form-control" id="kodeunit"
                                                value="<?php echo $r[kodeunit];?>" readonly>
                                            </div>
                                        </div>
									</div>
										
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nama_unit_kerja" class="form-label">Nama Unit Kerja</label>
                                                <input type="text" name="nama_unit_kerja" class="form-control" id="nama_unit_kerja"
                                                value="<?php echo $r[nama_unit_kerja];?>" readonly>
                                            </div>
                                        </div>
									</div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kodesub_unit" class="form-label">Kode Sub Unit Kerja</label>
                                                <input type="text" name="kodesub_unit" class="form-control" id="kodesub_unit"
                                                value="<?php echo $r[kodesub_unit];?>" readonly>
                                            </div>
                                        </div>
									</div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="namasub_unit" class="form-label">Nama Sub Unit Kerja</label>
                                                <input type="text" name="namasub_unit" class="form-control" id="namasub_unit"
                                                value="<?php echo $r[namasub_unit];?>" readonly>
                                            </div>
                                        </div>
									</div>
										
									<div class="col-md-10">
										 <a type="submit"  href="perjadin.php?module=mstsubunitkerja" class="btn btn-rounded btn-danger waves-effect waves-light">Kembali</a>
                                   
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
