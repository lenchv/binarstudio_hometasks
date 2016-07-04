<?php declare(strict_types=1);
namespace Math;
use Logger\ILogger;
/**
 * @package Math 
 */
class Calculator {
	private $logger;

	/**
	 * Constructor of calculator class
	 * @param ILogger $logger object of log
	 */
	public function __construct(ILogger $logger = null) {
		$this->logger = $logger ?? new class implements ILogger {
			public function log(string $operator, int $result, int $operand1, int $operand2 = 0) {
				file_put_contents(__DIR__ . "/log.txt", date("Y.d.m H:i:s") . "\t" . $operator . "\t" . $operand1 . "\t" . $operand2 . "\t" . $result . "\n", FILE_APPEND);
			}
		};
	}

	/**
	 * Multiple
	 * @param int $a - multplient
	 * @param int $b - multiplier
	 * @return int product
	 * @throws \OverflowException, \TypeError 
	 */
	public function mul(int $a, int $b): int 
	{
		$c = $a * $b;
		if ($c > PHP_INT_MAX || $c < -(PHP_INT_MAX - 1)) {
			throw new \OverflowException("Value " . $c . " overflow integer size");
		}
		$this->logger->log(__METHOD__, $c, $a, $b);
		return $c;
	}

	/**
	 * Addition
	 * @param int $a - term
	 * @param int $b - term
	 * @return int sum
	 * @throws \OverflowException, \TypeError 
	 */
	public function add(int $a, int $b): int 
	{
		$c = $a + $b;

		if ($c > PHP_INT_MAX || $c < -(PHP_INT_MAX - 1)) {
			throw new \OverflowException("Value " . $c . " overflow integer size");
		}
		$this->logger->log(__METHOD__, $c, $a, $b);
		return $c;
	}
	
	/**
	 * Subtract
	 * @param int $a - decrease
	 * @param int $b - subtract
	 * @return int difference
	 * @throws \OverflowException, \TypeError 
	 */
	public function sub(int $a, int $b): int 
	{
		$c = $a - $b;
		
		if ($c < -(PHP_INT_MAX - 1)) {
			throw new \OverflowException("Value " . $c . " overflow integer size");
		}
		$this->logger->log(__METHOD__, $c, $a, $b);
		return $c;
	}

	/**
	 * Division
	 * @param int $a - dividend
	 * @param int $b - divider
	 * @return int result
	 * @throws \DivisionByZero, \TypeError 
	 */
	public function div(int $a, int $b): int 
	{
		if ($b === 0) {
			throw new \DivisionByZeroError("Division by zero");
		}

		$c = (int)($a / $b);
		
		$this->logger->log(__METHOD__, $c, $a, $b);
		return $c;
	}

	/**
	 * Binary power
	 * @param int $coef - degree coefficient
	 * @return int result
	 * @throws \OverflowException, \TypeError 
	 */
	public function binPower(int $coef): int
	{
		$c = 2**$coef;
		
		if ($c > PHP_INT_MAX || $c < -(PHP_INT_MAX - 1)) {
			throw new \OverflowException("Value " . $c . " overflow integer size");
		}
		$this->logger->log(__METHOD__, $c, 2, $coef);
		return $c;
	}
}