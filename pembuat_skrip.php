<?php
include'koneksi.php';
if (!empty($_POST[nama_pembuat]) and
	!empty($_POST[alamat]) and 
	!empty($_POST[email]) or 
	!empty($_GET[id]))
{
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO pembuat(nama_pembuat,alamat,email,keterangan) 
			 VALUES ('$_POST[nama_pembuat]','$_POST[alamat]','$_POST[email]','$_POST[keterangan]')");
echo"<div class=tambah>Satu Pembuat Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE pembuat SET nama_pembuat='$_POST[nama_pembuat]',alamat='$_POST[alamat]',email='$_POST[email]',keterangan='$_POST[keterangan]' 
			 WHERE kode_pembuat='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM pembuat WHERE kode_pembuat='$_GET[id]'");
echo"<div class=hapus>Satu Pembuat Baru Telah Dikeluarkan!</div>";
}

} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}
?>