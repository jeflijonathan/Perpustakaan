<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../../index.php'>";


$penulis = $_POST["ID_Penulis"];
$buku = $_POST["ID_Buku"];

$status = true;

include "../../../koneksi/koneksi.php";
$cekDuplikat = mysqli_query($koneksi, "SELECT * FROM tb_penulis_buku WHERE ID_Penulis = '$penulis' AND ID_Buku = '$buku'");

if (mysqli_num_rows($cekDuplikat) > 0) {
    echo "<script>alert('Data gagal disimpan: Penulis sudah ada');</script>";
    echo $redirectIndex;
    return;
}

$perintah  = "INSERT INTO tb_penulis_buku (ID_Penulis, ID_Buku) VALUES('$penulis', '$buku')";
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
