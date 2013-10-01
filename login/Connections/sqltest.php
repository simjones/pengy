<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sqltest = "localhost";
$database_sqltest = "test";
$username_sqltest = "root";
$password_sqltest = "";
$sqltest = mysql_pconnect($hostname_sqltest, $username_sqltest, $password_sqltest) or die(mysql_error());
?>