<?php 
@session_start();
if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
   $login_usuario = $_SESSION['login'];
}
else {
header ("Location: ../index.html");
   exit();
}
?>
