<?php
$options = [
    'ssl' => [
        'verify_peer'      => false,
        'verify_peer_name' => false
    ]
];

$context = stream_context_create($options);
$content = file_get_contents('../index.php', false, $context);

echo $content;

