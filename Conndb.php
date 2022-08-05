<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Conndb = "localhost";
$database_Conndb = "biblio";
$username_Conndb = "root";
$password_Conndb = "";
$Conndb = new mysqli($hostname_Conndb, $username_Conndb, $password_Conndb) or trigger_error(mysqli_error($Conndb),E_USER_ERROR); 
?>