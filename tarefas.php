<?php

session_start();

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();
    
    $tarefa['name'] = $_GET['nome'];

    if (isset($_GET['descricao']) && $_GET['descricao'] != '') {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    $tarefa['prioridade'] = $_GET['prioridade'];

    if (isset($_GET['prazo']) && $_GET['prazo'] != '') {
        $tarefa['prazo'] = $_GET['prazo'];
    } else {
        $tarefa['prazo'] = '';
    }

    if (isset($_GET['concluida']) && $_GET['concluida'] != '') {
        $tarefa['concluida'] = $_GET['concluida'];
    } else {
        $tarefa['concluida'] = '';
    }
    
    $_SESSION['lista_tarefas'][] = $tarefa;
}

if (isset($_SESSION['lista_tarefas'])) {
    $lista_tarefas = $_SESSION['lista_tarefas'];
} else {
    $lista_tarefas = array();
}

include "template.php";