<?php
//include config
require_once('../includes/config.php');


//check if already logged in
//if( $user->is_logged_in() ){ header('Location: index.php'); }
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/bootstrap.css">
</head>
<body>

<div id="login">

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$usuario = trim($_POST['usuario']);
		$senha = trim($_POST['senha']);

		if($user->login($usuario,$senha)){

			//logged in return to index page
			header('Location: index.php');
			exit;


		} else {
			$message = '<p class="error">usuario ou senha incorretos!</p>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>

	<form action="" method="post">
	<p><label>Usuario</label><input type="text" name="usuario" value=""  /></p>
	<p><label>Senha</label><input type="password" name="senha" value=""  /></p>
	<p><label></label><input type="submit" name="submit" value="Login"  /></p>
	</form>

</div>
</body>
</html>
