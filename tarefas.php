<?php

include "banco.php";
include "ajudantes.php";

session_start();

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();
    
    $tarefa['nome'] = htmlspecialchars($_GET['nome']);

    if (isset($_GET['descricao']) && $_GET['descricao'] != '') {
        $tarefa['descricao'] = htmlspecialchars($_GET['descricao']);
    } else {
        $tarefa['descricao'] = '';
    }

    $tarefa['prioridade'] = htmlspecialchars($_GET['prioridade']);

    if (isset($_GET['prazo']) && $_GET['prazo'] != '') {
        $tarefa['prazo'] = traduz_data_para_banco(
            htmlspecialchars($_GET['prazo'])
        );
    } else {
        $tarefa['prazo'] = '';
    }

    if (isset($_GET['concluida']) && $_GET['concluida'] != '') {
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }
    
    gravar_tarefa($conexao, $tarefa);
}

$lista_tarefas = buscar_tarefas($conexao);

include "template.php";