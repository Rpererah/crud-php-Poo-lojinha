<?php
	require_once 'models/Usuario.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar novo Usuario - PHP POO</title>
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
				<div id="middle">
					<div id="title">
						<h1>Cadastrar usuario</h1>
					</div>
						<div id="cadastro">
							<form action="cadastrarUsuarios.php" method="POST">
								<br>
								<input type="text" name="nome" placeholder="Nome Completo" required="required">
								<br>
								<input type="email" name="email" placeholder="email" required="required">
								<br>
								<input type="password" name="senha" placeholder="senha" required="required">
								<br />
								<input type="submit" name="submit" class="cadastro_submit" value="Cadastrar">
							</form>
						</div>
						<div id="sucesso" style="margin-left: 500px;">
							<p>
								<?php
									include 'controllers/UsuarioCadastro.php';
								?>
							</p>
						</div>
				</div>
		</div>
	</body>
</html>