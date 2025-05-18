<?php
include '../../Layouts/layout.php';

$idBuku = $_GET["ID_Buku"] ?? null;

$requestGetPenulis = "SELECT * FROM tb_penulis WHERE Status = '1'";
$queryPenulis = mysqli_query($koneksi, $requestGetPenulis);

function fetchPenulis($queryPenulis)
{
    $html = '';
    while ($data = mysqli_fetch_array($queryPenulis)) {
        $html .= <<<HTML
            <option value="{$data['ID_Penulis']}">{$data['Nama_Penulis']}</option>
        HTML;
    }
    return $html;
}

ob_start();
?>

<div class="row mt-3 mb-3 text-capitalize">
    <a href="../index.php" class="nav-link text-gray">Click back | List Penulis Buku</a>
</div>

<div class="row mt-3 mb-3 justify-content-center">
    <div class="card p-0">
        <form action="proses/ProsesDaftar.php" method="POST">

            <div class="card-header">
                <h3>Form Pendaftaran Penulis Buku</h3>
            </div>
            <div class="card-body">

                <div class="mb-3">
                    <label for="penulis">Pilih Penulis</label>

                    <select class="form-select mt-2 mb-2" id="penulis" name="ID_Penulis" required>
                        <option disabled value="" selected>-- Pilih Penulis --</option>
                        <?= fetchPenulis($queryPenulis) ?>
                    </select>
                </div>


                <input type="hidden" name="ID_Buku" value="<?= $idBuku ?>">

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
$layout = new Layout($partial, 'Tambah Penulis Buku', 'buku');
echo $layout->render();
?>