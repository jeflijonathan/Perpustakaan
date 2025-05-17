<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

include "../../koneksi/koneksi.php";
$kategoriBuku = ucwords($_POST["nama"]) ?? $redirectDaftar;
$status = true;

$perintah = "INSERT INTO tb_kategori (Nama, Status) VALUES ('$kategoriBuku','$status')";

$eksekusi = mysqli_query($koneksi, $perintah);

$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
    echo "<script>
        alert('data berhasil tersimpan');
    </script>";
    echo $redirectIndex;
} else {
    echo  "<script>
        alert('gagal tersimpan');
    </script>";
}
