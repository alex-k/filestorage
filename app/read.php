<?php
include __DIR__.DIRECTORY_SEPARATOR.'bootstrap.php';

use Alexk\Storage\FileNameGenerator\HashTree;
use Alexk\Storage\FileStorage;

list(, $filename) = $argv + [NULL];

$out = fopen("php://stdout", "w");

$storage = new FileStorage(new HashTree($filename), 'data');
$storage->read($out);