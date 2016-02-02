<?php
require_once ("../includes/config.php");

class posts{
    private $postTitulo;
    private $postDesc;
    private $postCont;
    private $postData;

    //set serve para setar os valores em variaveis//
    public function setPostTitulo($postTitulo){
      $this->postTitulo = $postTitulo;
    }
    public function setPostDesc($postDesc){
      $this->postDesc = $postDesc;
    }
    public function setPostCont($postCont){
      $this->postCont = $postCont;
    }
    public function setPostData($postData){
      $this->postData = $postData;
    }

    public function insertPost(){
    $stmt = $db->prepare('INSERT INTO blog_posts (postTitulo,postDesc,postCont,postData) VALUES (:postTitulo, :postDesc, :postCont, :postData)') ;
    $stmt->execute(array(
      ':postTitle' => $postTitulo,
      ':postDesc' => $postDesc,
      ':postCont' => $postCont,
      ':postData' => date('Y-m-d H:i:s')
    ));

    return $stmt->execute();
  }






}





?>
