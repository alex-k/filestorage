<?php
/**
 * Created by PhpStorm.
 * User: alexk
 * Date: 8/26/17
 * Time: 8:26 AM
 */

namespace Alexk\Storage;

interface Storage
{
    /**
     * @return string | null
     * @throws Exception\ReadException
     */
    public function read();

    /**
     * @param string $data
     * @return void
     * @throws Exception\WriteException
     */
    public function write($data);
}