<?php
namespace App\Lib\Hometask;

class Cpu {
	private $vendor;
	private $cores;

	public function __construct($vendor, $cores) {
		$this->vendor = $vendor;
		$this->cores = $cores;
	}

	public function getVendor() {
		return $this->vendor;
	}

	public function getCores() {
		return $this->cores;
	}

	public function toString() {
		return $this->getVendor() . " " . $this->getCores() . " cores";
	}
}