<?php
include'koneksi.php';
if (!empty($_POST[nama_karyawan]) and
	!empty($_POST[alamat]) and
	!empty($_POST[telepon]) and  
	!empty($_POST[tgl_masuk]) or 
	!empty($_GET[id]))
{
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO karyawan(nama_karyawan,alamat,telepon,tgl_masuk,keterangan) 
			 VALUES ('$_POST[nama_karyawan]','$_POST[alamat]','$_POST[telepon]','$_POST[tgl_masuk]','$_POST[keterangan]')");
echo"<div class=tambah>Satu Karyawan Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE karyawan SET nama_karyawan='$_POST[nama_karyawan]',alamat='$_POST[alamat]',telepon='$_POST[telepon]',tgl_masuk='$_POST[tgl_masuk]',keterangan='$_POST[keterangan]' 
			 WHERE kode_karyawan='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM karyawan WHERE kode_karyawan='$_GET[id]'");
echo"<div class=hapus>Satu Karyawan Baru Telah Dikeluarkan!</div>";
}

} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}
?>