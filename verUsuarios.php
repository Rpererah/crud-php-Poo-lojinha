<?php
require_once 'models/Usuario.php';
require_once 'controllers/Functions.php';
$mostrar = new Usuario();
$functions = new Functions();
$mostrar->mostraUsuario();
// $fotoAtual = $mostrar->getFoto();
// $nomeAtual = $mostrar->getNome();
// $emailAtual = $mostrar->getEmail();
// $idAtual = $mostrar->getId();
$queryAtual = $mostrar->getQuery();

include_once 'header.php';
?>


<div class="container">
    <nav id="navigation">
        <a href="cadastrarUsuarios.php" class="btn btn-primary">CADASTRAR USUARIOS</a>
        <a href="verUsuarios.php" class="btn btn-primary">CADASTROS USUARIOS</a>
    </nav>
    <div class="row">
        <?php foreach ($queryAtual as $linha) : ?>
            <div class="card col-md-4">
                <img src="uploads/usuarios/<?= $foto = $linha['foto'] ?>" class="card-img-top" alt="...">
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
        <?php endforeach; ?>
    </div>
</div>
</body>

</html>