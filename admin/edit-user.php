<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
//if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/bootstrap.css">
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="users.php">User Admin Index</a></p>

	<h2>Editar Usuario</h2>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation
		if($usuario ==''){
			$error[] = 'Por favor insira um usuario.';
		}

		if( strlen($senha) > 0){

			if($senha ==''){
				$error[] = 'Por favor insira uma senha.';
			}

			if($passwordConfirm ==''){
				$error[] = 'Por favor confirme a senha.';
			}

			if($senha != $passwordConfirm){
				$error[] = 'As senhas nao coincidem.';
			}

		}


		if($email ==''){
			$error[] = 'Por favor insira um email.';
		}

		if(!isset($error)){

			try {

				if(isset($senha)){

					$hashedpassword = $user->password_hash($senha, PASSWORD_BCRYPT);

					//update into database
					$stmt = $db->prepare('UPDATE blog_usuario SET usuario = :usuario, senha = :senha, email = :email WHERE usuarioID = :usuarioID') ;
					$stmt->execute(array(
						':usuario' => $usuario,
						':senha' => $hashedpassword,
						':email' => $email,
						':usuarioID' => $usuarioID
					));


				} else {

					//update database
					$stmt = $db->prepare('UPDATE blog_usuario SET usuario = :usuario, email = :email WHERE usuarioID = :usuarioID') ;
					$stmt->execute(array(
						':usuario' => $usuario,
						':email' => $email,
						':usuarioID' => $usuarioID
					));

				}


				//redirect to index page
				header('Location: users.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT usuarioID, usuario, email FROM blog_usuario WHERE usuarioID = :usuarioID') ;
			$stmt->execute(array(':usuarioID' => $_GET['id']));
			$row = $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='usuarioID' value='<?php echo $row->usuarioID;?>'>

		<p><label>Username</label><br />
		<input type='text' name='usuario' value='<?php echo $row->usuario;?>'></p>

		<p><label>Password (only to change)</label><br />
		<input type='password' name='senha' value=''></p>

		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value=''></p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php echo $row->email;?>'></p>

		<p><input type='submit' name='submit' value='Update User'></p>

	</form>

</div>

</body>
</html>
