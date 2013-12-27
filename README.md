# SimpleThumbnail

Simple and lightweight PHP Class to create thumbnails.

## Getting Started

Import the class

```php
include 'SimpleThumbnail.php';
```

Instance the class, configure size, load image source and set name of thumbnail

```php
$simpleThumbnail = new SimpleThumbnail;
$simpleThumbnail->setWidth(250);
$simpleThumbnail->setHeight(250);
$simpleThumbnail->setQuality(100);
$simpleThumbnail->generate("image.png", "thumb.jpg");
```

## Methods

There are some methods that you must use to generate your thumbnail:

* **setWidth(_int $width_)**

Set width of thumbnail, parameter must be a integer value.

* **setHeight(_int $height_)**

Set height of thumbnail, parameter must be a integer value.

* **setQuality(_int $quality_)**

Set quality of thumbnail, parameter must be a integer value between 1 and 100..

* **generate(_string $sourceImage, string $thumbnailTarget_)**

This method will load original image from a source path given as string on the first parameter and will generate a thumbnail with the size and quality given on settings methods.

The Thumbnail will be saved on the path passed as string on the second parameter.


## About

Its just a class who load original image and generate a thumbnail with a size and quality given.

#### Why?

This class is designed to be a simple and lightweight way to create thumbnails.

The idea came from my need to generate thumbnails and many classes that I found on the internet had several features that are not necessary to generate a simple thumbnail.

#### Who?
Created by [Guilherme Farias](http://guilhermefarias.com.br/), a web developer from Brazil.

#### License?
SimpleThumbnail is released under the terms of the [MIT license](https://github.com/guilhermefarias/SimpleThumbnail/blob/master/MIT-LICENSE).
