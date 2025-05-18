<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

$IDPeminjam  = $_GET["ID_Peminjaman"];
$IDBuku  = $_GET["ID_Buku"];
$status = $_POST["Status"];

include "../../koneksi/koneksi.php";

$perintah  = "UPDATE tb_peminjaman SET Status = '$status' WHERE ID_Peminjaman = '$IDPeminjam'";
$eksekusi = mysqli_query($koneksi, $perintah);
$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {

    if ($status == "Dikembalikan" || $status == "Dibatalkan") {
        $perintahUpdateStok = "UPDATE tb_buku SET Stok = Stok + 1 WHERE ID_Buku = '$IDBuku'";
        $eksekusiStok = mysqli_query($koneksi, $perintahUpdateStok);
    }

    echo "<script>alert('data berhasil tersimpan');</script>";
    echo $redirectIndex;
} else {
    echo "<script>alert('gagal tersimpan');</script>";
}
