# Google Cloud Storage PHP Wrapper

A PHP client library to handle google cloud storage files.

## Getting Started

Please use composer to install this
```
composer require srimaln91/google-bucket-php-wrapper
```

### Usage

Please find below a sample PHP snipprt

```
<?php

require __DIR__ . '/vendor/autoload.php';

use Gbucket\FS\FileSystem;
use Gbucket\CloudFiles\FileOperations;

$authFile = 'path/to/authfile.json';
$bucketName = 'bucketname';

$uploadFileName = 'upload/to/here/myfile.png';
$uploadFilePath = 'path/to/file.png';

$gBucket = new FileOperations($bucketName, $authFile);
$gBucket->uploadFile($uploadFileName, FileSystem::getContents($uploadFilePath));

```

## Authors

* **H.M.S.Nishahtha**
* Find me on [Gitlab](https://gitlab.com/srimaln91)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
