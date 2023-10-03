<script type="text/javascript">
    $(function() {
        $( "#tglopening" ).datepicker({ altFormat: 'yy-mm-dd' });
        $( "#tglopening" ).change(function() {
             $( "#tglopening" ).datepicker( "option", "dateFormat","yy-mm-dd" );
         });
    });
    </script>

<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$upload = "modul/mstdealer/upload_mstdealer.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'perjadin.php?module=mstdealer';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>

     <center><h3 class="box-title">Upload Dokumen Dealer</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=mstdealer&act=upload" id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=mysqli_query($koneksi,"select * from mstdealer where id=".$id);
			$r=mysqli_fetch_array($res);
        }
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
			<div class="col-md-6">
                  <div class="box-body">
					  
					  <div class="form-group">
					  <label for="kodedealer" class="col-sm-4 control-label">Kode dealer<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="kodedealer" id="kodedealer" placeholder="Kode Dealer" value="<?php echo $r[kodedealer];?>">
                       </div>
					  </div>
					 
					  <div class="form-group">
					  <label for="namadealer" class="col-sm-4 control-label">Nama dealer<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namadealer" id="namadealer" placeholder="Nama Dealer" value="<?php echo $r[namadealer];?>">
                       </div>
					  </div>

                      <div class="form-group">
					  <label for="alamat" class="col-sm-4 control-label">Alamat<span class="text-danger">*</span></label>
					  <div class="col-sm-8">
                        <textarea type="text" rows="3" class="validate[required] form-control" name="alamat" id="alamat" placeholder="Alamat"><?php echo $r[alamat];?>"</textarea>
                       </div>
					  </div>

					  <div class="form-group">
					  <label for="tglopening" class="col-sm-4 control-label">Tanggal Opening<span class="text-danger">*</span></label>
					  <div class="col-sm-5">
					  <input type="text" class="validate[required,custom[date]] form-control" name="tglopening" id="tglopening" placeholder="yyyy/mm/dd"value="<?php echo $r[tglopening];?>">
                       </div>
					  </div>

					  <div class="form-group">
					  <label for="jlhpegawai" class="col-sm-4 control-label">Jumlah Pegawai<span class="text-danger">*</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required,custom[number]] form-control" name="jlhpegawai" id="jlhpegawai" placeholder="Jumlah Pegawai"value="<?php echo $r[jlhpegawai];?>">
                       </div>
					  </div>

					  <div class="form-group">
					 <label for="lokasi" class="col-sm-4 control-label">Lokasi</label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='lokasi'  id='lokasi'  >
							<option></option>
							<option value="Luar Kota">Luar Kota</option>							  
							<option value="Dalam Kota">Dalam Kota</option>
						</select>
                      </div>
					</div>
    		 
                  </div><!-- /.box-body -->
				</div>	
        
                <div class="col-md-6">
                  <div class="box-body">

                <div class="form-group">
					<div class="col-md-12">
					 <label for="filepdf" class="col-sm-4 control-label">Upload Dokumen</label>
					  <div class="col-sm-9 col-md-5">
                        <input type="file" id="fupload" name="fupload"  placeholder="Upload Dokumen" readonly>
                       </div>
					 </div>
					</div>

                    <div class="form-group">
					  <label for="" class="col-sm-5 control-label">Dokumen (PDF)</label>
					   <?php 
							$ftdok=$r['dokumen'];
							if (empty($ftdok)) {
								?>
								 <br></br>
								  <img src="img/foto_user/kosong.jpg">
							<?php	  
							} else {
							?>
					  <embed width="450" height="400" src="files/<?php echo $r['dokumen']; ?>" type="application/pdf"></embed>
					    
						<?php
							}
						?>
					</div>

                    </div><!-- /.box-body -->
				</div>	

				
		<div class="divider"></div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button name="upload_data" class="btn bg-yellow btn-flat margin"  data-toggle="tooltip" data-placement="top" title="upload" ><i class="fa fa-pencil"></i>
                   upload
                </button>
				
				 <a class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Batal" href="perjadin.php?module=mstdealer"><i class="fa fa-remove"></i>
                    Batal
                </a>
            </div>
        </div>
    </form>
  </div>

 
	<?php
    }
}
?>