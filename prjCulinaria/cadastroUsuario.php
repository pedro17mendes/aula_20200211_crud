<?php
include 'conexao.php';
if ($_POST) {
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = md5 ($_POST["senha"]);

$sql = "INSERT INTO usuario VALUES(
NULL,
'$nome',
'$email',
'$senha')";

if(mysqli_query($conexao, $sql))	echo "<script>alert('Cadastro realizado com sucesso!')</script>";
else echo "Falha no Cadastro! Verifique!" . mysqli_error($conexao);

mysqli_close($conexao); // encerrar conexão

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Culinária</title>
</head>
<body>
<h1>CADASTRO</h1>
<form action="" method="POST">
<label>NOME:</label>
<input type="text" name="nome" required="true"><br><br>
<label>EMAIL:</label>
<input type="email" name="email" required><br><br>
<label>SENHA:</label>
<input type="password" name="senha" required="true"><br><br>
<input type="submit" name="ENVIAR">
</form>
</body>
</html>