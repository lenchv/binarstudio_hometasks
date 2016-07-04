<?php declare(strict_types=1);
namespace Logger;
/**
 * @package Logger
 * 
 */
interface ILogger {
	public function log(string $operator, int $result, int $operand1, int $operand2);
}