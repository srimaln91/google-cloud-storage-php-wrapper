<?php
namespace Gbucket\Authenticate;

use Google\Cloud\Storage\StorageClient;

class GoogleAuthenticate
{
    protected $authDetails;

    /**
     * Class constructor
     * @param $authFileContents
     */
    public function __construct($authFileContents)
    {
        $this->authDetails =  json_decode($authFileContents, true);
    }

    /**
     * Create google bucket service object
     */
    public function authenticate()
    {
        $storage = new StorageClient([
            'keyFile' => $this->authDetails
        ]);
        return $storage;
    }
}
