<?php
require_once 'models/Usuario.php';

session_start();

if(!isset($_SESSION['usuarioId'])){
    session_destroy();
    header('Location: login.php');
}

// var_dump($_FILES['myfile']) ?? 'vazioo';
if (isset($_FILES['myfile'])) {
	$target_dir = "uploads/usuarios/";
	$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if (isset($_POST["myfile"])) {
		$check = getimagesize($_FILES["myfile"]["tmp_name"]);
		if ($check !== false) {
			// echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			// echo "File is not an image.";
			$uploadOk = 0;
		}
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		// echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif"
	) {
		// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		// echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
			//   echo "The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded.";
		} else {
			//   echo "Sorry, there was an error uploading your file.";
		}
	}
}

include_once 'header.php';
?>
<div class="container">
	<nav id="navigation">
		<a href="cadastrarUsuarios.php" class="btn btn-primary">CADASTRAR USUARIOS</a>
		<a href="verUsuarios.php" class="btn btn-primary">VISUALIZAR USUARIOS</a>
	</nav>
	<div id="middle">
		<div id="title">
			<h1>Cadastrar usuario</h1>
		</div>
		<div id="cadastro">
			<form action="cadastrarUsuarios.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" name="nome" id="nome">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email">
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" name="senha" id="senha">
				</div>
				<div class="form-group">
					<label for="foto">Foto</label>
					<input type="file" name="myfile" id="foto">
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
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