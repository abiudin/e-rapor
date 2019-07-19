<?php 
session_start();
$aksi="modul/mod_user/aksi_user.php";
$semester=$_SESSION[semester];
$kelas=$_SESSION[kelas];
$tapel=$_SESSION[tapel];
switch($_GET[act]){
  // Tampil User
  default:
    echo "<h2>Daftar Siswa Klas : $_SESSION[kelas]</h2>
		  
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>NIS</th><th>NAMA SISWA</th><th>Preview Identitas</th><th>Preview Nilai</th></tr>"; 
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
	if($semester=="ganjil"){
		$tampil=mysql_query("SELECT tbkls.*, masterguru.*, mastersiswa.namasiswa FROM ((tbkls INNER JOIN masterguru ON tbkls.kdwalikls = masterguru.kdguru) INNER JOIN mastersiswa ON tbkls.nis = mastersiswa.nis) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' AND validasi1 = '1' ORDER BY mastersiswa.namasiswa ASC");
		//$tampil=mysql_query("SELECT tbkls.*, masterguru.* FROM (tbkls INNER JOIN masterguru ON tbkls.kdwalikls = masterguru.kdguru) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' ");
	}
	else{
		$tampil=mysql_query("SELECT tbkls.*, masterguru.*, mastersiswa.namasiswa FROM ((tbkls INNER JOIN masterguru ON tbkls.kdwalikls = masterguru.kdguru) INNER JOIN mastersiswa ON tbkls.nis = mastersiswa.nis) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' AND validasi2 = '1' ORDER BY mastersiswa.namasiswa ASC");
		//$tampil=mysql_query("SELECT tbkls.*, masterguru.* FROM (tbkls INNER JOIN masterguru ON tbkls.kdwalikls = masterguru.kdguru) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' ");
	}
	}
	
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nis]</td>
			 <td>$r[namasiswa]</td>
             <td><a href=modul/rapor/rapot2.php?nis=$r[nis]&semester=$semester&kelas=$kelas&tapel=$tapel&wali=$r[kdwalikls]>Preview</a></td>
			 <td><a href=modul/mod_nilai/cetak.php?nis=$r[nis]&semester=$semester&kelas=$kelas&tapel=$tapel&wali=$r[kdwalikls]>Preview</a></td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
}

?>
