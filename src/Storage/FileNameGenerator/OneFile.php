<?php
/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 8/26/17
 * Time: 9:01 AM
 */

namespace Alexk\Storage\FileNameGenerator;


use Alexk\Storage\Exception\InvalidFileNameException;
use Alexk\Storage\FileNameGenerator;

class OneFile implements FileNameGenerator
{
    /** @var  string */
    private $filename;

    /**
     * HashTree constructor.
     * @param string $filename
     */
    public function __construct($filename)
    {
        self::validate($filename);
        $this->filename = $filename;
    }

    /**
     * @param string $filename
     */
    private static function validate($filename) {
        if (empty($filename)) {
            throw new InvalidFileNameException($filename);
        }
    }

    public function getPath()
    {
        return 'data'.DIRECTORY_SEPARATOR.'file';
    }

}