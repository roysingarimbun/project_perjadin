 
  <?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/hakakses/aksi_hakakses.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $hakakses = mysql_query("SELECT * FROM hakakses ");
  $count=mysql_num_rows($hakakses);
?>

 
 <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
	  <form method="post"  name="frm" >
        <div class="panel-heading">
          <h4 class="panel-title">Data Hak Akses System</h4>
          <p></p>
		   <?php 
		$level=$_SESSION['ses_level'];
		?>
		<?php if($level=='admin'){ ?>
		  <a  class="btn btn-rounded btn-primary waves-effect waves-light"  data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=hakakses&act=tambahhakakses"><i class="fa fa-send"></i> Tambah</a>
		   <button class="btn btn-rounded btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_hakakses();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-rounded btn-danger waves-effect waves-light"  title="Hapus" data-toggle="tooltip" data-placement="top"  onClick="delete_records_hakakses();" ><i class="fa fa-remove"></i> Hapus </button>
		   <?php } ?>
		   
		  <?php
		if($count > 0)
        {
		?>			
		   <button class="btn btn-warning btn-rounded waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_hakakses();" ><i class="fa fa-desktop"></i> Lihat</button>
		 
		
			
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
				<th>Hak Akses</th>
			 </tr>
			</thead>

                  <tbody>
					<?php  
					$no = 1;
					$jab =mysql_query("select * from hakakses order by id ");
					while ($jb=mysql_fetch_array($jab)){       
					?>
                      <tr>
					  <td style='text-align:center'>
						<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $jb['id'];?>"/>              </td> 
						<td><?php echo" $no"; ?></td>
						<td><?php echo" $jb[nama_hak_akses]"; ?></td>
						
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
	   case "tambahhakakses":
	 ?>          
	 
	 <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
			
                      <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Tambah Hak Akses</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                        <!-- Form Components Row -->
                        <div class="row">
                             <div class="col-xl-6">
                              
                              <div class="card">
                                <div class="card-body">
                                     <form class="needs-validation" novalidate action="<?php echo $aksi;?>?module=hakakses&act=input" method="POST" >
                                      
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
                                        <button name="simpan_data" class="btn btn-rounded btn-primary waves-effect waves-light">Simpan</button>
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

