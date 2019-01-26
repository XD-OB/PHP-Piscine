<?php

header('Content-Type: text/plain');

$tab = [];
if (($handle = fopen("list.csv", "r"))) {
    while (($data = fgetcsv($handle, 100, ";")))
        $tab[] = $data;
    fclose($handle);
}
if (($handle = fopen("list.csv", "w"))) {
    array_unshift($tab, [$_GET['id'], $_GET['todo']]);
    foreach ($tab as $fields)
        fputcsv($handle, $fields, ";");
    fclose($handle);
	echo "ok";
}

?>