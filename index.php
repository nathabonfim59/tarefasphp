<?php

session_start();

include "banco.php";
include "ajudantes.php";

$exibir_tabela = true;

$operacao = (isset($_GET['operacao'])) ? $_GET['operacao'] : '';

if (parametro_requisicao('nome')) {
    $tarefa = array();

    $tarefa['id'] = filtrar_numeros($_GET['id']);
    $tarefa['nome'] = htmlspecialchars($_GET['nome']);
    $tarefa['prioridade'] = filtrar_numeros($_GET['prioridade']);

    if (parametro_requisicao('descricao')) {
        $tarefa['descricao'] = htmlspecialchars($_GET['descricao']);
    } else {
        $tarefa['descricao'] = '';
    }

    if (parametro_requisicao('prazo')) {
        $tarefa['prazo'] = traduz_data_para_banco(
            htmlspecialchars($_GET['prazo'])
        );
    } else {
        $tarefa['prazo'] = '';
    }

    if (parametro_requisicao('concluida')) {
        $tarefa['concluida'] = filtrar_numeros(
            $_GET['concluida']
        );
    } else {
        $tarefa['concluida'] = 0;
    }

    // Verifica se a tarefa é para ser editada ou
    // atualizada com base no parâmetros $_GET['operacao']
    if ($operacao == 'editar') {
        editar_tarefa($conexao, $tarefa);
        $exibir_tabela = false;
    } else if ($operacao == 'adicionar') {
        gravar_tarefa($conexao, $tarefa);
    }

    header('Location: /');
    die();
}

// Caso não seja uma atualização/gravação
// de tarefas

$lista_tarefas = buscar_tarefas($conexao);

$tarefa = array(
    'id' => 0,
    'nome' => '',
    'descricao' => '',
    'prazo' => '',
    'prioridade' => 1,
    'concluida' => 0
);

include "template.php";