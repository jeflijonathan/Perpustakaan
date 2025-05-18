<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";
$id = $_GET["ID_Buku"];
$judul = $_POST["judul"];
$ID_Penerbit = $_POST["ID_Penerbit"];
$ID_Bahasa = $_POST["ID_Bahasa"];
$ID_Kategori = $_POST["ID_Kategori"];
$stok = $_POST["stok"];
$status = $_POST["status"];

include "../../koneksi/koneksi.php";

$perintah = "UPDATE tb_buku SET 
    Judul = '$judul', 
    ID_Penerbit = '$ID_Penerbit', 
    ID_Bahasa = '$ID_Bahasa', 
    ID_Kategori = '$ID_Kategori', 
    Stok = '$stok', 
    Status = '$status'
    WHERE ID_Buku = '$id'";

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
