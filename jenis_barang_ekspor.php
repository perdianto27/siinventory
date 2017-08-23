<?php
if ($_POST[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM katagori Order By kd_katagori ASC");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Jenis_Barang.doc");

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
   <h4 align="center"><u>DATA JENIS BARANG</u></h4>
   <table border="0" align="center" bordercolor="#FF6600" >
  <tr bgcolor="#0099FF">
   <th>No</th>
   <th>Kode Barang</th>
   <th>Jenis Barang</th>
  </tr>
  <?php while ($u=mysql_fetch_array($unduh)){ ?>
  <tr bgcolor="#00CCFF">
   <td align="center"><?php echo"$no"; ?></td>
   <td align="center"><?php echo"$u[kd_katagori]"; ?></td>
   <td align="center"><?php echo"$u[jenis_alat]"; ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
   <td colspan="3">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
  </tr>
 </table>
<?php } ?>
   </td>
  </tr>
 </table>

<?php if ($_POST[ekspor]==cetak){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$cetak=mysql_query("SELECT * FROM katagori
					ORDER BY kd_katagori ASC");?>
                    
 <table border="0" align="center" bgcolor="#0099FF">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Inventaris Barang</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA JENIS BARANG</u></h4>
   <table border="0" align="center" bordercolor="#FF6600">
  <tr bgcolor="#0099FF">
   <th>No</th>
   <th>Kode Barang</th>
   <th>Jenis Barang</th>
  </tr>
  <?php while ($c=mysql_fetch_array($cetak)){ ?>
  <tr bgcolor="#00CCFF">
   <td align="center"><?php echo"$no"; ?></td>
   <td align="center"><?php echo"$c[kd_katagori]"; ?></td>
   <td align="center"><?php echo"$c[jenis_alat]"; ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
   <td colspan="3"><u>Tanggal Cetak : <?php echo"$tanggal"; ?></u></td>
  </tr>
 </table>
  <?php } ?>
   </td>
  </tr>
 </table>