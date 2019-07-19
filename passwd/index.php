<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script language="javascript" src="modul/combo/ajax.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Ajax Combo</title>

</head>
<body>
	<br />
	<form action="modul/combo/proses.php?mode=report" method="post">
	<table width="352" cellspacing="3" cellpadding="3" border="0" align="center" class="datatable">
	<tr>
		<td width="29%" height="33" valign="middle">Nama</td>
		<td><input type="text" name="nama" size="30" id="nama"></td>
	</tr>
	
	<tr>
		<td width="29%" height="33" valign="middle">NPM</td>
		<td><input type="text" name="npm" size="30" id="npm"></td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td>
		<select title="Fakultas" name="id_fak" id="id_fak" onChange="fakultas(id_fak.value)">
		<option value="0" selected="selected">Pilih Fakultas</option>
		<?php 
		include "conn.php";
		$query=mysql_db_query($db,"select * from t_fakultas",$koneksi);
		
		while($row=mysql_fetch_array($query))
		{
			?><option value="<?php  echo $row['id_fak']; ?>"><?php  echo $row['nama_fak']; ?></option><?php 
		}
		?>
		</select>		
		</td>
	</tr>
	<tr>
		<td>Jurusan</td>
		<td>
			<div id="jurusan-view"></div>		
		</td>
	</tr>				
	<tr>
		<td width="29%" height="33" valign="middle">Kelas</td>
		<td><input type="text" name="kelas" size="30" id="kelas"></td>
	</tr>
	<tr>
		<td width="29%"></td>
	  <td width="71%">
	  <input type="submit" value="Kirim" onClick="return cek_combo();"></td>
	</tr>
	</table>
	</form>
</body>
</html>