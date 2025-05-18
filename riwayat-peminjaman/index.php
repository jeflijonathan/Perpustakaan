<?php
include '../Layouts/layout.php';

function getStatusColorButton($status)
{
    if ($status == "Dipinjam") {
        return "btn-warning";
    } else if ($status == "Dikembalikan") {
        return "btn-success";
    } else if ($status == "Dibatalkan") {
        return "btn-danger";
    }
    return "";
}

ob_start()
?>
<div class=" mt-3 mb-3 d-flex justify-content-start align-items-center ">
    <h3 class="mt-3 mb-3 h-100 col-5">Riwayat Peminjaman</h3>
    <form action="" method="GET" class="col-lg-2  col-4 ms-auto d-flex justify-content-end align-items-center gap-2">
        <input type="search" name="search" value="<?= $_GET["search"] ?? "" ?>" class="form-control col-1" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<div class="row mt-3 mb-3 justify-content-center align-items-center gap-3">
    <?php
    $search = $_GET['search'] ?? "";
    $requestSearch = "";
    if ($search) {
        $requestSearch = " WHERE a.Nama_Anggota LIKE '%" . $_GET['search'] . "%'";
    }

    $perintah  = "SELECT *, p.Status as 'Status_Pinjaman' FROM tb_peminjaman p 
        JOIN tb_anggota a ON a.ID_Anggota = p.ID_Anggota 
        JOIN tb_buku b ON b.ID_Buku = p.ID_Buku
    " . $requestSearch;

    $hasil = mysqli_query($koneksi, $perintah);

    foreach ($hasil as $data) {
    ?>
        <div class="card col-8" style="width: 45%;">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th scope="col">ID Peminjaman</th>
                        <td>:</td>
                        <td><?= $data["ID_Peminjaman"] ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal Peminjam</th>
                        <td>:</td>
                        <td><?= $data["Tanggal_Pinjam"] ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal Kembali</th>
                        <td>:</td>
                        <td><?= $data["Tanggal_Kembali"] ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">ID Anggota</th>
                        <td>:</td>
                        <td><?= $data["ID_Anggota"] ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">Nama Anggota</th>
                        <td>:</td>
                        <td><?= $data["Nama_Anggota"] ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">Email </th>
                        <td>:</td>
                        <td><?= $data["Email"] ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">Judul Buku Dipinjam</th>
                        <td>:</td>
                        <td><?= $data["Judul"] ?></td>
                        <td><a href="../buku/index.php?ID=<?= $data["ID_Buku"] ?>" class="btn btn-primary">Lihat Buku</a></td>
                    </tr>
                    <tr>
                        <th scope="col">Created_At</th>
                        <td>:</td>
                        <td><?= $data["Created_At"] ?></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="col">Updated_At</th>
                        <td>:</td>
                        <td><?= $data["Updated_At"] ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">Status</th>
                        <td>:</td>
                        <td><button class="btn <?= getStatusColorButton($data["Status_Pinjaman"]) ?>">
                                <?= $data["Status_Pinjaman"] ?? "" ?>
                            </button>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>

    <?php
    }
    ?>
</div>

<?php

$partial = ob_get_clean();
$layout = new Layout(
    $partial,
    'List Riwayat Peminjaman',
    'riwayat peminjaman'
);

echo $layout->render();
