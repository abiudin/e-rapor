<html>
<head>
</head>
<body>
<?php 
//konfigurasi offline
ini_set('display_errors',FALSE);
$host="localhost";
$user="root";
$pass="";
$db="ri32-ajax";

//koneksi 
$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);
$waktu=date("Y-m-d H:i:s");

//cek
if ($koneksi)
{
	//echo "berhasil : )";
}else{
	?><script language="javascript">alert("Gagal Koneksi Database MySql !!")</script><?php 
}

?>
</body>
</html>
