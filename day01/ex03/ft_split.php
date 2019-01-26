<?php

function ft_split($str) {
	$tab = trim(preg_replace('/\s+/', ' ', $str));
	$tab = explode(" ", $tab);
	$len = 0;
	foreach ($tab as $elt)
		$len++;
	$i = 0;
	while ($i < $len) {
		$j = 0;
		while ($j < $len - $i - 1) {
			if (strcmp($tab[$j], $tab[$j + 1]) > 0) {
				$tmp = $tab[$j];
				$tab[$j] = $tab[$j + 1];
				$tab[$j + 1] = $tmp;
			}
			$j++;
		}
		$i++;
	}
	return $tab;
}

?>
