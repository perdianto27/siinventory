<?php
include'koneksi.php';
if (!empty($_POST[nama_peng]) and
	!empty($_POST[username]) and 
	!empty($_POST[password]) or 
	!empty($_GET[id]))
{
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO pengelola(nama_peng,username,password) 
			 VALUES ('$_POST[nama_peng]','$_POST[username]','$_POST[password]')");
echo"<div class=tambah>Satu pengelola Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE pengelola SET nama_peng='$_POST[nama_peng]',username='$_POST[username]',password='$_POST[password]' 
			 WHERE kode_peng='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM pengelola WHERE kode_peng='$_GET[id]'");
echo"<div class=hapus>Satu pengelola Baru Telah Dikeluarkan!</div>";
}

} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}
?>