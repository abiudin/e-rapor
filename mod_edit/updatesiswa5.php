<?php 
include('../../config/koneksi.php');
						$namasiswa = addslashes($_POST['namasiswa']);
						//$namasiswa = $_POST['namasiswa'];
						$nis = $_POST['nis'];
						$nisn = $_POST['nisn'];
						$tmptlhr = $_POST['tmptlhr'];
						$tgllhr = $_POST['tgllhr'];
						$sex = $_POST['sex'];
						$agama = $_POST['agama'];
						$anakke = $_POST['anakke'];
						$statusdlmklrg = $_POST['statusdlmklrg'];
						$almtswkb = $_POST['almtswkb'];
						$telpsw = $_POST['telpsw'];
						$klsdtrm = $_POST['klsdtrm'];
						$tgldtrm = $_POST['tgldtrm'];
						$smstdtrm = $_POST['smstdtrm'];
						$nmaslsklh = $_POST['nmaslsklh'];
						$almtaslsklh = $_POST['almtaslsklh'];
						$thnijzhsmp = $_POST['thnijzhsmp'];
						$noijzhsmp = $_POST['noijzhsmp'];
						$thnskhusmp = $_POST['thnskhusmp'];
						$noskhusmp = $_POST['noskhusmp'];
						
						$nmayhsw = addslashes($_POST['nmayhsw']);
						$nmibusw = addslashes($_POST['nmibusw']);
						$almtortusw = $_POST['almtortusw'];
						$tlportu = $_POST['tlportu'];
						$pkrjayh = $_POST['pkrjayh'];
						$pkrjibu = $_POST['pkrjibu'];
						$nmwali = addslashes($_POST['nmwali']);
						$almtwali = $_POST['almtwali'];
						$telpwali = $_POST['telpwali'];
						$pkrjwali = $_POST['pkrjwali'];
						
						$id = $_POST['id'];
						$sekarang = date("Y-m-d");
mysql_query("update `mastersiswa` set	`namasiswa`='".$namasiswa."',`nisn`='".$nisn."',`tmptlhr`='".$tmptlhr."',`tgllhr`='".$tgllhr."',`sex`='".$sex."',`agama`='".$agama."',`anakke`='".$anakke."',`statusdlmklrg`='".$statusdlmklrg."',`almtswkb`='".$almtswkb."',`telpsw`='".$telpsw."',`klsdtrm`='".$klsdtrm."',`tgldtrm`='".$tgldtrm."',`smstdtrm`='".$smstdtrm."',`nmaslsklh`='".$nmaslsklh."',`almtaslsklh`='".$almtaslsklh."',`thnijzhsmp`='".$thnijzhsmp."',`noijzhsmp`='".$noijzhsmp."',`thnskhusmp`='".$thnskhusmp."',`noskhusmp`='".$noskhusmp."',`nmayhsw`='".$nmayhsw."',`nmibusw`='".$nmibusw."',`almtortusw`='".$almtortu."',`tlportu`='".$tlportu."',`pkrjayh`='".$pkrjayh."',`pkrjibu`='".$pkrjibu."',`nmwali`='".$nmwali."',`almtwali`='".$almtwali."',`telpwali`='".$telpwali."',`pkrjwali`='".$pkrjwali."' where nis='".$nis."'");

//echo "update `mastersiswa` set	`namasiswa`='".$namasiswa."',`nisn`='".$nisn."',`tmptlhr`='".$tmptlhr."',`tgllhr`='".$tgllhr."',`sex`='".$sex."',`agama`='".$agama."',`anakke`='".$anakke."',`statusdlmklrg`='".$statusdlmklrg."',`almtswkb`='".$almtswkb."',`telpsw`='".$telpsw."',`klsdtrm`='".$klsdtrm."',`tgldtrm`='".$tgldtrm."',`smstdtrm`='".$smstdtrm."',`nmaslsklh`='".$nmaslsklh."',`almtaslsklh`='".$almtaslsklh."',`thnijzhsmp`='".$thnijzhsmp."',`noijzhsmp`='".$noijzhsmp."',`thnskhusmp`='".$thnskhusmp."',`noskhusmp`='".$noskhusmp."',`nmayhsw`='".$nmayhsw."',`nmibusw`='".$nmibusw."',`almtortusw`='".$almtortu."',`tlportu`='".$tlportu."',`pkrjayh`='".$pkrjayh."',`pkrjibu`='".$pkrjibu."',`nmwali`='".$nmwali."',`almtwali`='".$almtwali."',`telpwali`='".$telpwali."',`pkrjwali`='".$pkrjwali."',`pertanggal`='".$sekarang."' where nis='".$nis."'";

?>