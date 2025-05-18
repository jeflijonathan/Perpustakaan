<?php
include  "../../koneksi/koneksi.php";


$ID_Penulis = $_GET["ID_Penulis"];
$ID_Buku = $_GET["ID_Buku"];
echo $ID_Penulis . $ID_Buku;
$redirectIndex = "<meta http-equiv='refresh' content='0; url=../ubah.php?ID_Buku=$ID_Buku'>";
$perintah  = "DELETE FROM tb_penulis_buku WHERE ID_Penulis = '$ID_Penulis' AND ID_Buku = '$ID_Buku'";
$query = mysqli_query($koneksi, $perintah);

$cek = mysqli_affected_rows($koneksi);

if ($cek > 0) {
    echo "<script>
        alert('data berhasil terhapus');
    </script>";
    echo $redirectIndex;
} else {
    echo  "<script>
        alert('gagal terhapus');
    </script>";
}
