<html>
	<head>
		<title> Gestão </title>
		<link rel='stylesheet' href='/estilo/style.css'>
	</head>

	<body>
		<!-- Bloco de exibição de diretório -->
		<?php
			// Instancia classe dir, passando o construtor
			$abreDir = dir('/srv/tftp/ts5.4');

			echo "<br>";

			// Mostra o conteúdo um a um
			$arquivo = "";
			while(($arquivo = $abreDir->read()) !== false){
				if($arquivo !== '.' && $arquivo !== '..'){
		?>
			<form action="/sessao/exibeConteudo.php" method='post'>
				<ul>
					<!-- CRIAÇÃO DE LISTA COM O NOME DO ARQUIVO, PARA ABRIR O ARQUIVO -->
					<li class='listaArquivos' id='listaArquivos' name='listaArquivos'> 
					<button type='submit' value='<?php echo $arquivo; ?>' name='btnLsArquivos' id='btnLsArquivos'><?php echo "$arquivo"; ?> </button>
					</li>
				</ul>
			</form>
		<?php
				}
			}
		?>


		<!-- Bloco de criação de novos arquivos -->
		<?php
			echo "fazer bloco de novo arquivo";
		?>

	</body>
</html>
