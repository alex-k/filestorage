<?php
include __DIR__.DIRECTORY_SEPARATOR.'bootstrap.php';

use Alexk\Storage\FileNameGenerator\OneFile;
use Alexk\Storage\FileStorage;

list(, $filename) = $argv + [NULL];

$out = fopen("php://stdout", "w");

$storage = new FileStorage(new OneFile($filename));
$storage->read($out);