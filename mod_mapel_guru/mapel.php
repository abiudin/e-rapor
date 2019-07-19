<?php 
if (isset($_POST[setkkm]))
{
include "config/koneksi.php";
$kkm=$_POST[kkm];
$mapel=$_POST[mapel];
$kelas=$_POST[kelas];
$tapel=$_POST[tapel];
$semester=$_POST[semester];
$jurusan=$_POST[jurusan];
$paralel=$_POST[paralel];
$spkls=$kelas.$jurusan.$paralel;
echo "Set KKM berhasil<br>";
echo  "kkm: $kkm <br>";
echo  "mapel : $mapel <br>";
echo  "tapel : $tapel<br>";
echo  "semester : $semester <br>";
echo  "kelas : $kelas <br>";
echo  "jurusan : $jurusan <br>";
echo  "paralel : $paralel <br>";
echo  "spkls : $spkls <br>";


	//mendefinisikan perintah SQL untuk menyimpan data
	if($semester=="Gasal"){
	echo "kosong";
		if($paralel=="all"){
			if($kelas=="X"){
			
				$query2 = "UPDATE tbnilaix1 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm10=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
				
			}
			elseif($kelas=="XI"){
			
				$query2 = "UPDATE tbnilaixi1 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm11=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
			}
			
			else{
		
				$query2 = "UPDATE tbnilaixii1 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm12=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
			}
		}
		elseif($paralel!="all"){
		if($kelas=="X"){
		
				$query2 = "UPDATE tbnilaix1 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' and namakelas='$spkls'";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm10=$kkm WHERE  id='$mapel'";
				$hasil3 = mysql_query($query3);
				
			}
			elseif($kelas=="XI"){
				$query2 = "UPDATE tbnilaixi1 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' and namakelas='$spkls' ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm11=$kkm WHERE  id='$mapel'";
				$hasil3 = mysql_query($query3);
			}
			
			else{
				$query2 = "UPDATE tbnilaixii1 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' and namakelas='$spkls' ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm12=$kkm WHERE  id='$mapel'";
				$hasil3 = mysql_query($query3);
			}
		}
	
  
   }
   else{
		if($paralel="all"){
			if($kelas=="X"){
				$query2 = "UPDATE tbnilaix2 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm10=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
				
			}
			elseif($kelas=="XI"){
				$query2 = "UPDATE tbnilaixi2 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm11=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
			}
			
			else{
				$query2 = "UPDATE tbnilaixii2 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm12=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
			}
		}
		else{
			if($kelas=="X"){
				$query2 = "UPDATE tbnilaix2 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' and namakelas='$spkls'  ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm10=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
				
			}
			elseif($kelas=="XI"){
				$query2 = "UPDATE tbnilaixi2 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' and namakelas='$spkls'  ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm11=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
			}
			
			else{
				$query2 = "UPDATE tbnilaixii2 SET kkm=$kkm WHERE tapel='$tapel' and mapel='$mapel' and namakelas='$spkls'  ";
				$hasil2 = mysql_query($query2);
				$query3 = "UPDATE mastermapel SET kkm12=$kkm WHERE  id='$mapel' ";
				$hasil3 = mysql_query($query3);
			}
		}
		
   }
}

?>
<html>
		
			<h2>KKM</h2>
           Ket:<br>
		   Set KKM ini dilakukan hanya pada kasus penggantian KKM setelah distribusi kelas dilakukan (spesial kasus)!!
		  <?php  echo "<form action = '$PHPSELF' method = 'POST'>" ?>
		  
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">     
		  
		  <tr><td>Mata Pelajaran</td><td> : 
          <select name="mapel"
		  <?php 
		   
            $tampil=mysql_query("SELECT * FROM mastermapel");
			 echo "<option value='kosong' selected>- Pilih Mata Pelajaran -</option>";
            
            while($r=mysql_fetch_array($tampil)){
			
              echo "<option value=$r[id]>$r[mapel]</option>";
            }
			?>
		  
          <tr><td>Tahun Pelajaran</td><td> : 
          <select name="tapel"
		  <?php 

            $tampil=mysql_query("SELECT * FROM tbtapel");
			echo "<option value='kosong' selected>- Pilih Tahun Pelajaran -</option>";
            while($r=mysql_fetch_array($tampil)){
			
              echo "<option value=$r[tapel]>$r[tapel]</option>";
            }
            echo "</select></td></tr>";
			
			?>
			<script language="javascript" src="modul/mod_mapel_guru/ajax.js"></script>			
			<h2>Monitoring Nilai</h2>
         
		  <form action = "modul/extjs/monitornilaih.php" method = "POST">
		  
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		<td>Kelas</td>
		<td>
		<select title="kelas" name="kelas" id="kelas" onChange="kls(kelas.value)">
		 <option value="kosong" selected>- Pilih Kelas -</option>
                                                        <option value="X" >X</option>
                                                        <option value="XI" >XI</option>
                                                        <option value="XII" >XII</option>
														
		</select>		
		</td>
	</tr>
	<tr>
		<td>Jurusan/Paralel</td>
		<td>
			<div id="jurusan-view"></div>		
		</td>
	</tr>	
			
		<?php echo "	
			
			<tr><td>semester</td>    <td>            :  
                                                      <select name='semester'>
                                                        <option value='kosong' selected>- Semester -</option>
                                                        <option value='Gasal' >Gasal</option>
                                                        <option value='Genap' >Genap</option>                                                       														
                                                      </select></td></tr>	
			<tr><td>Masukkan KKM</td><td> : <input type='text' name='kkm'></td></tr>										  
		  
		  <div id='txtNama'></div></td></tr>
          <tr><td colspan=2><input name='setkkm' type=submit value='Set KKM'>
                            </td></tr>
							
							
          </table></form>";
		  ?>
 </html>    
 


