<?php
include '../Layouts/layout.php';

$requestAnggota = "SELECT * FROM tb_anggota WHERE Status = '1'";
$eksekusiAnggota = mysqli_query($koneksi, $requestAnggota);

$requestBuku = "SELECT * FROM tb_buku WHERE Status = '1'";
$eksekusiBuku = mysqli_query($koneksi, $requestBuku);
ob_start()

?>

<div class="row mt-3 mb-3 text-capitalize">
    <a href="index.php" class="nav-link text-gray">Click back | List Peminjaman Buku </a>
</div>

<div class="row mt-3 mb-3 justify-content-center">
    <div class="card p-0">
        <form action="proses/ProsesDaftar.php" method="POST">
            <div class="card-header">
                <h3>Form Tambah Peminjaman Buku</h3>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control" required />
                    <label for="email" class="form-floatingInput">Tanggal Kembali</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="ID_Anggota" id="anggota" class="form-select" required>
                        <option value="" disabled>-- Pilih Anggota --</option>
                        <?php while ($data = mysqli_fetch_array($eksekusiAnggota)) : ?>
                            <option value="<?= $data['ID_Anggota'] ?>"><?= $data['Nama_Anggota'] ?></option>
                        <?php endwhile; ?>

                    </select>
                    <label for="anggota" class="form-floatingInput">Anggota</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="ID_Buku" id="buku" class="form-select" required>
                        <option value="" disabled>-- Pilih Buku --</option>
                        <?php while ($data = mysqli_fetch_array($eksekusiBuku)) : ?>
                            <option value="<?= $data['ID_Buku'] ?>"><?= $data['Judul'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label for="buku" class="form-floatingInput">Buku</label>
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
    'Peminjaman Buku',
    'peminjaman buku'
);

echo $layout->render();
