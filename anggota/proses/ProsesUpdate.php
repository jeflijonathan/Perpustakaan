<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

include "../../koneksi/koneksi.php";

$id = $_GET["id"] ?? print($redirectDaftar);
$nama = $_POST["nama"] ?? print($redirectDaftar);
$email = $_POST["email"] ?? print($redirectDaftar);
$noTelepon = $_POST["noTelepon"] ?? print($redirectDaftar);
$status = $_POST["status"] ?? print($redirectDaftar);

$perintah = "UPDATE tb_anggota SET Nama_Anggota='$nama', Email= '$email', No_Telepon='$noTelepon', status= '$status' WHERE ID_Anggota = '$id'";

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
