 <?php
	session_start();
	include 'conexao.php';

	if(empty($_SESSION["login"])) {
		echo "<script>alert('Faça o login primeiramente!')</script>";
		header("Location:login.php");
	}

	if (isset($_POST["senhaatual"]) && isset($_POST["novasenha"]) && isset($_POST["confirmasenha"])) {
		$senha_atual = $_POST["senhaatual"]; 
		$nova_senha = $_POST["novasenha"];
		$confirma_senha = $_POST["confirmasenha"];

		$login = $_SESSION["login"];

		$sql = "SELECT * FROM usuario WHERE login = '$login'";

		$resultado = mysqli_query($conexao, $sql);

		$vetor = mysqli_fetch_array($resultado);

		$senhabd = $vetor["senha"];

		if ($confirma_senha != $nova_senha) {
			echo "<script>alert('A senha digitada está diferente da senha cadastrada, tente novamente!')</script>";
		} else if ($senha_bd == md5($nova_senha)) {
			echo "<script>alert('A senha nova está igual a senha antiga, (ja cadastrada) tente novamente!')</script>";
		} else {
			$nova_senha = md5($nova_senha);
			$sql = "UPDATE usuario SET senha='$nova_senha' WHERE login = '$login'";

			if (mysqli_query($conexao, $sql)) {
				echo "<script>alert('Senha alterada com sucesso!')</script>";
				header("Location:index.php");
			}
			else{
				echo "<script>alert('Erro na alteração da senha, tente novamente!')</script>";
			}
		}
	}
?>