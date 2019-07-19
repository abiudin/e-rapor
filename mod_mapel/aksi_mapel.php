<?php 
session_start();
include "/../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus mapel
if ($module=='mapel' AND $act=='hapus'){
mysql_query("DELETE FROM tbmapel WHERE kodemapel='$_GET[id]'");
  header('location:../../home.php?module='.$module);
}

// Input mapel
elseif ($module=='mapel' AND $act=='input'){

   	$kodemapel=$_POST["kodemapel"];
	  $mapel=$_POST["mapel"];
	  $kkm=$_POST["kkm"];
	  $kodeguru=$_POST["kodeguru"];
	  
	//mendefinisikan perintah SQL untuk menyimpan data
	$sql="INSERT INTO tbmapel(kodemapel,mapel,kkm,kodeguru ) VALUES ('$kodemapel','$mapel','$kkm','$kodeguru')";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    header('location:../../home.php?module=mapel&act=berhasildisimpan');
}

// Update mapel
elseif ($module=='mapel' AND $act=='update'){
    $kodemapel=$_POST["kodemapel"];
	  $mapel=$_POST["mapel"];
	  $kkm=$_POST["kkm"];
	  $kodeguru=$_POST["kodeguru"];

	//mendefinisikan perintah SQL untuk menyimpan data
	$sql="UPDATE tbmapel SET kodemapel='$kodemapel',mapel='$mapel',kkm='$kkm',kodeguru='$kodeguru' WHERE kodemapel='$kodemapel'";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    header('location:../../home.php?module='.$module);
}
// Cek Kode Mapel
elseif ($module=='mapel' AND $act=='cekkode'){
	
	$kodemapel=$_GET["kodemapel"];
	
	//mendefinisikan mengambil data guru
	$sql="SELECT * FROM tbmapel WHERE kodemapel='$kodemapel'";

	//jalankan query SQL
	$query=mysql_query($sql) or die(mysql_error());
    if (mysql_num_rows($query)>0){
	$tampil=mysql_fetch_array($query);
	echo "<font color='red'> Kode Mata Pelajaran sudah digunakan</font>";
	}
else {
	echo "<font color='green'> Kode Mata Pelajaran dapat digunakan</font>";
	}
}

?>
