<h1>Import Master Mata Pelajaran Dari Excel</h1>
<?php  
include "modul/mapel/excel_reader2.php";
echo "<h2><a href=modul/mapel/mapel.xls>Download Contoh Form Excel</a></h2>
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
 
$id=$data->val($i,1);
$mapel=$data->val($i,2);
$kdjur=$data->val($i,3);
$jenis=$data->val($i,4);
$sekarang = date("Y-m-d");
 
 $duplicate=mysql_query("SELECT * FROM mastermapel WHERE id='$id'");
 $ketemu=mysql_num_rows($duplicate);
 if ($ketemu > 0 ){
  if($id!=""){
  echo "id dengan No: <b>".$id."</b>"." Gagal diimport karena udah ada<br>";
  }
}
else {
  echo "Mapel : <b>".$mapel."</b>"." Sukses diimport<br>";
 
  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO mastermapel(id,mapel,kdjur,jenis) VALUES ('$id','$mapel','$kdjur','$jenis')";
  
  $hasil = mysql_query($query);
  //burhanudin
  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
}
  if ($hasil) $sukses++;
  else $gagal++;

}
// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
}  
	
?>