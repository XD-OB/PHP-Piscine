<?php
	$action = $_GET['action'];
	$name = $_GET['name'];

	if ($action == "set") {
		$value = $_GET['value'];
		setcookie($name, $value, time() + 86400 * 30, '/');
	}

	if ($action == "get")
		echo "$_COOKIE[$name]" . ($_COOKIE[$name] ? "\n" : "");

	if ($action == "del")
		setcookie($name, '', time() - 3600, '/');
?>
