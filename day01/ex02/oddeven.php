#!/usr/bin/php
<?php

while (1):
echo("Entrez un nombre: ");
$x = trim(fgets(STDIN));
if (ord($x) == "^D") {
	echo "^D\n";
	break;
}
if (!is_numeric($x))
	echo sprintf ("'%s' n'est pas un chiffre\n", $x);
else {
	if ($x > PHP_INT_MAX)
		continue;
	if ($x % 2 == 0)
		echo sprintf("Le chiffre %d est Pair\n", $x);
	else
		echo sprintf("Le chiffre %d est Impair\n", $x);
}
endwhile;

?>
