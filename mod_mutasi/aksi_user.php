<?php 
session_start();
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus user
if ($module=='user' AND $act=='hapus'){
  mysql_query("DELETE FROM user WHERE username='$_GET[id]'");
  header('location:../../home.php?module='.$module);
}

// Input user
elseif ($module=='user' AND $act=='input'){
  $pass=md5($_POST[password]);
  mysql_query("INSERT INTO user(username,
                                 password,
                                 level) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[level]'
								)");
  header('location:../../home.php?module='.$module);
}

// Update user
elseif ($module=='user' AND $act=='update'){
	$username=$_POST["username"];
	$pass=md5($_POST["password"]);
	$level=$_POST["level"];
  if (empty($_POST[password])) {
    mysql_query("UPDATE user SET level='$level' WHERE username='$username'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE user SET password='$pass',level='$level' WHERE username='$username'");
  }
  header('location:../../home.php?module='.$module);
}
?>
