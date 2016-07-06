<?php
namespace App\Lib\Hometask;

class Smartphone {
	private $sName;
	private $CPU;
	private $display;
	private $camera;
	private $battery;

	public function __construct(
		$sName,
		Cpu $CPU,
		Display $display,
		Camera $camera,
		Battery $battery
	) 
	{
		$this->sName = $sName;
		$this->CPU = $CPU;
		$this->display = $display;
		$this->camera = $camera;
		$this->battery = $battery;
	}

	public function getInfo() {
		return $this->sName . ", " . $this->CPU->toString() . ", " . 
			$this->display->getResolution() . "display, " .
			$this->camera->getMpixels() . " camera, " .
			"battery capacity " . $this->battery->getCapacity();
	}
}