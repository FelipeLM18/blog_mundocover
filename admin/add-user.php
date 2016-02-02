<?php //include config
require_once('../includes/config.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Admin - Add User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/bootstrap.css">
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="users.php">Index Admin</a></p>

	<h2>Add Usuario</h2>

	<?php


	if(isset($_POST['submit'])){


		extract($_POST);


		if($usuario ==''){
			$error[] = 'Por favor insira um usuario.';
		}

		if($senha ==''){
			$error[] = 'Por favor insira uma senha.';
		}

		if($passwordConfirm ==''){
			$error[] = 'Por favor confirme a senha.';
		}

		if($senha != $passwordConfirm){
			$error[] = 'As senhas não coincidem.';
		}

		if($email ==''){
			$error[] = 'Por favor insira seu email.';
		}

		if(!isset($error)){

			$hashedpassword = $user->password_hash($senha, PASSWORD_BCRYPT);

			try {

				//inserir no banco
				$stmt = $db->prepare('INSERT INTO blog_usuario (usuario,senha,email) VALUES (:usuario, :senha, :email)') ;
				$stmt->execute(array(
					':usuario' => $usuario,
					':senha' => $hashedpassword,
					':email' => $email
				));

				//redireciona para a index
				header('Location: users.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>

		<p><label>Username</label><br />
		<input type='text' name='usuario' value='<?php if(isset($error)){ echo $_POST['usuario'];}?>'></p>

		<p><label>Password</label><br />
		<input type='password' name='senha' value='<?php if(isset($error)){ echo $_POST['senha'];}?>'></p>

		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>

		<p><input type='submit' name='submit' value='Add User'></p>

	</form>

</div>
