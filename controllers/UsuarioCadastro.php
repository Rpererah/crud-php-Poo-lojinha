<?php
require_once 'models/Usuario.php';
$usuario= new Usuario();
if(isset($_POST['submit'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$usuario->setNome($nome);
	$usuario->setEmail($email);
	$usuario->setSenha($senha);
	$usuario->insert($nome, $email, $senha);
}
?>