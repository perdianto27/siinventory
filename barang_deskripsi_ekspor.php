<?php
if ($_GET[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM deskripsi_barang WHERE id_barang='$_GET[id]'");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Deskripsi.doc");

?>
 <table border="0" align="center" bgcolor="#0099FF">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Inventaris Barang</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
   <td><hr />
   <h4 align="center"><u>DATA DESKRIPSI BARANG</u></h4>
   <?php while ($u=mysql_fetch_array($unduh)){ ?>
<b>
- Kode Deskripsi : <?php echo"$u[kode_deskripsi]"; ?><br />
- Nama Barang : <?php $barang=mysql_query("SELECT * FROM barang 
				WHERE id_barang='$u[id_barang]'"); 
				while ($b=mysql_fetch_array($barang)){
				echo"$b[nama_barang]"; } ?><br />
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#0099FF" align="center">Preview</td>
   <td width="470" bgcolor="#00CCFF" align="center">Deskripsi</td>
  </tr>
  <tr>
   <td bgcolor="#FF00FF" align="center" valign="middle"><img src="http://localhost/si_perpustakaan/pratinjau/<?php echo"$u[gambar]"; ?>" width="86" height="93" /></td>
   <td bgcolor="#CC33CC"><?php echo"$u[keterangan]"; ?></td>
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

<?php if ($_GET[ekspor]==cetak){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$cetak=mysql_query("SELECT * FROM deskripsi_barang WHERE id_barang='$_GET[id]'");?>
                    
 <table border="0" align="center" bgcolor="#0099FF">
  <tr> 
   <td><font size="+2"><strong>Laporan : Inventaris Barang</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA DESKRIPSI BARANG</u></h4>
   <?php while ($c=mysql_fetch_array($cetak)){ ?>
<b>
- Kode Deskripsi : <?php echo"$c[kode_deskripsi]"; ?><br />
- Nama Barang : <?php $barang=mysql_query("SELECT * FROM barang 
				WHERE id_barang='$c[id_barang]'"); 
				while ($b=mysql_fetch_array($barang)){
				echo"$b[nama_barang]"; } ?><br />
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#0099FF" align="center">Preview</td>
   <td width="470" bgcolor="#00CCFF" align="center">Deskripsi</td>
  </tr>
  <tr>
   <td bgcolor="#0099FF" align="center" valign="middle"><img src="pratinjau/<?php echo"$c[gambar]"; ?>" width="86" height="93" /></td>
   <td bgcolor="#00CCFF"><?php echo"$c[keterangan]"; ?></td>
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