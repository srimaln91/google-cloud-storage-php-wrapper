<?php

namespace Gbucket\FS;

use Symfony\Component\Filesystem\Filesystem as BaseFilesystem;

class Filesystem extends BaseFilesystem
{
    /**
     * @param string $filename
     * @return mixed
     */
    public static function getContents($filepath)
    {
        return file_get_contents($filepath);
    }

    /**
     * @param string $filename
     * @param string $data
     * @param int $flags
     * @return int
     */
    public static function putContents($filepath, $data, $flags = FILE_APPEND)
    {
        return file_put_contents($filepath, $data, $flags);
    }
}
