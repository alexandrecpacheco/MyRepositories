<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_galeria = "localhost";
$database_galeria = "dithe107_emerson";
$username_galeria = "dithe107_site2";
$password_galeria = "lecp20";
$galeria = mysql_pconnect($hostname_galeria, $username_galeria, $password_galeria) or trigger_error(mysql_error(),E_USER_ERROR); 
?>