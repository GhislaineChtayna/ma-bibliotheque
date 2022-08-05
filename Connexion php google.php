<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connexion php</title>
<link href="style css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
    // The following are the defaults for a
    // new MySQL installation. You should replace
    // the $host, $mysql_user, and $mysql_user_password
    // with your details.
    $host = 'localhost';
    $mysql_user = 'root';
    $mysql_user_passowrd = '';

    // Turn off error reports like "Fatal Errors".
    // Such reports can contain too much sensitive
    // information that no one should see. Also,
    // turning off error reports allows us to handle
    // connection error in an if/else statement.
    mysqli_report(MYSQLI_REPORT_OFF);

    // If there is an error in the connection string,
    // PHP will produce a Warning message. For security
    // and private reasons, it's best to suppress the
    // warnings using the '@' sign
    $connect_to_mysql = @mysqli_connect($host, $mysql_user, $mysql_user_passowrd);

    if (!$connect_to_mysql) {
        echo "<b style='color: red;'>Failed to connect to MySQL.</b>";
    } else {
        echo "You've made a successful connection to MySQL.";
    }
?>
</body>
</html>