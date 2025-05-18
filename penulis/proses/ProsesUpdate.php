<?php
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../index.php'>";
$redirectDaftar = "<meta http-equiv='refresh' content='0; url=../daftar.php'>";

include "../../koneksi/koneksi.php";

$id = $_GET["id"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$no_telp = $_POST["no_tlp"];
$status = $_POST["status"];

$perintah = "UPDATE tb_penulis SET Nama_Penulis='$nama', Status= '$status',Email= '$email', No_Telepon='$no_telp' WHERE ID_Penulis = '$id'";

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
