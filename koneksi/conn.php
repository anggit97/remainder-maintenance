<?php

//Pengaturan database
$database	= "remainder2";
$host		= "localhost";
$pass		= "secret";
$username	= "root";


//koneksi ke database
$conn		= mysqli_connect($host,$username,$pass,$database) or die("Gagal koneksi kedatabase");

?>
