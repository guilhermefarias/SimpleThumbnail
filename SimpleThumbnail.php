<?php

class SimpleThumbnail {
	private $width;
	private $height;
	private $quality;

	function setWidth($width){
		$this->width = $width;
	}

	function setHeight($height){
		$this->height = $height;
	}

	function setQuality($quality){
		$this->quality = $quality;
	}

	function generate($sourceImage, $targetImage){
		$image = imagecreatefromstring(file_get_contents($sourceImage));

		$imageWidth = imagesx($image);
		$imageHeight = imagesy($image);

		$thumbWidth = isset($this->width) ? $this->width : $imageWidth;
		$thumbHeight = isset($this->height) ? $this->height : $imageHeight;
		$thumbQuality = isset($this->quality) ? $this->quality : 90;

		$originalRatio = $imageWidth / $imageHeight;
		$thumbRatio = $thumbWidth / $thumbHeight;

		if ( $originalRatio >= $thumbRatio ){
			$newHeight = $thumbHeight;
			$newWidth = $imageWidth / ($imageHeight / $thumbHeight);
		}
		else {
			$newWidth = $thumbWidth;
			$newHeight = $imageHeight / ($imageWidth / $thumbWidth);
		}

		$horizontalOffset = 0 - ($newWidth - $thumbWidth) / 2;
		$verticalOffset = 0 - ($newHeight - $thumbHeight) / 2;

		$thumb = imagecreatetruecolor( $thumbWidth, $thumbHeight );

		imagecopyresampled($thumb, $image, $horizontalOffset, $verticalOffset, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);

		imagejpeg($thumb, $targetImage, $thumbQuality);
	}
}
?>
