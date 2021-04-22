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
<form action="postusuario.php" method="post">
    Nome: <input type="text" name="nome"><br>
    Usuario: <input type="text" name="usuario"><br>
    Senha: <input type="text" name="senha">
<input type="submit">
</form>

</body>
</html>



