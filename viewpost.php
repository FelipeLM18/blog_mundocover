<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID, postTitulo, postCont, postData FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row->postID == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Blog - <?php echo $row->postTile;?></title>

		      <!-- Bootstrap Core CSS -->
		<link href="style/bootstrap.min.css" rel="stylesheet">

		      <!-- Custom CSS -->
		<link href="style/clean-blog.min.css" rel="stylesheet">

		<link rel="stylesheet" href="style/normalize.css">
		<link rel="stylesheet" href="style/main.css">

		<!-- Custom Fonts -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		      <!--[if lt IE 9]>
		          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		      <![endif]-->

		  </head>

		  <body>

		      <!-- Navigation -->
		      <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
		          <div class="container-fluid">
		              <!-- Brand and toggle get grouped for better mobile display -->
		              <div class="navbar-header page-scroll">
		                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                      <span class="sr-only">Toggle navigation</span>
		                      <span class="icon-bar"></span>
		                      <span class="icon-bar"></span>
		                      <span class="icon-bar"></span>
		                  </button>
		                  <a class="navbar-brand" href="index.php">Mundo Cover</a>
		              </div>

		              <!-- Collect the nav links, forms, and other content for toggling -->
		              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		                  <ul class="nav navbar-nav navbar-right">
		                      <li>
		                          <a href="about.php">Sobre</a>
		                      </li>
		                      <li>
		                          <a href="post.php">Post Completo</a>
		                      </li>
		                      <li>
		                          <a href="contact.php">Contato</a>
		                      </li>

		                  </ul>
		              </div>
		              <!-- /.navbar-collapse -->
		          </div>
		          <!-- /.container -->
		      </nav>

		      <!-- Page Header -->
		      <!-- Set your background image for this header on the line below. -->
		      <header class="intro-header" style="background-image: url('img/mundo_cover.jpg')">
		          <div class="container">
		              <div class="row">
		                  <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		                      <div class="site-heading">
		                          <h1>.</h1>

		                          <span class="subheading">.</span>
		                      </div>
		                  </div>
		              </div>
		          </div>
		      </header>
</head>
<body>

	<div id="wrapper">
		<hr />



		<?php
			echo '<div>';
				echo '<h1>'.$row->postTitulo.'</h1>';
				echo '<p>Postado em '.date('d M Y', strtotime($row->postData)).'</p>';
				echo '<p>'.$row->postCont.'</p>';
			echo '</div>';
		?>
		<p><a href="./">Voltar</a></p>

	</div>
	<footer>
			<div class="container">
					<div class="row">
							<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
									<ul class="list-inline text-center">
										<li>
												<a href="https://www.facebook.com/canalmundocover" target="_blank"</a>
														<span class="fa-stack fa-lg">
																<i class="fa fa-circle fa-stack-2x"></i>
																<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
														</span>
												</a>
										</li>
									</ul>
									<p class="copyright text-muted">Copyright &copy;
										 <a href="https://www.aventti.com.br "target="_blank">Aventti</a>
							</div>
					</div>
			</div>
	</footer>


</body>
</html>
