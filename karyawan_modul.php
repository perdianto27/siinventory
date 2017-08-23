<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'karyawan_skrip.php';
?>

<?php
// Menampilkan DATA KARYAWAN
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM karyawan Order By kode_karyawan");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/anggota.png" align="absmiddle" />
  DATA KARYAWAN</h3>
  <table width="362" border="0" align="center" class="judul">
   <tr class="judul" align="center">
    <td width="29" class="nomor">No</td>
    <td width="137" class="data">Nama Karyawan</td>
    <td width="117" class="data">Tanggal Masuk</td>
    <td width="41" class="data">Opsi</td>
    <td width="27">&nbsp;</td>
   </tr>
  </table>

<div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[nama_karyawan]";?></td>
    <td class="data"><?php echo"$l[tgl_masuk]";	?></td>
    <td class="data" align="center">
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=karyawan&opsi=ubah&id=<?php echo"$l[kode_karyawan]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=karyawan&skrip=hapus&id=<?php echo"$l[kode_karyawan]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> Karyawan</td>
    <td align="center" class="data">
    <a href="?halaman=karyawan&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=karyawan&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan karyawan Baru
if ($_GET[opsi]==tambah){ ?>
 <form action="?halaman=karyawan&skrip=tambah" method="post" name="tambah_karyawan">
  <table border="0" align="center">
   <tr>
	<td>Nama anggota </td>
	<td><input type="text" name="nama_karyawan" placeholder="Nama Karyawan"></td>
   </tr>
   <tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" placeholder="Alamat Karyawan"></td>
   </tr>
   <tr>
     <td>Telepon</td>
     <td><input type="text" name="telepon" placeholder="Telepon Karyawan" /></td>
   </tr>
   <tr>
	<td>Tanggal Masuk</td>
	<td><input type="text" name="tgl_masuk" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.tambah_karyawan.tgl_masuk);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="kalender/kalender.png" width="34" height="29" border="0" alt=""></a></td>
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
  <iframe width=174 height=189 name="gToday:normal:kalender/agenda.js" id="gToday:normal:kalender/agenda.js" src="kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</form>
<?php } ?>

<?php
// Form Untuk Mengubah DATA KARYAWAN
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM karyawan WHERE kode_karyawan='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=karyawan&skrip=ubah" method="post" name="ubah_karyawan">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kode_karyawan]"; ?>">
   <tr>
	<td>Nama anggota </td>
	<td><input type="text" name="nama_karyawan"  value="<?php echo"$u[nama_karyawan]"; ?>" /></td>
   </tr>
   <tr>
	<td>Alamat </td>
	<td><input type="text" name="alamat" value="<?php echo"$u[alamat]"; ?>" ></td>
   </tr>
   <tr>
     <td>Telepon</td>
     <td><input type="text" name="telepon" value="<?php echo"$u[telepon]"; ?>" /></td>
   </tr>
   <tr>
	<td>Tanggal Masuk</td>
	<td><input type="text" name="tgl_masuk" value="<?php echo"$u[tgl_masuk]"; ?>" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.ubah_karyawan.tgl_masuk);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="kalender/kalender.png" width="34" height="29" border="0" alt=""></a></td>
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
  <iframe width=174 height=189 name="gToday:normal:kalender/agenda.js" id="gToday:normal:kalender/agenda.js" src="kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</form>
<?php } } ?>

<?php
// Form Untuk Mengekspor DATA KARYAWAN
if ($_GET[opsi]==ekspor){ ?>
 <form action="karyawan_ekspor.php" method="post" target="_blank">
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