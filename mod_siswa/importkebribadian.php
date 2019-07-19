<h1>Import Daftar Distribusi Siswa Dari Excel</h1>
<?php  
include "modul/mod_siswa/excel_reader2.php";
echo "<h2><a href=modul/mod_siswa/form.xls>Download Contoh Form Excel</a></h2>
    <form action='$PHPSELF' method='POST' enctype= 'multipart/form-data'>
 Silakan Pilih File Excel: <input name='userfile' type='file'>
<input name='upload' type='submit' value='Import'>
</form>";
if (isset($_POST[upload]))
{
// menggunakan class phpExcelReader
//include "modul/mod_siswa/excel_reader2.php";
 
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
  // membaca data nim (kolom ke-1)
  $nis = $data->val($i, 1);
  // membaca data nama (kolom ke-2)
  $kdwalikls = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)
  $kls1 = $data->val($i, 3);
  $kls2 = $data->val($i, 4);
  $kls3 = $data->val($i, 5);
  $kelas = $kls1.$kls2.$kls3;
  $kdjur = $data->val($i, 6);
  $tapel = $data->val($i, 7);
  
  $sekarang = date("Y-m-d");
  
$Disiplin="Baik, mentaati tata tertib sekolah";
$Kebesihan="Baik, berpenampilan bersih dan rapi";
$Kesehatan="Baik, tampil sehat dan bugar";
$Tanggungjawab="Baik, mengerjakan tugas tepat waktu";
$Sopan="Baik, menghormati guru dan menghargai teman";
$Percaya="Baik, mampu belajar mandiri secara efektif";
$Kompetitif="Baik, menunjukkan semangat berprestasi dan bersaing";
$Hub="Baik, suka menolong dan gemar diskusi";
$Kejujuran="Baik, berbicara apa adanya dan menepati janji";
$Pelaks="Baik, taat menjalankan perintah agama";

 

echo "NIS dengan Nomor: <b>".$nis."</b>"." Sukses diimport<br>";
  // setelah data dibaca, sisipkan ke dalam tabel mhs
  //$query = "INSERT INTO tbkls(nis,kdwalikls,kelas,tapel,update) VALUES ('$nis', '$kdwalikls', '$kelas','$tapel','$sekarang')";
  $query = "INSERT INTO tbkls VALUES ('$nis', '$kdwalikls', '$kelas','$kdjur','0','0','$tapel','$sekarang')";
  $hasil = mysql_query($query);
  $querykeb = "INSERT INTO tbkepribadian (nis,semester,tapel,disiplin,kebersihan,kesehatan,tanggungjawab,sopansantun,percayadiri,kompetitif,hubsos,kejujuran,pelaksibadah) VALUES ('$nis','Gasal','$tapel', '$Disiplin', '$Kebesihan', '$Kesehatan', '$Tanggungjawab', '$Sopan', '$Percaya', '$Kompetitif', '$Hub', '$Kejujuran', '$Pelaks')";
  $hasilkeb = mysql_query($querykeb);
  $querykeb2 = "INSERT INTO tbkepribadian (nis,semester,tapel,disiplin,kebersihan,kesehatan,tanggungjawab,sopansantun,percayadiri,kompetitif,hubsos,kejujuran,pelaksibadah) VALUES ('$nis','Genap','$tapel', '$Disiplin', '$Kebesihan', '$Kesehatan', '$Tanggungjawab', '$Sopan', '$Percaya', '$Kompetitif', '$Hub', '$Kejujuran', '$Pelaks')";
  $hasilkeb2 = mysql_query($querykeb2);
  
  //burhanudin
  

	
	
	;
	
  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah

  if ($hasil) $sukses++;
  else $gagal++;

}
// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
}  
	
?>