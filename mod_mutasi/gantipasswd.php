<?php 

$aksi="modul/mod_user/aksigantipasswd.php";

echo "$msg";
    echo "<h2>Ganti Password</h2>
          <form method=POST action=$aksi?module=cpasswd>
          <input type=hidden name=username value='$_SESSION[username]'>
          <table class="art-article" border="0" cellspacing="0" cellpadding="0">
		  <tr><td>Password Lama</td>     <td> : <input type=password name='oldpaswd'> *) </td></tr> 
          <tr><td>Password Baru</td>     <td> : <input type=password name='password'> *) </td></tr>  
		  <tr><td>Ulangi Password Baru</td>     <td> : <input type=password name='password2'> *) </td></tr>     
		  <tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";



?>
