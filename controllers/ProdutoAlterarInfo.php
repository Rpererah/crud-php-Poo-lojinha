<?php
$validacoes = new ValidacoesP();

if(isset($_GET['alterar'])){
	$id = $_GET['alterar'];
	$validacoes->filtraProduto($id);
}
?>