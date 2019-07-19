

<?php 

$aksi="modul/mod_mutasi/aksi_user.php";

  // Tampil User
  
    echo "<h2>Mutasi siswa</h2>
		  <form action='$PHPSELF' method='POST'>";
		  
		  ?>
		  <tr><td>Kelas</td>    <td>            :  
                                                      <select name="kls1">
                                                        <option value="kosong" selected>- Kelas -</option>
                                                        <option value="x" >X</option>
                                                        <option value="xi" >XI</option> 
														<option value="xii" >XII</option> 
														<option value="out" >Keluar</option> 														
                                                      </select></td></tr>
		  <tr><td>semester</td>    <td>            :  
                                                      <select name="semester">
                                                        <option value="kosong" selected>- Semester -</option>
                                                        <option value="1" >Gasal</option>
                                                        <option value="2" >Genap</option>                                                       														
                                                      </select></td></tr>										  
        		
       
          <tr><td>Tahun Pelajaran</td><td> : 
          <select name="tapel"
		  <?php 
		  echo "
            <option value='kosong' selected>- Pilih Tahun Pelajaran -</option>";
            $tampil=mysql_query("SELECT * FROM tbtapel ORDER BY tapel DESC");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[tapel]>$r[tapel]</option>";
            }
            echo "</select></td></tr>
		  
		 
          
		  ";
		  echo "
		  
		  <input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
          
          <table class='art-article' border='0' cellspacing='0' cellpadding='0'>
          <tr><th>no</th><th>NIS</th><th>Nama</th><th>Semester</th><th>Tahun Pelajaran</th><th>Kelas</th></tr>"; 
		   echo "<h2>Data Siswa siswa</h2>";
	if (isset($_POST[cCari]))
	{
	$kls=$_POST[kls1];
	$semester=$_POST[semester];
	$cari=$_POST[txtcari];
	$tapel=$_POST[tapel];
	$cari=$_POST[txtcari];
	//$mkls=tbnilai.$kls.$semester;
	$mkls=tbnilai.$kls;
	$mkkls=tbnilai.$kls.$semester;
    $tampil=mysql_query("SELECT DISTINCT nis,semester,tapel,namakelas FROM $mkkls WHERE nis = $cari AND tapel = '$tapel' ORDER BY mapel");
    $nama=mysql_fetch_array(mysql_query("SELECT namasiswa FROM mastersiswa WHERE nis = $cari"));
    }
    else {
   // $tampil=mysql_query("SELECT * FROM user ORDER BY username");
	}
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	  echo "<tr><td>$no</td>
             <td>$r[nis]</td>
			 <td>$nama[namasiswa]</td>
		     <td>$r[semester]</td>
			 <td>$r[tapel]</td>
			 <td>$r[namakelas]</td>
            
             </td></tr>";
      $no++;
    }
    echo "</table>";
    echo "<h2>Rencana akan mutasi ke:</h2>";
  
  
?>
<html>
		
		
          <script language="javascript" src="modul/combo/ajax.js"></script>	
		  <form action='$PHPSELF' method = "POST">
		  
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		
		<td>Kelas</td>
		<td>
		<select title="kelas" name="kelas" id="kelas" onChange="kls(kelas.value)">
		 <option value="kosong" selected>- Pilih Kelas -</option>
                                                        <option value="X" >X</option>
                                                        <option value="XI" >XI</option>
                                                        <option value="XII" >XII</option>
														<option value="out" >keluar</option>
		</select>		
		</td>
	</tr>
	<tr>
		<td>Jurusan/Paralel</td>
		<td>
			<div id="jurusan-view"></div>		
		</td>
	</tr>		
		   	
		  
          
		  <?php 
		  echo "
           
		   <input type=hidden name=semester1 value='$semester'>
		   <input type=hidden name=nis1 value='$cari'>
		   <input type=hidden name=tapel1 value='$tapel'>
		   <input type=hidden name=mkls1 value='$mkls'>
          <tr><td colspan=2><input name='mutasi'  type=submit value=Mutasi>
                            </td></tr>
          </table></form>";
		  ?>
		  </html>
