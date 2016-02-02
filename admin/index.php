<?php
//include config
require_once('../includes/config.php');



if(isset($_GET['delpost'])){

	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: index.php?action=deleted');
	exit;
}

?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
	<link rel="stylesheet" href="../style/bootstrap.css">
  <script language="JavaScript" type="text/javascript">
  function delpost(id, titulo)
  {
	  if (confirm("Tem certeza de que deseja excluir '" + title + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }
  </script>
</head>
<body>

	<div id="wrapper">

	<?php include('menu.php');?>

	<?php
	//show message from add / edit page
	if(isset($_GET['action'])){
		echo '<h3>Post '.$_GET['action'].'.</h3>';
	}
	?>

	<table>
	<tr>
		<th>Titylo</th>
		<th>Data</th>
		<th>Açao</th>
	</tr>
	<?php
		try {

			$stmt = $db->query('SELECT postID, postTitulo, postData FROM blog_posts ORDER BY postID DESC');
			while($row = $stmt->fetch()){
				echo '<tr>';
				echo '<td>'.$row->postTitulo.'</td>';
				echo '<td>'.date('jS M Y', strtotime($row->postData)).'</td>';
				?>


				<td>
					<a href="edit-post.php?id=<?php echo $row->postID;?>">Editar</a> |
					<a href="javascript:delpost('<?php echo $row->postID;?>','<?php echo $row->postTitulo;?>')">Delete</a>
				</td>

				<?php
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a href='add-post.php'>Add Post</a></p>

</div>

</body>
</html>
