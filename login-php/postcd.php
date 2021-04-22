<?php
include('conexao.php');
$nome = $_POST["nome"];
$artista = $_POST["artista"];
$ano = $_POST["ano"];
$genero = $_POST["genero"];
$lancamento = $_POST["lancamento"];
$duracao = $_POST["duracao"];


$sql = "INSERT INTO cd(nome, artista, ano, genero, lancamento, duracao) values('".$nome."','".$artista."','".$ano."','".$genero."','".$lancamento."','".$duracao."')";
//echo $sql;

if(mysqli_query($conexao,$sql)){
    $msg = "Gravado com sucesso!";
}else{
    $msg = "Erro ao gravar!";
}
echo $msg;
mysqli_close($conexao);
?>