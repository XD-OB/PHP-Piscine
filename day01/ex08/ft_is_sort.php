<?php
function ft_is_sort($tab) {
	$size = count($tab);
	if ($size == 1)
		return true;
	$i = 1;
	if ($tab[0] <= $tab[1]) {
		while ($i < $size - 1) {
			if ($tab[$i] > $tab[$i + 1])
				return false;
			$i++;
		}
		return true;
	}
	else {
		while ($i < $size - 1) {
			if ($tab[$i] < $tab[$i + 1])
				return false;
			$i++;
		}
		return true;
	}
}
?>
