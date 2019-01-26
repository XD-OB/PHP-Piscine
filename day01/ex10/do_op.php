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


if ($argc == 4) {
	if (ctype_digit($argv[1]) && ctype_digit($argv[3])) {
		if (!strcmp($argv[2], "+"))
			echo doop($argv[1], $argv[3], 1)."\n";
		else if (!strcmp($argv[2], "-"))
			echo doop($argv[1], $argv[3], -1)."\n";
		else if (!strcmp($argv[2], "*"))
			echo doop($argv[1], $argv[3], 2)."\n";
		else if (!strcmp($argv[2], "/"))
			echo doop($argv[1], $argv[3], -2)."\n";
		else if (!strcmp($argv[2], "%"))
			echo doop($argv[1], $argv[3], 5)."\n";
	}
}
else
	echo "Incorrect Parameters\n";

?>
