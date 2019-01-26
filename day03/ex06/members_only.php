<?php

$login = $_SERVER['PHP_AUTH_USER'];
$pwd = $_SERVER['PHP_AUTH_PW'];
if ($login == "zaz" && $pwd == "jaimelespetitsponeys") {
	$img = file_get_contents("../img/42.png");
	echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64," . base64_encode($img) . "'>\n</body></html>\n";
} else {
	header("WWW-Authenticate: Basic realm=''Member area''");
	header('HTTP/1.0 401 Unauthorized');
	header('Content-Type: text/html');
	echo "<html><body>That area is accessible for members only</body></html>\n";
}

?>