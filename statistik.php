<?php
include'koneksi.php';
$_1=mysql_query("SELECT * FROM pengelola");
$_2=mysql_query("SELECT * FROM barang");
$_3=mysql_query("SELECT * FROM karyawan");
$_4=mysql_query("SELECT * FROM pembuat");
$a1=mysql_num_rows($_1);
$a2=mysql_num_rows($_2);
$a3=mysql_num_rows($_3);
$a4=mysql_num_rows($_4);
?>
<table align="center" class="judul_menu"><!--<html>-->
<!--<head>-->
<!--<html>-->
<!--<head>-->
<script language="JavaScript">
var clockID = 0;
function UpdateClock() {
   if(clockID) {
      clearTimeout(clockID);
      clockID  = 0;
   }
   var tDate = new Date();

   document.theClock.theTime.value = "" 
                                   + tDate.getHours() + ":" 
                                   + tDate.getMinutes() + ":" 
                                   + tDate.getSeconds();
   clockID = setTimeout("UpdateClock()", 1000);
}
function StartClock() {
   clockID = setTimeout("UpdateClock()", 500);
}
function KillClock() {
   if(clockID) {
      clearTimeout(clockID);
      clockID  = 0;
   }
}
</script>
<!--</head>-->
<body onLoad="StartClock()" onUnload="KillClock()">
<form name="theClock">
  <center> <input type=text name="theTime" size=10 style="text-align: 
center">
</form>
<!--</body>-->
<!--</html>-->
<!--</head>-->
<!--<body>-->
<!--</body>-->
<!--</html>-->
<br /> <br />
<table align="center" class="judul_menu">
<tr><td class="judul_menu" style="width:125px; border-radius:5px;">DATA STATISTIK</td></tr>
<tr><td><img src="ikon/pengelola.png" width="20" height="20" align="absbottom" /><a href="#" onClick="alert('Terdapat <?php echo"$a1"; ?> Orang Pengelola');">Pengelola (<?php echo"$a1"; ?>)</a></td>
</tr>
<tr><td><img src="ikon/buku.png" width="20" height="20" align="absbottom" /> <a href="#" onClick="alert('Terdapat <?php echo"$a2"; ?> Buku Tersedia Dalam Perpustakaan');">Barang (<?php echo"$a2"; ?>)</a></td>
</tr>
<tr>
  <td><img src="ikon/anggota.png" width="20" height="20" align="absbottom" /> <a href="#" onClick="alert('Sebanyak <?php echo"$a3"; ?> Orang Anggota Terdaftar');"> Karyawan (<?php echo"$a3"; ?>)</a></td>
</tr>
<tr>
  <td><img src="ikon/penulis.png" alt="" width="20" height="20" align="absbottom" /><a href="#" onClick="alert('Terdapat <?php echo"$a4"; ?> Penulis Terdaftar');"> Pembuat (<?php echo"$a4"; ?>)</a></td>
</tr>
</table>

<p>&nbsp;</p>
</center>