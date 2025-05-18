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

function getNamaPenerbit($koneksi, $id)
{
    $requestGetPenerbit =  "SELECT * FROM tb_penerbit WHERE ID_Penerbit = '$id'";

    $queryPenulis = mysqli_query($koneksi, $requestGetPenerbit);
    while ($data = mysqli_fetch_array($queryPenulis)) {
        return $data["Nama_Penerbit"];
    }
}

function getNamaKategori($koneksi, $id)
{
    $requestGetPenerbit =  "SELECT * FROM tb_kategori WHERE ID_Kategori = '$id'";

    $queryPenulis = mysqli_query($koneksi, $requestGetPenerbit);
    while ($data = mysqli_fetch_array($queryPenulis)) {
        return $data["Nama"];
    }
}

function getNamaBahasa($koneksi, $id)
{
    $requestGetBahasa =  "SELECT * FROM tb_bahasa WHERE ID_Bahasa = '$id'";

    $queryBahasa = mysqli_query($koneksi, $requestGetBahasa);
    while ($data = mysqli_fetch_array($queryBahasa)) {
        return $data["Nama_Bahasa"];
    }
}

function getPenulis($koneksi, $id)
{
    $requestGetPenulis = "
        SELECT p.Nama_Penulis 
        FROM tb_penulis_buku pb
        JOIN tb_penulis p ON p.ID_Penulis = pb.ID_Penulis
        WHERE pb.ID_Buku = '$id'
    ";

    $query = mysqli_query($koneksi, $requestGetPenulis);

    $penulis = [];
    while ($data = mysqli_fetch_assoc($query)) {
        $penulis[] = $data;
    }

    return $penulis;
}

function componentsButtonStatus($status)
{
    if ($status == '1') {
        return 'btn-success';
    } else {
        return 'btn-danger';
    }
}

ob_start()
?>

<div class="row mt-3 mb-3">
    <a href="daftar.php" class="btn btn-primary w-25">Tambah Buku</a>
</div>
<div class="row mt-3 mb-3">
    <h3>List Buku Perpustakaan</h3>
</div>
<div class="row mt-3 mb-3 gap-3 justify-content-center align-items-center">
    <?php
    $IDLihat = $_GET["ID"] ?? "";
    $getID = "";
    if ($IDLihat != "") {
        $getID =  " WHERE ID_Buku = '$IDLihat'";
    }
    $perintah  = "SELECT * FROM tb_buku" . $getID;
    $hasil = mysqli_query($koneksi, $perintah);
    $i = 1;

    foreach ($hasil as $data) {
        $dataPenulis =  getPenulis($koneksi, $data["ID_Buku"])
    ?>

        <div class="card col-lg-4 col-6">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th scope="col">id</th>
                        <td>:</td>
                        <td> <?= $data['ID_Buku'] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Judul Buku</th>
                        <td>:</td>
                        <td> <?= $data['Judul'] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Nama Penerbit</th>
                        <td>:</td>
                        <td> <?= getNamaPenerbit($koneksi, $data['Id_Penerbit']) ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Ketegori</th>
                        <td>:</td>
                        <td> <?= getNamaKategori($koneksi, $data['ID_Kategori']) ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Bahasa</th>
                        <td>:</td>
                        <td> <?= getNamaBahasa($koneksi, $data['ID_Bahasa']) ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Stok</th>
                        <td>:</td>
                        <td> <?= $data["Stok"] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Penulis</th>
                        <td>:</td>
                        <td> <?= implode(', ', array_column($dataPenulis, 'Nama_Penulis')) ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Status</th>
                        <td>:</td>
                        <td><button class="btn <?= componentsButtonStatus($data["Status"]) ?>"><?= printStatus($data["Status"]) ?></button></td>
                    </tr>
                    <tr>
                        <th scope="col">Created at</th>
                        <td>:</td>
                        <td> <?= $data["Created_At"] ?></td>
                    </tr>
                    <tr>
                        <th scope="col">Updated At</th>
                        <td>:</td>
                        <td> <?= $data["Updated_At"] ?></td>
                    </tr>
                    </tr>

                </table>

            </div>
            <div class="card-footer">
                <div class="flex gap-4 flex-warp justify-content-center">
                    <a href="penulis-buku/daftar.php?ID_Buku=<?= $data['ID_Buku'] ?>" class="btn btn-primary col">Tambah Penulis Buku</a>
                    <a
                        href="ubah.php?ID_Buku=<?= $data['ID_Buku']; ?>"
                        class="btn btn-warning col">
                        Ubah
                    </a>
                </div>

            </div>
        </div>

    <?php
        $i++;
    }
    ?>
</div>

<?php

$partial = ob_get_clean();
$layout = new Layout(
    $partial,
    'List Buku',
    'buku'
);

echo $layout->render();
