<?php
require_once 'models/Compra.php';
$Compra= new Compra();
if(isset($_POST['submit'])){
	$id_usuario = $_POST['id_usuario'];
	$id_produto = $_POST['id_produto'];
	$quantidade = $_POST['quantidade'];
   
	$Compra->setId_usuario($id_usuario);
	$Compra->setId_produto($id_produto);
    $Compra->setQuantidade($quantidade);
	$Compra->insert($id_usuario,$id_produto,$quantidade);
}
?>