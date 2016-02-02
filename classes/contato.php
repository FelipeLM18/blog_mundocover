<?php
  require_once("../includes/config.php");
?>

<?
class contato {

  private $nome;
  private $telefone;
  private $email;
  private $mensagem;

// funcoes abaixo armazenao o valor recebido em variaveis

public function setNome($nome){
  $this->nome = $nome;
}
public function setTelefone($telefone){
  $this->telefone = $telefone;
}
public function setEmail($email){
  $this->email = $email;
}
public function setMensagem($mensagem){
  $this->mensagem = $mensagem;
}

// faz um insert de todos os dados do formulario
public function insert(){
  $sql = "INSERT INTO $this->table (nome,telefone,email,mensagem) VALUES (:nome,:telefone,:email,:mensagem)";
  $stmt = DB::prepare($sql);

  $stmt->bindParam(':nome',$this->nome);
  $stmt->bindParam(':telefone',$this->telefone);
  $stmt->bindParam(':email',$this->email);
  $stmt->bindParam(':mensagem',$this->mensagem);

  return $stmt->execute();
}
}




?>
