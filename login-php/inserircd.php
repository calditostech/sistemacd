<?php
session_start();
include('verifica_login.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
    <title>Cadastra CD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }

        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  height: 100px;
}

.usuario {
    margin-left: 1200px;
    color: yellow;
    margin-top: -40px;
}

.logout {
    margin-left: 1400px;
    margin-top: -50px;
    color: white;
}

.sistema-text {
    margin-left: 100px;
    color: white;
}
    </style>
</head>
<body>
<ul>
  <li><h2 class="sistema-text">SISTEMA DE CD'S</h2></li>
  <li><h2 class="usuario">Olá, <?php echo $_SESSION['usuario'];?></h2></li>
  <li><h2 class="logout"><a href="logout.php">Sair</a></h2></li>
  <a href="painel.php"><button type="button" class="btn btn-warning">Voltar</button></a>
</ul>
<form action="postcd.php" method="post">
<div class="mb-12 row">
    <label for="inputText" class="col-sm-2 col-form-label">Nome:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="nome">
    </div>
    <label for="inputText" class="col-sm-2 col-form-label">Artista:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="artista">
    </div>
    <label for="inputText" class="col-sm-2 col-form-label">Ano:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="ano">
    </div>
    <label for="inputText" class="col-sm-2 col-form-label">Genero:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="genero">
    </div>
    <label for="inputText" class="col-sm-2 col-form-label">Lançamento:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="lancamento">
    </div>
    <label for="inputText" class="col-sm-2 col-form-label">Duração:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="duracao">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</div>
</form>

</body>
</html>