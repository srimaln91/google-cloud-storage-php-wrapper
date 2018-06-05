<?php

require(__DIR__. '/vendor/autoload.php');

use Gbucket\FS\FileSystem;
use Gbucket\CloudFiles\FileOperations;

$authFile = __DIR__ . '/temp/authfile.json';
$bucketName = 'static-dpl.3cs.technology';

$uploadFileName = '';
$uploadFilePath = __DIR__ . '/temp/screenshot.png';

$gBucket = new FileOperations($bucketName, $authFile);
$gBucket->uploadFile($uploadFileName, FileSystem::getContents($uploadFilePath));
