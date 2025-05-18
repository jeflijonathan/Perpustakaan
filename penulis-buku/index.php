<?php
include '../Layouts/layout.php';

function printStatus($status)
{
    if ($status == 1) {
        return 'Active';
    } else {
        return 'Inactive';
    }
    return "";
}
function fetchPenulis($koneksi, $id)
{
    $requestGetPenulis =  "SELECT * FROM tb_penulis WHERE ID_Penulis = '$id'";

    $queryPenulis = mysqli_query($koneksi, $requestGetPenulis);
    while ($data = mysqli_fetch_array($queryPenulis)) {
        return $data["Nama_Penulis"];
    }
}
function fetchBuku($koneksi, $id)
{
    $requestGetBuku =  "SELECT * FROM tb_buku WHERE ID_Buku = '$id'";

    $queryBuku = mysqli_query($koneksi, $requestGetBuku);
    while ($data = mysqli_fetch_array($queryBuku)) {
        return $data["Judul"];
    }
}
ob_start()
?>

<div class="row mt-3 mb-3">
    <a href="daftar.php" class="btn btn-primary w-25">Tambah Penulis</a>
</div>
<div class="row mt-3 mb-3">
    <h3>List Penulis</h3>
</div>
<div class="row mt-3 mb-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Penulis</th>
                <th scope="col">Buku</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $perintah  = "SELECT * FROM tb_penulis_buku";
            $hasil = mysqli_query($koneksi, $perintah);
            $i = 1;

            foreach ($hasil as $data) {
            ?>

                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= fetchPenulis($koneksi, $data["ID_Penulis"]) ?></td>
                    <td><?= fetchBuku($koneksi, $data["ID_Buku"]) ?></td>
                    <td>
                        <a class="btn btn-warning" href=<?= "ubah.php?idPenulis=" . $data["ID_Penulis"] . "?idBuku=" . $data["ID_Penulis"] ?>>Ubah</a>
                        <a class="btn btn-danger" href=<?= "/proses/hapus.php?idPenulis=" . $data["ID_Penulis"] . "?idBuku=" . $data["ID_Penulis"] ?>>Ubah</a>
                    </td>
                </tr>

            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php

$partial = ob_get_clean();
$layout = new Layout(
    $partial,
    'List Penulis Buku',
    'penulis buku'
);

echo $layout->render();
