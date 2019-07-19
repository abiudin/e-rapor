<h1>Import Data Induk Siswa Dari Excel</h1>
<?php  
include "modul/mod_mastersiswa/excel_reader2.php";
echo "<h2><a href=modul/mod_mastersiswa/FORMDATAINDUKSISWA.xls>Download Contoh Form Excel</a></h2>
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
for ($i=7; $i<=$baris; $i++)
{
  // membaca data nim (kolom ke-2)
 
$nis=$data->val($i,2);
$nisn=$data->val($i,3);
$namasiswa=$data->val($i,4);
$tmptlhr=$data->val($i,5);
$tgllhr=$data->val($i,6);
$sex=$data->val($i,7);
$agama=$data->val($i,8);
$anakke=$data->val($i,9);
$statusdlmklrg=$data->val($i,10);
$almtswkb=$data->val($i,11);
$telpsw=$data->val($i,12);
$klsdtrm=$data->val($i,13);
$tgldtrm=$data->val($i,14);
$smstdtrm=$data->val($i,15);
$nmaslsklh=$data->val($i,16);
$almtaslsklh=$data->val($i,17);
$thnijzhsmp=$data->val($i,18);
$noijzhsmp=$data->val($i,19);
$thnskhusmp=$data->val($i,20);
$noskhusmp=$data->val($i,21);
$nmayhsw=$data->val($i,22);
$nmibusw=$data->val($i,23);
$almtortusw=$data->val($i,24);
$tlportu=$data->val($i,25);
$pkrjayh=$data->val($i,26);
$pkrjibu=$data->val($i,27);
$nmwali=$data->val($i,28);
$almtwali=$data->val($i,29);
$telpwali=$data->val($i,30);


$sekarang = date("Y-m-d");
 
 $duplicate=mysql_query("SELECT * FROM mastersiswa WHERE nis='$nis'");
 $ketemu=mysql_num_rows($duplicate);
 if ($ketemu > 0 ){
  if($nis!=""){
  echo "NIS dengan Nomor: <b>".$nis."</b>"." Gagal diimport karena udah ada<br>";
  }
}
else {
  echo "NIS dengan Nomor: <b>".$nis."</b>"." Sukses diimport<br>";
 
  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO mastersiswa(nis,nisn,namasiswa,tmptlhr,tgllhr,sex,agama,anakke,statusdlmklrg,almtswkb,telpsw,klsdtrm,tgldtrm,smstdtrm,nmaslsklh,almtaslsklh,thnijzhsmp,noijzhsmp,thnskhusmp,noskhusmp,nmayhsw,nmibusw,almtortusw,tlportu,pkrjayh,pkrjibu,nmwali,almtwali,telpwali,pertanggal) VALUES ('$nis','$nisn','$namasiswa','$tmptlhr','$tgllhr','$sex','$agama','$anakke','$statusdlmklrg','$almtswkb','$telpsw','$klsdtrm','$tgldtrm','$smstdtrm','$nmaslsklh','$almtaslsklh','$thnijzhsmp','$noijzhsmp','$thnskhusmp','$noskhusmp','$nmayhsw','$nmibusw','$almtortusw','$tlportu','$pkrjayh','$pkrjibu','$nmwali','$almtwali','$telpwali','$sekarang')";
  
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