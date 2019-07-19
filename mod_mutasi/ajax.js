///////////////////////////////
/*
Programer : Agus Sumarna
Describe  : File Ajax untuk halaman USER
*/
//////////////////////////////

var xmlhttp = false;

try {
	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}

if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
	xmlhttp = new XMLHttpRequest();
}


function cek_combo(){
	//untuk mengecek validasi input data jembatan
	var nama=document.getElementById('nama').value;
	var npm=document.getElementById('npm').value;
	var kelas=document.getElementById('kelas').value;
	
	
	if(nama==''){
		alert('Masukan Nama Anda!');
		return false;
	} 
	
	if(npm==''){
		alert('Masukan NPM Anda!');
		return false;
	} 
	
	if(kelas=='0'){
		alert('Pilih Nama Fakultas!');
		return false;
	} 
	
	if(kelas==''){
		alert('Masukan Kelas Anda!');
		return false;
	} 
	
	return true;
}

//untuk tampilkan jurusan
function kls(kelas){
	//alert(pilihan);
	
	var obj=document.getElementById("jurusan-view","paralel-view");
	var url='modul/mod_mutasi/proses.php?mode=jurusan-view';
	
	url=url+'&kelas='+kelas
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='center'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);

}


