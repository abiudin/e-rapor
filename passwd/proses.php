<?php 
//untuk rincian
$mode=$_GET['mode'];
include "conn.php";

if($mode=='report'){
	$nama=ucwords($_POST['nama']);
	$npm=$_POST['npm'];
	$kelas=$_POST['kelas'];
	$jurusan=$_POST['jurusan'];
	$kelas=strtoupper($_POST['kelas']);
	
	$query_jur=mysql_query("select * from t_jurusan where jurusan='$jurusan'");
	while($row1=mysql_fetch_array($query_jur)){
		$nama_jur=$row1['nama_jur'];
	} 
	
	$query_fak=mysql_query("select * from t_fakultas where kelas='$kelas'");
	while($row2=mysql_fetch_array($query_fak)){
		$nama_fak=$row2['nama_fak'];
	} 
?>
	<html>
	
	<head><title>Rincian</title></head>
	<script language="javascript" src="modul/combo/ajax.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<table width="252" cellspacing="3" cellpadding="3" border="0" align="center" class="datatable">
	<tr>
		<td width="34%" valign="middle">Nama</td>
		<td width="66%"><?php  echo $nama; ?></td>
	</tr>
	
	<tr>
		<td valign="middle">NPM</td>
		<td><?php  echo $npm; ?></td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td><?php  echo $nama_fak;?></td>
	</tr>
	<tr>
		<td>Jurusan</td>
		<td><?php  echo $nama_jur;?></td>
	</tr>				
	<tr>
		<td valign="middle">Kelas</td>
		<td><?php  echo $kelas;?></td>
	</tr>
	<tr>
		<td><a href="index.php" style="text-decoration:none" title="Kembali ke Form">&laquo;Back</a></td>
	</tr>
	</table>
	</html>
<?php 
}

//untuk menampilkan jurusan
if($mode=='jurusan-view'){
	$kelas=$_GET['kelas'];
	$jurusan=mysql_query("select * from t_jurusan where kelas='$kelas'",$koneksi);
	$cek=mysql_num_rows($jurusan);
	
	if($kelas=="XI"){
		?>	
		<select title="jurusan" name="jurusan" id="jurusan">
		<option value="ipa" >IPA</option>
		<option value="ips" >IPS</option></select>
		<select title="paralel" name="paralel" id="paralel">
		<option value="1" >1</option>
		<option value="2" >2</option>
		<option value="3" >3</option>
		<option value="4" >4</option>
		<option value="5" >5</option></select><?php 
	}
	elseif($kelas=="XII"){
		?>	
		<select title="jurusan" name="jurusan" id="jurusan" onChange="jurusan(jurusan.value)">
		<option value="ipa" >IPA</option>
		<option value="ips" >IPS</option></select>
		<select title="paralel" name="paralel" id="paralel">
		<option value="1" >1</option>
		<option value="2" >2</option>
		<option value="3" >3</option>
		<option value="4" >4</option>
		<option value="5" >5</option></select><?php 
	}
	
	elseif($kelas=="X"){
		
		?>
		<select title="jurusan" name="jurusan" id="jurusan" onChange="jurusan(jurusan.value)">
		<option value="-" >-</option></select>
		
		<select title="jurusan" name="paralel" id="paralel">
		<option value="A" >A</option>
        <option value="B" >B</option>
        <option value="C" >C</option>
		<option value="D" >D</option>
		<option value="E" >E</option>
		<option value="F" >F</option>
        <option value="G" >G</option>
        <option value="H" >H</option>
		<option value="I" >I</option>
		</select><?php 
	}
	else{
		echo "Silahkan pilih nama Jurusan";
	}
}



?>


