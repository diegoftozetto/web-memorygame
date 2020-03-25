<?php
	require_once('../oop/class.datagame.php');
	require_once('../oop/class.memory.php');
	require_once('../oop/class.gamePlayer.php');
	require_once('../oop/class.gameBoard.php');

	session_start();	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Jogo da Memória</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.css">
</head>
<body style="background-color:#f0f3f4;">
	<?php 
		new memory();	
	?>
</body>
</html>