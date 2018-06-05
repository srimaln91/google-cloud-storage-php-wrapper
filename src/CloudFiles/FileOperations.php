<?php

namespace Gbucket\CloudFiles;

use Google\Cloud\Storage\StorageObject;
use Gbucket\Authenticate\GoogleAuthenticate;
use Gbucket\FS\FileSystem;

class FileOperations
{
    /**
     * Google cloud bucket object
     */
    private $Gbucket;

    private $bucketName;

    protected $authFileContent;

    /**
     * Class constructor
     * @param Google\Cloud\Storage\Bucket $gBucket
     */
    public function __construct($bucketName, $authFile)
    {
        $this->bucketName = $bucketName;
        $this->authFileContent = FileSystem::getContents($authFile);
        $this->Gbucket = $this->initializeApi();
    }

    private function initializeApi()
    {
        $auth = new GoogleAuthenticate($this->authFileContent);
        $storage = $auth->authenticate();
        $bucket = $storage->bucket($this->bucketName);

        return $bucket;
    }

    /**
     * Upload an asset
     *
     * @param string $filename
     * @param string $contents
     * @param boolean $publicAccess
     * @return Google\Cloud\Storage\StorageObject
     */
    public function uploadFile($filename, $contents, $publicAccess = true)
    {

        $options = [];
        if ($publicAccess == true) {
            $options['predefinedAcl'] = 'publicRead';
        }

        if ($contents == false) {
            throw new \Exception('Empty file contents');
            return false;
        }
        if ($filename == false) {
            throw new \Exception("Empty filename");
            return false;
        }

        $options['name'] = $filename;
        return $this->Gbucket->upload($contents, $options);
    }
}
