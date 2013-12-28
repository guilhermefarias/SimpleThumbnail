<?php
namespace SThumb;

class SimpleThumbnail
{
    private $_width;
    private $_height;
    private $_quality;

    public function setWidth($width)
    {
        $this->_width = $width;
        return $this;
    }

    public function setHeight($height)
    {
        $this->_height = $height;
    }

    public function setQuality($quality)
    {
        $this->_quality = $quality;
    }

    public function generate($sourceImage, $targetImage)
    {
        $image = imagecreatefromstring(file_get_contents($sourceImage));

        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);

        $thumbWidth = isset($this->_width) ? $this->_width : $imageWidth;
        $thumbHeight = isset($this->_height) ? $this->_height : $imageHeight;
        $thumbQuality = isset($this->_quality) ? $this->_quality : 90;

        $originalRatio = $imageWidth / $imageHeight;
        $thumbRatio = $thumbWidth / $thumbHeight;

        if ($originalRatio >= $thumbRatio) {
            $newHeight = $thumbHeight;
            $newWidth = $imageWidth / ($imageHeight / $thumbHeight);
        } else {
            $newWidth = $thumbWidth;
            $newHeight = $imageHeight / ($imageWidth / $thumbWidth);
        }

        $horizontalOffset = 0 - ($newWidth - $thumbWidth) / 2;
        $verticalOffset = 0 - ($newHeight - $thumbHeight) / 2;

        $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

        imagecopyresampled($thumb, $image, $horizontalOffset, $verticalOffset, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);

        imagejpeg($thumb, $targetImage, $thumbQuality);
    }
}
