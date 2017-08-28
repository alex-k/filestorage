<?php
/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 8/26/17
 * Time: 8:38 AM
 */

namespace Alexk\Storage;


use Alexk\Storage\Exception\ReadException;
use Alexk\Storage\Exception\WriteException;

class FileStorage implements Storage
{
    /** @var  string */
    private $filename;


    public function __construct(FileNameGenerator $generator, $dir_name = '.')
    {
        $this->filename = $dir_name.DIRECTORY_SEPARATOR.$generator->getPath();
    }

    public function read($out)
    {
        $in = fopen($this->filename, "rb");

        if (!$in) {
            throw new ReadException($this->filename);
        }

        while (!feof($in)) {
            fwrite($out, fread($in, 8192));
        }
    }

    public function write($data)
    {
        $dir_name = dirname($this->filename);
        if (!file_exists($dir_name)) {
            mkdir($dir_name,0777,true);
        }
        if (!file_put_contents($this->filename, $data)) {
            throw new WriteException($this->filename);
        }
    }

    public function delete()
    {
        if (!unlink($this->filename)) {
            throw new WriteException($this->filename);
        }
    }


}