<?php 
session_start();

include "../../config/koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
$level= $_SESSION[leveluser];
$oldpasswd=$_SESSION[passuser];
$module=$_GET[module];

$act=$_GET[act];

// Update user

	$username=$_POST["username"];
	$oldpaswd=antiinjection(md5($_POST["oldpaswd"]));
	$pass=md5($_POST["password"]);
	$password=$_POST["password"];
	$level=$_POST["level"];
  
  if ($oldpaswd==$oldpasswd) {
  //  mysql_query("UPDATE user SET level='$level' WHERE username='$username'");
 // header('location:../../home.php?module='.$module);
		if (empty($password)) {
		 
			echo "<link href=config/adminstyle.css rel=stylesheet type=text/css>";
			echo "<center>Password tak boleh kosong melompong !!!  <br> 
				
				.<br>";
			echo "<a href=../../index.php><b>Log</b></a></center>";
			
		}
		else{
			$pass=md5($_POST[password]);
			mysql_query("UPDATE user SET password='$pass' WHERE username='$username'");
			header('location:../../home.php?module=pesan');
		}
  }
  // Apabila password diubah
  else{
    
	echo "<link href=config/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>Password Salah !!!  <br> 
        Password Anda tidak benar.<br>
        .<br>";
  echo "<a href=../../index.php><b>Log</b></a></center>";
  
  }
//  header('location:../../home.php?module='.$module);
//echo $_SESSION[leveluser];

?>
