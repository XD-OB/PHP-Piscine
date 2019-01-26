<?php
    session_start();
    if(!$_SESSION["Username"])
        $_SESSION["Username"] = '';
    if(!$_SESSION["Passwd"])
        $_SESSION["Passwd"] = '';
    if($_GET['submit'] == 'OK') {
        $_SESSION["Username"] = $_GET['login'];
        $_SESSION["Passwd"] = $_GET['passwd'];
    }
?>

<html><body>
<form name="index.php" action="index.php" method="get">
    Username: <input name="login" type="text"  value="<?= $_SESSION["Username"]; ?>" />
    <br />
    Password: <input name="passwd" type="password" value="<?= $_SESSION["Passwd"]; ?>" />
    <input type="submit"  name="submit" value="OK" />
</form>
</body></html>