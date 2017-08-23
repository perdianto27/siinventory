<title>Koneksi Aplikasi</title><form action="akses_masuk.php" method="post">
 <div class="box">
 <table border="0" align="center" class="tabel_versi1">
 <tr><td colspan="2"><h3 align="center">SISTEM INFORMASI INVENTARIS BARANG</h3></td></tr>
  <tr>
   <td width="261" rowspan="3" align="center">
   <img src="ikon/logo.png" width="256" height="256" 
 	  	align="absmiddle" />   </td>
   <td width="193" valign="bottom">
   <select name="username">
       <?php
	   include"koneksi.php";
       $sql=mysql_query("SELECT * FROM pengelola Order By username ASC");
	   while ($k=mysql_fetch_array($sql)){
	   ?>
       <option value="<?php echo"$k[username]"; ?>"><?php echo"$k[nama_peng]"; ?></option>
       <?php } ?>
   </select>
   </td>
   </tr>
  <tr>
   <td valign="top"><input type="password" name="password" placeholder="Kata Sandi" /></td>
   </tr>
  <tr>
   <td valign="top"><input type="submit" value="Masuk Aplikasi"></td>
  </tr>
  <tr>
   <td colspan="2"><i>"Sistem Informasi Inventaris Barang sebagai KERTAS BURAM untuk mencatat segala aset, barang yang dimiliki SMKN 1 Maja"</i></td>
    </tr>
</table>
</div>
</form>