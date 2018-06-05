<?php

namespace Gbucket\FS;

use Symfony\Component\Filesystem\Filesystem as BaseFilesystem;
use Gbucket\Exceptions\FileNotFoundException;

class Filesystem extends BaseFilesystem
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $filename
     * @return mixed
     */
    public static function getContents($filepath)
    {
        if (!file_exists($filepath)) {
            throw new FileNotFoundException("Unable to find the specified file");
        }
        $contents = file_get_contents($filepath);

        if ($contents == false) {
            throw new FilePermissionErrorException("No permissions to read the file");
        }

        return $contents;
    }
}
