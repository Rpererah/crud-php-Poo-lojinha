<?php
require_once 'models/Usuario.php';
$usuario= new Usuario();
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$usuario->setEmail($email);
	$usuario->setSenha(md5($senha));
	$usuario->login($email, $senha);
}
?>