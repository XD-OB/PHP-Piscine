#!/usr/bin/php
<?php

$res = [];
$tab = explode("\n", file_get_contents($argv[1]));
for ($i = 1; $i < count($tab); $i += 4)
	$res[] = ['time' => explode(' --> ', $tab[$i]), 'content' => $tab[$i + 1]];
array_multisort($res);
$num = 1;
foreach ($res as $cur) {
	echo $num."\n".$cur['time'][0]." --> ".$cur['time'][1]."\n".$cur['content']."\n";
	$num++;
	if ($num <= count($res))
		echo "\n";
}

?>