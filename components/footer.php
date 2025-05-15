<?php
class Footer
{
    public function showFooter(): string
    {
        $html = <<<HTML
            <footer>
                <p class="text-center">
                    &copy;Copyright by Perpustakaan
                </p>
            </footer>
        HTML;
        return $html;
    }
}
