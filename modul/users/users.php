 
  <?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/users/aksi_users.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $users = mysql_query("SELECT * FROM users ");
  $count=mysql_num_rows($users);
?>

 
 <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
	  <form method="post"  name="frm" >
        <div class="panel-heading">
          <h4 class="panel-title">Data User System</h4>
          <p></p>
		   <?php 
		$level=$_SESSION['ses_level'];
		?>
		<?php if($level=='admin'){ ?>
		  <a  class="btn btn-rounded btn-primary waves-effect waves-light"  data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=users&act=tambahusers"><i class="fa fa-send"></i> Tambah</a>
		   <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_users();" ><i class="fa fa-edit"></i> Edit</button>
		   <button class="btn btn-info rounded-pill" data-toggle="tooltip" data-placement="top" title="Send Email"  onClick="email_records_users();" ><i class="bi bi-envelop"></i> Send Email</button> 
		  <button class="btn btn-rounded btn-danger waves-effect waves-light"  title="Hapus" data-toggle="tooltip" data-placement="top"  onClick="delete_records_users();" ><i class="fa fa-remove"></i> Hapus </button>
		   <?php } ?>
		   
		  <?php
		if($count > 0)
        {
		?>			
		   <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_users();" ><i class="fa fa-desktop"></i> Lihat</button>
		 
		
			
		<?php } ?>
		  
        </div>
		<div class="row">
         <div class="col-12">
           <div class="card">
            <div class="card-body">
             <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
             
              <thead>
				<tr>
				<th>
				<input type="checkbox"  name="select_all" id="select_all" value=""/>					   
				</th>
				<th>No</th>
				<th bgcolor="#33FFFF" scope="col">Foto</th>
                <th bgcolor="#33FFFF" scope="col">Username</th>
                <th bgcolor="#33FFFF" scope="col">Nama Lengkap</th>
                <th bgcolor="#33FFFF" scope="col">Level</th>
			    <th bgcolor="#33FFFF" scope="col">Password</th>
			 </tr>
			</thead>

                  <tbody>
					<?php  
					$no = 1;
					$jab =mysql_query("select * from usersid order by nama_lengkap ");
					while ($jb=mysql_fetch_array($jab)){       
					?>
                      <tr>
					  <td style='text-align:center'>
						<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $jb['id'];?>"/>              </td> 
						<td><?php echo" $no"; ?></td>
						<td align="center">
						<?php
						$foto=$jb['foto'];
						if($foto==''){
						?>
						<img src="images/foto_user/blank.png" width="50">
						<?php }else { ?>	
						<img src="files/<?php echo $jb['foto'];?>" width="50"> 
						<?php } ?>
						</td>
						<td><?php echo" $jb[username]"; ?></td>
						<td><?php echo" $jb[nama_lengkap]"; ?></td>
						<td><?php echo" $jb[level]"; ?></td>
						<td><?php echo" $jb[password]"; ?></td>
						
						</tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
            </table>
          </div>
        </div>
      </div><!-- panel -->

      </div>
	</div> 
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</form>
  
    <?php		  
	 break;
	   case "tambahusers":
	 ?>          
	 
	 <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
			
                      <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Tambah User System</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                        <!-- Form Components Row -->
                        <div class="row">
                             <div class="col-xl-6">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?module=users&act=input" method="POST" >
                                      
                                      <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap" class="form-control" id="validationCustom01"
                                                    placeholder="Nama Lengkap"  required>
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
                                                <input type="text" class="form-control" name="nip" id="validationCustom02"
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
                                               placeholder="No.HP/Wa" required>
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
                                               placeholder="Email" required>
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
                                                <input type="password" class="form-control" name="password" id="validationCustom02"
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
                                                <input type="text" id="sub_komponen" name="sub_komponen" class="form-control" placeholder="Kode Unit" readonly required>
												 <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal25">Cari</button>
											 </div>
                                          </div>
										</div>
										
										<div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                            <label class="form-label" for="nama_unit">Nama Unit<span class="text-danger"> *</span></label>
                                              <input type="text" id="nama_unit" name="nama_unit" class="form-control" placeholder="Nama Unit" readonly required>
                                          </div>
										  </div>
										</div>
										
									 <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="sub_unit_komponen" class="form-label">Kode Sub Unit</label>
                                                <input type="text" name="sub_unit_komponen" class="form-control" id="sub_unit_komponen"
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
                                                <input type="text" class="form-control" name="nama_sub_unit" id="nama_sub_unit"
                                               placeholder="Nama Sub Unit" readonly required>
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
										<option></option>
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
                                        <button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
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

