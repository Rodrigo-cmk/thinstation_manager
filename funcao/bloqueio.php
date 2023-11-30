<?php
	session_start();
?>

<?php
	if($_SESSION['user'] == "" && $_SESSION['senha'] == ""){
		header('location: /index.php');
	}
?>
