<?php

list(, $filename) = $argv + [NULL];


if (!$filename) {
    exit (1);
}

$in = fopen("data/file", "rb");
$out = fopen("php://stdout", "w");

while (!feof($in)) {
    fwrite($out,fread($in,8192));
}