<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_perpustakaan";

    $koneksi  = mysqli_connect($host, $user, $pass, $db) or die("Koneksi gagal");

    if($koneksi->connect_errno) {
        echo "Koneksi gagal: ". $koneksi->connect_errno();
    }
