<?php
	session_start();
?>

<html>

<head>
	<link rel="stylesheet" href="/estilo/style.css">

	<title>
		<?php echo $_POST['btnLsArquivos']; ?>
	</title>
</head>

<body>
	<!-- Bloco de salvamento do arquivo -->
	<?php
		if($_POST['btnSalvar'] !== ""){
			$docAtual = $_SESSION['docAtual'];

			//FAZER FUNÇÃO DE ESCRITA NO ARQUIVO



			$_SESSION['docAtual'] = "";
		}
	?>


	<?php
		// Recebendo arquivo selecionado
		$arquivoRecebido = $_POST['btnLsArquivos'];

		// Arquivo aberto na variável e no modo leitura
		$abreArquivo = fopen('/srv/tftp/ts5.4/'.$arquivoRecebido, 'r');

		// Pega arquivo aberto na variável e o exibe
		$leituraArquivo = fread($abreArquivo, filesize('/srv/tftp/ts5.4/'.$arquivoRecebido));

	?>

		<div id='conteiner' class='conteiner'>
			<form id='formConteudo' class='formConteudo' action="<?php $_SERVER['PHP_SELF']; ?>" method='post' name='formConteudo'>
				<textArea type='text' cols='50' rows='15' name='arquivo' id='arquivo'>
					<?php echo $leituraArquivo; $_SESSION['docAtual'] = $leituraArquivo; ?>
				</textArea>

				<button id='btnSalvar' class='btnSalvar' name='btnSalvar' type='submit' form='formConteudo'>
					Salvar
				</button>
			</form>

			<a href='/indexSessao.php' id='btnVoltar' class='btnVoltar'>
			<!-- <a href='/sessao/indexSessao.php' id='btnVoltar' class='btnVoltar'> -->
				Voltar
			</a>
		</div>

	<?php

		// Fecha arquivo
		fclose($leituraArquivo);
	?>
</body>

</html>
