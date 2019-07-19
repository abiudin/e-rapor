<?php 

$aksi="modul/mod_mapel/aksi_mapel.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<h2>Data Mapel</h2>
    <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
    <input type=button value='Tambah Mata Pelajaran' onclick=\"window.location.href='?module=mapel&act=tambahmapel';\">
    </form>

          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>kode mapel</th><th>nama mapel</th><th>KKM kelas X</th><th>KKM kelas XI</th><th>KKM kelas XII</th><th>Aksi</th></tr>";

    if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT mastermapel.id,mastermapel.mapel,mastermapel.kkm,tbguru.namaguru
    FROM mastermapel, tbguru 
    WHERE mastermapel.kodeguru=tbguru.kodeguru AND 
    mastermapel.id LIKE '%$cari%' OR 
    mastermapel.mapel LIKE '%cari' OR
    mastermapel.kkm LIKE '%$cari%' OR 
    tbguru.namaguru LIKE '%$cari%' 
    ");
    }
    else {

    $tampil=mysql_query("SELECT mastermapel.id,mastermapel.mapel,mastermapel.kkm10,mastermapel.kkm11,mastermapel.kkm12 FROM mastermapel
    ");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
            <td>$r[id]</td>
            <td>$r[mapel]</td>
            <td>$r[kkm10]</td>
			<td>$r[kkm11]</td>
			<td>$r[kkm12]</td>
           
            <td><a href=?module=mapel&act=editmapel&id=$r[id]>Edit</a> |
	              <a href=$aksi?module=mapel&act=hapus&id=$r[id]>Hapus</a>
            </td></tr>";
    $no++;
    }
    echo "</table>";
    echo "<div id=paging> </div><br>";
    break;

  case "tambahmapel":
    echo "<h2>Tambah Mata Pelajaran</h2>
          <form method=POST action='$aksi?module=mapel&act=input'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>Kode Mata Pelajaran</td> <td>       : <input type=text name='id'></td></tr>
          <tr><td>Mata Pelajaran</td>       <td> : <input type=text name='mapel'></td></tr>
          <tr><td>KKM</td> <td>       : <input type=text name='kkm'></td></tr>
          <tr><td>Nama Guru</td> <td>       : 
          <select name='kodeguru'>
            <option value=0 selected>- Pilih Guru -</option>";
            $tampil=mysql_query("SELECT * FROM tbguru ORDER BY namaguru");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[kodeguru]>$r[namaguru]</option>";
            }
    echo "</select></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
 
  case "editmapel":
    $edit = mysql_query("SELECT * FROM mastermapel WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Mata Pelajaran</h2>
          <form method=POST action=$aksi?module=mapel&act=update>
          <input type=hidden name=id value='$r[id]'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>Nama Mata Pelajaran</td>     <td> : <input type=text name='mapel' value='$r[mapel]'></td></tr>
          <tr><td>KKM</td> <td>       : <input type=text name='kkm' value='$r[kkm]'></td></tr>
          <tr><td>Nama Guru</td><td>: <select name='kodeguru'>";
 
          $tampil=mysql_query("SELECT * FROM tbguru ORDER BY namaguru");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Guru -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[kodeguru]==$w[kodeguru]){
              echo "<option value=$w[kodeguru] selected>$w[namaguru]</option>";
            }
            else{
              echo "<option value=$w[kodeguru]>$w[namaguru]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;
}
?>
