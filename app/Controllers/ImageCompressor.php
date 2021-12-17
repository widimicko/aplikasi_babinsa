<?php

namespace App\Controllers;

use Eihror\Compress\Compress;

class ImageCompressor extends BaseController
{

  // @var new_name_image
  public $new_name_image;

  public function __construct($directory, $uploadedFileName) {
    // Quality Compression
    $filePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .'image/'.$directory.'/' . $uploadedFileName;

    $file = $filePath; //file that you wanna compress
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
    $this->new_name_image = $directory. '_'. uniqid(). '_compressed.'. $extension; //name of new file compressed
    $quality = 20; // Value that I chose
    $pngQuality = 9; // Exclusive for PNG files
    $destination = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .'image/'.$directory.'/'; //This destination must be exist on your project
    $maxsize = 5245330; //Set maximum image size in bytes. if no value given 5mb by default.

    $image_compress = new Compress($file, $this->new_name_image, $quality, $pngQuality, $destination, $maxsize);

    $image_compress->compress_image();

    return $this->new_name_image;
  }
}