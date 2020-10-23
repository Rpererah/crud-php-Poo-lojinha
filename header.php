<?php
function activeNav($href)
{
    $endereco = $_SERVER['REQUEST_URI'];
    $strings = explode("/", $endereco);
    $path = end($strings);
    if ($href == $path) {
        return 'active';
    }
}

function estaLogado() {
    if (isset($_SESSION['usuarioId'])){
        return true;
    }
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

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">Bargain Market</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item <?= activeNav('index.php') ?>">
                    <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item <?= activeNav('cadastrarUsuarios.php') ?>">
                    <a class="nav-link" href="cadastrarUsuarios.php">Usuarios</a>
                </li>
                <li class="nav-item <?= activeNav('verProdutosUsuario.php') ?>">
                    <a class="nav-link" href="verProdutosUsuario.php">Produtos</a>
                </li>
                <li class="nav-item <?= activeNav('login.php') ?>">
                    <a class="nav-link" href="<?= estaLogado() ? 'logout.php' : 'login.php' ?>"><?= estaLogado() ? 'Sair' : 'Login' ?></a>
                </li>
                </form>
        </div>
    </nav>