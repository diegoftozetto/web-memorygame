<?php
	

	require_once('oop/class.datagame.php');
	require_once('oop/class.home.php');

	session_start();

	if (isset($_SESSION['datagame']))
		session_destroy();
	
	$home = new home();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Jogo da Memória</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">

</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<?php
			$home->newForm($_POST);
		?>
	</form>
</body>
</html>