<?php 

//untuk menampilkan jurusan
if($mode=='jurusan-view'){
	$kelas=$_GET['kelas'];

	if($kelas=="XI"){
		?>	
		<select title="jurusan" name="jurusan" id="jurusan">
		<option value="-IPA" >IPA</option>
		<option value="-IPS" >IPS</option></select>
		<select title="paralel" name="paralel" id="paralel">
		
		<option value="1" >1</option>
		<option value="2" >2</option>
		<option value="3" >3</option>
		<option value="4" >4</option>
		<option value="5" >5</option></select><?php 
	}
	elseif($kelas=="XII"){
		?>	
		<select title="jurusan" name="jurusan" id="jurusan" onChange="jurusan(jurusan.value)">
		
		<option value="-IPA" >IPA</option>
		<option value="-IPS" >IPS</option></select>
		<select title="paralel" name="paralel" id="paralel">
		
		<option value="1" >1</option>
		<option value="2" >2</option>
		<option value="3" >3</option>
		<option value="4" >4</option>
		<option value="5" >5</option></select><?php 
	}
	
	elseif($kelas=="X"){
		
		?>
		<select title="jurusan" name="jurusan" id="jurusan" onChange="jurusan(jurusan.value)">
		<option value="-" >-</option></select>
		
		<select title="jurusan" name="paralel" id="paralel">
		
		<option value="A" >A</option>
        <option value="B" >B</option>
        <option value="C" >C</option>
		<option value="D" >D</option>
		<option value="E" >E</option>
		<option value="F" >F</option>
        <option value="G" >G</option>
        <option value="H" >H</option>
		<option value="I" >I</option>
		</select><?php 
	}
	else{
		echo "Silahkan pilih nama Jurusan";
	}
}



?>


