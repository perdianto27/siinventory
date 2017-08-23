<?php
include'koneksi.php';
/*if (!empty($_POST[kode_barang]) and
	!empty($_POST[nama_barang]) and
	!empty($_POST[tgl_entri]) and  
	!empty($_POST[kd_katagori]) and
	!empty($_POST[nama_barang]) and
	!empty($_POST[kode_pembuat]) 
	!empty($_POST[tahun_buat]) and
	!empty($_POST[jumlah_barang]) or 
	!empty($_GET[id]))
{and*/
//Skrip untuk form tambah
if ($_GET[skrip]==tambah) {
mysql_query("INSERT INTO barang
					(kode_barang,
					nama_barang,
					tgl_entri,
					kd_katagori,
					kode_pembuat,
					tahun_buat,
					jumlah_barang) 
			 VALUES ('$_POST[kode_barang]',
					 '$_POST[nama_barang]',
					 '$_POST[tgl_entri]',
					 '$_POST[kd_katagori]',
					 '$_POST[kode_pembuat]',
					 '$_POST[tahun_buat]',
					 '$_POST[jumlah_barang]')");
echo"<div class=tambah>Satu barang Baru Telah Ditambahkan!</div>";
}
//Skrip untuk form ubah
if ($_GET[skrip]==ubah) {
mysql_query("UPDATE barang SET 
					kode_barang='$_POST[kode_barang]',
					nama_barang='$_POST[nama_barang]',
					tgl_entri='$_POST[tgl_entri]',
					kd_katagori='$_POST[kd_katagori]',
					kode_pembuat='$_POST[kode_pembuat]',
					tahun_buat='$_POST[tahun_buat]',
					jumlah_barang='$_POST[jumlah_barang]' 
			 WHERE id_barang='$_POST[id]'");
echo"<div class=ubah>Perubahan Telah Disimpan!</div>";
}
//Skrip untuk aksi hapus
if ($_GET[skrip]==hapus) {
mysql_query("DELETE FROM barang WHERE id_barang='$_GET[id]'");
echo"<div class=hapus>Satu barang Baru Telah Dikeluarkan!</div>";
}

//Skrip untuk form deskripsi
if ($_GET[skrip]==deskripsi) {
$lokasi_file=$_FILES['gambar']['tmp_name'];
$nama_file=$_FILES['gambar']['name'];
move_uploaded_file($lokasi_file,"pratinjau/$nama_file");
mysql_query("INSERT INTO deskripsi_barang
					(id_barang,
					gambar,
					keterangan) 
			 VALUES ('$_POST[id_barang]',
					 '$nama_file',
					 '$_POST[keterangan]')");
echo"<div class=tambah>Satu Deskripsi Baru Telah Ditambahkan!</div>";
}
if ($_GET[skrip]==hapus_deskripsi) {
mysql_query("DELETE FROM deskripsi_barang WHERE kode_deskripsi='$_GET[id]'");
echo"<div class=hapus>Satu deskripsi Baru Telah Dikeluarkan!</div>";
}

/*} else {
echo"<div class=pesan>Melakukan Perubahan Data, ";
echo"Harap masukkan data dengan teliti!</div>";
}*/
?>