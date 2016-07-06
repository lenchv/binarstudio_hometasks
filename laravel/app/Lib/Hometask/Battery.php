<?php
namespace App\Lib\Hometask;

class Battery {
	private $capacity;

	public function __construct($capacity) {
		$this->capacity = $capacity;
	}

	public function getCapacity() {
		return (string)$this->capacity . " mAh";
	}
}