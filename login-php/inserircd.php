<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE HTML>
<html>  
<body>
<ul>
  <li><h2 class="sistema-text">SISTEMA DE CD'S</h2></li>
  <li><h2 class="usuario">Olá, <?php echo $_SESSION['usuario'];?></h2></li>
  <li><h2 class="logout"><a href="logout.php">Sair</a></h2></li>
</ul>
<form action="postcd.php" method="post">
    Nome: <input type="text" name="nome"><br>
    Artista: <input type="text" name="artista"><br>
    Ano: <input type="text" name="ano"><br>
    Genero: <input type="text" name="genero"><br>
    Lancamento: <input type="text" name="lancamento"><br>
    Duração: <input type="text" name="duracao"><br>
<input type="submit">
</form>

</body>
</html>