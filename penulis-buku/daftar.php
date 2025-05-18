<?php
include '../Layouts/layout.php';

$requestGetPenulis =  "SELECT * FROM tb_penulis WHERE Status = '1'";
$requestGetBuku =  "SELECT * FROM tb_buku WHERE Status = '1'";

$queryPenulis = mysqli_query($koneksi, $requestGetPenulis);
$queryBuku = mysqli_query($koneksi, $requestGetBuku);

function fetchPenulis($queryPenulis)
{
    while ($data = mysqli_fetch_array($queryPenulis)) {
        return <<<HTML
            <option value="{$data['ID_Penulis']}">{$data['Nama_Penulis']}</option>
        HTML;
    }
}
function fetchBuku($queryBuku)
{
    while ($data = mysqli_fetch_array($queryBuku)) {
        return <<<HTML
            <option value="{$data['ID_Buku']}">{$data['Judul']}</option>
        HTML;
    }
}
ob_start()

?>

<div class="row mt-3 mb-3 text-capitalize">
    <a href="index.php" class="nav-link text-gray">Click back | List Penulis Buku </a>
</div>

<div class="row mt-3 mb-3 justify-content-center">
    <div class="card p-0">
        <form action="proses/ProsesDaftar.php" method="POST">

            <div class="card-header">
                <h3>Form Pendaftaran Penulis Buku</h3>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <select class="form-select" id="penulis" name="id_penulis" aria-label="Default select example">
                        <?= fetchPenulis($queryPenulis) ?>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <label for="buku">buku</label>
                    <select class="form-select" id="buku" name="id_buku" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="reset" class="btn btn-danger">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>

<?php

$partial = ob_get_clean();
$layout = new Layout(
    $partial,
    'Daftar Penulis Buku',
    'penulis buku'
);

echo $layout->render();
