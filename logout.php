<?php
session_start();
	$login = $_SESSION['login'];
 	$senha = $_SESSION['senha'];
session_destroy();
header ("Location: ../index.html");

?>
