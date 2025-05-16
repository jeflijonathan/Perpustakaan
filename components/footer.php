<?php
class Footer
{
    public function showFooter(): string
    {
        $html = <<<HTML
            <footer class="mt-auto">
                <p class="text-center">
                    &copy;Copyright by Perpustakaan
                </p>
                
            </footer>
        HTML;
        return $html;
    }
}
