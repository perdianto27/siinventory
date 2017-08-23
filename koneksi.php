<?php
//membuatk koneksi ke server
mysql_connect("localhost","root","")
or die ("Tidak dapat menyambung server");

//memilih basis data
mysql_select_db("inventory_brg") 
or die ("Basis Data tidak ditemukan");
?>
