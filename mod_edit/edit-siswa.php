
		<script src="modul/mod_edit/js/jquery.validate.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#frm").validate({
					debug: false,
					rules: {
						namasiswa: "required",
						alamat: "required",
						tempat_lahir: "required",
						tanggal_lahir: "required",
						sekolah_asal: "required",
						bhs_indo: "required",
						bhs_ing: "required",
						matematika: "required",
						ipa: "required",
						ips: "required",
						ppkn: "required",
						nama_orang_tua: "required",
						alamat_orang_tua: "required",
						pendidikan_terakhir: "required",
						pekerjaan: "required",
						penghasilan: "required"
					},
					messages: {
						namasiswa: "* Kosong",
						alamat: "* Kosong",
						tempat_lahir: "* Kosong",
						tanggal_lahir: "* Kosong",
						sekolah_asal: "* Kosong",
						bhs_indo: "* Kosong",
						bhs_ing: "* Kosong",
						matematika: "* Kosong",
						ipa: "* Kosong",
						ips: "* Kosong",
						ppkn: "* Kosong",
						nama_orang_tua: "* Kosong",
						alamat_orang_tua: "* Kosong",
						pendidikan_terakhir: "* Kosong",
						pekerjaan: "* Kosong",
						penghasilan: "* Kosong",
					},
					submitHandler: function(form) {
						// do other stuff for a valid form
						$.post('modul/mod_edit/updatesiswa5.php', $("#frm").serialize(), function(data) {
							$('#hasil').html(data);
							
						
						});
					}
				});
			});
			</script>
		<script type="text/javascript">
			$(function(){
                                $('#tanggal_lahir').datepicker({dateFormat: 'd MM yy'});
			});
		</script>
		<script>
		function hitNilai()
		{
			ind = parseInt(document.frm.bhs_indo.value);
			ing = parseInt(document.frm.bhs_ing.value);
			mat = parseInt(document.frm.matematika.value);
			ipa = parseInt(document.frm.ipa.value);
			ips = parseInt(document.frm.ips.value);
			ppkn = parseInt(document.frm.ppkn.value);
			jml = parseInt((ind+ing+mat+ipa+ips+ppkn)/6);
			document.frm.nun.value = jml;
		}
		function hitNilais()
		{
			ppkn = parseInt(document.frm.ppkn.value);
			aga = parseInt(document.frm.agama.value);
			ips = parseInt(document.frm.ips.value);
			pen = parseInt(document.frm.penjas.value);
			ket = parseInt(document.frm.ketram.value);
			ti = parseInt(document.frm.tik.value);
			jmls = parseInt((aga+pen+ti+ppkn+ips)/5);
			document.frm.nus.value = jmls;
		}
		</script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/sunny/jquery-ui.css" type="text/css" rel="stylesheet"/>

