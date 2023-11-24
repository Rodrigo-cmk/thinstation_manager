<?php
	$conexao = new mysqli('localhost', 'root', '1!P@SSword', 'thinDB');

	if($conexao->connect_error){
        	die("Erro de conexão com o banco".$conexao->connect_error);
	}
 	else{
        	echo "";
    	}
?>
