<?php

include('class.password.php');

class User extends Password{

    private $db;

	function __construct($db){
		parent::__construct();

		$this->_db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

	private function get_user_hash($usuario){

		try {

  		$stmt = $this->_db->prepare('SELECT senha FROM blog_usuario WHERE usuario = :usuario');
			$stmt->execute(array('usuario'=> $usuario));

			$row = $stmt->fetch();
			return $row['senha'];

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}


	public function login($usuario,$senha){

		$hashed = $this->get_user_hash($usuario);

		if($this->password_verify($usuario,$hashed) == 1){

		    $_SESSION['loggedin'] = true;
		    return true;
		}
	}


	public function logout(){
		session_destroy();
	}

}


?>
