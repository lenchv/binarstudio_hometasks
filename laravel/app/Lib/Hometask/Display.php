<?php
namespace App\Lib\Hometask;

class Display {
	private $width;
	private $height;

	public function __construct($width, $height) {
		$this->width = $width;
		$this->height = $height;
	}

	public function getResolution() {
		return $this->width . "x" . $this->height;
	}
}