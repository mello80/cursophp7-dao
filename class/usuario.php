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

	public function __toString(){


		return json_encode(array(
			"id_usuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha()

		));
	}
}


?>