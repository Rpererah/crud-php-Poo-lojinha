<?php
require_once 'models/Usuario.php';
require_once 'controllers/Functions.php';
session_start();

function verificaAdmin1()
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
    

$mostrar = new Usuario();
$functions = new Functions();
$mostrar->mostraUsuario();
// $fotoAtual = $mostrar->getFoto();
// $nomeAtual = $mostrar->getNome();
// $emailAtual = $mostrar->getEmail();
// $idAtual = $mostrar->getId();
$queryAtual1 = $mostrar->getQuery();

$nivel=verificaAdmin1();

if (!isset($_SESSION['usuarioId']) || $nivel!=2) {
    session_destroy();
    header('Location: login.php');
}

include_once 'partials/header.php';
?>
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
</style>
<div class="container">
    <nav id="navigation">
        <a href="verUsuarios.php" class="btn btn-primary">USUÁRIOS CADASTRADOS</a>
        <a href="cadastrarUsuarios.php" class="btn btn-primary">CADASTRAR USUARIOS</a>
    </nav>
    <br>
    <div id="title">
        <h1>Ver Usuários</h1>
    </div>
    <br />
    <div class="row">
        <?php foreach ($queryAtual1 as $linha) : ?>
            <div class="col-4" style="margin-bottom: 30px;">
                <div class="card">
                    <img src="uploads/usuarios/<?= $linha['foto'] ?>" class="card-img-top" alt="<?= $linha['foto'] ?>" width="200px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $linha['nome'] ?></h5>
                        <p class="card-text"><?= $linha['email'] ?></p>
                    </div>
                    <div class="card-body">
                        <a href="alterarUsuarios.php?alterar=<?= $linha['id_usuario'] ?>" class="card-link">Alterar</a>
                        <a href="verUsuarios.php?deleta=<?= $linha['id_usuario'] ?>" class="card-link">Deletar</a>
                    </div>
                </div>
                <div id="alter_del">
                    <div id="info_alter_del">
                        <p>
                            <?php
                            include 'controllers/UsuarioVer.php';
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>

</html>