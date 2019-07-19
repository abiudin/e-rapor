<?php 

$aksi="modul/mod_siswa/aksi_siswa.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<h2>Data Siswa</h2>
    <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
    </form>

          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>nis</th><th>nama</th><th>aksi</th></tr>";

    if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT tbsiswa.nis,tbsiswa.nama,tbsiswa.alamat,tbkelas.namakelas
	FROM tbsiswa,tbkelas 
	WHERE  
	(tbsiswa.nis LIKE '%$cari%' OR
	tbsiswa.nama LIKE '%$cari%' OR 
	tbsiswa.alamat LIKE '%$cari%' OR 
	tbkelas.namakelas LIKE '%$cari%') AND
	tbsiswa.kodekelas=tbkelas.kodekelas");
    }
    else {

    $tampil=mysql_query("SELECT *
	FROM mastersiswa
	");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
            <td>$r[nis]</td>
            <td>$r[namasiswa]</td>
            
            <td><a href=?module=formsiswa&act=editsiswa&id=$r[nis]>Edit</a> |
	              <a href=$aksi?module=formsiswa&act=hapus&id=$r[nis]>Hapus</a>
            </td></tr>";
    $no++;
    }
    echo "</table>";
    break;

  case "lihatsiswa":
    echo "<h2>Data Siswa</h2>
    <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
    </form>

          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>nis</th><th>nama</th><th>alamat</th><th>kelas</th></tr>";

    if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT tbsiswa.nis,tbsiswa.nama,tbsiswa.alamat,tbkelas.namakelas
	FROM tbsiswa,tbkelas 
	WHERE  
	(tbsiswa.nis LIKE '%$cari%' OR
	tbsiswa.nama LIKE '%$cari%' OR 
	tbsiswa.alamat LIKE '%$cari%' OR 
	tbkelas.namakelas LIKE '%$cari%') AND
	tbsiswa.kodekelas=tbkelas.kodekelas");
    }
    else {

    $tampil=mysql_query("SELECT tbsiswa.nis,tbsiswa.nama,tbsiswa.alamat,tbkelas.namakelas
	FROM tbsiswa,tbkelas
	WHERE tbsiswa.kodekelas=tbkelas.kodekelas ORDER BY tbkelas.namakelas,tbsiswa.nama");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
            <td>$r[nis]</td>
            <td>$r[nama]</td>
            <td>$r[alamat]</td>
            <td>$r[namakelas]</td>
            </tr>";
    $no++;
    }
    echo "</table>";
    break;
	
   case "berhasildisimpan":
    echo "<p>Data Berhasil Disimpan<br /><br /><a href='home.php?module=siswa&act=tambahsiswa'>[ Back ]</a><br /></p>";
    break;
	
  case "tambahsiswa":
    echo "
		<script type='text/javascript'>
function CekNIS(nis) {
if (nis=='') {
	document.getElementById('txtTampil').innerHTML='';
	return;
	}
if (window.XMLHttpRequest) {
	xmlhttp=new XMLHttpRequest();
	}
else {
	xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		document.getElementById('txtTampil').innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET','$aksi?module=siswa&act=ceknis&nis='+nis,true);
	xmlhttp.send();
	}
</script>
	
		<h2>Tambah Siswa</h2>
          <form method=POST action='$aksi?module=siswa&act=input'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>NIS</td> <td>       : <input type=text name='nis' onKeyup='CekNIS(this.value);'>&nbsp;<div id='txtTampil'></div></td></tr>
          <tr><td>Nama</td>       <td> : <input type=text name='nama' size=30></td></tr>
          <tr><td>Alamat</td>    <td> : <textarea name='alamat'></textarea></td></tr>
          <tr><td>Kelas</td>      <td>      : 
          <select name='kodekelas'>
            <option value=0 selected>- Pilih kelas -</option>";
            $tampil=mysql_query("SELECT * FROM tbkelas ORDER BY namakelas");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[kodekelas]>$r[namakelas]</option>";
            }
    echo "</select>
          <tr><td colspan=2><input type=submit value=Simpan>
                            </td></tr>
          </table></form>";
     break;
 
  case "editsiswa":
    $edit = mysql_query("SELECT * FROM mastersiswa WHERE nis='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Siswa</h2>
          <form method=POST action='$aksi?module=siswa&act=update'>
          <input type='hidden' name='nis' value='$r[nis]'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>Nama</td>       <td> : <input type=text name='nama' value='$r[namasiswa]'></td></tr>
          <tr><td>Alamat</td>    <td> : <textarea name='alamat'>$r[almtswkb]</textarea></td></tr>
         
          
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;
}
?>
