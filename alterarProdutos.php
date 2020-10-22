<?php
require_once 'models/Produto.php';
$precoAtual=new Produto();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Alterar Produto - PHP POO</title>
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
						<h1>Alterar Informações de Produto</h1>
					</div>
					<div id="form">
						<form action="alterarProdutos.php" method="GET">
						<?php 
						$precoAtual->select();
						$nomeAtual=$precoAtual->getNome();
                        $fotoAtual=$precoAtual->getFoto();
                        $precoAtual=$precoAtual->getPreco();
                        $precoColetivoAtual=$precoAtual->getPrecoColetivo();
						?>
							<input type="text" name="nome" placeholder="<?=$nomeAtual?>" required="required">
                            <br>
                            <input type="email" name="foto" placeholder="<?=$emailAtual?>" required="required">
							<br>
                            <input type="email" name="preco" placeholder="<?=$emailAtual?>" required="required">
							<br>
                            <input type="email" name="precoColetivo" placeholder="<?=$emailAtual?>" required="required">
							<br>
							<input type="hidden" name="alterar" value="<?php echo $_GET['alterar']; ?>">
							<input type="submit" name="submit_alterar" id="submit">
						</form>
						<div id="sucesso">
							<p>
								<?php 
									include 'controllers/ProdutoAlterar.php';
								?>
							</p>
						</div>
						<!-- <div id="info_user"> -->
							<?php 
								//include 'controllers/ProdutoAlterarInfo.php';
							?>
						<!-- </div> -->
					</div>
				</div>
		</div>
	</body>
</html>