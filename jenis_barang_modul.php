<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'jenis_barang_skrip.php';
?>

<?php
// Menampilkan DATA JENIS BUKU
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM katagori Order By kd_katagori");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/jenis_buku.png" align="absmiddle" />
  DATA JENIS BARANG</h3>
  <table border="0" class="judul" align="center">
   <tr class="judul" align="center">
    <td class="nomor">No</td>
    <td class="data">Kode Barang</td>
    <td class="data">Nama Jenis Buku</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[kd_katagori]";?></td>
    <td class="data"><?php echo"$l[jenis_alat]";	?></td>
    <td class="data" align="center">
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=katagori&opsi=ubah&id=<?php echo"$l[kd_katagori]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=katagori&skrip=hapus&id=<?php echo"$l[kd_katagori]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> jenis barang</td>
    <td align="center" class="data">
    <a href="?halaman=katagori&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=katagori&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan jenis_buku Baru
if ($_GET[opsi]==tambah){ ?>
 <form action="?halaman=katagori&skrip=tambah" method="post">
  <table border="0" align="center">
   <tr>
	<td>Kode Barang</td>
	<td><input type="text" name="kd_katagori" placeholder="kode katagori"></td>
   </tr>
   <tr>
	<td>Jenis Barang</td>
	<td><textarea name="jenis_alat" placeholder="jenis alat"></textarea></td>
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
// Form Untuk Mengubah DATA JENIS BARANG
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM katagori WHERE kd_katagori='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=katagori&skrip=ubah" method="post">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kd_katagori]"; ?>">
   <tr>
	<td>Kode Barang </td>
	<td><input type="text" name="kd_katagori"  value="<?php echo"$u[kd_katagori]"; ?>"></td>
   </tr>
   <tr>
	<td>Jenis Barang</td>
	<td><textarea name="jenis_alat"><?php echo"$u[jenis_alat]"; ?></textarea></td>
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
// Form Untuk Mengekspor DATA JENIS BUKU
if ($_GET[opsi]==ekspor){ ?>
 <form action="jenis_barang_ekspor.php" method="post" target="_blank">
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