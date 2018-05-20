<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myconn = "localhost";
$database_myconn = "music";
$username_myconn = "root";
$password_myconn = "root";
$myconn = mysql_pconnect($hostname_myconn, $username_myconn, $password_myconn) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'") ; 
?>