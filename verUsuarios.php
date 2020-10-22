<?php
  require_once 'models/Usuario.php';
  require_once 'controllers/Functions.php';
  $mostrar = new Usuario();
  $functions = new Functions();
  $mostrar->mostraUsuario();
  $fotoAtual = $mostrar->getFoto();
  $nomeAtual = $mostrar->getNome();
  $emailAtual = $mostrar->getEmail();
  $idAtual = $mostrar->getId();
  $queryAtual = $mostrar->getQuery();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ver Usuarios - PHP POO</title>
        <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <meta charset="utf-8">
    </head>
    <style>
		body{
    		background-color: #7aabf9;
  		}
	</style>
    <body>
        <div class="container">
            <nav id="navigation">
                <a href="cadastrarUsuarios.php" class="btn btn-primary">CADASTRAR USUARIOS</a>
				<a href="verUsuarios.php" class="btn btn-primary">CADASTROS USUARIOS</a>
			</nav>
            <?php foreach($queryAtual as $linha) : ?>
            <div class="card col-6">
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
            <?php endforeach; ?>
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
    </body>
</html>