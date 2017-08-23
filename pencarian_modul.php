<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
?>

<?php
// Menampilkan DATA PENULIS
if (empty($_GET[aksi])){ ?>

<form action="?halaman=pencarian&opsi=pencarian" method="post">
  <h3 align="center">
  <img class="gambar_menu" src="ikon/cari.png" align="absmiddle" />
  FORM PENCARIAN BARANG</h3>
  <table border="0" align="center">
   <tr>
     <td><input type="text" name="kata_kunci" placeholder="Masukkan Kata Kunci"/></td>
   </tr>
   <tr>
	<td>
	<input type="submit" value="Pencarian">
	<div class="batal"><a href="?halaman=default">Batal</a></div>	</td>
   </tr>
  </table>
 
</form>
  
<?php }	?>

<?php
// Form Untuk Menampilkan Hasil Pencarian
if ($_GET[opsi]==pencarian){ 
$no=1;
  $lihat=mysql_query("SELECT * FROM barang where id_barang like '%$_POST[kata_kunci]%' or nama_barang like '%$_POST[kata_kunci]%' ");
  $jml_data=mysql_num_rows($lihat);
?>
  
  <table border="0" class="kd_pembuat" align="center">
   <tr class="kd_pembuat" align="center">
    <td class="nomor">No</td>
    <td class="data">Kode Pembuat</td>
    <td class="data">Merk</td>
	<td class="data">Tahun Pembuatan</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[kd_pembuat]";?></td>
    <td class="data"><?php echo"$l[nama_barang]";	?></td>
	<td class="data"><?php echo"$l[tahun_buat]";	?></td>
    <td class="data" align="center">
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=buku&opsi=ubah&id=<?php echo"$l[kd_katagori]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=buku&skrip=hapus&id=<?php echo"$l[kd_katagori]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Ditemukan <?php echo"$jml_data";?> Barang Terkait pencarian</td>
    <td align="center" class="data">&nbsp;</td>
   </tr>
  </table>
  <br>
<?php } ?>

