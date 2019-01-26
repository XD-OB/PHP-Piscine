#!/usr/bin/php
<?php

function doop($s1, $s2, $val) {
	if ($val == 1)
		return ($s1 + $s2);
	if ($val == -1)
		return ($s1 - $s2);
	if ($val == 2)
		return ($s1 * $s2);
	if ($val == -2)
		return ($s1 / $s2);
	if ($val == 5)
		return ($s1 % $s2);
}

function is_oprt($val) {
	if ($val >= -2 && $val <= 2 || $val == 5)
		return 1;
	return 0;
}

if ($argc == 2) {
	$tab = array("o", "o", "o");
	$operation = trim(preg_replace('/(\s+)/', '', $argv[1]));
	if (strpos($operation, "+")) {
		$tab = explode("+", $operation);
		$tab[] = 1;		
	}
	else if (strpos($operation, "-")) {
		$tab = explode("-", $operation);
		$tab[] = -1;
	}
	else if (strpos($operation, "/")) {
		$tab = explode("/", $operation);
		$tab[] = -2;
	}
	else if (strpos($operation, "*")) {
		$tab = explode("*", $operation);
		$tab[] = 2;
	}
	else if (strpos($operation, "%")) {
		$tab = explode("%", $operation);
		$tab[] = 5;
	}
	print_r($tab);
	if (ctype_digit($tab[0]) && ctype_digit($tab[1]) && is_oprt($tab[2]) && count($tab) == 3)
		echo doop($tab[0], $tab[1], $tab[2])."\n";
	else
		echo "Syntax Error\n";
}
else
	echo "Incorrect Parameters\n";

?>
