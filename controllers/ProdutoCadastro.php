<?php
require_once 'models/Produto.php';
$Produto= new Produto();
if(isset($_POST['submit'])){
	$nome = $_POST['nome'];
	$qntdColetivo=$_POST['qntdColetivo'];
	$foto = $_FILES['myfile']['name'] ?? '';
    $preco = $_POST['preco'];
    $precoColetivo = $_POST['precoColetivo'];
	$Produto->setNome($nome);
	$Produto->setFoto($foto);
    $Produto->setPreco($preco);
	$Produto->setPrecoColetivo($precoColetivo);
	$Produto->setQntdColetivo($qntdColetivo);
	$Produto->insert($nome,$foto,$preco,$precoColetivo,$qntdColetivo);
}
?>