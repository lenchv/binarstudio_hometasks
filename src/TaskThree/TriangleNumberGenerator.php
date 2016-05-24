<?php
namespace TaskThree;

class TriangleNumberGenerator {
	public static function getNext() {
		for ($n = 0; $n < 15; ++$n) {
			yield $n * ($n + 1) / 2;
		}
	}
}