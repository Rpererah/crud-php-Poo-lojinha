<?php
$validacoes = new ValidacoesP();

if(isset($_GET['submit_alterar'])){
	$id = $_GET['alterar'];
	$nome = $_GET['nome'];
    $foto =$_GET['foto'];
    $preco =$_GET['preco'];
    $precoColetivo =$_GET['precoColetivo'];
	$validacoes->filtraUpdate($id, $nome,$foto,$preco,$precoColetivo);
}
?>