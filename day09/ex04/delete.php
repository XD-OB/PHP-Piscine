<?php
header('Content-Type: text/json');

$tab = [];
if (($handle = fopen("list.csv", "r"))) {
    while (($data = fgetcsv($handle, 100, ";")))
        $tab[] = $data;
    fclose($handle);
}
if (($handle = fopen("list.csv", "w"))) {
    if (($key = array_search([$_GET['id'], $_GET['todo']], $tab)) !== false) {
        unset($tab[$key]);
    }
    foreach ($tab as $fields)
        fputcsv($handle, $fields, ";");
    fclose($handle);
	echo json_encode($tab);
}
?>