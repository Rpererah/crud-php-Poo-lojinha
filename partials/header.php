<?php
function activeNav($href, $href2)
{
    $endereco = $_SERVER['REQUEST_URI'];
    $strings = explode("/", $endereco);
    $path = end($strings);
    if ($href == $path || $href2 == $path) {
        return 'active';
    }
}

function estaLogado()
{
    return (isset($_SESSION['usuarioId']));
}

function retornaId()
{
    if (isset($_SESSION['usuarioId'])) {
        return $_SESSION['usuarioId'];
    }
}

function verificaAdmin()
{
    if (isset($_SESSION['usuarioNiveisAcessoId'])) {
        if ($_SESSION['usuarioNiveisAcessoId'] == 1) {

            return $nivel = 2;
            echo $nivel;
        }
    } elseif (isset($_SESSION['estaLogado'])) {
        if ($_SESSION['estaLogado'] == 1) {
            return $nivel = 1;
        }
    } else {
        return $nivel = 0;
    }
}
$idUsuario = retornaId();

require_once 'models/Usuario.php';
$mostrar = new Usuario();
$functions = new Functions();
$mostrar->mostraFotoUsuario($idUsuario);
$nivel = verificaAdmin();
if (isset($_SESSION['usuarioId'])) {
    $queryAtual = $mostrar->getQuery();
    $foto = $queryAtual['foto'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Bargain Market</title>
</head>

<style>
    .avatar {
        vertical-align: middle;
        border-radius: 50%;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">Bargain Market</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item <?= activeNav('index.php', '') ?>">
                    <a class="nav-link" href="<?= ($nivel != 2) ? 'index.php' : 'admin.php' ?>">Home <span class="sr-only"></span></a>
                </li>
                <?php
                if ($nivel != 2) {
                    "";
                } else {
                    ?><li class="nav-item <?= activeNav('verUsuarios.php', 'cadastrarUsuarios.php') ?>">
                        <a class="nav-link" href="verUsuarios.php">Usuarios</a>
                    </li><?php
                    }
                    ?>
                <li class="nav-item <?= activeNav('verProdutosUsuario.php', 'cadastrarProdutos.php') ?>">
                    <a class="nav-link" href="<?= ($nivel != 2) ? 'verProdutosUsuario.php' : 'cadastrarProdutos.php' ?>">Produtos</a>
                </li>
                <li class="nav-item <?= activeNav('verCompras.php', '#') ?>">
                    <a class="nav-link" href="verCompras.php">Compras</a>
                </li>
                <li class="nav-item <?= activeNav('login.php', 'logout.php') ?>">
                    <a class="nav-link" href="<?= estaLogado() ? 'controllers/logout.php' : 'login.php' ?>"><?= estaLogado() ? 'Sair' : 'Login' ?></a>
                </li>
                <?php if (estaLogado() && !empty($foto)) : ?>
                    <a class="navbar-brand" href="#">
                        <img src="uploads/usuarios/<?= $foto ?>" width="30" height="30" alt="Foto Usuário" loading="lazy" class="avatar">
                    </a>
                <?php endif; ?>
        </div>
    </nav>