<?php
session_start();

include 'conexao.php';

if(isset($_SESSION["login"])){
	session_destroy();
}
header("Location:login.php");

?>