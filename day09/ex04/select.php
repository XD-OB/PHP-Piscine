<?php

header('Content-Type: text/json');

$tab = [];
if (($handle = fopen("list.csv", "r"))) {
    while (($data = fgetcsv($handle, 100, ";"))) {
        $tab[] = $data;
    }
    fclose($handle);
	echo json_encode($tab);
}

?>