#!/usr/bin/php
<?php

function ft_toupper($matches) {
    return strtoupper($matches[0]);
}

function ft_replace($matches) {
	$matches = preg_replace_callback('/(?<=title=["\'])(?:.|\n)*(?=["\'])/iU', 'ft_toupper', $matches);
    $matches = preg_replace_callback('/(?<=>)(?!<.*>)(?:.|\n)*(?=<)/iU', 'ft_toupper', $matches);
    return $matches[0];
}

if ($argc == 2) {
    $file = preg_replace_callback('/<a(.|\n)+<\/a>/iU', 'ft_replace', file_get_contents($argv[1]));
    print($file."\n");
}

?>
