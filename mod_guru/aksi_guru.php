<?php 
session_start();
include "/../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus guru
if ($module=='guru' AND $act=='hapus'){
mysql_query("DELETE FROM tbguru WHERE kodeguru='$_GET[id]'");
  header('location:../../home.php?module='.$module);
}

// Input guru
elseif ($module=='guru' AND $act=='input'){

   	$kodeguru=$_POST["kodeguru"];
	$nip=$_POST["nip"];
	$namaguru=$_POST["namaguru"];
	$alamat=$_POST["alamat"];
	$notelp=$_POST["notelp"];

	//mendefinisikan perintah SQL untuk menyimpan data
	$sql="INSERT INTO tbguru(kodeguru,nip,namaguru,alamat,notelp ) VALUES ('$kodeguru','$nip','$namaguru','$alamat','$notelp')";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    header('location:../../home.php?module=guru&act=berhasildisimpan');
}

// Update guru
elseif ($module=='guru' AND $act=='update'){
   	$kodeguru=$_POST["kodeguru"];
	  $nip=$_POST["nip"];
	  $namaguru=$_POST["namaguru"];
	  $alamat=$_POST["alamat"];
	  $notelp=$_POST["notelp"];


	//mendefinisikan perintah SQL untuk menyimpan data
	$sql="UPDATE tbguru SET kodeguru='$kodeguru',nip='$nip',namaguru='$namaguru',alamat='$alamat',notelp='$notelp' WHERE kodeguru='$kodeguru'";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    header('location:../../home.php?module='.$module);
}
// Cek Kode Guru
elseif ($module=='guru' AND $act=='cekkode'){
	
	$kodeguru=$_GET["kodeguru"];
	
	//mendefinisikan mengambil data guru
	$sql="SELECT * FROM tbguru WHERE kodeguru='$kodeguru'";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    if (mysql_num_rows($query)>0){
	$tampil=mysql_fetch_array($query);
	echo "<font color='red'> Kode Guru sudah digunakan</font>";
	}
else {
	echo "<font color='green'> Kode Guru dapat digunakan</font>";
	}
}
?>
