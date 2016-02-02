<?php require_once('includes/config.php');?>
<?php require_once('classes/contato.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contato Mundo Cover</title>

    <!-- Bootstrap Core CSS -->
    <link href="style/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="style/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


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
    <header class="intro-header" style="background-image: url('img/contato_mundo_cover.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">


                        <span class="subheading"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php


    ?>


    <?php
            $usuario = new contato();
            if(isset($_POST['enviar'])){

            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $mensagem = $_POST['mensagem'];

            $usuario->setNome($nome);
            $usuario->setTelefone($telefone);
            $usuario->setEmail($email);
            $usuario->setMensagem($mensagem);

            if($usuario->insert()){
                echo "<p class=\"bg-success\">mensagem enviada com sucesso</p>";
            }else{
                echo "atualize a pagina e tente novamente";
            }
          }
        ?>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <h3 class="text-center">Gostou? <br> entre em contato para mais informaçoes</h3><br>

               <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
               <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                 <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
               <form name="sentMessage" method="post" id="contactForm" novalidate>
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Nome</label>
                          <input type="text" class="form-control" name="nome" placeholder="Nome" id="name" required data-validation-required-message="Please enter your name.">
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" placeholder="Email" id="email" required data-validation-required-message="Please enter your email address.">
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Telefone</label>
                          <input type="tel" class="form-control" name="telefone" placeholder="Telefone" id="phone" required data-validation-required-message="Please enter your phone number.">
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Mensagem</label>
                          <textarea rows="5" class="form-control" name="mensagem" placeholder="Mensagem" id="message" required data-validation-required-message="Please enter a message."></textarea>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  <br>
                  <div id="success"></div>
                  <div class="row">
                      <div class="form-group col-xs-12">
                          <button type="submit" value="enviar" name="enviar" class="btn btn-default">Enviar</button>
                      </div>
                  </div>
              </form>
              </div>
              </div>
              </div>




    <hr>

    <!-- Footer -->
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

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
