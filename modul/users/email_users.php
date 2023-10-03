<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/users/aksi_users.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'mod.php?module=users';
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
                            <h4 class="mb-sm-0 font-size-18">Kirim Email User System</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                        <!-- Form Components Row -->
                        <div class="row">
                             <div class="col-xl-6">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=users&act=kirim" method="POST" >
                                    
									<?php
									for($i=0; $i<$chkcount; $i++)
									{
										$id = $chk[$i];
										$res=mysql_query("select * from usersid where id=".$id);
										$r=mysql_fetch_array($res);
									}
									?>	
									<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
									
                                    
                                     <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap" class="form-control" id="validationCustom01"  placeholder="Nama Lengkap"  value="<?php echo $r[nama_lengkap];?>" readonly>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
									   </div>
									   
									<div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">NIP/NIK</label>
                                                <input type="text" class="form-control" name="nip" value="<?php echo $r[nip];?>" id="validationCustom02"
                                               placeholder="NIP/NIK" readonly>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">No.HP/Wa</label>
                                                <input type="text" class="form-control" name="nohp" id="validationCustom02"
                                               placeholder="No.HP/Wa" value="<?php echo $r[nohp];?>" readonly>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="validationCustom02"
                                               placeholder="Email" value="<?php echo $r[email];?>" readonly>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									 <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">User Name</label>
                                                <input type="text" name="username" class="form-control" id="validationCustom01"  placeholder="User Name"  value="<?php echo $r[username];?>" readonly>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
									   </div>
                                   	
									<div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="validationCustom02" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password" id="validationCustom02" value="<?php echo $r[password];?>"
                                               placeholder="Password" readonly>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="row">
                                          <div class="col-md-4">
                                            <div class="mb-3">
                                            <label class="form-label" for="sub_komponen">Kode Unit</label>
                                                <input type="text" id="sub_komponen" name="sub_komponen" class="form-control" placeholder="Kode Unit" value="<?php echo $r[sub_komponen];?>" readonly>
												 
											 </div>
                                          </div>
										</div>
										
										<div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                            <label class="form-label" for="nama_unit">Nama Unit<span class="text-danger"> *</span></label>
                                              <input type="text" id="nama_unit" name="nama_unit" class="form-control" placeholder="Nama Unit" value="<?php echo $r[nama_unit];?>" readonly>
                                          </div>
										  </div>
										</div>
										
									 <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="sub_unit_komponen" class="form-label">Kode Sub Unit</label>
                                                <input type="text" name="sub_unit_komponen" class="form-control" id="sub_unit_komponen" value="<?php echo $r[sub_unit_komponen];?>"
                                                    placeholder="Kode Sub Unit" readonly>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
									   </div>
									   
									   <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="nama_sub_unit" class="form-label">Nama Sub Unit</label>
                                                <input type="text" class="form-control" name="nama_sub_unit" id="nama_sub_unit" placeholder="Nama Sub Unit" value="<?php echo $r[nama_sub_unit];?>" readonly>
                                                <div class="invalid-tooltip">
                                                    Data Harus Diisi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									  <div class="row">
									  <div class="col-md-6">
									   <div class="mb-3">
										<label class="form-label" for="level">Hak Akses</label>
										<select class='validate[required] form-control select2' name='level' id='level' disabled>
										<option><?php echo $r[level];?></option>
										<?php
										$pen = mysql_query("SELECT * FROM hakakses order by id"); 
										while($p = mysql_fetch_array($pen)){		
											echo"
												<option value=\"$p[nama_hak_akses]\">$p[nama_hak_akses]</option>\n";
											}
										echo"";				  
										?>									  								  
										</select>
										</div>
									   </div>
									</div>
										
										
									<div class="col-md-10">
                                        <button name="kirim_data" class="btn btn-rounded btn-primary waves-effect waves-light">Kirim</button>
										 <a type="submit"  href="mod.php?module=users" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>
                                   
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