<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:../index.php');
}
else{
	include "../config/library.php";
?>	

	   <!-- Content Header (Page header) -->
			<div class="page-content">
                    <div class="container-fluid">

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
        
<?php
}
?>			