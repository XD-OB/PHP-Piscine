#!/usr/bin/php
<?php

function search_it($tab, $key) {
	foreach ($tab as $elt) {
		$tmp = explode(":", trim($elt));
		if (!strcmp($tmp[0], "$key"))
			return $tmp[1];
	}
}

if ($argc > 1) {
	$key = $argv[1];
	unset($argv[0]);
	unset($argv[1]);
	$search = search_it($argv, $key);
	if ($search != NULL)
		echo $search."\n";
}

?>
