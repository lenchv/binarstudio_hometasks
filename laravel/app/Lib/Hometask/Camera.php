<?php
namespace App\Lib\Hometask;

class Camera {
	private $mpixels;

	public function __construct($mpixels) {
		$this->mpixels = $mpixels;
	}

	public function getMpixels() {
		return (string)$this->mpixels . " megapixels";
	}
}