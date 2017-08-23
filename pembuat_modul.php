<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'pembuat_skrip.php';
?>

<?php
// Menampilkan DATA Pembuat
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM pembuat Order By kode_pembuat");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/penulis.png" align="absmiddle" />
  DATA PEMBUAT</h3>
  <table border="0" class="judul" align="center">
   <tr class="judul" align="center">
    <td class="nomor">No</td>
    <td class="data">Nama Pembuat</td>
    <td class="data">Email</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[nama_pembuat]";?></td>
    <td class="data"><?php echo"$l[email]";	?></td>
    <td class="data" align="center">
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=pembuat&opsi=ubah&id=<?php echo"$l[kode_pembuat]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=pembuat&skrip=hapus&id=<?php echo"$l[kode_pembuat]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> Pembuat</td>
    <td align="center" class="data">
    <a href="?halaman=pembuat&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=pembuat&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan pembuat Baru
if ($_GET[opsi]==tambah){ ?>
 <form action="?halaman=pembuat&skrip=tambah" method="post">
  <table border="0" align="center">
   <tr>
	<td>Nama Pembuat </td>
	<td><input type="text" name="nama_pembuat" placeholder="Nama pembuat"></td>
   </tr>
   <tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" placeholder="Alamat pembuat"></td>
   </tr>
   <tr>
	<td>Email</td>
	<td><input type="text" name="email" placeholder="Email" /></td>
   </tr>
   <tr>
	<td>Keterangan</td>
	<td><textarea name="keterangan" placeholder="keterangan"></textarea></td>
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
// Form Untuk Mengubah DATA Pembuat
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM pembuat WHERE kode_pembuat='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=pembuat&skrip=ubah" method="post">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kode_pembuat]"; ?>">
   <tr>
	<td>Nama Pembuat </td>
	<td><input type="text" name="nama_pembuat"  value="<?php echo"$u[nama_pembuat]"; ?>" /></td>
   </tr>
   <tr>
	<td>Alamat </td>
	<td><input type="text" name="alamat" value="<?php echo"$u[alamat]"; ?>" ></td>
   </tr>
   <tr>
	<td>Email</td>
	<td><input type="text" name="email" value="<?php echo"$u[email]"; ?>"></td>
   </tr>
   <tr>
	<td>Keterangan</td>
	<td><textarea name="keterangan"><?php echo"$u[keterangan]"; ?></textarea></td>
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
// Form Untuk Mengekspor DATA Pembuat
if ($_GET[opsi]==ekspor){ ?>
 <form action="pembuat_ekspor.php" method="post" target="_blank">
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