<?php
//include config
require_once('../includes/config.php');


if(isset($_GET['deluser'])){


	if($_GET['deluser'] !='1'){

		$stmt = $db->prepare('DELETE FROM blog_usuario WHERE usuarioID = :usuarioID') ;
		$stmt->execute(array(':usuarioID' => $_GET['deluser']));

		header('Location: users.php?action=deleted');
		exit;

	}
}

?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Admin - Users</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
	<link rel="stylesheet" href="../style/bootstrap">
  <script language="JavaScript" type="text/javascript">
  function deluser(id, titulo)
  {
	  if (confirm("Tem certeza que deseja excluir '" + titulo + "'"))
	  {
	  	window.location.href = 'users.php?deluser=' + id;
	  }
  }
  </script>
</head>
<body>

	<div id="wrapper">

	<?php include('menu.php');?>

	<?php
	
	if(isset($_GET['action'])){
		echo '<h3>User '.$_GET['action'].'.</h3>';
	}
	?>

	<table>
	<tr>
		<th>Usuario</th>
		<th>Email</th>
		<th>Açao</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT usuarioID, usuario, email FROM blog_usuario ORDER BY usuario');
			while($row = $stmt->fetch()){

				echo '<tr>';
				echo '<td>'.$row->usuario.'</td>';
				echo '<td>'.$row->email.'</td>';
				?>

				<td>
					<a href="edit-user.php?id=<?php echo $row->usuarioID;?>">Editar</a>
					<?php if($row->usuarioID != 1){?>
						| <a href="javascript:deluser('<?php echo $row->usuarioID;?>','<?php echo $row->usuario;?>')">Delete</a>
					<?php } ?>
				</td>

				<?php
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a href='add-user.php'>Add User</a></p>

</div>

</body>
</html>
