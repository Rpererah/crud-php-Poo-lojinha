<?php
	require_once 'models/Produto.php';
	if(isset($_FILES['myfile'])){
		$target_dir = "uploads/produtos/";
		$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["myfile"])) {
		  $check = getimagesize($_FILES["myfile"]["tmp_name"]);
		  if($check !== false) {
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
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
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
								<input type="text" name="nome" placeholder="Nome Produto" required="required">
								<br>
								<input type="text" name="preco" placeholder="preço" required="required">
								<br>
								<input type="text" name="precoColetivo" placeholder="preço Coletivo" required="required">
								<br />
								<input type="number" name="qntdColetivo" placeholder="Qntd. para preço Coletivo" required="required">
								<br />
                                <div class="form-group">
   								  	<label>Foto:</label>
   									<input type="file" name="myfile">
								</div>
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