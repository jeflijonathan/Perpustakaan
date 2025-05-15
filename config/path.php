<?php
function import($alias)
{
    $aliases = [
        '@components' => __DIR__ . '/../components',
        '@koneksi' => __DIR__ . '/../koneksi',
    ];

    foreach ($aliases as $key => $realpath) {
        if (str_starts_with($alias, $key)) {
            $path = str_replace($key, $realpath, $alias);
            if (file_exists($path)) {
                include $path;
            } else {
                echo "path not found";
            }
            return;
        }
    }
}
