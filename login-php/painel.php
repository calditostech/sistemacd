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
    margin-left: 1100px;
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
    <!-- barra menu -->
<ul>
  <li><h2 class="sistema-text">SISTEMA DE CD'S</h2></li>
  <li><h2 class="usuario">Olá, <?php echo $_SESSION['usuario'];?></h2></li>
  <li><h2 class="logout"><a href="logout.php">Sair</a></h2></li>
</ul>

<div class="container">
  <a href="inserircd.php"><button type="button" class="btn btn-success">Inserir CD</button></a>
  <a href="cadastrousuario.php"><button type="button" class="btn btn-primary">Cadastra Usuario</button></a>
  <?php
  include("conexao.php");
  $sql = "SELECT * FROM cd";
                    if($result = mysqli_query($conexao,$sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Artista</th>";
                                        echo "<th>Ano</th>";
                                        echo "<th>Genero</th>";
                                        echo "<th>Lançamento</th>";
                                        echo "<th>Duração</th>";
                                        echo "<th>Ações</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['nome'] . "</td>";
                                        echo "<td>" . $row['artista'] . "</td>";
                                        echo "<td>" . $row['ano'] . "</td>";
                                        echo "<td>" . $row['genero'] . "</td>";
                                        echo "<td>" . $row['lancamento'] . "</td>";
                                        echo "<td>" . $row['duracao'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><ion-icon name="pencil-outline" class="pencil"></ion-icon>
                                            </a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><ion-icon name="trash-outline" class="outline"></ion-icon>
                                            </a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Nenhum cd encontrado.</em></div>';
                        }
                    } else{
                        echo "Por favor tente mais tarde.";
                    }
 
                    // Close connection
                    mysqli_close($conexao);
                    ?>
</div>

</body>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</html>
