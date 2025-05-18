<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

$namaPenulis = $_POST["nama"];
$email = $_POST["email"];
$no_telp = $_POST["no_tlp"];
$status = true;

include "../../koneksi/koneksi.php";

$perintah  = "INSERT INTO tb_penulis (Nama_Penulis, Email, No_Telepon, Status) VALUES('$namaPenulis', '$email', '$no_telp', '$status')";
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
