<?php
include '../Layouts/layout.php';

$id = $_GET["ID_Buku"];

$penerbit = mysqli_query($koneksi, "SELECT * FROM tb_penerbit WHERE Status = '1'");
$bahasa = mysqli_query($koneksi, "SELECT * FROM tb_bahasa WHERE Status = '1'");
$kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE Status = '1'");
$getPenulis  = mysqli_query($koneksi, "SELECT * FROM tb_penulis_buku pb
JOIN tb_penulis p on P.ID_Penulis =  pb.ID_penulis
WHERE pb.ID_buku = '$id'");
$perintah = "SELECT * FROM tb_buku WHERE ID_Buku = '$id'";
$eksekusi = mysqli_query($koneksi, $perintah);
$dataBuku = mysqli_fetch_array($eksekusi);

if (!$dataBuku) {
    die("Data buku dengan ID '$id' tidak ditemukan.");
}

function handleActiveOptionStatus($status, $activeStatus)
{
    $statusSelected = '';
    if ($activeStatus == $status) {
        $statusSelected = 'checked';
    }
    return $statusSelected;
}

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
    <a href="index.php" class="nav-link text-gray">Click back | List Buku </a>
</div>

<div class="row mt-3 mb-3 justify-content-center">
    <div class="card p-0">
        <form action=<?= "proses/ProsesUpdate.php?id=" . $dataBuku["ID_Buku"] ?> method="POST">

            <div class="card-header">
                <h3>Form Update Buku</h3>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" id="judul" value="<?= $dataBuku["Judul"] ?>" name="judul" class="form-control" placeholder="Judul Buku" required />
                    <label for="judul">Judul</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Penerbit" id="ID_Penerbit" class="form-select" required>
                        <option value="" disabled>-- Pilih Penerbit --</option>
                        <?php while ($data = mysqli_fetch_array($penerbit)) : ?>
                            <option
                                value="<?= $data['ID_Penerbit'] ?>">
                                <?= $data['Nama_Penerbit'] ?>
                            </option>
                        <?php endwhile; ?>

                    </select>
                    <label for="ID_Penerbit">Penerbit</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Bahasa" id="ID_Bahasa" class="form-select" required>
                        <option value="" disabled>-- Pilih Bahasa --</option>
                        <?php while ($data = mysqli_fetch_array($bahasa)) : ?>
                            <option value="<?= $data['ID_Bahasa'] ?>"><?= $data['Nama_Bahasa'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="ID_Bahasa">Bahasa</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Kategori" id="ID_Kategori" class="form-select" required>
                        <option value="" disabled>-- Pilih Kategori --</option>
                        <?php while ($data = mysqli_fetch_array($kategori)) : ?>
                            <option value="<?= $data['ID_Kategori'] ?>"><?= $data['Nama'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="ID_Kategori">Kategori</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" id="stok" name="stok" value="<?= $dataBuku["Stok"] ?>" class="form-control" placeholder="Stok" required />
                    <label for="stok">Stok</label>
                </div>

                <div class="form-group">
                    <label for="status">Status</label><br />
                    <input type="radio" id="status1" name="status" value="1" <?= handleActiveOptionStatus("1", $dataBuku["Status"]) ?> /> Active
                    <input type="radio" id="status0" name="status" value="0" <?= handleActiveOptionStatus("0", $dataBuku["Status"]) ?> /> Inactive
                </div>
            </div>

            <div class="card-footer">
                <button type="reset" class="btn btn-danger">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
    <div class="row mt-3">
        <h3>Penulis Buku</h3>
    </div>
    <div class="row gap-3 mt-3">
        <?php
        while ($data = mysqli_fetch_array($getPenulis)) {

        ?>
            <div class="card p-0 col-2">
                <div class="card-header d-flex flex-row-reverse">
                    <a href="proses/ProsesHapusPenulis.php?ID_Buku=<?= $data["ID_Buku"] ?>&ID_Penulis=<?= $data["ID_Penulis"] ?>" class="btn btn-danger">delete</a>
                </div>
                <div class="card-body">
                    <?= $data["Nama_Penulis"] ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</div>

<?php

$partial = ob_get_clean();
$layout = new Layout(
    $partial,
    'Update Buku',
    'buku'
);

echo $layout->render();
?>