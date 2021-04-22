<?php
session_start();
include('verifica_login.php');
?>
<!DOCTYPE HTML>
<html> 
<head>
<meta charset="UTF-8">
    <title>Cadastra Usuario</title>
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
<form action="postusuario.php" method="post">
<div class="mb-3 row">
    <label for="inputText" class="col-sm-2 col-form-label">Nome:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="nome">
    </div>
    <label for="inputText" class="col-sm-2 col-form-label">Usuario:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText" name="usuario">
    </div>
    <label for="inputPassword" class="col-sm-2 col-form-label">Senha:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputText" name="senha">
    </div>
    <button type="submit" class="btn btn-primary">Primary</button>
</div>
</form>

</body>
</html>



