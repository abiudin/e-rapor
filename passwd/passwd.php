<?php 
session_start();
$aksi="modul/extjs/nilaih.php";
?>
<html>
<script language="javascript" src="modul/passwd/ajax.js"></script>		
			<h2>Tambah Nilai</h2>
         
		  <form action = "modul/extjs/nilaih.php" method = "POST">
		  
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
		  	
			<tr><td>semester</td>    <td>            :  
                                                      <select name="semester">
                                                        <option value="kosong" selected>- Semester -</option>
                                                        <option value="ganjil" >Ganjil</option>
                                                        <option value="genap" >Genap</option>                                                       														
                                                      </select></td></tr>										  
        		
       
          <tr><td>Tahun Pelajaran</td><td> : 
          <select name="tapel"
		  <?php 
		  echo "
            <option value='kosong' selected>- Pilih Tahun Pelajaran -</option>";
            $tampil=mysql_query("SELECT * FROM tbtapel");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[tapel]>$r[tapel]</option>";
            }
            echo "</select></td></tr>
		  
		  <div id='txtNama'></div></td></tr>
          <tr><td>Mata Pelajaran</td><td> : 
		  "
		  ?>
		  
          <select name="mapel">
		  <?php 
		  echo "
            <option value='kosong' selected>- Pilih Mata Pelajaran -</option>";
            $tampil=mysql_query("SELECT mastermapel.*  FROM (mastermapel INNER JOIN tbmapel ON mastermapel.id = tbmapel.kdmapel) where tbmapel.kdguru = '$_SESSION[username]' ORDER BY kdmapel");
            while($r=mysql_fetch_array($tampil)){
              $idm=$r[id];
			  $mapel=$r[mapel];
			 // echo "<option value=$r['mastermapel.id']>$r['mastermapel.mapel']</option>";
			  echo "<option value=$idm*$mapel>$mapel</option>";
            }
            echo "</select></td></tr>
          <tr><td colspan=2><input type=submit value=Lanjut>
                            </td></tr>
          </table></form>";
		 
echo "$msg";
    echo "<h2>Ganti Password</h2>
          <form method=POST action=$aksi?module=cpasswd>
          <input type=hidden name=username value='$_SESSION[username]'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
		  <tr><td>Password Lama</td>     <td> : <input type=password name='oldpaswd'>  </td></tr> 
          <tr><td>Password Baru</td>     <td> : <input type=password name='password'>  </td></tr>  
		  <tr><td>Ulangi Password Baru</td>     <td> : <input type=password name='password2'>  </td></tr>     
		  <tr><td colspan=2><div id='jurusan-view'></div></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
		 ?>
		  
 </html>    
 


