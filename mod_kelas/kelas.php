<?php 

$aksi="modul/mod_kelas/aksi_kelas.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<h2>Data Kelas</h2>
    <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
    <input type=button value='Tambah Kelas' onclick=\"window.location.href='?module=kelas&act=tambahkelas';\">
    </form>

          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>kelas</th><th>aksi</th></tr>";

    if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT * FROM tbkelas WHERE kodekelas LIKE '%$cari%' OR namakelas LIKE '%$cari%'");
    }
    else {

    $tampil=mysql_query("SELECT * FROM tbkelas ORDER BY namakelas");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
            
            <td>$r[namakelas]</td>
            <td><a href=?module=kelas&act=editkelas&id=$r[kodekelas]>Edit</a> |
	              <a href=$aksi?module=kelas&act=hapus&id=$r[kodekelas]>Hapus</a>
            </td></tr>";
    $no++;
    }
    echo "</table>";
    echo "<div id=paging> </div><br>";
    break;

  case "tambahkelas":
    echo "<h2>Tambah Kelas</h2>
          <form method=POST action='$aksi?module=kelas&act=input'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>Kode Kelas</td> <td>       : <input type=text name='kodekelas'></td></tr>
          <tr><td>Nama Kelas</td>       <td> : <input type=text name='namakelas'></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
 
  case "editkelas":
    $edit = mysql_query("SELECT * FROM tbkelas WHERE kodekelas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Kelas</h2>
          <form method=POST action='$aksi?module=kelas&act=update'>
          <input type='hidden' name='kodekelas' value='$r[kodekelas]'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>Nama Kelas</td>       <td> : <input type=text name='namakelas' value='$r[namakelas]'></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;
}
?>
