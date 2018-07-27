<?php 

class Usuario {


	private $id_usuario;
	private $deslogin;
	private $dessenha;

	public function getIdusuario(){
		return $this->id_usuario;
	}

	public function setIdusuario($value){
		$this->id_usuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function loadById($id){

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuario = :ID", array(":ID"=>$id));

		if (count($result) > 0){

			$row = $result[0];

			$this->setIdusuario($row['id_usuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);

		}

	}

	//não utilizamos o $this, então pode ser estático
	public static function getList(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

	}

	public static function search($login){


		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(

			':SEARCH'=>"%" . $login ."%"
		));

	}


	public function login($login, $password){

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login, 
			":PASSWORD"=>$password
	));

		if (count($result) > 0){

			$row = $result[0];

			$this->setIdusuario($row['id_usuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);

		} else {

			throw new Exception("Login ou senha inválidos.");
			
		}
	

	}


	public function __toString(){


		return json_encode(array(
			"id_usuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha()

		));
	}
}


?>