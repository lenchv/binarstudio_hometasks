<?php declare(strict_types = 1);
require_once(__DIR__ . "/vendor/autoload.php");
use Math\Calculator;
use Logger\ILogger;

$calc = new Calculator(new class implements ILogger {
            public function log(string $operator, int $result, int $operand1, int $operand2 = 0) {
                file_put_contents(__DIR__ . "/log.txt", date("Y.d.m H:i:s") . "\t" . $operator . "\t" . $operand1 . "\t" . $operand2 . "\t" . $result . "\n", FILE_APPEND);
            }
        });
// success
try {
    echo $calc->mul(2, 15) . PHP_EOL;
    echo $calc->add(5, 15) . PHP_EOL;
    echo $calc->sub(5, 15) . PHP_EOL;
    echo $calc->div(5, 2) . PHP_EOL;
    echo $calc->binPower(8) . PHP_EOL;
    echo $calc->binPower(16) . PHP_EOL;
} 
catch (\TypeError $e) {
    echo $e->getMessage() . PHP_EOL;
}
catch (\DivisionByZeroError $e) {
    echo $e->getMessage() . PHP_EOL;
}
catch (\OverflowException $e) {
    echo $e->getMessage() . PHP_EOL;
}

// error
echo "Float mul int" . PHP_EOL;
try {
    echo $calc->mul(2.0, 15) . PHP_EOL;
} 
catch (\TypeError $e) {
    echo $e->getMessage() . PHP_EOL;
}

echo "Int add string" . PHP_EOL;
try {
    echo $calc->add(2, "15") . PHP_EOL;
} 
catch (\TypeError $e) {
    echo $e->getMessage() . PHP_EOL;
}

echo "Array sub float" . PHP_EOL;
try {
    echo $calc->sub([2], 2.5) . PHP_EOL;
} 
catch (\TypeError $e) {
    echo $e->getMessage() . PHP_EOL;
}

echo "String div string" . PHP_EOL;
try {
    echo $calc->div("4", "2") . PHP_EOL;
} 
catch (\TypeError $e) {
    echo $e->getMessage() . PHP_EOL;
}

echo "Int div zero" . PHP_EOL;
try {
    echo $calc->div(2, 0) . PHP_EOL;
} 
catch (\DivisionByZeroError $e) {
    echo $e->getMessage() . PHP_EOL;
}

echo "Overflow sub" . PHP_EOL;
try {
    echo $calc->sub(-(PHP_INT_MAX - 1), PHP_INT_MAX) . PHP_EOL;
}
catch (\OverflowException $e) {
    echo $e->getMessage() . PHP_EOL;
}