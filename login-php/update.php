<?php
// Include config file
include('conexao.php');
 
// Define variables and initialize with empty values
$nome = $artista = $ano = $genero = $lancamento = $duracao = "";
$nome_err = $artista_err = $ano_err = $genero_err = $lancamento_err = $duracao_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_nome = trim($_POST["nome"]);
    if(empty($input_nome)){
        $nome_err = "Por favor entre com nome.";
    }else{
        $nome = $input_nome;
    }
    
    // Validate address address
    $input_artista = trim($_POST["artista"]);
    if(empty($input_artista)){
        $artista_err = "Por favor entre com um artista.";     
    } else{
        $artista = $input_artista;
    }
    
    // Validate salary
    $input_ano = trim($_POST["ano"]);
    if(empty($input_ano)){
        $ano_err = "Por favor entre com um ano.";     
    }else{
        $ano = $input_ano;
    }

    // Validate salary
    $input_genero = trim($_POST["genero"]);
    if(empty($input_genero)){
        $genero_err = "Por favor entre com o genero.";     
    } else{
        $genero = $input_genero;
    }

    // Validate salary
    $input_lancamento = trim($_POST["lancamento"]);
    if(empty($input_lancamento)){
        $lancamento_err = "Por favor entre com lancamento.";     
    } else{
        $lancamento = $input_lancamento;
    }

    // Validate salary
    $input_duracao = trim($_POST["duracao"]);
    if(empty($input_duracao)){
        $duracao_err = "Por favor entre com a duração.";     
    } else{
        $duracao = $input_duracao;
    }
    
    // Check input errors before inserting in database
    if(empty($nome_err) && empty($artista_err) && empty($ano_err) && empty($genero_err) && empty($lancamento_err) && empty($duracao_err)){
        // Prepare an update statement
        $sql = "UPDATE cd SET nome=?, artista=?, ano=?, genero=?, lancamento=?, duracao=?  WHERE id=?";
         
        if($stmt = mysqli_prepare($conexao, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_nome, $param_artista, $param_ano, $param_genero, $param_lancamento, $param_duracao, $param_id);
            
            // Set parameters
            $param_nome = $nome;
            $param_artista = $artista;
            $param_ano = $ano;
            $param_genero = $genero;
            $param_lancamento = $lancamento;
            $param_duracao = $duracao;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: painel.php");
                exit();
            } else{
                echo "Oops! Por favor tente mais tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conexao);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM cd WHERE id = ?";
        if($stmt = mysqli_prepare($conexao, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $nome = $row["nome"];
                    $artista = $row["artista"];
                    $ano = $row["ano"];
                    $genero = $row["genero"];
                    $lancamento = $row["lancamento"];
                    $duracao = $row["duracao"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Tente mais tarde.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conexao);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Atualizar CD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Atualizar Cd</h2>
                    <a href="painel.php"><button type="button" class="btn btn-warning">Voltar</button></a>
                    <p>Digite aqui os campos para atualizar.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control <?php echo (!empty($nome_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nome; ?>">
                            <span class="invalid-feedback"><?php echo $nome_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Artista</label>
                            <input name="artista" class="form-control <?php echo (!empty($artista_err)) ? 'is-invalid' : ''; ?>"value="<?php echo $artista; ?>">
                            <span class="invalid-feedback"><?php echo $artista_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Ano</label>
                            <input type="text" name="ano" class="form-control <?php echo (!empty($ano_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ano; ?>">
                            <span class="invalid-feedback"><?php echo $ano_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Genero</label>
                            <input type="text" name="genero" class="form-control <?php echo (!empty($genero_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $genero; ?>">
                            <span class="invalid-feedback"><?php echo $genero_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Lancamento</label>
                            <input type="text" name="lancamento" class="form-control <?php echo (!empty($lancamento_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lancamento; ?>">
                            <span class="invalid-feedback"><?php echo $lancamento_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Duração</label>
                            <input type="text" name="duracao" class="form-control <?php echo (!empty($duracao_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $duracao; ?>">
                            <span class="invalid-feedback"><?php echo $duracao_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Atualizar">
                        <a href="painel.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>