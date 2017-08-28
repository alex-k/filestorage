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
     * @param resource $out
     * @return void
     * @throws Exception\ReadException
     */
    public function read($out);

    /**
     * @param resource $data
     * @return void
     * @throws Exception\WriteException
     */
    public function write($data);

    /**
     * @param resource $data
     * @return void
     * @throws Exception\WriteException
     */
    public function delete();
}