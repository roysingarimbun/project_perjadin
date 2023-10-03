<!doctype html>
<html lang="en" data-layout="twocolumn" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>E-Perjadin | Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- jsvectormap css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:../index.php');
}
else{
?>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="?module=beranda" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>

                    <a href="?module=beranda" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>


                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="assets/images/logo-sm.png" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text"><?php echo $_SESSION['ses_nama'];?></span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?php echo $_SESSION['ses_level'];?></span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Selamat Datang <?php echo $_SESSION['ses_nama'];?></h6>
                        <a class="dropdown-item"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle"><?php echo $_SESSION['ses_nama_unit'];?></span></a>
                       
                        <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="?module=beranda" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="?module=beranda" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
					
                                   
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        
                        <li class="nav-item">
                            
							<a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Master</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                        <a href="?module=mstunitkerja" class="nav-link" data-key="t-mstunitkerja"> Unit Kerja </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?module=mstsubunitkerja" class="nav-link" data-key="t-mstsubunitkerja"> Sub Unit Kerja </a>
                                    </li>
									<li class="nav-item">
                                        <a href="?module=mstdatapegawai" class="nav-link" data-key="t-mstdatapegawai"> Data Pegawai</a>
                                    </li>
									<li class="nav-item">
                                        <a href="?module=mstjabatan" class="nav-link" data-key="t-mstjabatan"> Jabatan</a>
                                    </li>
                                   <li class="nav-item">
                                        <a href="?module=mstpangkat" class="nav-link" data-key="t-mstpangkat"> Pangkat Golongan</a>
                                    </li>
									 <li class="nav-item">
                                        <a href="?module=msttandatangan" class="nav-link" data-key="t-msttandatangan"> Penandatangan Dokumen</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?module=msttahunanggaran" class="nav-link" data-key="t-msttahunanggaran"> Tahun Anggaran</a>
                                    </li>

									<li class="nav-item">
                                        <a href="?module=msttingkat_perjadin" class="nav-link" data-key="t-msttingkat_perjadin"> Tingkat Perjalanan Dinas</a>
                                    </li>
									<li class="nav-item">
                                        <a href="?module=mstalattrans" class="nav-link" data-key="t-mstalattrans"> Alat Transportasi</a>
                                    </li>
									<li class="nav-item">
                                        <a href="?module=mstppk" class="nav-link" data-key="t-mstppk"> Data PPK</a>
                                    </li>
									<li class="nav-item">
                                        <a href="?module=mstbendahara" class="nav-link" data-key="t-mstbendahara"> Data Bendahara</a>
                                    </li>
									<li class="nav-item">
                                        <a href="?module=mstperaturan" class="nav-link" data-key="t-mstperaturan"> Dasar Peraturan</a>
                                    </li>
									<li class="nav-item">
                                        <a href="?module=mstkota" class="nav-link" data-key="t-mstkota"> Kabupaten/Kota</a>
                                    </li>
									<li class="nav-item">
                                        <a href="?module=mstprovinsi" class="nav-link" data-key="t-mstprovinsi"> Provinsi</a>
                                    </li>
                                   <li class="nav-item">
                                        <a href="?module=mstsatuan" class="nav-link" data-key="t-mstsatuan"> Satuan</a>
                                    </li>
                                   <li class="nav-item">
                                        <a href="?module=mstdata_satker" class="nav-link" data-key="t-mstdata_satker"> Data Satker</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Usulan Perjalanan</span> <span class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLayouts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="?module=inputusul" class="nav-link" data-key="t-inputusul">Input Usulan Perjalanan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?module=verifyusulanperjalanan" target="_blank" class="nav-link" data-key="t-verifyusulanperjalanan">Verifikasi Atasan Usulan Perjalanan</a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="ri-pages-line"></i> <span data-key="t-dokperjalanan">Dokumen Perjalanan</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#dokperjalanan" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="dokperjalanan" data-key="t-dokumenperjalanan"> Dokumen Perjalanan
                                        </a>
                                        <div class="collapse menu-dropdown" id="dokperjalanan">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="?module=persetujuanperjalanan" class="nav-link" data-key="t-persetujuanperjalanan"> Persetujuan Perjalanan </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="?module=pembuatansurattugas" class="nav-link" data-key="t-pembuatansurattugas"> Pembuatan Surat Tugas </a>
                                                </li>
												 <li class="nav-item">
                                                    <a href="?module=pembuatanspd" class="nav-link" data-key="t-pembuatanspd"> Pembuatan SPD </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#entryperjalanan" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="entryperjalanan" data-key="t-entryperjalanan"> Input Laporan Perjalanan
                                        </a>
                                        <div class="collapse menu-dropdown" id="entryperjalanan">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="?module=rincianbiaya" class="nav-link" data-key="t-rincianbiaya"> Rincian Biaya </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="?module=uploaddokumen" class="nav-link" data-key="t-uploaddokumen"> Upload Dokumen </a>
                                                </li>
												 <li class="nav-item">
                                                    <a href="?module=rptperjalanandinas" class="nav-link" data-key="t-rptperjalanandinas"> Laporan Perjalanan Dinas </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                 
                                   
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                                <i class="ri-pie-chart-line"></i> <span data-key="t-multi-level">Pelaporan</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarMultilevel">
                                <ul class="nav nav-sm flex-column">
                                   
                                    <li class="nav-item">
                                        <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount" data-key="t-pelaporan"> Pelaporan
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarAccount">
                                            <ul class="nav nav-sm flex-column">
                                              
                                                <li class="nav-item">
                                                    <a href="#rekapperjalanan" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="rekapperjalanan" data-key="t-rekapperjalanan"> Rekap Perjalanan
                                                    </a>
                                                    <div class="collapse menu-dropdown" id="rekapperjalanan">
                                                        <ul class="nav nav-sm flex-column">
                                                            <li class="nav-item">
                                                                <a href="?module=rptsurattugas" class="nav-link" data-key="t-rptsurattugas"> Surat Tugas</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="?module=rptspd" class="nav-link" data-key="t-rptspd"> SPD </a>
                                                            </li>
															 <li class="nav-item">
                                                                <a href="?module=rptrincianbiaya" class="nav-link" data-key="t-rptrincianbiaya"> Rincian Biaya </a>
                                                            </li>
															 <li class="nav-item">
                                                                <a href="?module=rptkegiatan" class="nav-link" data-key="t-rptkegiatan"> Laporan Kegiatan </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
												
												 <li class="nav-item">
                                                    <a href="#monitoring" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="monitoring" data-key="t-monitoring"> Monitoring
                                                    </a>
                                                    <div class="collapse menu-dropdown" id="monitoring">
                                                        <ul class="nav nav-sm flex-column">
                                                            <li class="nav-item">
                                                                <a href="?module=rptsetujuperjalanan" class="nav-link" data-key="t-rptsetujuperjalanan"> Persetujuan Perjalanan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="?module=rptlpj" class="nav-link" data-key="t-rptlpj"> LPJ </a>
                                                            </li>
															
															 <li class="nav-item">
                                                                <a href="?module=rptmonitoringkeg" class="nav-link" data-key="t-rptmonitoringkeg"> Laporan Kegiatan </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
												
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
       
        <div class="vertical-overlay"></div>

    </div>
   
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- Theme Settings -->


   
</body>

<?php
}
?>	

</html>