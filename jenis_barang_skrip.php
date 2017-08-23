<?php
include'koneksi.php';
if (!empty($_POST[kd_katagori])or
	!empty($_POST[jenis_alat]) or 
	!empty($_GET[id]))
{
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO katagori(kd_katagori,jenis_alat) 
			 VALUES ('$_POST[kd_katagori]','$_POST[jenis_alat]')");
echo"<div class=tambah>Satu Jenis Buku Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE katagori SET kd_katagori='$_POST[kd_katagori]',jenis_alat='$_POST[jenis_alat]' 
			 WHERE kd_katagori='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM katagori WHERE kd_katagori='$_GET[id]'");
echo"<div class=hapus>Satu Jenis Buku Baru Telah Dikeluarkan!</div>";
}

} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}
?>