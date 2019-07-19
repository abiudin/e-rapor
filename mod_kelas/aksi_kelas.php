<?php 
session_start();
include "/../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus kelas
if ($module=='kelas' AND $act=='hapus'){
mysql_query("DELETE FROM tbkelas WHERE kodekelas='$_GET[id]'");
  header('location:../../home.php?module='.$module);
}

// Input kelas
elseif ($module=='kelas' AND $act=='input'){

   	$kodekelas=$_POST["kodekelas"];
	  $namakelas=$_POST["namakelas"];
	//mendefinisikan perintah SQL untuk menyimpan data
	$sql="INSERT INTO tbkelas(kodekelas,namakelas) VALUES ('$kodekelas','$namakelas')";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    header('location:../../home.php?module='.$module);
}

// Update kelas
elseif ($module=='kelas' AND $act=='update'){
   		$kodekelas=$_POST["kodekelas"];
	  $namakelas=$_POST["namakelas"];

	//mendefinisikan perintah SQL untuk menyimpan data
	$sql="UPDATE tbkelas SET kodekelas='$kodekelas',namakelas='$namakelas' WHERE kodekelas='$kodekelas'";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    header('location:../../home.php?module='.$module);

}
?>
