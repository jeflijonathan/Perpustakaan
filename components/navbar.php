<?php


class Navbar
{
    private string $activeName;
    private array $menu  = [
        [
            "label" => "bahasa",
            "url" =>  "/jefli/Perpustakaan/bahasa/index.php",
        ],
        [
            "label" => "buku",
            "url" => "/jefli/Perpustakaan/buku/index.php",
        ],
    ];

    public function __construct($activeName)
    {
        $this->activeName = $activeName;
    }

    private function getActiveName(string $label): string
    {
        if ($label == $this->activeName) {
            return "active";
        }
        return "";
    }
    private function printMenu()
    {
        $html = '';
        foreach ($this->menu as $item) {
            $active = $this->getActiveName($item['label']);
            $html .= <<<HTML
            <li class="nav-item">
                <a class="nav-link $active" aria-current="page" href="{$item['url']}">{$item['label']} </a>
            </li>
        HTML;
        }
        return $html;
    }

    public function showNavbar(): string
    {

        return <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Perpustakaan</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          {$this->printMenu()}
                        </ul>
                    </div>
                </div>
            </nav>
        HTML;
    }
}
