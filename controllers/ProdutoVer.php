<?php
$mostrar = new Produto();
$validacoes = new ValidacoesP();

if(isset($_GET['id_Produto'])){
     $id = $_GET['id_Produto'];
     $validacoes->filtraProduto($id);
}

if(isset($_GET['deleta'])){
	$id = $_GET['deleta'];
	$validacoes->filtraDeleta($id);
}

?>