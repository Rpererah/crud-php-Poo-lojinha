<?php
  require_once 'models/Produto.php';
  require_once 'controllers/Functions.php';
  $mostrar = new Produto();
  $functions = new Functions();
?>

<!DOCTYPE html>
<html>
  <head>
    	<title>Ver Produtos - PHP POO</title>
      <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <meta charset="utf-8">
  </head>
  <body>
      <div id="container">
          <nav id="navigation">
              <a href="cadastrarProdutos.php">CADASTRAR PRODUTOS</a>
              <a href="verProdutos.php">CADASTROS PRODUTOS</a>
          </nav>
          
        	<table id="customers">
              <tr>
                  <th>Produto</th>
              </tr>
              <tr>
                  <td>
                      <ul>
                        <?php $mostrar->mostraProduto();?>
                      </ul>
                  </td>
              </tr>
          </table>

          <div id="alter_del">
              <div id="info_alter_del">
                <p>
                  <?php 
                      include 'controllers/ProdutoVer.php';
                  ?>      
                </p>
             </div>
          </div>
      </div>
  </body>
</html>