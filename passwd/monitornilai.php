<?php 
session_start();
$aksi="modul/extjs/monitornilaih.php";
?>
<html>
<script language="javascript" src="modul/combo/ajax.js"></script>			
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
		  
		 
          
		  "
		  ?>
		  
          
		  <?php 
		  echo "
           
          <tr><td colspan=2><input type=submit value=Lanjut>
                            </td></tr>
          </table></form>";
		  ?>
 </html>    
 


