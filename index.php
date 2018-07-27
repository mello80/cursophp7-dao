<?php 


require_once("config.php");

//Carrega um usuário
//$root = new Usuario();
//$root->loadById(3);
//echo $root;


//Carrega uma lista de usuário. Como não está sendo utilizado o $this e é estático a classe getlist, pode ser chamado direto com os :: e não precisa criar objeto.

//$lista = Usuario::getList();
//echo json_encode($lista);


//Carrega uma lista de usuarios buscando pelo login

//$search = Usuario::search("ma");
//echo json_encode($search);

//Carrega um usuário usando o login e a senha
$usuario = new Usuario();
$usuario->login("jose", "45678910");

echo $usuario;







//$sql = new Sql();

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//echo json_encode($usuarios);

 ?>