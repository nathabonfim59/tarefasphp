<?php

session_start();

include "banco.php";
include "ajudantes.php";

$exibir_tabela = true;

$operacao = (isset($_GET['operacao'])) ? $_GET['operacao'] : '';

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();

    $tarefa['id'] = $_GET['id'];

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

    if ($operacao == 'editar') {
        editar_tarefa($conexao, $tarefa);
    } else if ($operacao = 'adicionar') {
        gravar_tarefa($conexao, $tarefa);
    }

    header('Location: tarefas.php');
    die();
}

$lista_tarefas = buscar_tarefas($conexao);

$tarefa = array(
    'id' => 0,
    'nome' => '',
    'descricao' => '',
    'prazo' => '',
    'prioridade' => 1,
    'concluida' => ''
);

$requisicaoEditar = isset($_GET['operacao']) && isset($_GET['id']);

if ($requisicaoEditar && $_GET['operacao'] == 'editar') {
    $tarefa = buscar_tarefa($conexao, $_GET['id']);
    error_log("Hello");
    $exibir_tabela = false;
}

include "template.php";