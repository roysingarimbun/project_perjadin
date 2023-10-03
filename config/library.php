<?php      
// konversi menjadi nama hari bahasa indonesia
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari     = date("w");
$hari_ini = $seminggu[$hari]; // konversi menjadi hari bahasa indonesia

$tgl_sekarang = date("Y-m-d");
$tgl_kode = date("Ymd");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");
$jam_kode=date("His");

$bln_sekarang= date("m");
// format penanggalan di database MySQL
$tanggal=date("Y-m-d"); 

// fungsi untuk mengubah tanggal menjadi format bahasa indonesia, contoh: 14 Maret 2014 
function tgl_indo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan   = ambilbulan(substr($tgl,5,2)); // konversi menjadi nama bulan bahasa indonesia
	$tahun   = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	

// fungsi untuk mengubah angka bulan menjadi nama bulan
function ambilbulan($bln){
  if ($bln=="01") return "Januari";
  elseif ($bln=="02") return "Februari";
  elseif ($bln=="03") return "Maret";
  elseif ($bln=="04") return "April";
  elseif ($bln=="05") return "Mei";
  elseif ($bln=="06") return "Juni";
  elseif ($bln=="07") return "Juli";
  elseif ($bln=="08") return "Agustus";
  elseif ($bln=="09") return "September";
  elseif ($bln=="10") return "Oktober";
  elseif ($bln=="11") return "November";
  elseif ($bln=="12") return "Desember";
} 

function daterange1($tgl) {  
  $tanggal = substr($tgl,3,2);
  $bulan   = substr($tgl,0,2); // konversi menjadi nama bulan bahasa indonesia
  $tahun   = substr($tgl,6,4);
  return $tahun.'-'.$bulan.'-'.$tanggal;     
} 

function daterange2($tgl) {  
  $tanggal = substr($tgl,16,2);
  $bulan   = substr($tgl,13,2); // konversi menjadi nama bulan bahasa indonesia
  $tahun   = substr($tgl,19,4);
  return $tahun.'-'.$bulan.'-'.$tanggal;     
} 

// fungsi untuk mengubah susunan format tanggal
function ubah_tgl($tanggal) { 
   $pisah   = explode('/',$tanggal);
   $larik   = array($pisah[2],$pisah[1],$pisah[0]);
   $satukan = implode('-',$larik);
   return $satukan;
}

function ubah_tgl2($tanggal) { 
   $pisah   = explode('-',$tanggal);
   $larik   = array($pisah[2],$pisah[1],$pisah[0]);
   $satukan = implode('/',$larik);
   return $satukan;
}

?>

<?php
function send_notif_wa($no_tujuan,$pesan_wa)
{
$api_key   = '7366a332e65f132b419e6b3fba631e907925689c'; // API KEY Anda
$id_device = '5782'; // ID DEVICE yang di SCAN (Sebagai pengirim) //2892
$url   = 'https://api.watsap.id/send-message'; // URL API
$no_hp = $no_tujuan; // No.HP yang dikirim (No.HP Penerima)
$pesan = $pesan_wa; // Pesan yang dikirim

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_POST, 1);

$data_post = [
   'id_device' => $id_device,
   'api-key' => $api_key,
   'no_hp'   => $no_hp,
   'pesan'   => $pesan
];
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($curl);
curl_close($curl);
//echo $response;
}
?>