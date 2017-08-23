<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'pengelola_skrip.php';
?>

<?php
// Menampilkan DATA PENGELOLA
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM pengelola Order By kode_peng");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/pengelola.png" align="absmiddle" />
  DATA PENGELOLA</h3>
  <table border="0" class="judul" align="center">
   <tr class="judul" align="center">
    <td class="nomor">No</td>
    <td class="data">Nama pengelola</td>
    <td class="data">Username</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[nama_peng]";?></td>
    <td class="data"><?php echo"$l[username]";	?></td>
    <td class="data" align="center">
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=pengelola&opsi=ubah&id=<?php echo"$l[kode_peng]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=pengelola&skrip=hapus&id=<?php echo"$l[kode_peng]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> pengelola</td>
    <td align="center" class="data">
    <a href="?halaman=pengelola&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=pengelola&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan pengelola Baru
if ($_GET[opsi]==tambah){ ?>
 <form action="?halaman=pengelola&skrip=tambah" method="post">
  <table border="0" align="center">
   <tr>
	<td>Nama pengelola </td>
	<td><input type="text" name="nama_peng" placeholder="Nama pengelola"></td>
   </tr>
   <tr>
	<td>Email</td>
	<td><input type="text" name="username" placeholder="Email pengelola"></td>
   </tr>
   <tr>
	<td>Kata Sandi</td>
	<td><input type="password" name="password" placeholder="Kata Sandi" /></td>
   </tr>
   <tr>
	<td colspan="2">
	<input type="submit" value="Buat Baru">
	<input type="button" value="Batal" onclick="self.history.back();">	</td>
   </tr>
  </table>
</form>
<?php } ?>

<?php
// Form Untuk Mengubah DATA PENGELOLA
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM pengelola WHERE kode_peng='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=pengelola&skrip=ubah" method="post">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kode_peng]"; ?>">
   <tr>
	<td>Nama pengelola </td>
	<td><input type="text" name="nama_peng"  value="<?php echo"$u[nama_peng]"; ?>"></td>
   </tr>
   <tr>
	<td>Email </td>
	<td><input type="text" name="username" value="<?php echo"$u[username]"; ?>" ></td>
   </tr>
   <tr>
	<td>Kata Sandi</td>
	<td><input name="password" type="password" value="<?php echo"$u[password]"; ?>"></td>
   </tr>
   <tr>
	<td colspan="2">
	 <input type="submit" value="Simpan">
	 <input type="button" value="Batal" onclick="self.history.back();"/></td>
   </tr>
  </table>
 </form>
<?php } } ?>

<?php
// Form Untuk Mengekspor DATA PENGELOLA
if ($_GET[opsi]==ekspor){ ?>
 <form action="pengelola_ekspor.php" method="post" target="_blank">
  <table align="center">
   <tr>
	<td>
	<select name="ekspor">
		<option value="cetak">Cetak Laporan</option>
		<option value="unduh"><img src="ikon/unduh.png" />Unduh Laporan</option>
	</select>
	</td>
	<td><input type="submit" value="Ekspor Data Laporan" /></td>
   </tr>
  </table>
 </form>
<?php } ?>