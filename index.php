<html>
<header>
	<title>
		Login
	</title>

	<link rel='stylesheet' href='/estilo/style.css'>
</header>

<body>
	<div class='conteiner' id='conteiner'>
		<div class='boxLogin' id='boxLogin'>
		<form class='formLogin' id='formLogin' method='post' action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type='text' class='user' id='user' name='user' autofocus placeholder='Usuário'>
			<input type='password' class='senha' id='senha' name='senha' placeholder='Senha'>
			<button class='btnLogin' id='btnLogin' name='btnLogin' value='entrar'> Entrar </button>
		</form>
		</div>
	</div>
</body>

</html>
