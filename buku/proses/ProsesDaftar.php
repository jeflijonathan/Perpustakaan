<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

$judul = $_POST["judul"];
$ID_Penerbit = $_POST["ID_Penerbit"];
$ID_Bahasa = $_POST["ID_Bahasa"];
$ID_Kategori = $_POST["ID_Kategori"];
$stok = $_POST["stok"];
$status = true;

include "../../koneksi/koneksi.php";

$perintah  = "INSERT INTO tb_buku (Judul, ID_Penerbit, ID_Bahasa, ID_Kategori, Stok, Status) 
VALUES('$judul', '$ID_Penerbit', '$ID_Bahasa', '$ID_Kategori', '$stok', '$status')";
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
