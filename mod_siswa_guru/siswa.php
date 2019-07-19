<?php 

$aksi="modul/mod_siswa/aksi_siswa.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<h2>Data Siswa</h2>
    <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
    <input type=button value='Tambah siswa' onclick=\"window.location.href='?module=siswa&act=tambahsiswa';\">
    </form>

          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>nis</th><th>nama</th><th>alamat</th><th>kelas</th><th>aksi</th></tr>";

    if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT * FROM tbsiswa WHERE nis LIKE '%$cari%' nama OR  LIKE '%$cari%' OR alamat LIKE '%$cari%' OR kelas LIKE '%$cari%'");
    }
    else {

    $tampil=mysql_query("SELECT * FROM tbsiswa ORDER BY nis");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
            <td>$r[nis]</td>
            <td>$r[nama]</td>
            <td>$r[alamat]</td>
            <td>$r[kelas]</td>
            <td><a href=?module=siswa&act=editsiswa&id=$r[nis]>Edit</a> |
	              <a href=$aksi?module=siswa&act=hapus&id=$r[nis]>Hapus</a>
            </td></tr>";
    $no++;
    }
    echo "</table>";
    echo "<div id=paging> </div><br>";
    break;

  case "tambahsiswa":
    echo "<h2>Tambah Siswa</h2>
          <form method=POST action='$aksi?module=siswa&act=input'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>NIS</td> <td>       : <input type=text name='nis'></td></tr>
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
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
 
  case "editsiswa":
    $edit = mysql_query("SELECT * FROM tbsiswa WHERE nis='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Siswa</h2>
          <form method=POST action='$aksi?module=siswa&act=update'>
          <input type='hidden' name='nis' value='$r[nis]'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>Nama</td>       <td> : <input type=text name='nama' value='$r[nama]'></td></tr>
          <tr><td>Alamat</td>    <td> : <textarea name='alamat'>$r[alamat]</textarea></td></tr>
          <tr><td>Kelas</td>      <td>      :
          <select name='kodekelas'>";
 
          $tampil=mysql_query("SELECT * FROM tbkelas ORDER BY namakelas");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kelas -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[kodekelas]==$w[kodekelas]){
              echo "<option value=$w[kodekelas] selected>$w[namakelas]</option>";
            }
            else{
              echo "<option value=$w[kodekelas]>$w[namakelas]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;
}
?>
