<?php 

$aksi="modul/mod_mapel/aksi_mapel.php";
switch($_GET[act]){
  // Tampil Edit Mapel
  default:
    echo "<h2>Data Mapel</h2>
    <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
    </form>

          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>kode mapel</th><th>nama mapel</th><th>KKM</th><th>nama guru</th><th>aksi</th></tr>";

    if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT tbmapel.kodemapel,tbmapel.mapel,tbmapel.kkm,tbguru.namaguru
    FROM tbmapel, tbguru 
    WHERE tbmapel.kodeguru=tbguru.kodeguru AND 
    (tbmapel.kodemapel LIKE '%$cari%' OR 
    tbmapel.mapel LIKE '%$cari%' OR
    tbmapel.kkm LIKE '%$cari%' OR 
    tbguru.namaguru LIKE '%$cari%') 
    ");
    }
    else {

    $tampil=mysql_query("SELECT tbmapel.kodemapel,tbmapel.mapel,tbmapel.kkm,tbguru.namaguru FROM tbmapel, tbguru 
    WHERE tbmapel.kodeguru=tbguru.kodeguru");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
            <td>$r[kodemapel]</td>
            <td>$r[mapel]</td>
            <td>$r[kkm]</td>
            <td>$r[namaguru]</td
            <td><a href=?module=mapel&act=editmapel&id=$r[kodemapel]>Edit</a> |
	              <a href=$aksi?module=mapel&act=hapus&id=$r[kodemapel]>Hapus</a>
            </td></tr>";
    $no++;
    }
    echo "</table>";
    break;

case "lihatmapel":
    echo "<h2>Data Mapel</h2>
    <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
    </form>

          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>kode mapel</th><th>nama mapel</th><th>KKM</th><th>nama guru</th></tr>";

    if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT tbmapel.kodemapel,tbmapel.mapel,tbmapel.kkm,tbguru.namaguru
    FROM tbmapel, tbguru 
    WHERE tbmapel.kodeguru=tbguru.kodeguru AND 
    (tbmapel.kodemapel LIKE '%$cari%' OR 
    tbmapel.mapel LIKE '%$cari%' OR
    tbmapel.kkm LIKE '%$cari%' OR 
    tbguru.namaguru LIKE '%$cari%') 
    ");
    }
    else {

    $tampil=mysql_query("SELECT tbmapel.kodemapel,tbmapel.mapel,tbmapel.kkm,tbguru.namaguru FROM tbmapel, tbguru 
    WHERE tbmapel.kodeguru=tbguru.kodeguru");
    }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
            <td>$r[kodemapel]</td>
            <td>$r[mapel]</td>
            <td>$r[kkm]</td>
            <td>$r[namaguru]</td
            </tr>";
    $no++;
    }
    echo "</table>";
    echo "<div id=paging> </div><br>";
    break;
	
   case "berhasildisimpan":
    echo "<p>Data Berhasil Disimpan<br /><br /><a href='home.php?module=mapel&act=tambahmapel'>[ Back ]</a><br /></p>";
    break;
	
  case "tambahmapel":
    echo "
		<script type='text/javascript'>
function CekKodeMapel(kodemapel) {
if (kodemapel=='') {
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
	xmlhttp.open('GET','$aksi?module=mapel&act=cekkode&kodemapel='+kodemapel,true);
	xmlhttp.send();
	}
</script>
	
		<h2>Tambah Mata Pelajaran</h2>
          <form method=POST action='$aksi?module=mapel&act=input'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><td>Kode Mata Pelajaran</td> <td>       : <input type=text name='kodemapel' onKeyup='CekKodeMapel(this.value);'>&nbsp;<div id='txtTampil'></div></td></tr>
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
                            </td></tr>
          </table></form>";
     break;
 
  case "editmapel":
    $edit = mysql_query("SELECT * FROM tbmapel WHERE kodemapel='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Mata Pelajaran</h2>
          <form method=POST action=$aksi?module=mapel&act=update>
          <input type=hidden name=kodemapel value='$r[kodemapel]'>
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
