<?php
include "config/koneksi.php";

$direktori = "files/"; // folder tempat penyimpanan file yang boleh didownload
$filename = $_GET['file'];

if(file_exists($direktori.$filename)){
	$file_extension = strtolower(substr(strrchr($filename,"."),1));

	switch($file_extension){
	  case "pdf": $ctype="application/pdf"; break;
	  case "exe": $ctype="application/octet-stream"; break;
	  case "zip": $ctype="application/zip"; break;
	  case "rar": $ctype="application/rar"; break;
	  case "doc": $ctype="application/msword"; break;
	  case "xls": $ctype="application/vnd.ms-excel"; break;
	  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
	  case "gif": $ctype="image/gif"; break;
	  case "png": $ctype="image/png"; break;
	  case "jpeg":
	  case "jpg": $ctype="image/jpg"; break;
	  default: $ctype="application/proses";
	}

	if ($file_extension=='php'){
	  echo "<script language=\"Javascript\">\n";
			echo "window.alert('File yang Anda download sudah tidak tersedia ');";
			echo "window.location='http://perjadin.com/files/files_dokumen';";
		echo "</script>";
	  exit;
	}
	else{
	  

	  header("Content-Type: octet/stream");
	  header("Pragma: private"); 
	  header("Expires: 0");
	  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	  header("Cache-Control: private",false); 
	  header("Content-Type: $ctype");
	  header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
	  header("Content-Transfer-Encoding: binary");
	  header("Content-Length: ".filesize($direktori.$filename));
	  readfile("$direktori$filename");
	  exit();   
	}
}else{
	  echo "<script language=\"Javascript\">\n";
			echo "window.alert('File yang Anda download sudah tidak tersedia ');";
			echo "window.location='http://perjadin.com/files/files_dokumen';";
		echo "</script>";
	  exit;
}

?>