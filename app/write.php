<?php
include __DIR__.DIRECTORY_SEPARATOR.'bootstrap.php';

use Alexk\Storage\FileNameGenerator\OneFile;
use Alexk\Storage\FileStorage;

list(, $filename) = $argv + [NULL];

$in = fopen("php://stdin", "rb");

$storage = new FileStorage(new OneFile($filename));
$storage->write($in);
