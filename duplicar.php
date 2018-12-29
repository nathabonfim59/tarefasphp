<?php

include "banco.php";

$tarefa_id = $_GET['id'];

$dados_tarefa = buscar_tarefa($conexao, $tarefa_id);

gravar_tarefa($conexao, $dados_tarefa);


header('Location: /');