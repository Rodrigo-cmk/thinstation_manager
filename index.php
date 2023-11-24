<?php
	include('funcao/conexao.php');
?>

<html>
<header>
	<title>
		Login
	</title>

	<link rel='stylesheet' href='/estilo/style.css'>
</header>

<body>
	<?php
		if($_POST['btnLogin'] == "entrar"){

				// Chamando o objeto CONEXAO e o método QUERY para fazer consulta
				// Armazenando a consulta na variável CONSULTA
			//$consulta = $conexao->query(
			//		"SELECT * FROM usuarios;"
			//);

				// Criando variável para receber dados dentro do laço
				// Pegando resultados do objeto na forma de array e passando para outra variável
			//$resultadoUser1 = "";
			//while($resultadoUser2 = $consulta->fetch_assoc()){
			//	$resultadoUser1 = $resultadoUser2['nmUser'];
			//	echo $resultadoUser1;
			//}

			$usuario = $_POST['user'];
			$senha = $_POST['senha'];


			// AQUI TA COM ERROO
			$consulta = $conexao->query(
				"SELECT * FROM usuarios WHERE nmUser = '$usuario' AND pwUser = '$senha'";
			);

			$resultadoUser1 = "";
                        while($resultadoUser2 = $consulta->fetch_assoc()){
                              $resultadoUser1 = $resultadoUser2['nmUser'];
				$resultadoPw = $resultadoUser2['pwUser'];
                              echo $resultadoUser1 . "<br>" . $resultadoPw;
                        }
		}

	?>


	<div class='conteiner' id='conteiner'>
		<div class='boxLogin' id='boxLogin'>
		<form class='formLogin' id='formLogin' name='formLogin' method='post' action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type='text' class='user' id='user' name='user' autofocus placeholder='Usuário'>
			<input type='password' class='senha' id='senha' name='senha' placeholder='Senha'>
			<button class='btnLogin' id='btnLogin' name='btnLogin' value='entrar'> Entrar </button>
		</form>
		</div>
	</div>
</body>

</html>
