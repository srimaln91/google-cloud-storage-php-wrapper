<?php

namespace Gbucket\CloudFiles;

class FileOperations
{
    /**
     * Google cloud bucket object
     */
    private $Gbucket;

    /**
     * Class cinstructor
     * @param $gBucket Google cloud bucket object
     */
    public function __construct($gBucket)
    {
        $this->Gbucket = $gBucket;
    }

    public function uploadFile($filePath, $publicAccess = true)
    {

        $options = [];
        if ($publicAccess == true) {
            $options['predefinedAcl'] = 'publicRead';
        }
        try {
            $this->Gbucket->upload(fopen($filePath, 'r'), $options);
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
