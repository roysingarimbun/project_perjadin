<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/mstjabatan/aksi_mstjabatan.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'perjadin.php?module=mstjabatan';
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
                            <h4 class="mb-sm-0 font-size-18">HAPUS NAMA JABATAN</h4>

                        </div>
                    </div>
                </div>
              
                        <div class="row">
                             <div class="col-xl-10">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=mstjabatan&act=hapus" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from mstjabatan where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
									
									   	<div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="kodejab" class="form-label">Kode Jabatan</label>
                                                    <input type="text" name="kodejab" class="form-control" id="kodejab"
                                                    value="<?php echo $r[kodejab];?>" readonly>
                                                </div>
                                            </div>
									    </div>
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="namajab" class="form-label">Nama Jabatan</label>
                                                    <input type="text" name="namajab" class="form-control" id="namajab"
                                                    value="<?php echo $r[namajab];?>" readonly>
                                                </div>
                                            </div>
									   </div>
                                       <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="klasifikasi" class="form-label">Klasifikasi Jabatan</label>
                                                    <input type="text" name="klasifikasi" class="form-control" id="klasifikasi"
                                                    value="<?php echo $r[klasifikasi];?>" readonly>
                                                </div>
                                            </div>
									    </div>
										
										
									<div class="col-md-10">
                                        <button name="hapus_data" class="btn btn-rounded btn-danger waves-effect waves-light">Hapus</button>
										 <a type="submit"  href="perjadin.php?module=mstjabatan" class="btn btn-rounded btn-primary waves-effect waves-light">Batal</a>
                                   
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

