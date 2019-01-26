#!/usr/bin/php
<?php

function custom_sort($s1, $s2) {
	for ($i = 0; $i < min(strlen($s1), strlen($s2)); $i++) {
		if (ctype_alpha($s1[$i])) {
			if (!ctype_alpha($s2[$i]))
				return (-1);		
			else if (($result = ord(strtolower($s1[$i])) - ord(strtolower($s2[$i]))) != 0)
				return $result;
		}
		if (!ctype_alnum($s1[$i])) {
			if (ctype_alnum($s2[$i]))
				return (1);
			else if (($result = ord($s1[$i]) - ord($s2[$i])) != 0)
				return $result;
		}
		if (ctype_digit($s1[$i])) {
			if (ctype_alpha($s2[$i]))
				return (1);
			else if (!ctype_alnum($s2[$i]))
				return (-1);
			else if (($result = ord($s1[$i]) - ord($s2[$i])) != 0)
				return $result;
		}
	}
	if (strlen($s1) > strlen($s2))
		return 1;
	if (strlen($s1) < strlen($s2))
		return -1;
	return 0;
}

if ($argc > 1)
{
	unset($argv[0]);
	$tab = array_filter(explode(" ", implode(" ", $argv)));
	usort($tab, 'custom_sort');

	foreach ($tab as $elt)
		echo $elt."\n";
}

?>
