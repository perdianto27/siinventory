<?php
if ($_POST[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM barang,katagori,pembuat 
					 WHERE barang.kd_katagori=katagori.kd_katagori 
					 AND barang.kode_pembuat=pembuat.kode_pembuat");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Barang.doc");

?>
 <table border="0" align="center" bgcolor="#0099FF">
  <tr> 
   <td bgcolor="#0099FF"><font size="+2"><strong>Laporan : Data Inventaris</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
   <td><hr />
   <h4 align="center"><u>DATA BARANG</u></h4>
   <?php while ($u=mysql_fetch_array($unduh)){ ?>
<b>
- Kode Barang: <?php echo"$u[id_barang]"; ?><br />
- Tanggal Entri : <?php echo"$u[tgl_entri]"; ?> 
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#0099FF">ISBN</td>
   <td width="470" bgcolor="#00CCFF"><?php echo"$u[kode_barang]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Judul</td>
   <td bgcolor="#00CCFF"><?php echo"$u[nama_barang]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Jenis Buku</td>
   <td bgcolor="#00CCFF"><?php echo"$u[kd_katagori]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Penulis</td>
   <td bgcolor="#00CCFF"><?php echo"$u[nama_pembuat]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">Tahun Terbit</td>
    <td bgcolor="#00CCFF"><?php echo"$u[tahun_buat]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">Jumlah Buku</td>
    <td bgcolor="#00CCFF"><?php echo"$u[jumlah_barang]"; ?></td>
  </tr>
  <tr>
   <td colspan="3">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
  </tr>
 </table>
 <hr />
<br /><br />
<?php } }?>
   </td>
  </tr>
 </table>

<?php if ($_POST[ekspor]==cetak){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$cetak=mysql_query("SELECT * FROM barang,katagori,pembuat 
					 WHERE barang.kd_katagori=katagori.kd_katagori 
					 AND barang.kode_pembuat=pembuat.kode_pembuat ");?>
                    
 <table border="0" align="center" bgcolor="#0099FF">
  <tr> 
   <td bgcolor="#0099FF"><font size="+2"><strong>Laporan : Data Inventaris</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA BARANG</u></h4>
   <?php while ($c=mysql_fetch_array($cetak)){ ?>
<b>
- Kode Buku : <?php echo"$c[id_barang]"; ?><br />
- Tanggal Entri : <?php echo"$c[tgl_entri]"; ?> 
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#0099FF">Kode Barang</td>
   <td width="470" bgcolor="#00CCFF"><?php echo"$c[kode_barang]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Nama Barang</td>
   <td bgcolor="#00CCFF"><?php echo"$c[nama_barang]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Jenis Buku</td>
   <td bgcolor="#00CCFF"><?php echo"$c[kd_katagori]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Pembuat</td>
   <td bgcolor="#CCCCCC"><?php echo"$c[nama_pembuat]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">Tahun Terbit</td>
    <td bgcolor="#00CCFF"><?php echo"$c[tahun_buat]"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">Jumlah Buku</td>
    <td bgcolor="#00CCFF"><?php echo"$c[jumlah_barang]"; ?></td>
  </tr>
  <tr>
   <td colspan="3">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
  </tr>
 </table>
 <hr />
<br /><br />
  <?php } }?>
   </td>
  </tr>
</table>