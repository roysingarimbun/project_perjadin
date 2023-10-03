<?php
session_start();
error_reporting(0);

if (empty($_SESSION['ses_nama']) and empty($_SESSION['ses_password'])) {
    header('location:404.php');
} else {

    include "config/koneksi.php";
    include "config/library.php";
    include "config/fungsi_kode.php";
    include "config/fungsi_thumbnail.php";
?>

    <?php
    // $appurl='http://perjadin.uinsu.ac.id/';
    $appurl = 'localhost/perjadin/';
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">

        <title>PERJADIN UINSU MEDAN</title>

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

        <!--datatable css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <!--datatable responsive css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    </head>

    <script>
        $(document).ready(function() {
            $('#select_all').on('click', function() {
                if (this.checked) {
                    $('.chk-box').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.chk-box').each(function() {
                        this.checked = false;
                    });
                }
            });
        });


        //==================================================

        function delete_records_hakakses() {
            document.frm.action = "perjadin.php?module=hapus_hakakses";
            document.frm.submit();
        }

        function update_records_hakakses() {
            document.frm.action = "perjadin.php?module=edit_hakakses";
            document.frm.submit();
        }

        function view_records_hakakses() {
            document.frm.action = "perjadin.php?module=lihat_hakakses";
            document.frm.submit();
        }

        //==================================================

        function update_records_resetpassword() {
            document.frm.action = "perjadin.php?module=editpassword";
            document.frm.submit();
        }
        //===============================================================

        function delete_records_tahunaktif() {
            document.frm.action = "perjadin.php?module=hapus_tahunaktif";
            document.frm.submit();
        }

        function view_records_tahunaktif() {
            document.frm.action = "perjadin.php?module=lihat_tahunaktif";
            document.frm.submit();
        }

        function update_records_tahunaktif() {
            document.frm.action = "perjadin.php?module=edit_tahunaktif";
            document.frm.submit();
        }
        //==================== MASTER UNIT KERJA ===========================================


        function view_records_mstunitkerja() {
            document.frm.action = "perjadin.php?module=lihat_mstunitkerja";
            document.frm.submit();
        }

        function delete_records_mstunitkerja() {
            document.frm.action = "perjadin.php?module=hapus_mstunitkerja";
            document.frm.submit();
        }

        function update_records_mstunitkerja() {
            document.frm.action = "perjadin.php?module=edit_mstunitkerja";
            document.frm.submit();
        }

        //==================== MASTER SUB UNIT KERJA ===========================================

        function update_records_mstsubunitkerja() {
            document.frm.action = "perjadin.php?module=edit_mstsubunitkerja";
            document.frm.submit();
        }

        function view_records_mstsubunitkerja() {
            document.frm.action = "perjadin.php?module=lihat_mstsubunitkerja";
            document.frm.submit();
        }

        function delete_records_mstsubunitkerja() {
            document.frm.action = "perjadin.php?module=hapus_mstsubunitkerja";
            document.frm.submit();
        }

        //==================== MASTER DATA PEGAWAI ===========================================

        function update_records_mstdatapegawai() {
            document.frm.action = "perjadin.php?module=edit_mstdatapegawai";
            document.frm.submit();
        }

        function view_records_mstdatapegawai() {
            document.frm.action = "perjadin.php?module=lihat_mstdatapegawai";
            document.frm.submit();
        }

        function delete_records_mstdatapegawai() {
            document.frm.action = "perjadin.php?module=hapus_mstdatapegawai";
            document.frm.submit();
        }



        //==================== MASTER NAMA JABATAN ===========================================

        function update_records_mstjabatan() {
            document.frm.action = "perjadin.php?module=edit_mstjabatan";
            document.frm.submit();
        }

        function view_records_mstjabatan() {
            document.frm.action = "perjadin.php?module=lihat_mstjabatan";
            document.frm.submit();
        }

        function delete_records_mstjabatan() {
            document.frm.action = "perjadin.php?module=hapus_mstjabatan";
            document.frm.submit();
        }

        //==================== MASTER PANGKAT GOLONGAN ===========================================

        function update_records_mstpangkat() {
            document.frm.action = "perjadin.php?module=edit_mstpangkat";
            document.frm.submit();
        }

        function view_records_mstpangkat() {
            document.frm.action = "perjadin.php?module=lihat_mstpangkat";
            document.frm.submit();
        }

        function delete_records_mstpangkat() {
            document.frm.action = "perjadin.php?module=hapus_mstpangkat";
            document.frm.submit();
        }

        //==================== MASTER PENANDATANGANAN DOKUMEN ===========================================

        function update_records_msttandatangan() {
            document.frm.action = "perjadin.php?module=edit_msttandatangan";
            document.frm.submit();
        }

        function view_records_msttandatangan() {
            document.frm.action = "perjadin.php?module=lihat_msttandatangan";
            document.frm.submit();
        }

        function delete_records_msttandatangan() {
            document.frm.action = "perjadin.php?module=hapus_msttandatangan";
            document.frm.submit();
        }

        //========================= TAHUN ANGGARAN ======================================

        function delete_records_msttahunanggaran() {
            document.frm.action = "perjadin.php?module=hapus_msttahunanggaran";
            document.frm.submit();
        }

        function view_records_msttahunanggaran() {
            document.frm.action = "perjadin.php?module=lihat_msttahunanggaran";
            document.frm.submit();
        }

        function update_records_msttahunanggaran() {
            document.frm.action = "perjadin.php?module=edit_msttahunanggaran";
            document.frm.submit();
        }

        //========================= TINGKAT PERJALANAN DINAS ======================================

        function delete_records_msttingkat_perjadin() {
            document.frm.action = "perjadin.php?module=hapus_msttingkat_perjadin";
            document.frm.submit();
        }

        function view_records_msttingkat_perjadin() {
            document.frm.action = "perjadin.php?module=lihat_msttingkat_perjadin";
            document.frm.submit();
        }

        function update_records_msttingkat_perjadin() {
            document.frm.action = "perjadin.php?module=edit_msttingkat_perjadin";
            document.frm.submit();
        }

        //========================= ALAT TRANSPORTASI ======================================

        function delete_records_mstalattrans() {
            document.frm.action = "perjadin.php?module=hapus_mstalattrans";
            document.frm.submit();
        }

        function view_records_mstalattrans() {
            document.frm.action = "perjadin.php?module=lihat_mstalattrans";
            document.frm.submit();
        }

        function update_records_mstalattrans() {
            document.frm.action = "perjadin.php?module=edit_mstalattrans";
            document.frm.submit();
        }

        //========================= DASAR PERATURAN ======================================

        function delete_records_mstperaturan() {
            document.frm.action = "perjadin.php?module=hapus_mstperaturan";
            document.frm.submit();
        }

        function view_records_mstperaturan() {
            document.frm.action = "perjadin.php?module=lihat_mstperaturan";
            document.frm.submit();
        }

        function update_records_mstperaturan() {
            document.frm.action = "perjadin.php?module=edit_mstperaturan";
            document.frm.submit();
        }

        //========================= KABUPATEN / KOTA ======================================

        function delete_records_mstkota() {
            document.frm.action = "perjadin.php?module=hapus_mstkota";
            document.frm.submit();
        }

        function view_records_mstkota() {
            document.frm.action = "perjadin.php?module=lihat_mstkota";
            document.frm.submit();
        }

        function update_records_mstkota() {
            document.frm.action = "perjadin.php?module=edit_mstkota";
            document.frm.submit();
        }

        //========================= PROVINSI ======================================

        function delete_records_mstprovinsi() {
            document.frm.action = "perjadin.php?module=hapus_mstprovinsi";
            document.frm.submit();
        }

        function view_records_mstprovinsi() {
            document.frm.action = "perjadin.php?module=lihat_mstprovinsi";
            document.frm.submit();
        }

        function update_records_mstprovinsi() {
            document.frm.action = "perjadin.php?module=edit_mstprovinsi";
            document.frm.submit();
        }

        //========================= SATUAN ======================================

        function delete_records_mstsatuan() {
            document.frm.action = "perjadin.php?module=hapus_mstsatuan";
            document.frm.submit();
        }

        function view_records_mstsatuan() {
            document.frm.action = "perjadin.php?module=lihat_mstsatuan";
            document.frm.submit();
        }

        function update_records_mstsatuan() {
            document.frm.action = "perjadin.php?module=edit_mstsatuan";
            document.frm.submit();
        }

        //========================= DATA SATKER ======================================

        function delete_records_mstdata_satker() {
            document.frm.action = "perjadin.php?module=hapus_mstdata_satker";
            document.frm.submit();
        }

        function view_records_mstdata_satker() {
            document.frm.action = "perjadin.php?module=lihat_mstdata_satker";
            document.frm.submit();
        }

        function update_records_mstdata_satker() {
            document.frm.action = "perjadin.php?module=edit_mstdata_satker";
            document.frm.submit();
        }

        //========================= PPK ======================================

        function delete_records_mstppk() {
            document.frm.action = "perjadin.php?module=hapus_mstppk";
            document.frm.submit();
        }

        function view_records_mstppk() {
            document.frm.action = "perjadin.php?module=lihat_mstppk";
            document.frm.submit();
        }

        function update_records_mstppk() {
            document.frm.action = "perjadin.php?module=edit_mstppk";
            document.frm.submit();
        }

        //========================= BENDAHARA ======================================

        function delete_records_mstbendahara() {
            document.frm.action = "perjadin.php?module=hapus_mstbendahara";
            document.frm.submit();
        }

        function view_records_mstbendahara() {
            document.frm.action = "perjadin.php?module=lihat_mstbendahara";
            document.frm.submit();
        }

        function update_records_mstbendahara() {
            document.frm.action = "perjadin.php?module=edit_mstbendahara";
            document.frm.submit();
        }

        //========================= INPUT USULAN PERJALANAN ======================================

        function delete_records_inputusul() {
            document.frm.action = "perjadin.php?module=hapus_inputusul";
            document.frm.submit();
        }

        function view_records_inputusul() {
            document.frm.action = "perjadin.php?module=lihat_inputusul";
            document.frm.submit();
        }

        function update_records_inputusul() {
            document.frm.action = "perjadin.php?module=edit_inputusul";
            document.frm.submit();
        }

        function print_records_inputusul() {
            document.frm.action = "perjadin.php?module=cetak_inputusul";
            document.frm.submit();
        }

        function upload_records_inputusul() {
            document.frm.action = "perjadin.php?module=upload_inputusul";
            document.frm.submit();
        }

        function entrydetail_records_inputusul() {
            document.frm.action = "perjadin.php?module=detail_inputusul";
            document.frm.submit();
        };

        //===============================================================
        function update_records_users() {
            document.frm.action = "perjadin.php?module=edit_users";
            document.frm.submit();
        }

        function delete_records_users() {
            document.frm.action = "perjadin.php?module=hapus_users";
            document.frm.submit();
        }

        function view_records_users() {
            document.frm.action = "perjadin.php?module=lihat_users";
            document.frm.submit();
        }

        function email_records_users() {
            document.frm.action = "perjadin.php?module=email_users";
            document.frm.submit();
        }
        //=========================================================
    </script><!-- akhir cekbox -->


    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>

    <script>
        function FormatCurrency(objNum) {
            var num = objNum.value
            var ent, dec;
            if (num != '' && num != objNum.oldvalue) {
                num = HapusTitik(num);
                if (isNaN(num)) {
                    objNum.value = (objNum.oldvalue) ? objNum.oldvalue : '';
                } else {
                    var ev = (navigator.appName.indexOf('Netscape') != -1) ? Event : event;
                    if (ev.keyCode == 190 || !isNaN(num.split('.')[1])) {
                        alert(num.split('.')[1]);
                        objNum.value = TambahTitik(num.split('.')[0]) + '.' + num.split('.')[1];
                    } else {
                        objNum.value = TambahTitik(num.split('.')[0]);
                    }
                    objNum.oldvalue = objNum.value;
                }
            }
        }

        function HapusTitik(num) {
            return (num.replace(/\./g, ''));
        }

        function TambahTitik(num) {
            numArr = new String(num).split('').reverse();
            for (i = 3; i < numArr.length; i += 3) {
                numArr[i] += '.';
            }
            return numArr.reverse().join('');
        }

        function formatCurrency(num) {
            num = num.toString().replace(/\$|\./g, '');
            if (isNaN(num))
                num = "0";
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num * 100 + 0.50000000001);
            cents = num0;
            num = Math.floor(num / 100).toString();
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
                num = num.substring(0, num.length - (4 * i + 3)) + '.' +
                num.substring(num.length - (4 * i + 3));
            return (((sign) ? '' : '-') + num);
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        //syarat foto user
        function readURLfoto(input) { // Mulai membaca inputan gambar
            if (input.files && input.files[0]) {
                var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

                reader.onload = function(e) { // Mulai pembacaan file
                    $('#preview_gambarUser') // Tampilkan gambar yang dibaca ke area id #preview_gambar
                        .attr('src', e.target.result)
                        .width(165); // Menentukan lebar gambar preview (dalam pixel)
                    //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLfotouser(input) { // Mulai membaca inputan gambar
            if (input.files && input.files[0]) {
                var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

                reader.onload = function(e) { // Mulai pembacaan file
                    $('#preview_gambarfotouser') // Tampilkan gambar yang dibaca ke area id #preview_gambar
                        .attr('src', e.target.result)
                        .width(250); // Menentukan lebar gambar preview (dalam pixel)
                    //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLfotosurat(input) { // Mulai membaca inputan gambar
            if (input.files && input.files[0]) {
                var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

                reader.onload = function(e) { // Mulai pembacaan file
                    $('#preview_gambarsurat') // Tampilkan gambar yang dibaca ke area id #preview_gambar
                        .attr('src', e.target.result)
                        .width(450); // Menentukan lebar gambar preview (dalam pixel)
                    //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


        function readURLfotoqr(input) { // Mulai membaca inputan gambar
            if (input.files && input.files[0]) {
                var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

                reader.onload = function(e) { // Mulai pembacaan file
                    $('#preview_gambarqr') // Tampilkan gambar yang dibaca ke area id #preview_gambar
                        .attr('src', e.target.result)
                        .width(200); // Menentukan lebar gambar preview (dalam pixel)
                    //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <body oncontextmenu='return false;'>
        <div class="wrapper">

            <?php include "themes/menu.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box">
                        <div class="box-body">
                            <?php include "content.php"; ?>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script src="assets/js/pages/datatables.init.js"></script>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="assets/js/plugins.js"></script>



        <!-- password-addon init -->
        <script src="assets/js/pages/password-addon.init.js"></script>


        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Vector map-->
        <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

        <!--Swiper slider js-->
        <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>
        <script src="assets/js/pages/form-validation.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <script>
            $(document).on('click', '.pilih15', function(e) {
                document.getElementById("id15").value = $(this).attr('data-id15');
                document.getElementById("kodepub").value = $(this).attr('data-kodepub');
                document.getElementById("jenispub").value = $(this).attr('data-jenispub');
                $('#myModal15').modal('hide');
            });
        </script>



    </body>

    <script>
        $(function() {
            $("#example1").DataTable();
            $("#example2").DataTable();
            $("#example3").DataTable();
            $("#example4").DataTable();
            $("#example5").DataTable();
            $("#example6").DataTable();
            $("#example7").DataTable();
            $("#example8").DataTable();
            $("#example9").DataTable();
            $("#example10").DataTable();
            $("#example11").DataTable();
            $("#example12").DataTable();
            $("#example16").DataTable();

            $('#example13').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false
            });
        });


        //====================== MODAL SUB UNIT KERJA=========	  

        function pilihNamasubunit(data) {
            $('input[name="nama_unit_kerja"]').val(data);
            $("#myModalSubunit").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalSubunit");
            var btn = $("#cariNamaSubUnit");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputSubunit").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });


        //====================== MODAL DATA PEGAWAI=========
        //====================== MODAL NAMA JABATAN=========

        function pilihNamaJabatan(data) {
            $('input[name="jab"]').val(data);
            $("#myModalnamajabatan").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalnamajabatan");
            var btn = $("#cariNamaJabatan");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputnamajabatan").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        //====================== MODAL DATA PEGAWAI=========
        //====================== MODAL NAMA UNIT =========


        function pilihNamaUnit(data) {
            $('input[name="namaunit"]').val(data);
            $("#myModalnamaunit").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalnamaunit");
            var btn = $("#cariUnitKerja");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputnamaunit").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        //====================== MODAL PPK =========
        //====================== MODAL NAMA UNIT=========

        function pilihNamaunit(data) {
            $('input[name="namaunit_kerja"]').val(data);
            $("#myModalNamaunit").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalNamaunit");
            var btn = $("#cariNamaunit");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputNamaunit").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        //====================== MODAL BENDAHARA=========
        //====================== MODAL NAMA UNIT=========

        function pilihNamaunitkerja(data) {
            $('input[name="namaunit"]').val(data);
            $("#myModalNamaunitkerja").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalNamaunitkerja");
            var btn = $("#cariNamaunitkerja");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputNamaunitkerja").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
        //====================== MODAL PENANDATANGANAN DOKUMEN=========
        //====================== MODAL NAMA JABATAN=========

        function pilihNamajabatan(data) {
            $('input[name="nama_jab"]').val(data);
            $("#myModalNamajabatan").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalNamajabatan");
            var btn = $("#cariNamajabatan");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputNamajabatan").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });


        //====================== MODAL PENANDATANGANAN DOKUMEN=========
        //====================== MODAL UNIT KERJA=========

        function pilihUnitkerja(data) {
            $('input[name="unitkerja"]').val(data);
            $("#myModalUnitkerja").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalUnitkerja");
            var btn = $("#cariUnitkerja");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputUnitkerja").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });


        //====================== MODAL INPUT USULAN PERJALANAN DINAS =========
        //====================== MODAL NAMA UNIT =========


        function pilihnamaunitkerja(data) {
            $('input[name="unitker"]').val(data);
            $("#myModalnamaunitkerja").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalnamaunitkerja");
            var btn = $("#carinamauntkerja");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputnamaunitkerja").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
        //====================== MODAL INPUT USULAN PERJALANAN DINAS =========
        //====================== MODAL NAMA SUB UNIT KERJA =========


        function pilihsubnamaunitkerja(data) {
            $('input[name="subunitker"]').val(data);
            $("#myModalnamasubunitkerja").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalnamasubunitkerja");
            var btn = $("#carisubunitkerja");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputsubnamaunitkerja").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        //====================== MODAL INPUT USULAN PERJALANAN DINAS =========
        //====================== MODAL NAMA KOTA / KABUPATEN =========


        function pilihnamakota(data) {
            $('input[name="namakota"]').val(data);
            $("#myModalnamakota").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalnamakota");
            var btn = $("#carinamakota");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputnamakota").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        //====================== MODAL INPUT USULAN PERJALANAN DINAS =========
        //====================== MODAL NAMA PROVINSI =========


        function pilihnamaprov(data) {
            $('input[name="prov"]').val(data);
            $("#myModalnamaprov").hide();
        }
        $(document).ready(function() {
            var modal = $("#myModalnamaprov");
            var btn = $("#carinamaprov");
            var span = $(".close-btn ");

            btn.click(function() {
                modal.css("display", "block");
            });

            span.click(function() {
                modal.css("display", "none");
            });

            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });

            $("#searchInputnamaprov").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        //========================MODAL UNTUK TYPE FILE==================================================
        function showImage(type, contentPath) {
            var modalTitle = document.getElementById('multiContentModalLabel');
            var contentContainer = document.getElementById('contentContainer');

            // Kosongkan konten sebelumnya jika ada
            contentContainer.innerHTML = '';

            if (type === 'png' || type === 'jpg' || type === 'jpeg') {
            modalTitle.innerHTML = 'File Bukti';
            var imageElement = document.createElement('img');
            imageElement.src = contentPath;
            imageElement.alt = 'Gambar';
            imageElement.style.width = '100%';
            contentContainer.appendChild(imageElement);
            } else if (type === 'pdf') {
            modalTitle.innerHTML = 'File Bukti';
            var pdfEmbedElement = document.createElement('object');
            pdfEmbedElement.data = contentPath;
            pdfEmbedElement.type = 'application/pdf';
            pdfEmbedElement.style.width = '100%';
            pdfEmbedElement.style.height = '500px';
            contentContainer.appendChild(pdfEmbedElement);
            } else if (type === 'xlsx' || type === 'xls') {
            modalTitle.innerHTML = 'File Bukti';
            var excelEmbedElement = document.createElement('object');
            excelEmbedElement.data = contentPath;
            excelEmbedElement.type = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            excelEmbedElement.style.width = '100%';
            excelEmbedElement.style.height = '500px';
            contentContainer.appendChild(excelEmbedElement);
            }

            // Buka modal
            $('#multiContentModal').modal('show');
        }

        //============================================================================
    </script>

    <script>
        function test() {
            alert("data");
        }
    </script>

    </html>

<?php
}
?>