<h1>Import Nilai Siswa Dari Excel</h1>
<h2>Gunakan Template Excel yang sudah disediakan lewat menu Export to Excell !!!!</h2>
<?php  
include "modul/mod_mastersiswa/excel_reader2.php";
echo "
    <form action='$PHPSELF' method='POST' enctype= 'multipart/form-data'>
 Silakan Pilih File Excel: <input name='userfile' type='file'>
<input name='upload' type='submit' value='Import'>
</form>";
if (isset($_POST[upload]))
{
// menggunakan class phpExcelReader
//include "modul/mod_mastersiswa/excel_reader2.php";
 
// koneksi ke mysql
//mysql_connect("localhost", "root", "");
//mysql_select_db("dbsmamuha");
include "config/koneksi.php"; 
// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
 
// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
 
// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // membaca data nim (kolom ke-2)
 
$tabel=$data->val($i,2);
$mapel=$data->val($i,3);
$namakelas=$data->val($i,5);
$tapel=$data->val($i,6);
$semester=$data->val($i,7);
$nis=$data->val($i,8);
$kkm=$data->val($i,11);
$nraport=$data->val($i,12);
$nraportprakt=$data->val($i,13);
$nafektif=$data->val($i,14);
$id=$data->val($i,15);

if ($nraport < $kkm){
		$tuntas = "Belum  Mencapai KKM";
		}
	else{
	    $tuntas = "Telah  Mencapai KKM";
	}
	//burhanudin : jika ketuntasan hanya ditentukan nilai praktik saja
//penting kode mapel = kode mapel pelajaran yang nilai ketuntasan diambil dari nilai paraktik saja kode lihat data base

if ($mapel =="13"){
	if ($nraportprakt < $kkm){
		$tuntas = "Belum  Mencapai KKM";
		}
	else{
	    $tuntas = "Telah  Mencapai KKM";
	}
}
$kecapaiankkm=$tuntas;

//$sekarang = date("Y-m-d");
 
$query = 'UPDATE `'.$tabel.'` SET `'.nraport.'`= \''.$nraport.'\',`nraportprakt` =\''.$nraportprakt.'\',`nafektif` = \''.$nafektif.'\',`kecapaiankkm` = \''.$kecapaiankkm.'\' WHERE `'.id.'` = '.$id ;
$result = mysql_query($query);      
  //if ($hasil) $sukses++;
  //else $gagal++;

}
// tampilan status sukses dan gagal
echo $query;
echo "<h3>Proses import data selesai.</h3>";

}  
	
?>