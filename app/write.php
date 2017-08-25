<?php

list(, $filename) = $argv + [NULL];

if (!$filename) {
    exit (1);
}

$in = fopen("php://stdin", "rb");

file_put_contents("data/file",$in);