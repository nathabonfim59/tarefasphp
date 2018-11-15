<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'sistematarefas';
$bdSenha = 'sistema';
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)) {
    echo "Problema para conectar ao banco. Verifique os dados.";
    die();
}


/**
 * Busca tarefas no banco de dados
 *
 * @param mysqli $conexao Conexão com o banco de dados
 * @return void
 */
function buscar_tarefas($conexao) {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $lista_tarefas = array();

    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $lista_tarefas[] = $tarefa;
    }

    return $lista_tarefas;

}


/**
 * Grava uma tarefa no banco de dados
 *
 * @param mysqli $conexao Conexão com o mysqli 
 * @param array $tarefa Tarefa a ser adicionada
 * @return void
 */
function gravar_tarefa($conexao, $tarefa) {
    $sqlGravar = "INSERT INTO tarefas 
    (nome, descricao, prioridade, prazo)
    VALUES
    (
        '{$tarefa['nome']}',
        '{$tarefa['descricao']}',
        {$tarefa['prioridade']},
        '{$tarefa['prazo']}'
    )";

    echo $sqlGravar;

    mysqli_query($conexao, $sqlGravar);
}