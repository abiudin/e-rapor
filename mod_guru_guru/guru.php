<?php 

$aksi="modul/mod_guru/aksi_guru.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<h2>Data Guru</h2>
    <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
    <input type=button value='Tambah Guru' onclick=\"window.location.href='?module=guru&act=tambahguru';\">
    </form>

          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>kode guru</th><th>nip</th><th>nama guru</th><th>alamat</th><th>no telepon</th><th>aksi</th></tr>";

    if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT * FROM tbguru WHERE kodeguru LIKE '%$cari%' OR nip LIKE '%$cari%' OR namaguru LIKE '%$cari%' OR alamat LIKE '%$cari%' OR notelp LIKE '%$cari%'");
    }
    else {

    $tampil=mysql_query("SELECT * FROM tbguru ORDER BY kodeguru");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
            <td>$r[kodeguru]</td>
	          <td>$r[nip]</td>
            <td>$r[namaguru]</td>
	          <td>$r[alamat]</td>
            <td>$r[notelp]</td>
            <td><a href=?module=guru&act=editguru&id=$r[kodeguru]>Edit</a> |
	              <a href=$aksi?module=guru&act=hapus&id=$r[kodeguru]>Hapus</a>
            </td></tr>";
    $no++;
    }
    echo "</table>";
    echo "<div id=paging> </div><br>";
    break;

  case "tambahguru":
    echo "<h2>Tambah Guru</h2>
          <form method=POST action='$aksi?module=guru&act=input'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>Kode Guru</td> <td>       : <input type=text name='kodeguru'></td></tr>
	  <tr><td>NIP</td> <td>       : <input type=text name='nip'></td></tr>
          <tr><td>Nama guru</td>       <td> : <input type=text name='namaguru'></td></tr>
	  <tr><td>Alamat</td> <td>       : <textarea name='alamat'></textarea></td></tr>
	  <tr><td>No Telepon</td> <td>       : <input type=text name='notelp'></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
 
  case "editguru":
    $edit = mysql_query("SELECT * FROM tbguru WHERE kodeguru='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Guru</h2>
          <form method=POST action=$aksi?module=guru&act=update>
          <input type=hidden name=kodeguru value='$r[kodeguru]'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>NIP</td>     <td> : <input type=text name='nip' value='$r[nip]'></td></tr>
	  <tr><td>Nama Guru</td>     <td> : <input type=text name='namaguru' value='$r[namaguru]'></td></tr>
	  <tr><td>Alamat</td>     <td> : <textarea name='alamat'>$r[alamat]</textarea></td></tr>
	  <tr><td>No Telepon</td>     <td> : <input type=text name='notelp' value='$r[notelp]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;
}
?>
