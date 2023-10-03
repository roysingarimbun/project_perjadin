<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
   
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>

    
  <main id="main" class="main">
	<div class="row">
        <div class="col-lg-6">
		  <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cetak Rekap Peserta</h5>

   <form method="POST" class="row g-3 needs-validation" novalidate action="<?php echo $aksi;?>?module=cetak_rptpeserta" enctype="multipart/form-data">
	
				
				<script type="text/javascript">
					var s5_taf_parent = window.location;
					function popup() {
					window.open('modul/rptpeserta/rptlappeserta.php')
					}
					</script>
					
					<script type="text/javascript">
					var s5_taf_parent = window.location;
					function popup2() {
					window.open('modul/rptpeserta/rptlappesertaxl.php')
					}
					</script>
			<div class="row mb-2">
			<button class="btn btn-info rounded-pill"  title="Cetak" onClick="popup()"><i class="ri ri-printer-line"></i>
                   Cetak Pdf
                </button>
			</div>
			<div class="row mb-2">
			<a class="btn btn-success rounded-pill"  title="Cetak" onClick="popup2()"><i class="ri ri-printer-line"></i>
                   Save Excell
                </a>
			</div>
			<div class="row mb-2">
			<a class="btn btn-danger rounded-pill"  data-toggle="tooltip" data-placement="top" title="Kembali" href="apps.php?module=rptpeserta"><i class="ri ri-chat-delete-fill"></i>
                    Kembali
                </a>
			</div>
				
				
			
		 </div>
	</div>
 </div>
 
		
			
      
		</form>
		</div>
	 
 </main><!-- End #main -->
 
	<?php
    }
}
?>