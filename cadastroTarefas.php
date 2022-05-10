<?php
include 'conexao.php';
include 'conteudo.html';

if(empty($_GET['cad-titulo']) || empty($_GET['cad-conteudo'])){
    header('Location: conteudo.html');
    exit();
}

$titulo = mysqli_escape_string($con, $_GET['cad-titulo']);
$conteudo = mysqli_escape_string($con, $_GET['cad-conteudo']);

$query = "insert into conteudo(titulo, conteudo) value ('{$titulo}', '{$conteudo}')";

$result = mysqli_query($con,$query);

if($result){
    $msg = "<style> .btn-confirma button{color: greenyellow;}>";
    echo $msg;
    sleep(2);
    header('Location: conteudo.html');
}
else{
    echo 'Falha ao cadastrar';
}