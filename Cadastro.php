<?php
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
    include_once 'partials/header.php';
    require_once 'models/Usuario.php';
    session_start();
?>
    <div class="container">
        <form action="Cadastro.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" name="nome" required />
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email" required />
            </div>
            <div class="form-group">
                <label for="Senha">Senha</label>
                <input type="password" class="form-control" name="senha" required />
            </div>
            <div class="form-group">
                <label for="Senha">Foto</label>
                <input type="file" class="form-control" name="myfile" id="foto" required />
            </div>
            <?php
                if(isset($_SESSION['Cadastrado'])){
                echo "<strong> ".$_SESSION['Cadastrado']."</strong><br/>";
                unset($_SESSION['Cadastrado']);}
            ?>
                <button type="submit" name="submit" class="btn btn-primary">Cadastrar-se</button>
                <br />
                <br />
                <a href="login.php"><button type="button" class="btn btn-primary">
                Ir para Login
                </button></a>
        </form>  
    </div>
<?php
        require_once 'controllers/UsuarioCadastroSimples.php';
        include_once 'partials/footer.php';
?>

