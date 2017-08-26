<?php
include __DIR__.DIRECTORY_SEPARATOR.'bootstrap.php';

use Alexk\Storage\FileNameGenerator\HashTree;
use Alexk\Storage\FileStorage;

list(, $filename) = $argv + [NULL];

$in = fopen("php://stdin", "rb");

$storage = new FileStorage(new HashTree($filename));
$storage->write($in);
