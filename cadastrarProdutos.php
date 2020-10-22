<?php
	require_once 'models/Produto.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar novo Produto
         - PHP POO</title>
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
				<div id="middle">
					<div id="title">
						<h1>Cadastrar Produto</h1>
					</div>
						<div id="cadastro">
							<form action="cadastrarProdutos.php" method="POST">
								<br>
								<input type="text" name="nome" placeholder="Nome Completo" required="required">
								<br>
								<input type="text" name="preco" placeholder="preco" required="required">
								<br>
								<input type="text" name="precoColetivo" placeholder="preço Coletivo" required="required">
								<br />
                                <input type="text" name="foto" placeholder="foto" required="required">
								<br />
								<input type="submit" name="submit" class="cadastro_submit" value="Cadastrar">
							</form>
						</div>
						<div id="sucesso" style="margin-left: 500px;">
							<p>
								<?php
									include 'controllers/ProdutoCadastro.php';
								?>
							</p>
						</div>
				</div>
		</div>
	</body>
</html>