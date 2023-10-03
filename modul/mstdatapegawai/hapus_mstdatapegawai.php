<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/mstdatapegawai/aksi_mstdatapegawai.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'perjadin.php?module=mstdatapegawai';
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
                            <h4 class="mb-sm-0 font-size-18">HAPUS DATA PEGAWAI</h4>

                        </div>
                    </div>
                </div>
              
                        <div class="row">
                             <div class="col-xl-10">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=mstdatapegawai&act=hapus" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from mstdatapegawai where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
									
									   	<div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="peg_iduser" class="form-label">Kode Pegawai</label>
                                                    <input type="text" name="peg_iduser" class="form-control" id="peg_iduser"
                                                    value="<?php echo $r[peg_iduser];?>" readonly>
                                                </div>
                                            </div>
									    </div>
										
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="namapeg" class="form-label">Nama Pegawai</label>
                                                    <input type="text" name="namapeg" class="form-control" id="namapeg"
                                                    value="<?php echo $r[namapeg];?>" readonly>
                                                </div>
                                            </div>
									   </div>
                                       <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="nip" class="form-label">NIP</label>
                                                    <input type="text" name="nip" class="form-control" id="nip"
                                                    value="<?php echo $r[nip];?>" readonly>
                                                </div>
                                            </div>
									    </div>
										<div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="jab" class="form-label">Jabatan</label>
                                                    <input type="text" name="jab" class="form-control" id="jab"
                                                    value="<?php echo $r[jab];?>" readonly>
                                                </div>
                                            </div>
									    </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="namaunit" class="form-label">UNIT KERJA</label>
                                                    <input type="text" name="namaunit" class="form-control" id="namaunit"
                                                    value="<?php echo $r[namaunit];?>" readonly>
                                                </div>
                                            </div>
									    </div>
										
									<div class="col-md-10">
                                        <button name="hapus_data" class="btn btn-rounded btn-danger waves-effect waves-light">Hapus</button>
										 <a type="submit"  href="perjadin.php?module=mstdatapegawai" class="btn btn-rounded btn-primary waves-effect waves-light">Batal</a>
                                   
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

