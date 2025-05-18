<?php
include '../Layouts/layout.php';


ob_start()

?>

<div class="row mt-3 mb-3 text-capitalize">
    <a href="index.php" class="nav-link text-gray">Click back | List Anggota </a>
</div>

<div class="row mt-3 mb-3 justify-content-center">
    <div class="card p-0">
        <form action="proses/ProsesDaftar.php" method="POST">

            <div class="card-header">
                <h3>Form Pendaftaran Anggota</h3>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Anggota..." />
                    <label for="nama" class="form-floatingInput">Nama Anggota</label>
                </div>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email..." />
                    <label for="email" class="form-floatingInput">Email</label>
                </div>
            </div>
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" id="noTelepon" name="noTelepon" class="form-control" placeholder="No Telepon..." />
                    <label for="noTelepon" class="form-floatingInput">No Telepon</label>
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
    'Daftar Anggota',
    'anggota'
);

echo $layout->render();