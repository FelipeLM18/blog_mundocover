<?php
require_once "../includes/config.php";

  class usuarios extends config{
    protected $table = 'blog_usuario';
      private $usuario;
      private $senha;
      private $email;

      public function setUsuario($usuario){
        $this->usuario = $usuario;
      }
      public function setSenha($senha){
        $this->senha = $senha;
      }
      public function setEmail($email){
        $this->email = $email;
      }

      public function insert(){
        $stmt ->

      }
  }

?>
