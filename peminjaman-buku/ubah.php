<?php
include '../Layouts/layout.php';


$IDPeminjam = $_GET["ID_Peminjam"];

$requestByIDPeminjam = "SELECT Status, ID_Buku FROM tb_peminjaman WHERE ID_Peminjaman = $IDPeminjam";
$eksekusiPeminjam = mysqli_query($koneksi, $requestByIDPeminjam);
$fetchPeminjam = mysqli_fetch_array($eksekusiPeminjam);

$dataStatus = ["Dipinjam", "Dibatalkan", "Dikembalikan"];

function handleSelected($value, $selectedValue)
{
    if ($value == $selectedValue) {
        return 'selected';
    } else {
        return '';
    }
}

ob_start();
?>

<div class="row mt-3 mb-3 text-capitalize">
    <a href="index.php" class="nav-link text-gray">Click back | List Peminjaman Buku</a>
</div>

<div class="row mt-3 mb-3 justify-content-center">
    <div class="card p-0">
        <form action="proses/ProsesUpdate.php?ID_Peminjaman=<?= $IDPeminjam ?>&ID_Buku=<?= $fetchPeminjam["ID_Buku"] ?>" method="POST">
            <div class="card-header">
                <h3>Form Update Peminjaman Buku</h3>
            </div>
            <div class="card-body">

                <div class="form-floating mb-3">
                    <select name="Status" id="status" class="form-select" required>
                        <option value="" disabled>-- Pilih Status --</option>
                        <?php foreach ($dataStatus as $data) : ?>
                            <option value="<?= $data ?>" <?= handleSelected($data, $fetchPeminjam['Status']) ?>>
                                <?= $data ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="status" class="form-floatingInput">Status</label>
                </div>
                <input type="hidden" name="ID_Peminjam" value="<?= $IDPeminjam ?>">
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
    'Peminjaman Buku',
    'peminjaman buku'
);
echo $layout->render();
?>