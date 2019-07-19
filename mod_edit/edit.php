<?php 
session_start();
$aksi="modul/mod_user/aksi_user.php";
$semester=$_SESSION[semester];
$kelas=strtolower($_SESSION[kelas]);
$tkelas=strtolower($_SESSION[tkelas]);
$tapel=$_SESSION[tapel];
?>
<link href="modul/mod_edit/thickbox.css" rel="stylesheet" type="text/css" />
<script src="modul/mod_edit/js/thickbox.js" type="text/javascript"></script>

<div class="cleaner_h5"></div>
<?php 
//echo $semester."<br>";
//echo $tkelas."<br>";
if($semester==Gasal){
$smt=1;
$mtb=tbnilai.$tkelas.$smt;
//echo $mtb;
}
if($semester==Genap){
$smt=2;
$mtb=tbnilai.$tkelas.$smt;
//echo $mtb;
}
switch($_GET[act]){
  // Tampil User
  default:
    echo "<h2>Daftar Siswa Klas : $_SESSION[kelas]</h2>
		  
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>NIS</th><th>NAMA SISWA</th><th>Preview Identitas</th><th>edit</th></tr>"; 
	if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT * FROM tbkls.*, mastersiswa.namasiswa FROM (tbkls INNER JOIN mastersiswa ON tbkls.nis mastersiswa.nis ORDER BY mastersiswa.namasiswa ASC
    WHERE
    username LIKE '%$cari%' OR 
    level LIKE '%$cari%'
	ORDER BY username");
    }
    else {
    //$tampil=mysql_query("SELECT * FROM tbkls WHERE kelas = '10-E'");
	if($semester=="Gasal"){
		//$tampil=mysql_query("SELECT DISTINCT $mtb.nis, mastersiswa.namasiswa FROM ($mtb INNER JOIN mastersiswa ON $mtb.nis = mastersiswa.nis) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' AND validasi1 = '1' ORDER BY mastersiswa.namasiswa ASC");
		$tampil=mysql_query("SELECT  DISTINCT $mtb.nis, mastersiswa.namasiswa  FROM ($mtb INNER JOIN mastersiswa ON $mtb.nis = mastersiswa.nis) WHERE namakelas = '$kelas' AND tapel = '$tapel'  ORDER BY mastersiswa.namasiswa ASC");
		
		//$tampil=mysql_query("SELECT DISTINCT $mtb.nis, mastersiswa.namasiswa FROM (tbkls INNER JOIN masterguru ON tbkls.kdwalikls = masterguru.kdguru) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' ");
	}
	else{
		$tampil=mysql_query("SELECT  DISTINCT $mtb.nis, mastersiswa.namasiswa  FROM ($mtb INNER JOIN mastersiswa ON $mtb.nis = mastersiswa.nis) WHERE namakelas = '$kelas' AND tapel = '$tapel' ORDER BY mastersiswa.namasiswa ASC");
		//$tampil=mysql_query("SELECT tbkls.*, masterguru.* FROM (tbkls INNER JOIN masterguru ON tbkls.kdwalikls = masterguru.kdguru) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' ");
	}
	}
	
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nis]</td>
			 <td>$r[namasiswa]</td>
             <td><a href=modul/rapor/rapot2.php?nis=$r[nis]&semester=$semester&kelas=$kelas&tkelas=$tkelas&tapel=$tapel&wali=$r[kdwalikls]>Preview</a></td>
			 <td>";
		echo '	
			<a href="modul/mod_edit/edit-siswa.php?nis='.$r['nis'].'" class="thickbox" title="Edit Data  Siswa - '.$r["namasiswa"].'-'.$r["nis"].' -<b> Untuk Menyimpan cukup menekan Enter!!</b>"><div id="box-link">Edit</div></a>
			<!--a href=modul/mod_edit/edit-siswa.php?nis=$r[nis]><div id=box-link>Edit</div></a-->
			</td>	 								
			 </tr>';
      $no++;
    }
    echo "</table>";
    break;
  
}

?>
