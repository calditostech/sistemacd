<?php
include('conexao.php');
$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "INSERT INTO usuario(nome, usuario, senha) values('".$nome."','".$usuario."','".$senha."')";
//echo $sql;

if(mysqli_query($conexao,$sql)){
    $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;
mysqli_close($conexao);
?>