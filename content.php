<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:404.php');
} else {

  // Home (Beranda)
  if ($_GET['module'] == 'beranda') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "themes/body.php";
    }
  }
  //=======================================================================

  elseif ($_GET['module'] == 'hakakses') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/hakakses/hakakses.php";
    }
  } elseif ($_GET['module'] == 'hapus_hakakses') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/hakakses/hapus_hakakses.php";
    }
  } elseif ($_GET['module'] == 'edit_hakakses') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/hakakses/edit_hakakses.php";
    }
  } elseif ($_GET['module'] == 'lihat_hakakses') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/hakakses/lihat_hakakses.php";
    }
  }

  //=======================================================================


  elseif ($_GET['module'] == 'tahunaktif') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/tahunaktif/tahunaktif.php";
    }
  } elseif ($_GET['module'] == 'hapus_tahunaktif') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/tahunaktif/hapus_tahunaktif.php";
    }
  } elseif ($_GET['module'] == 'lihat_tahunaktif') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/tahunaktif/lihat_tahunaktif.php";
    }
  } elseif ($_GET['module'] == 'edit_tahunaktif') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/tahunaktif/edit_tahunaktif.php";
    }
  }

  //===============================

  elseif ($_GET['module'] == 'resetpassword') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/resetpassword/resetpassword.php";
    }
  } elseif ($_GET['module'] == 'editpassword') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/resetpassword/editpassword.php";
    }
  }

  //======================================================

  elseif ($_GET['module'] == 'user') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/user/user.php";
    }
  } elseif ($_GET['module'] == 'edituser') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/user/edituser.php";
    }
  } elseif ($_GET['module'] == 'hapususer') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/user/hapususer.php";
    }
  }
  //=================== MASTER UNIT KEERJA =====================================

  elseif ($_GET['module'] == 'mstunitkerja') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstunitkerja/mstunitkerja.php";
    }
  } elseif ($_GET['module'] == 'edit_mstunitkerja') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstunitkerja/edit_mstunitkerja.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstunitkerja') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstunitkerja/lihat_mstunitkerja.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstunitkerja') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstunitkerja/hapus_mstunitkerja.php";
    }
  }
  //======================= MASTER SUB UNIT KERJA ==========================================

  elseif ($_GET['module'] == 'mstsubunitkerja') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstsubunitkerja/mstsubunitkerja.php";
    }
  } elseif ($_GET['module'] == 'edit_mstsubunitkerja') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstsubunitkerja/edit_mstsubunitkerja.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstsubunitkerja') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstsubunitkerja/hapus_mstsubunitkerja.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstsubunitkerja') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstsubunitkerja/lihat_mstsubunitkerja.php";
    }
  }
  //========================== DATA PEGAWAI========================================

  elseif ($_GET['module'] == 'mstdatapegawai') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstdatapegawai/mstdatapegawai.php";
    }
  } elseif ($_GET['module'] == 'edit_mstdatapegawai') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstdatapegawai/edit_mstdatapegawai.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstdatapegawai') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstdatapegawai/hapus_mstdatapegawai.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstdatapegawai') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstdatapegawai/lihat_mstdatapegawai.php";
    }
  }


  //==================== MASTER NAMA JABATAN ==============================================

  elseif ($_GET['module'] == 'mstjabatan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstjabatan/mstjabatan.php";
    }
  } elseif ($_GET['module'] == 'edit_mstjabatan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstjabatan/edit_mstjabatan.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstjabatan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstjabatan/hapus_mstjabatan.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstjabatan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstjabatan/lihat_mstjabatan.php";
    }
  }

  //==================== MASTER PANGKAT GOLONGAN ==============================================

  elseif ($_GET['module'] == 'mstpangkat') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstpangkat/mstpangkat.php";
    }
  } elseif ($_GET['module'] == 'edit_mstpangkat') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstpangkat/edit_mstpangkat.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstpangkat') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstpangkat/hapus_mstpangkat.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstpangkat') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstpangkat/lihat_mstpangkat.php";
    }
  }

  //========================= TAHUN ANGGARAN ==============================================


  elseif ($_GET['module'] == 'msttahunanggaran') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttahunanggaran/msttahunanggaran.php";
    }
  } elseif ($_GET['module'] == 'hapus_msttahunanggaran') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttahunanggaran/hapus_msttahunanggaran.php";
    }
  } elseif ($_GET['module'] == 'lihat_msttahunanggaran') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttahunanggaran/lihat_msttahunanggaran.php";
    }
  } elseif ($_GET['module'] == 'edit_msttahunanggaran') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttahunanggaran/edit_msttahunanggaran.php";
    }
  }

  //========================= TINGKAT PERJALANAN DINAS ==============================================


  elseif ($_GET['module'] == 'msttingkat_perjadin') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttingkat_perjadin/msttingkat_perjadin.php";
    }
  } elseif ($_GET['module'] == 'hapus_msttingkat_perjadin') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttingkat_perjadin/hapus_msttingkat_perjadin.php";
    }
  } elseif ($_GET['module'] == 'lihat_msttingkat_perjadin') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttingkat_perjadin/lihat_msttingkat_perjadin.php";
    }
  } elseif ($_GET['module'] == 'edit_msttingkat_perjadin') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttingkat_perjadin/edit_msttingkat_perjadin.php";
    }
  }


  //========================= ALAT TRANSPORTASI ==============================================


  elseif ($_GET['module'] == 'mstalattrans') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstalattrans/mstalattrans.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstalattrans') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstalattrans/hapus_mstalattrans.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstalattrans') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstalattrans/lihat_mstalattrans.php";
    }
  } elseif ($_GET['module'] == 'edit_mstalattrans') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstalattrans/edit_mstalattrans.php";
    }
  }


  //========================= DASAR PERATURAN ==============================================


  elseif ($_GET['module'] == 'mstperaturan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstperaturan/mstperaturan.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstperaturan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstperaturan/hapus_mstperaturan.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstperaturan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstperaturan/lihat_mstperaturan.php";
    }
  } elseif ($_GET['module'] == 'edit_mstperaturan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstperaturan/edit_mstperaturan.php";
    }
  }

  //========================= KABUPATEN / KOTA ==============================================


  elseif ($_GET['module'] == 'mstkota') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstkota/mstkota.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstkota') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstkota/hapus_mstkota.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstkota') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstkota/lihat_mstkota.php";
    }
  } elseif ($_GET['module'] == 'edit_mstkota') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstkota/edit_mstkota.php";
    }
  }

  //========================= PROVINSI ==============================================


  elseif ($_GET['module'] == 'mstprovinsi') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstprovinsi/mstprovinsi.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstprovinsi') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstprovinsi/hapus_mstprovinsi.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstprovinsi') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstprovinsi/lihat_mstprovinsi.php";
    }
  } elseif ($_GET['module'] == 'edit_mstprovinsi') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstprovinsi/edit_mstprovinsi.php";
    }
  }

  //========================= SATUAN ==============================================


  elseif ($_GET['module'] == 'mstsatuan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstsatuan/mstsatuan.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstsatuan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstsatuan/hapus_mstsatuan.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstsatuan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstsatuan/lihat_mstsatuan.php";
    }
  } elseif ($_GET['module'] == 'edit_mstsatuan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstsatuan/edit_mstsatuan.php";
    }
  }

  //========================= DATA SATKER ==============================================


  elseif ($_GET['module'] == 'mstdata_satker') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstdata_satker/mstdata_satker.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstdata_satker') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstdata_satker/hapus_mstdata_satker.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstdata_satker') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstdata_satker/lihat_mstdata_satker.php";
    }
  } elseif ($_GET['module'] == 'edit_mstdata_satker') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstdata_satker/edit_mstdata_satker.php";
    }
  }

  //========================= PPK ==============================================


  elseif ($_GET['module'] == 'mstppk') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstppk/mstppk.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstppk') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstppk/hapus_mstppk.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstppk') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstppk/lihat_mstppk.php";
    }
  } elseif ($_GET['module'] == 'edit_mstppk') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstppk/edit_mstppk.php";
    }
  }

  //========================= BENDAHARA ==============================================


  elseif ($_GET['module'] == 'mstbendahara') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstbendahara/mstbendahara.php";
    }
  } elseif ($_GET['module'] == 'hapus_mstbendahara') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstbendahara/hapus_mstbendahara.php";
    }
  } elseif ($_GET['module'] == 'lihat_mstbendahara') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstbendahara/lihat_mstbendahara.php";
    }
  } elseif ($_GET['module'] == 'edit_mstbendahara') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/mstbendahara/edit_mstbendahara.php";
    }
  }

  //========================= PENANDATANGANAN DOKUMEN ==============================================


  elseif ($_GET['module'] == 'msttandatangan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttandatangan/msttandatangan.php";
    }
  } elseif ($_GET['module'] == 'hapus_msttandatangan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttandatangan/hapus_msttandatangan.php";
    }
  } elseif ($_GET['module'] == 'lihat_msttandatangan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttandatangan/lihat_msttandatangan.php";
    }
  } elseif ($_GET['module'] == 'edit_msttandatangan') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/msttandatangan/edit_msttandatangan.php";
    }
  }

  //========================= INPUT USULAN PERJALANAN ==============================================


  elseif ($_GET['module'] == 'inputusul') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/inputusul/inputusul.php";
    }
  } 
  elseif ($_GET['module'] == 'hapus_inputusul') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/inputusul/hapus_inputusul.php";
    }
  } 
  elseif ($_GET['module'] == 'lihat_inputusul') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/inputusul/lihat_inputusul.php";
    }
  } 
  elseif ($_GET['module'] == 'edit_inputusul') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/inputusul/edit_inputusul.php";
    }
  } 
  elseif ($_GET['module'] == 'cetak_inputusul') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/inputusul/cetak_inputusul.php";
    }
  }
  elseif ($_GET['module']=='upload_inputusul'){
    if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='supervisor'){
      include "modul/inputusul/upload_inputusul.php";
      }
    }
    elseif ($_GET['module']=='entrydetail_inputusul'){
      if ($_SESSION['ses_level']=='admin' or $_SESSION['ses_level']=='supervisor'){
        include "modul/inputusul/entrydetail_inputusul.php";
        }
      }
    //==================================================


  elseif ($_GET['module'] == 'users') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/users/users.php";
    }
  } elseif ($_GET['module'] == 'lihat_users') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/users/lihat_users.php";
    }
  } elseif ($_GET['module'] == 'edit_users') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/users/edit_users.php";
    }
  } elseif ($_GET['module'] == 'hapus_users') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "modul/users/hapus_users.php";
    }
  }

  //==================================================================

  else {
?>


    <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">

      <!-- auth-page content -->
      <div class="auth-page-content overflow-hidden p-0">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-xl-4 text-center">
              <div class="error-500 position-relative">
                <img src="assets/images/error500.png" alt="" class="img-fluid error-500-img error-img" />
                <h1 class="title text-muted">500</h1>
              </div>
              <div>
                <h3>Internal Server Error!</h3>
                <p class="text-muted w-75 mx-auto">Server Error 500. Link Website Tidak Ditemukan</p>
                <a href="?module=beranda" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Kembali Ke Beranda</a>
              </div>
            </div><!-- end col-->
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </div>
      <!-- end auth-page content -->
    </div>




<?php
  }
}
?>