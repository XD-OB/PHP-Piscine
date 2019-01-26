#!/usr/bin/php
<?php
    if ($argc !== 2)
        exit;
    $tab = [];
    if (($handle = fopen("php://stdin", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 500, ";")) !== FALSE) {
            $tab[] = $data;
        }
        sort($tab);
        fclose($handle);
        unset($tab[0]);
        if ($argv[1] == "moyenne") {
            foreach($tab as $cur) {
                if ($cur[2] !== "moulinette" && $cur[1] !== "") {
                    $sum = $cur[1] + $sum;
                    $i++;
                }
            }
            echo $sum/$i . "\n";
        } elseif ($argv[1] == "moyenne_user") {
            $avg = [];
            foreach ($tab as $cur) {
                $j = 0;
                $avg_u = 0;
                foreach ($tab as $ser) {
                    if ($cur[0] == $ser[0] && $ser[1] !== "" && $ser[2] !== "moulinette") {
                        $avg_u = $avg_u + $ser[1];
                        $j++;
                    }
                } 
                $avg[$cur[0]] = $avg_u/$j;
            }
            foreach($avg as $k => $cur)
                echo "$k:$cur\n";
        } elseif ($argv[1] == "ecart_moulinette") {
            $avg = [];
            foreach ($tab as $cur) {
                $j = 0;
                $d = 0;
                $avg_u = 0;
                $avg_m = 0;
                foreach ($tab as $ser) {
                    if ($cur[0] == $ser[0] && $ser[1] !== "" && $ser[2] !== "moulinette") {
                        $avg_u = $avg_u + $ser[1];
                        $j++;
                    }
                    if ($cur[0] == $ser[0] && $ser[1] !== "" && $ser[2] == "moulinette") {
                        $avg_m = $avg_m + $ser[1];
                        $d++;
                    }
                } 
                $avg[$cur[0]] = (($avg_u/$j) - ($avg_m/$d));
            }
            foreach($avg as $k => $cur)
                echo "$k:$cur\n";
        }
    } 
?>
