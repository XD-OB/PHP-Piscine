#!/usr/bin/php
<?php

$str = trim(preg_replace('/[\t\r\s]+/', ' ', $argv[1]));
echo $str."\n";

?>
