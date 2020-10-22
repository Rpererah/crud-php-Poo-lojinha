<?php
$validacoes = new Validacoes();

if(isset($_GET['submit_alterar'])){
	$id = $_GET['alterar'];
	$nome = $_GET['nome'];
	$email =$_GET['email'];
	$validacoes->filtraUpdate($id, $nome,$email);
}
?>