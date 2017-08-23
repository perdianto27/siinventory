<?php
include'koneksi.php';
$login=mysql_query("SELECT * FROM pengelola 
					Where username='$_POST[username]' 
					AND password='$_POST[password]'");
					
$sukses=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($sukses>0){
	session_start();
	$_SESSION['username']=$r['username'];
	$_SESSION['password']=$r['password'];
	$_SESSION['nama_peng']=$r['nama_peng'];
	header('location:index.php');
	}
	else
	{		
	include'index.php';
	echo"<center> <div class=salah align='center'><blink>Sandi Yang Anda Masukan Salah!</div>";	
	}
?>
       
