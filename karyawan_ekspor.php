<?php
if ($_POST[ekspor]==unduh){
include'koneksi.php';
$no=1;
$tanggal=date('D d-M-Y');
$unduh=mysql_query("SELECT * FROM karyawan ORDER BY kode_karyawan ASC");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Karyawan.doc");

?>
 <table border="0" align="center" bgcolor="#0099FF">
  <tr> 
   <td><font size="+2"><strong>Laporan : Data Inventaris</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
   <td><hr />
   <h4 align="center"><u>DATA KARYAWAN</u></h4>
   <?php while ($u=mysql_fetch_array($unduh)){ ?>
<b>
- Kode Anggota : <?php echo"$u[kode_karyawan]"; ?><br />
- Tanggal Masuk : <?php echo"$u[tgl_masuk]"; ?> 
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#0099FF">Nama</td>
   <td width="470" bgcolor="#00CCFF"><?php echo"$u[nama_karyawan]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Alamat</td>
   <td bgcolor="#00CCFF"><?php echo"$u[alamat]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Telepon</td>
   <td bgcolor="#00CCFF"><?php echo"$u[telepon]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Keterangan</td>
   <td bgcolor="#00CCFF"><?php echo"$u[keterangan]"; ?></td>
  </tr>
  <tr bgcolor="#666666">
   <td colspan="3" bgcolor="#FFFFFF">Tanggal Cetak : <?php echo"$tanggal"; ?></td>
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
$cetak=mysql_query("SELECT * FROM karyawan ORDER BY kode_karyawan ASC");?>
                    
 <table border="0" align="center" bgcolor="#0099FF">
  <tr> 
   <td bgcolor="#0099FF"><font size="+2"><strong>Laporan : Data Inventaris</strong></font></td>
  </tr>
  <tr>
   <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
   <td ><hr />
   <h4 align="center"><u>DATA KARYAWAN</u></h4>
   <?php while ($c=mysql_fetch_array($cetak)){ ?>
<b>
- Kode Anggota : <?php echo"$c[kode_karyawan]"; ?><br />
- Tanggal Masuk : <?php echo"$c[tgl_masuk]"; ?> 
<hr /></b>
   <table border="0" width="600">
  <tr>
   <td width="120" bgcolor="#0099FF">Nama</td>
   <td width="470" bgcolor="#00CCFF"><?php echo"$c[nama_karyawan]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Alamat</td>
   <td bgcolor="#00CCFF"><?php echo"$c[alamat]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Telepon</td>
   <td bgcolor="#00CCFF"><?php echo"$c[telepon]"; ?></td>
  </tr>
  <tr>
   <td bgcolor="#0099FF">Keterangan</td>
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