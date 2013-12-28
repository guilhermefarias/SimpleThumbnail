<?php
namespace SThumb;

include 'bootstrap.php';

use SThumb\SimpleThumbnail;

$simpleThumbnail = new SimpleThumbnail();
$simpleThumbnail->setWidth(250);
$simpleThumbnail->setHeight(250);
$simpleThumbnail->setQuality(100);
//$simpleThumbnail->generate("image.png", "thumb.jpg");

var_dump($simpleThumbnail);
