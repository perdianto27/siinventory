<?php
//Membatasi Akses Pengelola (Ini Muncul Jika Telah Login)
session_start();
if (!empty($_SESSION['username']) and !empty($_SESSION['password']))
{
?>
<head>

<link href="desain.css" rel="stylesheet" type="text/css">
<link href="ikon/logo.png" rel="shortcut icon" type="image/x-icon">
<title> </title>
<script language="JavaScript">
var txt="|Sistem Informasi Inventaris Barang SMKN 1 Maja | Perdianto";
var kecepatan=100;var segarkan=null;function bergerak() { document.title=txt;
txt=txt.substring(1,txt.length)+txt.charAt(0);
segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
</script></marquee></head>
<body>
<div id="atas">
    <div id="header"></div>
  <div id="menu"><?php include"menu.php"; ?></div>
</div>
   <div id="bawah">
    <div id="kiri" onClick="sembunyi('pengguna');sembunyi('data');sembunyi('perpustakaan')"><?php include'halaman.php'; ?></div>
    <div id="kanan"><?php include'statistik.php'; ?></div>
    <div id="clear"></div>
    <div id="footer"><?php include'footer.php'; ?></div>
   </div>
</body>
<?php 
} else {
//ini muncul jika belum login
echo"<link href=desain.css type=text/css rel=stylesheet>"; 
include'akses_modul.php'; 
}
?>