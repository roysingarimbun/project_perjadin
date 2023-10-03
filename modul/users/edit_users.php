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
                            <h4 class="mb-sm-0 font-size-18">Edit User System</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                        <!-- Form Components Row -->
                        <div class="row">
                             <div class="col-xl-6">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form   class="needs-validation" novalidate action="<?php echo $aksi;?>?module=users&act=update" method="POST" >
                                    
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
                                                <input type="text" name="nama_lengkap" class="form-control" id="validationCustom01"  placeholder="Nama Lengkap"  value="<?php echo $r[nama_lengkap];?>" required>
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
                                               placeholder="NIP/NIK" required>
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
                                               placeholder="No.HP/Wa" value="<?php echo $r[nohp];?>" required>
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
                                               placeholder="Email" value="<?php echo $r[email];?>" required>
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
                                               placeholder="Password" required>
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
											<input type="hidden"  id="id_unit" name="id_unit" class="form-control" />
												<input type="hidden"  id="id25" name="id25" class="form-control" />
                                                <input type="text" id="sub_komponen" name="sub_komponen" class="form-control" placeholder="Kode Unit" value="<?php echo $r[sub_komponen];?>" readonly required>
												 <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal25">Cari</button>
											 </div>
                                          </div>
										</div>
										
										<div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                            <label class="form-label" for="nama_unit">Nama Unit<span class="text-danger"> *</span></label>
                                              <input type="text" id="nama_unit" name="nama_unit" class="form-control" placeholder="Nama Unit" value="<?php echo $r[nama_unit];?>" readonly required>
                                          </div>
										  </div>
										</div>
										
									 <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="sub_unit_komponen" class="form-label">Kode Sub Unit</label>
                                                <input type="text" name="sub_unit_komponen" class="form-control" id="sub_unit_komponen" value="<?php echo $r[sub_unit_komponen];?>"
                                                    placeholder="Kode Sub Unit" readonly required>
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
                                                <input type="text" class="form-control" name="nama_sub_unit" id="nama_sub_unit" placeholder="Nama Sub Unit" value="<?php echo $r[nama_sub_unit];?>" readonly required>
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
										<select class='validate[required] form-control select2' name='level' id='level'>
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
                                        <button name="edit_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
										 <a type="submit"  href="mod.php?module=users" class="btn btn-rounded btn-danger waves-effect waves-light">Batal</a>
                                   
									</div>
								</div>
								</div>
							</form>
						</div>
						
						<div>
                       <div id="myModal25" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                               <div class="modal-content">
                                <div class="modal-header">
                                 <h5 class="modal-title" id="myModalLabel">Sub Unit Kerja</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <table id="example5" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID Unit</th>
											<th>Kode Unit</th>
											<th>Nama Unit</th>
											<th>Kode Sub Unit</th>
											<th>Nama Sub Unit</th>
										</tr>
									</thead>
									<tbody>
										<?php
									$qu = mysql_query("SELECT * FROM mstsubunitkerja order by id_unit ");
										while ($data = mysql_fetch_array($qu)){
											?>
											<tr class="pilih25" data-id25="<?php echo $data['id25']; ?>" data-id_unit="<?php echo $data['id_unit']; ?>" data-sub_komponen="<?php echo $data['sub_komponen']; ?>"  data-nama_unit="<?php echo $data['nama_unit']; ?>" data-sub_unit_komponen="<?php echo $data['sub_unit_komponen']; ?>" data-nama_sub_unit="<?php echo $data['nama_sub_unit']; ?>">
												<td><?php echo $data['id_unit']; ?></td>
												<td><?php echo $data['sub_komponen']; ?></td>
												<td><?php echo $data['nama_unit']; ?></td>
												<td><?php echo $data['sub_unit_komponen']; ?></td>
												<td><?php echo $data['nama_sub_unit']; ?></td>
											</tr>
										<?php
											}
										?>
									</tbody>
									</table>  
                                    </div>
                                   </div>
                                 </div>
                               </div>
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