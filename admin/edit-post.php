<?php //include config
require_once('../includes/config.php');

?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit Post</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/bootstrap.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="./">Blog Admin Index</a></p>

	<h2>Editar Post</h2>


	<?php


	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );


		extract($_POST);


		if($postID ==''){
			$error[] = 'Este post nao tem uma identificaçao valida!.';
		}

		if($postTitulo ==''){
			$error[] = 'Por favor insira um titulo.';
		}

		if($postDesc ==''){
			$error[] = 'Por favor insira uma descriçao.';
		}

		if($postCont ==''){
			$error[] = 'Por favor insira um conteudo.';
		}

		if(!isset($error)){

			try {


				$stmt = $db->prepare('UPDATE blog_posts SET postTitulo = :postTitulo, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID') ;
				$stmt->execute(array(
					':postTitulo' => $postTitulo,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
					':postID' => $postID
				));


				header('Location: index.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT postID, postTitulo, postDesc, postCont FROM blog_posts WHERE postID = :postID') ;
			$stmt->execute(array(':postID' => $_GET['id']));
			$row = $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='postID' value='<?php echo $row->postID;?>'>

		<p><label>Title</label><br />
		<input type='text' name='postTitulo' value='<?php echo $row->postTitulo;?>'></p>

		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php echo $row->postDesc;?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php echo $row->postCont;?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form>

</div>

</body>
</html>
