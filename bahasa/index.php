<?php
include '../Layouts/layout.php';
$partial =  ob_start()
?>
<div class="row">
    <h1>List Bahasa</h1>
</div>
<?php
ob_get_clean();
$layout = new Layout(
    $partial,
    'List Bahasa',
    'bahasa'
);
