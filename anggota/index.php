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
ob_start()
?>

<div class="row mt-3 mb-3">
    <a href="daftar.php" class="btn btn-primary w-25">Tambah Anggota</a>
</div>
<div class="row mt-3 mb-3">
    <h3>List Anggota</h3>
</div>
<div class="row mt-3 mb-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Anggota</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Email</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $perintah  = "SELECT * FROM tb_anggota";
            $hasil = mysqli_query($koneksi, $perintah);
            $i = 1;

            foreach ($hasil as $data) {
            ?>

                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $data["ID_Anggota"] ?></td>
                    <td><?= $data["Nama_Anggota"] ?></td>
                    <td><?= $data["Email"] ?></td>
                    <td><?= $data["No_Telepon"] ?></td>
                    <td><?= printStatus($data["Status"]) ?? "" ?></td>
                    <td><?= $data["Created_At"] ?></td>
                    <td><?= $data["Updated_At"] ?></td>
                    <td><a class="btn btn-warning" href=<?= "ubah.php?id=" . $data["ID_Anggota"] ?>>Ubah</a></td>
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
    'List Anggota',
    'anggota'
);

echo $layout->render();
