<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
<title>Cadastro Usuario</title>
</head>
<body>
<div class="container">
<h3>Adicionar Usuario</h3>
<form method="POST" action="./controllers/UsuarioController.php">
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
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</div>
</body>
</html>