<?php 		  
if (isset($_POST[mutasi]))
	{
	echo $_POST['kelas']."<br>";
	echo $_POST['jurusan']."<br>";
	echo $_POST['paralel']."<br>";
	echo $_POST['tapel1']."<br>";
	echo "semester".$_POST['semester1']."<br>";
	echo "nis".$_POST[nis1]."<br>";
	echo $_POST[mkls1]."<br>";
	
	if($_POST['jurusan']=="-"){
	$jur=3;
	}
	if($_POST['jurusan']=="-IPA"){
	$jur=1;
	}
	if($_POST['jurusan']=="-IPS"){
	$jur=2;
	}
	$kelas=$_POST['kelas'].$_POST['jurusan'].$_POST['paralel'];
	

// menggunakan class phpExcelReader
//include "modul/mod_siswa/excel_reader2.php";
 
// koneksi ke mysql
//mysql_connect("localhost", "root", "");
//mysql_select_db("dbsmamuha");
include "config/koneksi.php"; 

echo $_POST['kelas'];
	
	
	$tapel = $_POST['tapel1'];
	$semester=$_POST['semester1'];
	$tbkls = $_POST[mkls1];
  // membaca data nim (kolom ke-1)
  $nis = $_POST[nis1];
  // membaca data nama (kolom ke-2)
  $kdwalikls = "";
  // membaca data alamat (kolom ke-3)
  /*$kls1 = $data->val($i, 3);
  $kls2 = $data->val($i, 4);
  $kls3 = $data->val($i, 5);*/
  $mykelas = strtolower($_POST['kelas']);
  $mkls = tbnilai.$mykelas;
  $mklsa = $_POST[mkls1];
  $ga=1;
  $ge=2;
  $mkls1=$mkls.$ga;
  $mkls2=$mkls.$ge;
  $mklsa1=$mklsa.$ga;
  $mklsa2=$mklsa.$ge;
  $kdjur = $jur;
 // $tapel = $data->val($i, 7);
  echo "$mkls1";
  echo "$mklsa2";
  $sekarang = date("Y-m-d");
 
//echo "DELETE FROM $mkls WHERE nis='$nis' AND tapel = '$tapel'";
if($semester=="1"){
mysql_query("DELETE FROM $mklsa1 WHERE nis='$nis' AND tapel = '$tapel'");
mysql_query("DELETE FROM $mklsa2 WHERE nis='$nis' AND tapel = '$tapel'");
}
else{
mysql_query("DELETE FROM $mklsa2 WHERE nis='$nis' AND tapel = '$tapel'");
}
  if($kdjur=="1"){
		$sql= "SELECT * FROM mastermapel WHERE kdjur = '$kdjur' OR kdjur = '3'"; 
		$result = mysql_query($sql);
			while($rec = mysql_fetch_array($result, MYSQL_ASSOC)){
			$id = $rec['id'];
			if($_POST['kelas']=="X"){
			$kkm = $rec['kkm10'];
			}
			if($_POST['kelas']=="XI"){
			$kkm = $rec['kkm11'];
			}
			if($_POST['kelas']=="XII"){
			$kkm = $rec['kkm12'];
			}
			if($semester=="1"){
				$query2 = "INSERT INTO $mkls1 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Gasal','$id','$kkm','$sekarang')";
				$hasil2 = mysql_query($query2);
				$query3 = "INSERT INTO $mkls2 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Genap','$id','$kkm','$sekarang')";
				$hasil3 = mysql_query($query3);
				}
			if($semester=="2"){
				$query3 = "INSERT INTO $mkls2 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Genap','$id','$kkm','$sekarang')";
				$hasil3 = mysql_query($query3);
			}	
			
		}	
	}
	elseif($kdjur=="2"){
		$sql= "SELECT * FROM mastermapel WHERE kdjur = '$kdjur' OR kdjur = '3'"; 
		$result = mysql_query($sql);
			while($rec = mysql_fetch_array($result, MYSQL_ASSOC)){
			$id = $rec['id'];
			
			if($_POST['kelas']=="X"){
			$kkm = $rec['kkm10'];
			}
			if($_POST['kelas']=="XI"){
			$kkm = $rec['kkm11'];
			}
			if($_POST['kelas']=="XII"){
			$kkm = $rec['kkm12'];
			}
			if($semester=="1"){
				$query2 = "INSERT INTO $mkls1 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Gasal','$id','$kkm','$sekarang')";
				$hasil2 = mysql_query($query2);
				$query3 = "INSERT INTO $mkls2 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Genap','$id','$kkm','$sekarang')";
				$hasil3 = mysql_query($query3);
				}
			if($semester=="2"){
				$query3 = "INSERT INTO $mkls2 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Genap','$id','$kkm','$sekarang')";
				$hasil3 = mysql_query($query3);
			}	
				
		}	
	}
	else {
		$sql= "SELECT * FROM mastermapel "; 
		$result = mysql_query($sql);
			while($rec = mysql_fetch_array($result, MYSQL_ASSOC)){
			$id = $rec['id'];
			if($_POST['kelas']=="X"){
			$kkm = $rec['kkm10'];
			}
			if($_POST['kelas']=="XI"){
			$kkm = $rec['kkm11'];
			}
			if($_POST['kelas']=="XII"){
			$kkm = $rec['kkm12'];
			}
			if($semester=="1"){
				if($mykelas=="out"){
					$query2 = "INSERT INTO $mkls1 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Gasal','$id','$kkm','$sekarang')";
					$hasil2 = mysql_query($query2);
					//$query3 = "INSERT INTO $mkls2 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Genap','$id','$kkm','$sekarang')";
					//$hasil3 = mysql_query($query3);
					}
				else{
					$query2 = "INSERT INTO $mkls1 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Gasal','$id','$kkm','$sekarang')";
					$hasil2 = mysql_query($query2);
					$query3 = "INSERT INTO $mkls2 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Genap','$id','$kkm','$sekarang')";
					$hasil3 = mysql_query($query3);
				}
				}
			if($semester=="2"){
				$query3 = "INSERT INTO $mkls2 (nis,namakelas,tapel,semester,mapel,kkm,pertanggal) VALUES ('$nis','$kelas','$tapel','Genap','$id','$kkm','$sekarang')";
				$hasil3 = mysql_query($query3);
			}	
				
			//$kkm=89;
		
			
		}	
	}
	
	
	;
	
  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah

 }

	
?>
