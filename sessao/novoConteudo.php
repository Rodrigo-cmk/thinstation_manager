<?php
	session_start();
?>

<?php
	include "../funcao/bloqueio.php";
?>

<html>
<head>
	<link rel='stylesheet' href='/estilo/style.css'>

	<title>
		Novo arquivo
	</title>
</head>

<body>
	<?php
		if($_POST['btnSalvar'] == 'salvar'){
			//echo $_POST['arquivo'];
			//echo $_POST['nmArquivo'];

			$ctdArquivo = $_POST['arquivo'];
			$nmArquivo = $_POST['nmArquivo'];

			$abreArquivo = fopen('/srv/tftp/ts5.4/'.$nmArquivo, 'x');

			$escreveArquivo = fwrite($abreArquivo, $ctdArquivo);

			fclose($abreArquivo);

			header('location: /sessao/indexSessao.php');
			//header('location: /indexSessao.php');
		}
	?>

	<div id='conteiner' class='conteiner'>
		<form action="<?php $_SERVER['PHP_SELF']?>" method='post' id='formConteudo' class='formConteudo'>

			<input name='nmArquivo' id='nmArquivo' class='nmArquivo' autofocus
			value='thinstation.conf-'>

			<textarea cols='50' rows='15' name='arquivo' class='arquivo' id='arquivo'># Terminal <?php echo $_POST['btnNvConteudo']?>

SESSION_0_TYPE=freerdp
SESSION_0_FREERDP_SERVER=192.168.1.185
SESSION_0_FREERDP_OPTIONS='/cert-ignore -sec-nla'
SESSION_0_FREERDP_AUTOSTART=on
SCREEN_RESOLUTION='1024x768'</textarea>

			<button type='submit' class='btnSalvar' id='btnSalvar' name='btnSalvar' value='salvar'>
				Salvar
			</button>
		</form>

		<!-- <a href='/indexSessao.php' id='btnVoltar' class='btnVoltar'> -->
		<a href='/sessao/indexSessao.php' id='btnVoltar' class='btnVoltar'>
			Voltar
		</a>
	</div>


</body>
</html>
