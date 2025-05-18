<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

$tanggalKembali = $_POST["tanggal_kembali"];
$ID_Anggota = $_POST["ID_Anggota"];
$ID_Buku = $_POST["ID_Buku"];
$status = "Dipinjam";

include "../../koneksi/koneksi.php";
$cekStok = "SELECT Stok FROM tb_buku WHERE ID_Buku = '$ID_Buku'";
$hasilCekStok = mysqli_query($koneksi, $cekStok);
$data = mysqli_fetch_array($hasilCekStok);
if ($data["Stok"] <= 0) {
    echo "<script>
        alert('Maaf Stok buku habis!!');
    </script>";
    echo $redirectIndex;
    exit();
}
$perintah  = "INSERT INTO tb_peminjaman (Tanggal_Pinjam, Tanggal_Kembali, ID_Anggota, ID_Buku, Status) 
VALUES(NOW(), '$tanggalKembali', '$ID_Anggota', '$ID_Buku','$status')";
$eksekusi = mysqli_query($koneksi, $perintah);

$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
    $perintahUpdateStok = "UPDATE tb_buku SET Stok = Stok - 1 WHERE ID_Buku = '$ID_Buku'";
    $eksekusiStok = mysqli_query($koneksi, $perintahUpdateStok);
    echo "<script>
        alert('data berhasil tersimpan');
    </script>";
    echo $redirectIndex;
} else {
    echo  "<script>
        alert('gagal tersimpan');
    </script>";
}
