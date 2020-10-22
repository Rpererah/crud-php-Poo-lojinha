<?php
require_once 'models/Produto.php';
$Produto= new Produto();
if(isset($_POST['submit'])){
	$nome = $_POST['nome'];
	$foto = $_POST['foto'];
    $preco = $_POST['preco'];
    $precoColetivo = $_POST['precoColetivo'];
	$Produto->setNome($nome);
	$Produto->setFoto($foto);
    $Produto->setPreco($preco);
    $Produto->setPrecoColetivo($precoColetivo);
	$Produto->insert($nome, $foto, $preco,$precoColetivo);
}
?>