<?php 
session_start();
if(!isset($_SESSION["ci"]) or $_SESSION["level"] != 3 )
{
	header ("Location: ../../namoPruebas/login/login.html");
	exit();
}
?>