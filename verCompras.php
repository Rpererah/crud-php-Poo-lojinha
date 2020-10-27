<?php
require_once 'models/Compra.php';
require_once 'controllers/Functions.php';
session_start();
include_once 'partials/header.php';
$mostrar = new Compra();
$nivel = verificaAdmin();
$idUsuario = $_SESSION['usuarioId'] ?? '';
$idAtual=$mostrar->setId_usuario($idUsuario);
switch ($nivel) {
    case 1:
        $mostrar->filtrarCompraPorUsuario();
        $queryAtual = $mostrar->getQuery();
        include_once 'partials/compras/usuario.php';
        break;

    case 2:
        $mostrar->mostraCompra();
        $queryAtual = $mostrar->getQuery();
        include_once 'partials/compras/admin.php';
        break;

    default:
        $mostrar->filtrarCompraComDesconto();
        $queryAtual = $mostrar->getQuery();
        include_once 'partials/compras/deslogado.php';
}
?>
