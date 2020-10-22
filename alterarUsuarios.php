<?php
require_once 'models/Usuario.php';
$usuarioAtual=new Usuario();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Alterar Usuario - PHP POO</title>
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
						<h1>Alterar Informações de Usuario</h1>
					</div>
					<div id="form">
						<form action="alterarUsuarios.php" method="GET">
						<?php 
						$usuarioAtual->select();
						$nomeAtual=$usuarioAtual->getNome();
						$emailAtual=$usuarioAtual->getEmail();
						?>
							<input type="text" name="nome" placeholder="<?=$nomeAtual?>" required="required">
                            <br>
                            <input type="email" name="email" placeholder="<?=$emailAtual?>" required="required">
							<br>
							<input type="hidden" name="alterar" value="<?php echo $_GET['alterar']; ?>">
							<input type="submit" name="submit_alterar" id="submit">
						</form>
						<div id="sucesso">
							<p>
								<?php 
									include 'controllers/UsuarioAlterar.php';
								?>
							</p>
						</div>
						<!-- <div id="info_user"> -->
							<?php 
								//include 'controllers/UsuarioAlterarInfo.php';
							?>
						<!-- </div> -->
					</div>
				</div>
		</div>
	</body>
</html>