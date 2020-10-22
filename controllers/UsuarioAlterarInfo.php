<?php
$validacoes = new Validacoes();

if(isset($_GET['alterar'])){
	$id = $_GET['alterar'];
	$validacoes->filtraUsuario($id);
}
?>