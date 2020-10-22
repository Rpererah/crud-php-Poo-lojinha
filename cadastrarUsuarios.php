<?php
	require_once 'models/Usuario.php';
	echo "FILES";
	var_dump($_FILES);
	echo "\n";
	echo "POST";
	var_dump($_POST);
	// echo $_FILES['myfile'] ?? 'vazioo';

	$target_dir = "uploads/usuarios/";
	$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["myfile"]["tmp_name"]);
	  if($check !== false) {
	    echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;
	  } else {
	    echo "File is not an image.";
	    $uploadOk = 0;
	  }
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	  // Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
			  echo "The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded.";
		} else {
		  echo "Sorry, there was an error uploading your file.";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar novo Usuario - PHP POO</title>
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
				<div id="middle">
					<div id="title">
						<h1>Cadastrar usuario</h1>
					</div>
						<div id="cadastro">
							<form action="cadastrarUsuarios.php" method="POST" enctype="multipart/form-data">
								<div class="form-group">
    								<label>Nome</label>
    								<input type="text" class="form-control" name="nome">
							  	</div>
							  	<div class="form-group">
    								<label>Email</label>
    								<input type="email" class="form-control" name="email">
								</div>
								<div class="form-group">
    								<label>Senha</label>
    								<input type="password" class="form-control" name="senha">
								</div>
								<div class="form-group">
   								  	<label>Foto</label>
   									<input type="file" name="myfile">
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