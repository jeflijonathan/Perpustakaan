<?php

$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

include "../../koneksi/koneksi.php";

$id = $_GET["id"] ?? $redirectDaftar;
$nama = $_POST["nama"] ?? $redirectDaftar;
$status = $_POST["status"] ?? $redirectDaftar;

$perintah = "UPDATE tb_bahasa SET nama='$nama', status= '$status' WHERE id = '$id'";

$eksekusi = mysqli_query($koneksi, $perintah);

$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
    echo "<script>
        alert('data berhasil diubah');
    </script>";
    echo $redirectIndex;
} else {
    echo  "<script>
        alert('gagal diubah');
    </script>";
}
