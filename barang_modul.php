<?php
//menyisipkan koneksi dan skrip
include'koneksi.php';
include'barang_skrip.php';
?>

<?php
// Menampilkan DATA BUKU
if (empty($_GET[aksi])){ 
  $no=1;
  $lihat=mysql_query("SELECT * FROM barang Order By id_barang");
  $jml_data=mysql_num_rows($lihat);
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/buku.png" align="absmiddle" />
  DATA BARANG</h3>
  <table border="0" class="judul" align="center">
   <tr class="ISBN" align="center">
    <td class="nomor">No</td>
    <td class="data">Kode Barang</td>
    <td class="data">Judul Buku</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l=mysql_fetch_array($lihat)){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[kode_barang]";?> 
    <img src="ikon/detail_kosong.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=barang&opsi=deskripsi&id=<?php echo"$l[id_barang]"; ?>">Dekskipsi</a>
    </td>
    <td class="data">
	<?php echo"$l[nama_barang]";	?></td>
    <td class="data" align="center">
    
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=barang&opsi=ubah&id=<?php echo"$l[id_barang]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=barang&skrip=hapus&id=<?php echo"$l[id_barang]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> buku</td>
    <td align="center" class="data">
    <a href="?halaman=barang&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=barang&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan buku Baru
if ($_GET[opsi]==tambah){ ?>
<form action="?halaman=barang&skrip=tambah" method="post" name="tambah_barang">
  <table border="0" align="center">
   <tr>
	<td>Kode Barang</td>
	<td><input type="text" name="kode_barang" placeholder="Kode Barang"></td>
   </tr>
   <tr>
	<td>Nama Barang</td>
	<td><input type="text" name="nama_barang" placeholder="Nama Barang"></td>
   </tr>
   <tr>
     <td>Tanggal Entri</td>
     <td><input type="text" name="tgl_entri" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.tambah_barang.tgl_entri);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="kalender/kalender.png" width="34" height="29" border="0" alt=""></a></td>
   </tr>
   <tr>
	<td>Jenis Barang</td>
	<td><select name="kd_katagori">
      <?php
	   include"koneksi.php";
       $jenis=mysql_query("SELECT * FROM katagori Order By jenis_alat ASC");
	   while ($j=mysql_fetch_array($jenis)){
	   ?>
      <option value="<?php echo"$j[kd_katagori]"; ?>"><?php echo"$j[jenis_alat]"; ?></option>
      <?php } ?>
    </select></td>
   </tr>
   <tr>
     <td>Pembuat</td>
     <td><select name="kode_penulis">
       <?php
	   include"koneksi.php";
       $penulis=mysql_query("SELECT * FROM pembuat Order By nama_pembuat ASC");
	   while ($ps=mysql_fetch_array($penulis)){
	   ?>
       <option value="<?php echo"$ps[kode_pembuat]"; ?>"><?php echo"$ps[nama_pembuat]"; ?></option>
       <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Tahun Buat</td>
     <td><input name="tahun_buat" type="text" size="4" maxlength="4" placeholder="Tahun" /></td>
   </tr>
   <tr>
     <td>Jumlah Barang</td>
     <td><input name="jumlah_barang" type="text" size="4" maxlength="3" placeholder="Jumlah" /></td>
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
// Form Untuk Mengubah DATA BUKU
if ($_GET[opsi]==ubah){
 $ubah=mysql_query("SELECT * FROM barang WHERE id_barang='$_GET[id]'");
 while ($u=mysql_fetch_array($ubah)){ ?>
 <form action="?halaman=barang&skrip=ubah" method="post" name="ubah_buku">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[id_barang]"; ?>">
   <tr>
     <td>Kode Barang</td>
     <td><input type="text" name="kode_barang" value="<?php echo"$u[kode_barang]"; ?>" placeholder="kode_barang" /></td>
   </tr>
   <tr>
     <td>Nama Barang</td>
     <td><input type="text" name="nama_barang" value="<?php echo"$u[nama_barang]"; ?>" placeholder="Nama Barang" /></td>
   </tr>
   <tr>
     <td>Tanggal Entri</td>
     <td><input type="text" name="tgl_entri" value="<?php echo"$u[tgl_entri]"; ?>" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
       <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.ubah_buku.tgl_entri);return false;" ><img src="kalender/kalender.png" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" style="border:none" /></a></td>
   </tr>
   <tr>
     <td>Jenis Barang</td>
     <td><select name="kd_kategori">
         <?php
	   include"koneksi.php";
       $jenis=mysql_query("SELECT * FROM katagori Order By jenis_alat ASC");
	   while ($j=mysql_fetch_array($jenis)){
	   ?>
         <option value="<?php echo"$j[kd_kategori]"; ?>"><?php echo"$j[jenis_alat]"; ?></option>
         <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Pembuat</td>
     <td><select name="kode_penulis">
         <?php
	   include"koneksi.php";
       $penulis=mysql_query("SELECT * FROM pembuat Order By nama_pembuat ASC");
	   while ($ps=mysql_fetch_array($penulis)){
	   ?>
         <option value="<?php echo"$ps[kode_pembuat]"; ?>"><?php echo"$ps[nama_pembuat]"; ?></option>
         <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Tahun Buat</td>
     <td><input name="tahun_buat" type="text" value="<?php echo"$u[tahun_buat]"; ?>" size="4" maxlength="4" placeholder="Tahun" /></td>
   </tr>
   <tr>
     <td>Jumlah Buku</td>
     <td><input name="jumlah_buku" type="text" value="<?php echo"$u[jumlah_buku]"; ?>" size="4" maxlength="3" placeholder="Jumlah" /></td>
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
// Form Untuk Menambahkan deskripsi buku Barang
if ($_GET[opsi]==deskripsi){ ?>
<form action="?halaman=barang&skrip=deskripsi" method="post" name="deskripsi_barang" enctype="multipart/form-data">
<h3 align="center">DESKRIPSI BARANG</h3>
  <table border="0" align="center">
   <tr>
     <th colspan="3" align="left">
     <a href="barang_deskripsi_ekspor.php?ekspor=cetak&id=<?php echo"$_GET[id]"; ?>" 
      target="_blank">
      <img src="ikon/cetak.png" width="32" height="32" 
      	   align="absmiddle" />Cetak</a> | 
   <a href="barang_deskripsi_ekspor.php?ekspor=unduh&id=<?php echo"$_GET[id]"; ?>"
   	  target="_blank">
      <img src="ikon/unduh.png" width="32" height="32" 
      	   align="absmiddle" />Unduh</a>
     <hr /></th>
    </tr>
   <tr>
	<th>Preview</th>
	<th>Deskripsi</th>
	<th>Opsi</th>
   </tr>
   <?php $deskripsi=mysql_query("SELECT * FROM deskripsi_barang WHERE id_barang='$_GET[id]'");
   		 while ($d=mysql_fetch_array($deskripsi)){ ?>
   <tr>
	<td align="center" valign="middle"><img src="pratinjau/<?php echo"$d[gambar]"; ?>" width="86" height="93" /></td>
	<td><textarea name="textarea" cols="40" rows="4" readonly="readonly" placeholder="Deskripsi tentang barang"><?php echo"$d[keterangan]"; ?></textarea></td>
	<td><img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=barang&skrip=hapus_deskripsi&id=<?php echo"$d[kode_deskripsi]";?>" 
   	   onClick="return hapus();">
	Hapus</a></td>
   </tr>
   <?php } ?>
   
   <tr>
    <input type="hidden" name="id_barang" value="<?php echo"$_GET[id]"; ?>"/>
	<td><input name="gambar" type="file" size="3" placeholder="Gambar" /></td>
	<td><textarea name="keterangan" cols="40" rows="4" placeholder="Deskripsi tentang barang"></textarea></td>
	<td>&nbsp;</td>
   </tr>
   <tr>
	<td colspan="3">
	<input type="submit" value="Tambahkan Deskripsi">
	<input type="button" value="Batal" onclick="self.history.back();">	</td>
   </tr>
  </table>
  <iframe width=174 height=189 name="gToday:normal:kalender/agenda.js" id="gToday:normal:kalender/agenda.js" src="kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</form>
<?php } ?>


<?php
// Form Untuk Mengekspor DATA BARANG
if ($_GET[opsi]==ekspor){ ?>
 <form action="barang_ekspor.php" method="post" target="_blank">
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