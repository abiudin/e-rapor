<?php 
if ($_SESSION[leveluser]=='admin'){
$aksi="modul/mod_user/aksi_user.php";
switch($_GET[act]){
  // Tampil User
  default:
    echo "<h2>Data User</h2>
		  <form action='$PHPSELF' method='POST'><input type='text' name='txtcari'><input type='submit' value='Cari' name='cCari'>
          <input type=button value='Tambah User' onclick=\"window.location.href='?module=user&act=tambahuser';\">
          <table class='art-article' border='0' cellspacing='0' cellpadding='0'>
          <tr><th>no</th><th>username</th><th>level</th><th>aksi</th></tr>"; 
	if (isset($_POST[cCari]))
	{
	$cari=$_POST[txtcari];
    $tampil=mysql_query("SELECT * FROM user
    WHERE
    username LIKE '%$cari%' OR 
    level LIKE '%$cari%'
	ORDER BY username");
    }
    else {
    $tampil=mysql_query("SELECT * FROM user ORDER BY username");
	}
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
		     <td>$r[level]</td>
             <td><a href=?module=user&act=edituser&id=$r[username]>Edit</a> | 
	           <a href=$aksi?module=user&act=hapus&id=$r[username]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahuser":
    echo "<h2>Tambah User</h2>
          <form method=POST action='$aksi?module=user&act=input'>
          <table class='art-article' border='0' cellspacing='0' cellpadding='0'>
          <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=password name='password'></td></tr>
          <tr><td>Level</td>   <td> : <select name='level'>
										<option value='0'>-- Pilih Level --</option>
										<option value='admin'>admin</option>
										<option value='wakakur'>wakakur</option>
										<option value='guru'>guru</option>
										<option value='operator'>operator</option>
										<option value='wali'>wali</option>
										<option value='siswa'>siswa</option>
										<option value='aum'>aum</option>
										<option value='peserta'>Peserta Ujian</option></select></td></tr>
										
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM user WHERE username='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit User</h2>
          <form method=POST action=$aksi?module=user&act=update>
          <input type=hidden name=username value='$r[username]'>
          <table class='art-article' border='0' cellspacing='0' cellpadding='0'>
          <tr><td>Password</td>     <td> : <input type=password name='password'> *) </td></tr>
          <tr><td>Level</td> <td> : ";
          if ($r[level]=='admin'){
		  echo "
		  <select name='level'>
										<option value='0'>-- Pilih Level --</option>
										<option value='admin' selected>admin</option>
										<option value='wakakur'>wakakur</option>
										<option value='wali' selected>wali</option>
										<option value='operator' selected>Operator</option>
										<option value='peserta'>Peserta Ujian</option>
										<option value='guru'>guru</option></select>";
		  }
		  elseif ($r[level]=='guru'){
		  echo "
		  <select name='level'>
										<option value='0'>-- Pilih Level --</option>
										<option value='admin'>admin</option>
										<option value='guru' selected>guru</option>
										<option value='siswa'>siswa2</option</select>";
		  }
		   elseif ($r[level]=='siswa'){
		   echo "
		  <select name='level'>
										<option value='0'>-- Pilih Level --</option>
										<option value='admin'>admin</option>
										<option value='guru'>guru</option>
										<option value='siswa' selected>siswa3</option</select>";
		  }
		   else{
		   echo "
		  <select name='level'>
										<option value='0'>-- Pilih Level --</option>
										<option value='admin'>admin</option>
										<option value='wakakur'>wakakur</option>
										<option value='wali' selected>wali</option>
										<option value='operator' selected>Operator</option>
										<option value='guru'>guru</option></select>";
		  }
	
    
    echo "<tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
else{
  echo "<p>Anda tidak berhak mengakses modul ini</p>";
}
?>
