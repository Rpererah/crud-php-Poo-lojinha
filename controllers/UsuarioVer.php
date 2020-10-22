<?php
$mostrar = new Usuario();
$validacoes = new Validacoes();

if(isset($_GET['id_usuario'])){
     $id = $_GET['id_usuario'];
     $validacoes->filtraUsuario($id);
}

if(isset($_GET['deleta'])){
	$id = $_GET['deleta'];
	$validacoes->filtraDeleta($id);
}

?>