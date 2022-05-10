<?php
    include 'inicio.html';
    include 'conexao.php';

$consulta = 'select * from conteudo';
$conexao = $con->query($consulta);

?>
        <link rel="stylesheet" href="tarefa.css">
        <div class="container">
        <?php while($dado = $conexao->fetch_array()){ ?>

        <form class="container-tarefas" action="cadastroTarefas.php" method="GET">
            <input disabled type="text" class="tarefas tarefas-titulo" name="cad-titulo" id="cad-titulo"   placeholder="<?php echo $dado['titulo'] ?>">

            <textarea disabled class="tarefas tarefas-conteudo" name="cad-conteudo" id="cad-conteudo" placeholder="<?php echo $dado['conteudo'] ?>"></textarea>
  
        </form>
        <?php }; ?> 

    </div>
<?php
    