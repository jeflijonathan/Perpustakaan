<?php
include '../config/path.php';
import('@components/navbar.php');
import('@components/footer.php');

class Layout
{
    private string $partials;
    private string $titlePage;
    private string $activePage;

    public function __construct($partials, $titlePage, $activePage)
    {
        $this->partials = $partials;
        $this->titlePage = $titlePage;
        $this->activePage = $activePage;
    }

    function render(): string
    {
        $navbar =  new Navbar($this->activePage);
        $footer = new Footer();
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $this->titlePage ?></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </head>

        <body>
            <?= $navbar->showNavbar(); ?>
            <div class="container">
                <?= $this->partials ?>
            </div>
            <?= $footer->showFooter(); ?>

        </body>

        </html>
<?php
        return ob_get_clean();
    }
}
?>