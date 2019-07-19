<?php 
session_start();
include "../../config/koneksi.php";
?>
<?php 
session_start();
$aksi="modul/mod_user/aksi_user.php";
$semester=$_SESSION[semester];
$kelas=strtolower($_SESSION[kelas]);
$tkelas=strtolower($_SESSION[tkelas]);
$tapel=$_SESSION[tapel];
$bkelas=strtoupper($kelas);
$tampil5=mysql_query("SELECT * FROM wali WHERE  kelas='$bkelas' AND tapel='$tapel' AND semester='$semester' ");
$r5=mysql_fetch_array($tampil5);
//echo $semester."<br>";
//echo $tkelas."<br>";
if($semester==Gasal){
$smt=1;
$mtb=tbnilai.$tkelas.$smt;
//echo $mtb;
}
if($semester==Genap){
$smt=2;
$mtb=tbnilai.$tkelas.$smt;
//echo $mtb;
}
switch($_GET[act]){
  // Tampil User
  default:
   /* echo "<h2>Daftar Siswa Klas : $_SESSION[kelas]</h2>
		  
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
          <tr><th>no</th><th>NIS</th><th>NAMA SISWA</th><th>Preview Identitas</th><th>Preview Nilai</th><th>Preview Ketuntasan</th></tr>"; */
	if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT * FROM tbkls.*, mastersiswa.namasiswa FROM (tbkls INNER JOIN mastersiswa ON tbkls.nis mastersiswa.nis ORDER BY mastersiswa.namasiswa ASC
    WHERE
    username LIKE '%$cari%' OR 
    level LIKE '%$cari%'
	ORDER BY username");
    }
    else {
    //$tampil=mysql_query("SELECT * FROM tbkls WHERE kelas = '10-E'");
	if($semester=="Gasal"){
		//$tampil=mysql_query("SELECT DISTINCT $mtb.nis, mastersiswa.namasiswa FROM ($mtb INNER JOIN mastersiswa ON $mtb.nis = mastersiswa.nis) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' AND validasi1 = '1' ORDER BY mastersiswa.namasiswa ASC");
		$tampilall=mysql_query("SELECT  DISTINCT $mtb.nis, mastersiswa.namasiswa  FROM ($mtb INNER JOIN mastersiswa ON $mtb.nis = mastersiswa.nis) WHERE namakelas = '$kelas' AND tapel = '$tapel' AND validasi1 = '1' ORDER BY mastersiswa.namasiswa ASC");
		
		//$tampil=mysql_query("SELECT DISTINCT $mtb.nis, mastersiswa.namasiswa FROM (tbkls INNER JOIN masterguru ON tbkls.kdwalikls = masterguru.kdguru) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' ");
	}
	else{
		$tampilall=mysql_query("SELECT  DISTINCT $mtb.nis, mastersiswa.namasiswa  FROM ($mtb INNER JOIN mastersiswa ON $mtb.nis = mastersiswa.nis) WHERE namakelas = '$kelas' AND tapel = '$tapel' AND validasi2 = '1' ORDER BY mastersiswa.namasiswa ASC");
		//$tampil=mysql_query("SELECT tbkls.*, masterguru.* FROM (tbkls INNER JOIN masterguru ON tbkls.kdwalikls = masterguru.kdguru) WHERE kelas = '$_SESSION[kelas]' AND tapel = '$_SESSION[tapel]' ");
	}
	}
	
    $no=1;
    while ($r=mysql_fetch_array($tampilall)){
      /* echo "<tr><td>$no</td>
             <td>$r[nis]</td>
			 <td>$r[namasiswa]</td>
             <td><a href=modul/rapor/rapot2.php?nis=$r[nis]&semester=$semester&kelas=$kelas&tapel=$tapel&wali=$r[kdwalikls]>Preview</a></td>
			 <td>
			 <a href=modul/mod_nilai/cetak.php?nis=$r[nis]&semester=$semester&kelas=$kelas&tapel=$tapel&wali=$r[kdwalikls]>Preview</a>
			</td>
	 		 
			
			 <td><a href=modul/rapor/tuntas.php?nis=$r[nis]&semester=$semester&kelas=$kelas&tapel=$tapel&wali=$r[kdwalikls]>Preview</a></td></tr>";
      $no++;*/
   

?>
<html <head>
<!--[if gte mso 9]><xml>
 <o:DocumentProperties>
  <o:Author>John Doe</o:Author>
  <o:LastAuthor>John Doe</o:LastAuthor>
  <o:Revision>1</o:Revision>
  <o:TotalTime>1</o:TotalTime>
  <o:Created>2011-08-18T04:48:00Z</o:Created>
  <o:LastSaved>2011-08-18T04:49:00Z</o:LastSaved>
  <o:Pages>1</o:Pages>
  <o:Words>209</o:Words>
  <o:Characters>1193</o:Characters>
  <o:Company>Deftones</o:Company>
  <o:Lines>9</o:Lines>
  <o:Paragraphs>2</o:Paragraphs>
  <o:CharactersWithSpaces>1400</o:CharactersWithSpaces>
  <o:Version>12.00</o:Version>
 </o:DocumentProperties>
</xml><![endif]-->
<link rel=themeData href="Nama%20Peserta%20Didik_files/themedata.thmx">
<link rel=colorSchemeMapping
href="Nama%20Peserta%20Didik_files/colorschememapping.xml">
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:SpellingState>Clean</w:SpellingState>
  <w:GrammarState>Clean</w:GrammarState>
  <w:TrackMoves>false</w:TrackMoves>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:DrawingGridHorizontalSpacing>6 pt</w:DrawingGridHorizontalSpacing>
  <w:DisplayHorizontalDrawingGridEvery>2</w:DisplayHorizontalDrawingGridEvery>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:DontVertAlignCellWithSp/>
   <w:DontBreakConstrainedForcedTables/>
   <w:DontVertAlignInTxbx/>
   <w:Word11KerningPairs/>
   <w:CachedColBalance/>
  </w:Compatibility>
  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="--"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
  LatentStyleCount="267">
  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
   UnhideWhenUsed="false" Name="Table Grid"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
 </w:LatentStyles>
</xml><![endif]-->
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-1610611985 1107304683 0 0 159 0;}
@font-face
	{font-family:"Arial Narrow";
	panose-1:2 11 6 6 2 2 2 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:647 2048 0 0 159 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0in;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;}
.MsoPapDefault
	{mso-style-type:export-only;
	margin-bottom:10.0pt;
	line-height:115%;}
@page Section1
	{size:8.5in 14.0in;
	margin:1.0in 1.0in 1.0in 1.0in;
	mso-header-margin:.5in;
	mso-footer-margin:.5in;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
-->
</style>
<!--[if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-qformat:yes;
	mso-style-parent:"";
	mso-padding-alt:0in 5.4pt 0in 5.4pt;
	mso-para-margin-top:0in;
	mso-para-margin-right:0in;
	mso-para-margin-bottom:10.0pt;
	mso-para-margin-left:0in;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;}
</style>
<![endif]--><!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="2050"/>
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
<?php 
/*
$server = "localhost";
$username = "root";
$password = "";
$database = "dbsmamuha";*/
include "../../config/koneksi.php";
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$nis=$r[nis];
$wali=$_GET['wali'];
$semester=$_GET['semester'];
$kelas=$_GET['kelas'];
$tkelas=$_GET['tkelas'];
$tapel=$_GET['tapel'];
$tampil=mysql_query("SELECT  * FROM mastersiswa WHERE nis = $nis");
$tampil2=mysql_query("SELECT  * FROM masterguru WHERE kdguru = '$wali'");
$r=mysql_fetch_array($tampil);
$r2=mysql_fetch_array($tampil2);
$tampil3=mysql_query("SELECT * FROM tglrpt WHERE tapel='$tapel' AND semester='$semester'");
$r3=mysql_fetch_array($tampil3);
$tampil4=mysql_query("SELECT * FROM konversi3 WHERE kelas='$tkelas' AND semester='$semester'");
$r4=mysql_fetch_array($tampil4);
//echo $r[mapel];
$semangka=$r4[angka];
//$semangka=1;
$nwali=$r2[namaguru];
$nip=".$r2[nip]";
//$nwali="paidi";
$nama= $r[namasiswa];
$ortu= $r[nmayhsw];
?>


</head><body lang=EN-US style='tab-interval:.5in'>

<div class=Section1>


<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse'>

 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:15.45pt'>
  <td width=174 valign=top style='width:130.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=SV style='font-family:"Arial Narrow","sans-serif";
  color:black;mso-ansi-language:SV'>Nama Peserta Didik</span></p>
  </td>
  <td width=8 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>:</p>
  </td>
  <td width=294 valign=top style='width:220.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><?php echo $nama?></p>
  </td>
  <td width=180 valign=top style='width:105pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-family:"Arial Narrow","sans-serif";
  color:black'>Kelas / Semester</span></span></p>
  </td>
  <td width=10 valign=top style='width:5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>:</p>
  </td>
  <td width=120 valign=top style='width:100pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><?php echo strtoupper($kelas).' / '.$semangka?></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:15.45pt'>
  <td width=174 valign=top style='width:130.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=SV style='font-family:"Arial Narrow","sans-serif";
  color:black;mso-ansi-language:SV'>Nomor Induk</span></p>
  </td>
  <td width=8 valign=top style='width:5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>:</p>
  </td>
  <td width=294 valign=top style='width:220.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><?php  echo $nis ?></p>
  </td>
  <td width=180 valign=top style='width:105pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span class=SpellE><span style='font-family:"Arial Narrow","sans-serif";
  color:black'>Tahun</span></span><span style='font-family:"Arial Narrow","sans-serif";
  color:black'> <span class=SpellE>Pelajaran</span></span></p>
  </td>
  <td width=8 valign=top style='width:5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>:</p>
  </td>
  <td width=120 valign=top style='width:100pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><?php echo $tapel?></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes;height:15.45pt'>
  <td width=174 valign=top style='width:130.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span lang=SV style='font-family:"Arial Narrow","sans-serif";
  color:black;mso-ansi-language:SV'>Nama Sekolah</span></p>
  </td>
  <td width=24 valign=top style='width:.25in;padding:0in 5.4pt 0in 5.4pt;
  height:8pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>:</p>
  </td>
  <td width=294 valign=top style='width:220.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:15.45pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>SMA Muhammadiyah 1 Sragen</p>
  </td>
  


<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse'>
 

 
 <tr>
  <td width=180 colspan=2 valign=bottom style='width:105pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  color:black'></span></p>
  </td>
  <td width=19 valign=top style='width:14.15pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal></p>
  </td>
  <td width=215 colspan=2 valign=top style='width:161.35pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal><span lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  color:black'></span></p>
  </td>
  
  <td width=125 valign=top style='width:93.75pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 2.75in 3.75in 315.0pt 5.5in 405.0pt'><span
  lang=SV style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=18 valign=top style='width:13.35pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 2.75in 3.75in 315.0pt 5.5in 405.0pt'><span
  lang=SV style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=146 valign=top style='width:109.8pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 2.75in 3.75in 315.0pt 5.5in 405.0pt'><span
  lang=SV style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 
 
</table>
<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='margin-left:9.0pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:480;mso-padding-alt:0in 5.4pt 0in 5.4pt;
 mso-border-insideh:.5pt solid windowtext;mso-border-insidev:.5pt solid windowtext'>
 
 
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=34 rowspan=3 style='width:25.5pt;border:solid windowtext 1.0pt;
  border-bottom:double windowtext 1.5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-bottom-alt:double windowtext 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>No<o:p></o:p></span></p>
  </td>
  <td width=181 rowspan=3 style='width:135.4pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-bottom-alt:double windowtext 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Komponen<o:p></o:p></span></p>
  </td>
  <td width=59 rowspan=3 style='width:44.1pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-bottom-alt:double windowtext 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-4.7pt;text-align:center;
  tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span lang=SV
  style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:
  "Arial Narrow";mso-ansi-language:SV'>Kriteria Ketuntasan Minimal<span
  style='mso-spacerun:yes'>  </span>(KKM)<o:p></o:p></span></p>
  </td>
  <td width=421 colspan=5 style='width:315.65pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Nilai Hasil Belajar<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:16.25pt'>
  <td width=190 colspan=2 style='width:142.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:16.25pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Pengetahuan<o:p></o:p></span></p>
  </td>
  <td width=186 colspan=2 style='width:139.2pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:16.25pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Praktik<o:p></o:p></span></p>
  </td>
  <td width=46 style='width:34.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:16.25pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Sikap<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width=41 style='width:30.8pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-6.1pt;text-align:center;
  tab-stops:1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:10.0pt;
  font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:"Arial Narrow";
  mso-ansi-language:SV'>Angka<o:p></o:p></span></p>
  </td>
  <td width=148 style='width:111.35pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Huruf<o:p></o:p></span></p>
  </td>
  <td width=39 style='width:29.3pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-6.1pt;text-align:center;
  tab-stops:1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:10.0pt;
  font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:"Arial Narrow";
  mso-ansi-language:SV'>Angka<o:p></o:p></span></p>
  </td>
  <td width=147 style='width:109.9pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Huruf<o:p></o:p></span></p>
  </td>
  <td width=46 style='width:34.3pt;border-top:none;border-left:none;border-bottom:
  double windowtext 1.5pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-right:-5.4pt;text-align:center;
  tab-stops:1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:10.0pt;
  font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:"Arial Narrow";
  mso-ansi-language:SV'>Predikat<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;height:13.75pt'>
  <td width=34 style='width:25.5pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:double windowtext 1.5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-top-alt:double windowtext 1.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><b><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>A<o:p></o:p></span></b></p>
  </td>
  
  <td width=181 style='width:135.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:double windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-top-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><b><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Mata Pelajaran</span></b></p>
  </td>
  
  <td width=59 style='width:44.1pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  double windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-top-alt:double windowtext 1.5pt;padding:
  0in 5.4pt 0in 5.4pt;height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  
  <td width=41 style='width:30.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  double windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-top-alt:double windowtext 1.5pt;padding:
  0in 5.4pt 0in 5.4pt;height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  
  <td width=148 style='width:111.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:double windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-top-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=39 style='width:29.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  double windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-top-alt:double windowtext 1.5pt;padding:
  0in 5.4pt 0in 5.4pt;height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=147 style='width:109.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:double windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-top-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt;height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=46 style='width:34.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  double windowtext 1.5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-top-alt:double windowtext 1.5pt;padding:
  0in 5.4pt 0in 5.4pt;height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 
 
<?php 
// Koneksi dan memilih database di server
$nl1=$mtb;
$nl2=$mtb;
if($_SESSION[semester]=="Gasal"){
$tampil=mysql_query("SELECT $nl1.*, mastermapel.*, konversi.*, konversi2.* FROM (($nl1  INNER JOIN  mastermapel ON $nl1.mapel = mastermapel.id) INNER JOIN konversi ON $nl1.nraport = konversi.angka)INNER JOIN konversi2 ON $nl1.nraportprakt = konversi2.angka WHERE nis = $nis  AND semester  = '$semester' AND mastermapel.jenis  = '1' AND $nl1.tapel like '$tapel' AND $nl1.namakelas = '$kelas' ORDER BY mastermapel.id ASC");
}
else{
$tampil=mysql_query("SELECT $nl2.*, mastermapel.*, konversi.*, konversi2.* FROM (($nl2  INNER JOIN  mastermapel ON $nl2.mapel = mastermapel.id) INNER JOIN konversi ON $nl2.nraport = konversi.angka)INNER JOIN konversi2 ON $nl2.nraportprakt = konversi2.angka WHERE nis = $nis  AND semester  = '$semester' AND mastermapel.jenis  = '1' AND $nl2.tapel like '$tapel' AND $nl2.namakelas = '$kelas' ORDER BY mastermapel.id ASC");
}
echo "";
$no=1;
    while ($r=mysql_fetch_array($tampil)){
echo "
 <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes;height:14.2pt'>
  <td width=34 style='width:25.5pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow''>$no<o:p></o:p></span></p>
  </td>
  
  
  <td width=181 style='width:135.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  class=SpellE><span style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow''>$r[mapel]</span></span></p>
  </td>
  
  <td width=59 style='width:44.1pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><i><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><span
  style='mso-no-proof:yes'>$r[kkm]</span></span></i><i><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></i></p>
  </td>
  
  <td width=41 style='width:30.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><span
  style='mso-no-proof:yes'>";
  if ($r[nraport]==0){
	echo "-</span></span><span lang=SV";
	}
  else{
	echo "$r[nraport]</span></span><span lang=SV";
  }
  echo"
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
  
  <td width=148 style='width:111.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:
  10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:'Arial Narrow';
  mso-ansi-language:SV'><span style='mso-no-proof:yes'>$r[huruf]</span><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
  
  <td width=39 style='width:29.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><o:p>&nbsp;</o:p>
 

";
  if ($r[nraportprakt]==0){
	echo "-</span></p>";
	}
  else{
	echo "$r[nraportprakt]</span></p>";
  }
  echo"


 </td>
  
  <td width=147 style='width:109.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
 mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><o:p>&nbsp;</o:p>$r[huruf2]</span></p>
  </td>
  
  <td width=46 style='width:34.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:
  10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:'Arial Narrow';
  mso-ansi-language:SV'><span style='mso-no-proof:yes'>$r[nafektif]</span></span><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
 </tr>
 
 ";
 $no++;
 }
 ;
 ?>
 <tr style='mso-yfti-irow:20'>
  <td width=34 style='width:25.5pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:double windowtext 1.5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-top-alt:double windowtext 1.5pt;padding:0in 5.4pt 0in 5.4pt;
  height:13.75pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><b><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>B.<o:p></o:p></span></b></p>
  </td>
  <td width=181 style='width:135.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-right:-5.4pt;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  class=SpellE><b><span style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow"'>Muatan</span></b></span><b><span
  style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:
  "Arial Narrow"'> <span class=SpellE>Lokal</span> **)<o:p></o:p></span></b></p>
  </td>
  <td width=59 valign=top style='width:44.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=41 valign=top style='width:30.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=148 valign=top style='width:111.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=39 valign=top style='width:29.3pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=147 valign=top style='width:109.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=46 valign=top style='width:34.3pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 
 <?php 
// Koneksi dan memilih database di server
if($_SESSION[semester]=="Gasal"){
$tampil=mysql_query("SELECT $nl1.*, mastermapel.*, konversi.*, konversi2.* FROM (($nl1  INNER JOIN  mastermapel ON $nl1.mapel = mastermapel.id) INNER JOIN konversi ON $nl1.nraport = konversi.angka) INNER JOIN konversi2 ON $nl1.nraportprakt = konversi2.angka WHERE nis=$nis  AND semester = '$semester' AND mastermapel.jenis = '2' AND $nl1.tapel like '$tapel' AND $nl1.namakelas = '$kelas' ORDER BY mastermapel.id ASC");
}
else{
$tampil=mysql_query("SELECT $nl2.*, mastermapel.*, konversi.*, konversi2.* FROM (($nl2  INNER JOIN  mastermapel ON $nl2.mapel = mastermapel.id) INNER JOIN konversi ON $nl2.nraport = konversi.angka) INNER JOIN konversi2 ON $nl2.nraportprakt = konversi2.angka WHERE nis=$nis  AND semester = '$semester' AND mastermapel.jenis = '2' AND $nl2.tapel like '$tapel' AND $nl2.namakelas = '$kelas' ORDER BY mastermapel.id ASC");
}
echo "";
$no=1;
    while ($r=mysql_fetch_array($tampil)){
echo "
 <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes;height:14.2pt'>
  <td width=34 style='width:25.5pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow''>$no<o:p></o:p></span></p>
  </td>
  
  
  <td width=181 style='width:135.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  class=SpellE><span style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow''>$r[mapel]</span></span></p>
  </td>
  
  <td width=59 style='width:44.1pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><i><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><span
  style='mso-no-proof:yes'>$r[kkm]</span></span></i><i><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></i></p>
  </td>
  
  <td width=41 style='width:30.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><span
  style='mso-no-proof:yes'>
  ";
  if ($r[nraport]==0){
	echo "-</span></span><span lang=SV";
	}
  else{
	echo "$r[nraport]</span></span><span lang=SV";
  }
  echo"
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
  
  <td width=148 style='width:111.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:
  10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:'Arial Narrow';
  mso-ansi-language:SV'><span style='mso-no-proof:yes'>$r[huruf]</span><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
  
  <td width=39 style='width:29.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'>
  
";
  if ($r[nraportprakt]==0){
	echo "-</span></p>";
	}
  else{
	echo "$r[nraportprakt]</span></p>";
  }
  echo"
  </td>
  
  <td width=147 style='width:109.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><o:p>&nbsp;</o:p>$r[huruf2]</span></p>
  </td>
  
  <td width=46 style='width:34.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:
  10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:'Arial Narrow';
  mso-ansi-language:SV'><span style='mso-no-proof:yes'>$r[nafektif]</span></span><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
 </tr>
 
 ";
 $no++;
 }
 ;
 ?>
 <tr style='mso-yfti-irow:24;height:14.2pt'>
  <td width=34 style='width:25.5pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><b><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>C.<o:p></o:p></span></b></p>
  </td>
  <td width=181 style='width:135.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='margin-right:-5.4pt;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  class=SpellE><b><span style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow"'>Ciri</span></b></span><b><span
  style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:
  "Arial Narrow"'> <span class=SpellE>Khusus</span><o:p></o:p></span></b></p>
  </td>
  <td width=59 valign=top style='width:44.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=41 valign=top style='width:30.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=148 valign=top style='width:111.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=39 valign=top style='width:29.3pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=147 valign=top style='width:109.9pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=46 valign=top style='width:34.3pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <?php 
// Koneksi dan memilih database di server
if($_SESSION[semester]=="Gasal"){
$tampil=mysql_query("SELECT $nl1.*, mastermapel.*, konversi.*, konversi2.* FROM (($nl1  INNER JOIN  mastermapel ON $nl1.mapel = mastermapel.id) INNER JOIN konversi ON $nl1.nraport = konversi.angka) INNER JOIN konversi2 ON $nl1.nraportprakt = konversi2.angka WHERE nis=$nis  AND semester = '$semester' AND mastermapel.jenis = '3' AND $nl1.tapel like '$tapel' AND $nl1.namakelas = '$kelas' ORDER BY mastermapel.id ASC");
}
else{
$tampil=mysql_query("SELECT $nl2.*, mastermapel.*, konversi.*, konversi2.* FROM (($nl2  INNER JOIN  mastermapel ON $nl2.mapel = mastermapel.id) INNER JOIN konversi ON $nl2.nraport = konversi.angka) INNER JOIN konversi2 ON $nl2.nraportprakt = konversi2.angka WHERE nis=$nis  AND semester = '$semester' AND mastermapel.jenis = '3' AND $nl2.tapel like '$tapel' AND $nl2.namakelas = '$kelas' ORDER BY mastermapel.id ASC");
}echo "";
$no=1;
    while ($r=mysql_fetch_array($tampil)){
echo "
 <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes;height:14.2pt'>
  <td width=34 style='width:25.5pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow''>$no<o:p></o:p></span></p>
  </td>
  
  
  <td width=181 style='width:135.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  class=SpellE><span style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow''>$r[mapel]</span></span></p>
  </td>
  
  <td width=59 style='width:44.1pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><i><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><span
  style='mso-no-proof:yes'>$r[kkm]</span></span></i><i><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></i></p>
  </td>
  
  <td width=41 style='width:30.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><span
  style='mso-no-proof:yes'>
  ";
  if ($r[nraport]==0){
	echo "-</span></span><span lang=SV";
	}
  else{
	echo "$r[nraport]</span></span><span lang=SV";
  }
  echo"
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
  
  <td width=148 style='width:111.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:
  10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:'Arial Narrow';
  mso-ansi-language:SV'><span style='mso-no-proof:yes'>$r[huruf]</span><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
  
  <td width=39 style='width:29.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><o:p>&nbsp;</o:p>
  
";
  if ($r[nraportprakt]==0){
	echo "-</span></p>";
	}
  else{
	echo "$r[nraportprakt]</span></p>";
  }
  echo"
  </td>
  
  <td width=147 style='width:109.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';
  mso-bidi-font-family:'Arial Narrow';mso-ansi-language:SV'><o:p>&nbsp;</o:p>$r[huruf2]</span></p>
  </td>
  
  <td width=46 style='width:34.3pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:14.2pt'>
  <p class=MsoNormal align=center style='text-align:center;tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span lang=SV style='font-size:
  10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:'Arial Narrow';
  mso-ansi-language:SV'><span style='mso-no-proof:yes'>$r[nafektif]</span></span><span lang=SV
  style='font-size:10.0pt;font-family:'Arial Narrow','sans-serif';mso-bidi-font-family:
  'Arial Narrow';mso-ansi-language:SV'><o:p></o:p></span></p>
  </td>
 </tr>
 
 ";
 $no++;
 }
 ;
 ?>
 <tr style='mso-yfti-irow:31;mso-yfti-lastrow:yes'>
  <td width=34 style='width:25.5pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-bottom-alt:double windowtext 1.5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:
  "Arial Narrow"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=181 style='width:135.4pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-right:-5.4pt;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
  style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:
  "Arial Narrow"'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=59 valign=top style='width:44.1pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=41 valign=top style='width:30.8pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=148 valign=top style='width:111.35pt;border-top:none;border-left:
  none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=39 valign=top style='width:29.3pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=147 valign=top style='width:109.9pt;border-top:none;border-left:
  none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=46 valign=top style='width:34.3pt;border-top:none;border-left:none;
  border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-bottom-alt:double windowtext 1.5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 103.5pt 2.75in 3.75in'><span
  lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-left:27.0pt;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
lang=SV style='font-size:10.0pt;font-family:"Arial Narrow","sans-serif";
mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='margin-left:27.0pt;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><span
style='mso-spacerun:yes'> </span></span><span lang=FI style='font-size:11.0pt;
font-family:"Arial Narrow","sans-serif";mso-bidi-font-family:"Arial Narrow";
mso-ansi-language:FI'>*)<span style='mso-spacerun:yes'>    </span>Diisi dengan
Keterampilan/Bahasa Asing yang diikuti peserta didik<o:p></o:p></span></p>

<p class=MsoNormal style='margin-left:27.0pt;tab-stops:27.0pt 1.25in 207.0pt 4.0in'><span
lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>**)<span
style='mso-spacerun:yes'>  </span><span style='mso-spacerun:yes'> </span>Diisi<span
style='mso-spacerun:yes'>  </span>dengan jenis program muatan lokal yang
diikuti peserta didik<o:p></o:p></span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='margin-left:9.0pt;border-collapse:collapse;mso-yfti-tbllook:1184;
 mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=237 valign=top style='width:178.05pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=236 valign=top style='width:177.3pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=FI style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=231 valign=top style='width:173.4pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:15.3pt 1.25in 2.75in 5.25in'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Sragen, <?php echo "$r3[tglrpt]"?></span><span
  lang=FI style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=237 valign=top style='width:178.05pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'>Orang Tua / Wali<o:p></o:p></span></p>
  <p class=MsoNormal style='tab-stops:0in 1.25in 2.75in 3.75in 5.25in'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Peserta Didik<o:p></o:p></span></p>
  </td>
  <td width=236 valign=top style='width:177.3pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=FI style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'>Wali Kelas,</span><span
  lang=IN style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:IN'><o:p></o:p></span></p>
  </td>
  <td width=231 valign=top style='width:173.4pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:15.3pt 1.25in 2.75in 5.25in'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'>Kepala Sekolah<o:p></o:p></span></p>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=IN style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:IN'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width=237 valign=top style='width:178.05pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=236 valign=top style='width:177.3pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=FI style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=231 valign=top style='width:173.4pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-left:15.3pt;tab-stops:15.3pt 1.25in 2.75in 5.25in'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3'>
  <td width=237 valign=top style='width:178.05pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=236 valign=top style='width:177.3pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=FI style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=231 valign=top style='width:173.4pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-left:15.3pt;tab-stops:15.3pt 1.25in 2.75in 5.25in'><span
  lang=FI style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:FI'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes;height:23.35pt'>
  <td width=237 valign=top style='width:178.05pt;padding:0in 5.4pt 0in 5.4pt;
  height:23.35pt'>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><u><span
  lang=SV style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><?php echo ______________?><o:p></o:p></span></u></p>
  </td>
  <td width=236 valign=top style='width:177.3pt;padding:0in 5.4pt 0in 5.4pt;
  height:23.35pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><u><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><?php echo $r5[wali]?><o:p></o:p></span></u></p>
  <p class=MsoNormal style='tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'><?php echo NIP.$r5[nip]?></span><span
  lang=IN style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:IN'><o:p></o:p></span></p>
  </td>
  <td width=231 valign=top style='width:173.4pt;padding:0in 5.4pt 0in 5.4pt;
  height:23.35pt'>
  <p class=MsoNormal style='tab-stops:27.0pt 1.25in 2.75in 5.25in'><u><span
  lang=SV style='font-size:11.0pt;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow";mso-ansi-language:SV'>Mustofa, S.Pd<o:p></o:p></span></u></p>
  <p class=MsoNormal style='line-height:150%;tab-stops:27.0pt 103.5pt 117.0pt 315.0pt 5.5in 405.0pt'><span
  lang=SV style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow"'><span style='mso-spacerun:yes'> </span></span><span
  style='font-size:11.0pt;line-height:150%;font-family:"Arial Narrow","sans-serif";
  mso-bidi-font-family:"Arial Narrow"'>NBM.645892<o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

</div>

</body>

</html>
<?php 
 }
    break;
  
}
?>