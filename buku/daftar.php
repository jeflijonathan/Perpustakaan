<?php
include '../Layouts/layout.php';

$penerbit = mysqli_query($koneksi, "SELECT * FROM tb_penerbit WHERE Status='1'");
$bahasa = mysqli_query($koneksi, "SELECT * FROM tb_bahasa WHERE Status='1'");
$kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE Status='1'");

ob_start()

?>

<div class="row mt-3 mb-3 text-capitalize">
    <a href="index.php" class="nav-link text-gray">Click back | List Buku</a>
</div>

<div class="row mt-3 mb-3 justify-content-center">
    <div class="card p-0">
        <form action="proses/ProsesDaftar.php" method="POST">
            <div class="card-header">
                <h3>Form Tambah Buku</h3>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Buku" required />
                    <label for="judul">Judul</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Penerbit" id="ID_Penerbit" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Penerbit --</option>
                        <?php while ($data = mysqli_fetch_array($penerbit)) : ?>
                            <option value="<?= $data['ID_Penerbit'] ?>"><?= $data['Nama_Penerbit'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="ID_Penerbit">Penerbit</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Bahasa" id="ID_Bahasa" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Bahasa --</option>
                        <?php while ($data = mysqli_fetch_array($bahasa)) : ?>
                            <option value="<?= $data['ID_Bahasa'] ?>"><?= $data['Nama_Bahasa'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="ID_Bahasa">Bahasa</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Kategori" id="ID_Kategori" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <?php while ($data = mysqli_fetch_array($kategori)) : ?>
                            <option value="<?= $data['ID_Kategori'] ?>"><?= $data['Nama'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="ID_Kategori">Kategori</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" id="stok" name="stok" class="form-control" placeholder="Stok" required />
                    <label for="stok">Stok</label>
                </div>
            </div>

            <div class="card-footer">
                <button type="reset" class="btn btn-danger">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <div class="card p-0">
        <form action="proses/ProsesDaftar.php" method="POST">
            <div class="card-header">
                <h3>Form Tambah Buku</h3>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Buku" required />
                    <label for="judul">Judul</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Penerbit" id="ID_Penerbit" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Penerbit --</option>
                        <?php while ($data = mysqli_fetch_array($penerbit)) : ?>
                            <option value="<?= $data['ID_Penerbit'] ?>"><?= $data['Nama_Penerbit'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="ID_Penerbit">Penerbit</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Bahasa" id="ID_Bahasa" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Bahasa --</option>
                        <?php while ($data = mysqli_fetch_array($bahasa)) : ?>
                            <option value="<?= $data['ID_Bahasa'] ?>"><?= $data['Nama_Bahasa'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="ID_Bahasa">Bahasa</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="ID_Kategori" id="ID_Kategori" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <?php while ($data = mysqli_fetch_array($kategori)) : ?>
                            <option value="<?= $data['ID_Kategori'] ?>"><?= $data['Nama'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="ID_Kategori">Kategori</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" id="stok" name="stok" class="form-control" placeholder="Stok" required />
                    <label for="stok">Stok</label>
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
    'Daftar Buku',
    'buku'
);

echo $layout->render();
