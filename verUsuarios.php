<?php
  require_once 'models/Usuario.php';
  require_once 'controllers/Functions.php';
  $mostrar = new Usuario();
  $functions = new Functions();
?>

<!DOCTYPE html>
<html>
  <head>
    	<title>Ver Usuarios - PHP POO</title>
      <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <meta charset="utf-8">
  </head>
  <body>
      <div id="container">
          <nav id="navigation">
              <a href="cadastrarUsuarios.php">CADASTRAR USUARIOS</a>
              <a href="verUsuarios.php">CADASTROS USUARIOS</a>
          </nav>
          
        	<table id="customers">
              <tr>
                  <th>Usuario</th>
              </tr>
              <tr>
                  <td>
                      <ul>
                        <?php $mostrar->mostraUsuario();?>
                      </ul>
                  </td>
              </tr>
          </table>

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