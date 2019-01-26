#!/usr/bin/php
<?php

function ft_create_table($table, $number){
    foreach ($table as $cur) {
        $res[$cur[0]] = $cur[$number];
        $res[$cur[1]] = $cur[$number];
        $res[$cur[2]] = $cur[$number];
        $res[$cur[3]] = $cur[$number];
        $res[$cur[4]] = $cur[$number];
    }
    return ($res);
}

if ($argc !== 3 || !is_readable($argv[1]))
    exit;
if (($handle = fopen($argv[1], "r")) !== FALSE) 
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
        $tab[] = $data;
if ($argv[2] !== 'name' && $argv[2] !== 'surname' && $argv[2] !== 'mail' && $argv[2] !== 'IP' && $argv[2] !== 'pseudo')
    exit;
unset($tab[0]);

$name = ft_create_table($tab,0);
$last_name = ft_create_table($tab,0);
$surname = ft_create_table($tab,1);
$mail = ft_create_table($tab,2);
$IP = ft_create_table($tab,3);
$pseudo = ft_create_table($tab,4);
    
while (1) {
    echo "Enter your command: ";
    $str = fgets(STDIN);
    if (feof(STDIN))
        exit;
    eval($str);
}

?>
