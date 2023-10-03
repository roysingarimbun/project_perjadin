<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/mstpangkat/aksi_mstpangkat.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'perjadin.php?module=mstpangkat';
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
                            <h4 class="mb-sm-0 font-size-18">Lihat Pangkat Golongan</h4>

                        </div>
                    </div>
                </div>
               
                    <div class="row">
                             <div class="col-xl-10">
                              
                              <div class="card">
                                <div class="card-body">
                                   <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=mstpangkat" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from mstpangkat where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
								
										
									<div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="namapangkat" class="form-label">Nama Pangkat</label>
                                                <input type="text" name="namapangkat" class="form-control" id="namapangkat"
                                                   placeholder="Kode Unit" value="<?php echo $r[namapangkat];?>" readonly>
                                            </div>
                                        </div>
									</div>
										
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kodegol" class="form-label">Kode Golongan</label>
                                                <input type="text" name="kodegol" class="form-control" id="kodegol"
                                                   placeholder="Kode Golongan" value="<?php echo $r[kodegol];?>" readonly>
                                            </div>
                                        </div>
									</div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="ruang" class="form-label">Ruang</label>
                                                <input type="text" name="ruang" class="form-control" id="ruang"
                                                   placeholder="Ruang" value="<?php echo $r[ruang];?>" readonly>
                                            </div>
                                        </div>
									</div>
										
									<div class="col-md-10">
										 <a type="submit"  href="perjadin.php?module=mstpangkat" class="btn btn-rounded btn-danger waves-effect waves-light">Kembali</a>
                                   
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
