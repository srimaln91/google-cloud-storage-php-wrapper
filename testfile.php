<?php

require(__DIR__. '/vendor/autoload.php');

use Gbucket\Authenticate\GoogleAuthenticate;
use Gbucket\FS\FileSystem;
use Gbucket\CloudFiles\FileOperations;

$authFile = FileSystem::getContents(__DIR__ . '/temp/authfile.json');

$auth = new GoogleAuthenticate($authFile);
$storage = $auth->authenticate();

$bucket = $storage->bucket('static-dpl.3cs.technology');

$operations = new FileOperations($bucket);
$operations->uploadFile(__DIR__ . '/temp/test.txt');
