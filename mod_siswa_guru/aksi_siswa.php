<?php 
session_start();
include "/../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus barang
if ($module=='siswa' AND $act=='hapus'){
mysql_query("DELETE FROM tbsiswa WHERE nis='$_GET[id]'");
  header('location:../../home.php?module='.$module);
}

// Input siswa
elseif ($module=='siswa' AND $act=='input'){

   	$nis=$_POST["nis"];
	  $nama=$_POST["nama"];
	  $alamat=$_POST["alamat"];
	  $kelas=$_POST["kodekelas"];
	//mendefinisikan perintah SQL untuk menyimpan data
	$sql="INSERT INTO tbsiswa(nis,nama,alamat,kelas ) VALUES ('$nis','$nama','$alamat','$kelas')";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    header('location:../../home.php?module='.$module);
}

// Update siswa
elseif ($module=='siswa' AND $act=='update'){
   	$nis=$_POST["nis"];
	  $nama=$_POST["nama"];
	  $alamat=$_POST["alamat"];
	  $kelas=$_POST["kodekelas"];

	//mendefinisikan perintah SQL untuk menyimpan data
	$sql="UPDATE tbsiswa SET nis='$nis',nama='$nama',alamat='$alamat',kelas='$kelas' WHERE nis='$nis'";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    header('location:../../home.php?module='.$module);

}
?>
