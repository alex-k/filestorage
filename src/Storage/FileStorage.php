<?php
/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 8/26/17
 * Time: 8:38 AM
 */

namespace Alexk\Storage;


use Alexk\Storage\Exception\FileNotFoundException;

class FileStorage implements Storage
{
    /** @var  string */
    private $filename;


    public function __construct(FileNameGenerator $generator)
    {
        $this->filename = $generator->getPath();
    }

    public function read($out)
    {
        $in = fopen($this->filename, "rb");

        while (!feof($in)) {
            fwrite($out, fread($in, 8192));
        }
    }

    public function write($data)
    {
        file_put_contents($this->filename, $data);
    }

}