#!/usr/bin/php
<?php

function save_image($inPath, $outPath) {
	$ch = curl_init($inPath);
	$fp = fopen($outPath, 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
}

function grab_img($m) {
	$tab = explode("/", $m[0]);
	exec("mkdir -p $tab[2]");
	save_image($m[0], $tab[2].'/'.$tab[count($tab) - 1]);
	echo "$m[0]\n";
}

function fetch($m) {
	$pattern = '~(http.*\.)(jpe?g|png|[tg]iff?|svg)~iU';
	$m = preg_replace_callback($pattern, 'grab_img', $m[0]);
}

if ($argc > 1) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $argv[1]);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$str = curl_exec($ch);
	curl_close($ch);
	$str = preg_replace_callback('/<img(.|\n)+>/iU', 'fetch', $str);
}

?>