<style>
#rightPan{width:100%; float:left; background-color:#F6F4E4;}
#rightPan fieldset{ margin:15px;}
#rightPan form input{ margin:3px 0 2px 35px; padding:10px; border:1px solid #666666;}
#rightPan form label{ margin:2px 0 0 35px; font:11px Arial, Helvetica, sans-serif; font-weight:bold;}
#rightPan form input.button{ padding:10px; cursor:pointer; background:#FF9900;}
#rightPan h2{ height:36px; color:#8F146E; font-size:16px; padding:0 0 0 75px; margin:0px 0 0 3px;}
</style>
<div id="rightPan">
<h2>Edit Identitas Siswa</h2>
<div class="cleaner_h5"></div>
<fieldset>
<legend>Identitas Siswa</legend>
<form method="post" action="modul/mod_edit/updatesiswa.php" name="frm" id="frm">
<table class="art-article" border="0" cellspacing="0" cellpadding="0">
<?php 
include('../../config/koneksi.php');
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$nis=$_GET['nis'];
//$nis=11451;
$q = mysql_query("select * from mastersiswa WHERE nis = $nis");
while($r=mysql_fetch_array($q))
{
?>
<input type="hidden" name="id" value="<?php  echo $r['id']; ?>" />
<tr><td>Nama Peserta Didik (lengkap)</td><td>: <input type="text"  name="namasiswa" size="65"  value="<?php  echo $r[namasiswa]; ?>"></td></tr>
<tr><td>Nomor Induk</td><td>: <input type="hidden" name="nis" size="65" value="<?php  echo $r['nis']; ?>"></td></tr>
<tr><td>NISN</td><td>: <input type="text" name="nisn" size="65" value="<?php  echo $r['nisn']; ?>"></td></tr>
<tr><td>Tempat Lahir</td><td>: <input type="text" name="tmptlhr" size="65" value="<?php  echo $r['tmptlhr']; ?>"></td></tr>
<tr><td>Tanggal Lahir</td><td>: <input type="text" name="tgllhr" size="65" id="tgllhr" value="<?php  echo $r['tgllhr']; ?>"></td></tr>
<tr><td>Jenis Kelamin</td><td>: <input type="text" name="sex" size="65" value="<?php  echo $r['sex']; ?>"></td></tr>
<tr><td>Agama</td><td>: <input type="text" name="agama" size="65" value="<?php  echo $r['agama']; ?>"></td></tr>
<tr><td>Anak ke</td><td>: <input type="text" name="anakke" size="65" value="<?php  echo $r['anakke']; ?>"></td></tr>
<tr><td>Status dalam Keluarga</td><td>: <input type="text" name="statusdlmklrg" size="65" value="<?php  echo $r['statusdlmklrg']; ?>"></td></tr>
<tr><td>Alamat Peserta Didik</td><td>: <input type="text" name="almtswkb" size="65" value="<?php  echo $r['almtswkb']; ?>"></td></tr>
<tr><td>Telepon</td><td>: <input type="text" name="telpsw" size="65" value="<?php  echo $r['telpsw']; ?>"></td></tr>
<tr><td colspan="2">
<fieldset>
<legend> Diterima di Sekolah ini</legend>
<table class="art-article" border="0" cellspacing="0" cellpadding="0">
<tr><td>a. Di Kelas</td><td>: <input type="text" name="klsdtrm" size="50" value="<?php  echo $r['klsdtrm']; ?>"></td></tr>
<tr><td>b. Pada Tanggal</td><td>: <input type="text" name="tgldtrm" size="50" value="<?php  echo $r['tgldtrm']; ?>"></td></tr>
<tr><td>c. Semester</td><td>: <input type="text" name="smstdtrm" size="50" value="<?php  echo $r['smstdtrm']; ?>"></td></tr>
</table>
</fieldset>
<fieldset>
<legend> Sekolah Asal</legend>
<table class="art-article" border="0" cellspacing="0" cellpadding="0">
<tr><td>a. Nama Sekolah</td><td>: <input type="text" name="nmaslsklh" size="50" value="<?php  echo $r['nmaslsklh']; ?>"></td></tr>
<tr><td>b. Alamat</td><td>: <input type="text" name="almtaslsklh" size="50" value="<?php  echo $r['almtaslsklh']; ?>"></td></tr>
</table>
</fieldset>
<fieldset>
<legend>  Ijazah SMP/MTs</legend>
<table class="art-article" border="0" cellspacing="0" cellpadding="0">
<tr><td>a. Tahun</td><td>: <input type="text" name="thnijzhsmp" size="5" maxlength="4"  value="<?php  echo $r['thnijzhsmp']; ?>"></td></tr>
<tr><td>b. Nomor</td><td>: <input type="text" name="noijzhsmp" size="50"   value="<?php  echo $r['noijzhsmp']; ?>"></td></tr>
</table>
</fieldset>
<fieldset>
<legend> Surat  Keterangan Hasil Ujian Nasional (SKHUN) SMP/MTs, Paket B :</legend>
<table class="art-article" border="0" cellspacing="0" cellpadding="0">
<tr><td>a. Tahun</td><td>: <input type="text" name="thnskhusmp" size="5" maxlength="4" value="<?php  echo $r['thnskhusmp']; ?>"></td></tr>
<tr><td>b. Nomor</td><td>: <input type="text" name="noskhusmp" size="50"   value="<?php  echo $r['noskhusmp']; ?>"></td></tr>
</table>
</fieldset>
<fieldset>
<legend> Orang Tua</legend>
<table class="art-article" border="0" cellspacing="0" cellpadding="0">
<tr><td>a. Ayah</td><td>: <input type="text" name="nmayhsw" size="50"   value="<?php  echo $r['nmayhsw']; ?>"></td></tr>
<tr><td>b. Ibu</td><td>: <input type="text" name="nmibusw" size="50"   value="<?php  echo $r['nmibusw']; ?>"></td></tr>
<tr><td>c. Alamat Orang Tua</td><td>: <input type="text" name="almtortusw" size="50"   value="<?php  echo $r['almtortusw']; ?>"></td></tr>
<tr><td>d. Telepon Orang Tua</td><td>: <input type="text" name="tlportusw" size="50"   value="<?php  echo $r['tlportusw']; ?>"></td></tr>
<tr><td>e. Pekerjaan Ayah</td><td>: <input type="text" name="pkrjayh" size="50"   value="<?php  echo $r['pkrjayh']; ?>"></td></tr>
<tr><td>f. Pekerjaan Ibu</td><td>: <input type="text" name="pkrjibu" size="50"   value="<?php  echo $r['pkrjibu']; ?>"></td></tr>

</table>
</fieldset>
<fieldset>
<legend> Wali</legend>
<table class="art-article" border="0" cellspacing="0" cellpadding="0">
<tr><td>a. Nama Wali</td><td>: <input type="text" name="nmwali" size="50"   value="<?php  echo $r['nmwali']; ?>"></td></tr>
<tr><td>b. Alamat Wali</td><td>: <input type="text" name="almtwali" size="50"   value="<?php  echo $r['almtwali']; ?>"></td></tr>
<tr><td>c. Telepon Wali</td><td>: <input type="text" name="telpwali" size="50"   value="<?php  echo $r['telpwali']; ?>"></td></tr>
<tr><td>d. Pekerjaan Wali</td><td>: <input type="text" name="pkrjwali" size="50"   value="<?php  echo $r['pkrjwali']; ?>"></td></tr>

</table>
</fieldset>
</td></tr>
<tr><td></td><td><input type="submit" value="Save / Simpan" size=50 class="button" onclick="tb_remove()"/></td></tr>
<?php 
}
?>
</table>
</form>
</fieldset>
</div>
	