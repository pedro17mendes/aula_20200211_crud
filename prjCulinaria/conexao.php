<?php
$servername = "127.0.0.1"; // servidor
$username = "root"; // usuário
$password = "minas"; // senha
$database = "usuario"; // base de dados

// Create connection
$conexao = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conexao) die("Falha na Conexão: " . mysqli_connect_error());

//cho "Connected successfully";?>