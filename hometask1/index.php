<?php 
require __DIR__ . "/vendor/autoload.php";
/*
echo Marvel\Asgard\Thor::whoami() . PHP_EOL;
echo Marvel\England\CaptainBritain::whoami() . PHP_EOL;
echo Marvel\Illinois\Beast::whoami() . PHP_EOL;
echo Marvel\NewJersey\Wasp::whoami() . PHP_EOL;
echo Marvel\NewJersey\WonderMan::whoami() . PHP_EOL;
echo Marvel\NewYork\HankPym::whoami() . PHP_EOL;
echo Marvel\NewYork\IronMan::whoami() . PHP_EOL;

echo (new TaskTwo\Greeting)->say("Vova") . PHP_EOL;

foreach (TaskThree\TriangleNumberGenerator::getNext() as $triangle) {
	echo $triangle . PHP_EOL;
}
*/
class Application {
	use TaskTwo\RandomQuote;
	static $singleton = NULL;

	function __construct() {
		self::$singleton = $this;
	}
	public static function getInstance() {
		return self::$singleton;
	} 

	public function start() {
		echo $this->getQuote() . PHP_EOL;
	} 
}

(new Application)->start();
?>