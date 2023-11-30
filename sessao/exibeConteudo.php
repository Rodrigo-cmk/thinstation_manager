<?php
	session_start();
?>

<?php
	include "../funcao/bloqueio.php";
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
		if($_POST['btnExclui'] == 'exclui'){
			$arquivoSelecionado = $_SESSION['docAtual'];

			// Função de exclusão de arquivo
			unlink('/srv/tftp/ts5.4/'.$arquivoSelecionado);

			header('location: /sessao/indexSessao.php');
			//header('location: /indexSessao.php');
		}


		if($_POST['btnSalvar'] == "salvar"){

			// Captura o nome do arquivo salvo em sessão
			$docAtual = $_SESSION['docAtual'];

			// Captura o conteúdo do arquivo
			$conteudo = $_POST['arquivo'];

			// Abrindo arquivo no modo de Escrita
			$abreArquivo = fopen('/srv/tftp/ts5.4/'.$docAtual, 'w');

			if($conteudo == ""){
				// Caso esteja vazio salvamos com um espaço, evita bugs depois
				$escritaArquivo = fwrite($abreArquivo, "  ");
			}else{
				// Faz a gravação no arquivo após aberto
				$escritaArquivo = fwrite($abreArquivo, $conteudo);
			}

			//header('location: /indexSessao.php');
			header('location: /sessao/indexSessao.php');

			fclose($abreArquivo);
			$_SESSION['docAtual'] = "";
		}
	?>


	<?php
		// Colocando o nome do arquivo em sessão para usar depois
		$_SESSION['docAtual'] = $_POST['btnLsArquivos'];

		// Recebendo arquivo selecionado
		$arquivoRecebido = $_POST['btnLsArquivos'];

		// Arquivo aberto na variável e no modo leitura
		$abreArquivo = fopen('/srv/tftp/ts5.4/'.$arquivoRecebido, 'r');

		// Pega arquivo aberto na variável e o exibe
		$leituraArquivo = fread($abreArquivo, filesize('/srv/tftp/ts5.4/'.$arquivoRecebido));

	?>

		<div id='conteiner' class='conteiner'>
			<form id='formConteudo' class='formConteudo' action="<?php $_SERVER['PHP_SELF']; ?>" method='post' name='formConteudo'>
				<textArea type='text' autofocus cols='50' rows='15' name='arquivo' id='arquivo' class='arquivo'><?php echo $leituraArquivo;?></textArea>

				<button id='btnSalvar' class='btnSalvar' name='btnSalvar' type='submit' form='formConteudo' value='salvar'>
					Salvar
				</button>
			</form>

			<form class='botoes' id='botoes' action="<?php $_SERVER['PHP_SELF']?>" method='post'>

			<!-- <a href='/indexSessao.php' id='btnVoltar' class='btnVoltar'> -->
			<a href='/sessao/indexSessao.php' id='btnVoltar' class='btnVoltar'>
				Voltar
			</a>

			<button class='btnExclui' id='btnExclui' name='btnExclui' value='exclui'> Excluir
			</button>

			</form>
		</div>

	<?php
		// Fecha arquivo
		fclose($abreArquivo);
	?>
</body>

</html>
