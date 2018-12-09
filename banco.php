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
    if ($tarefa['prazo'] != '') {
        $tarefa['prazo'] = "'{$tarefa['prazo']}'";
    } else {
        $tarefa['prazo'] = 'null';
    }

    $sqlGravar = "INSERT INTO tarefas 
    (nome, descricao, prioridade, prazo, concluida)
    VALUES
    (
        '{$tarefa['nome']}',
        '{$tarefa['descricao']}',
        {$tarefa['prioridade']},
        {$tarefa['prazo']},
        {$tarefa['concluida']}
    )";

    echo $sqlGravar;
    mysqli_query($conexao, $sqlGravar);
}

/**
 * Busca uma tarefa no banco de dados 
 * a partir do ID
 *
 * @param mysqli $conexao Conexão com o banco
 * @param int $id ID da tarefa
 * @return void
 */
function buscar_tarefa($conexao, $id) {
    $sqlBusca = 'SELECT * FROM tarefas WHERE id = '. (int)$id;
    $resultado = mysqli_query($conexao, $sqlBusca);

    return mysqli_fetch_assoc($resultado);
}

/**
 * Atualiza os dados de uma tarefa
 *
 * @param mysqli $conexao Conexão com o Db
 * @param array $tarefa Dados atualizados da tarefa
 * @return void
 */
function editar_tarefa($conexao, $tarefa) {
    $sql = "
        UPDATE tarefas SET
            nome ='{$tarefa['nome']}',
            descricao ='{$tarefa['descricao']}',
            prioridade ='{$tarefa['prioridade']}',
            prazo ='{$tarefa['prazo']}',
            concluida = {$tarefa['concluida']}
        WHERE id = {$tarefa['id']}
    ";

    mysqli_query($conexao, $sql);
}

/**
 * Remove uma tarefa do banco com base no ID
 *
 * @param mysqli $conexao Conexão com o banco   
 * @param int $id ID da tarefa a ser removida
 * @return void
 */
function remover_tarefa($conexao, $id) {
    $sqlRemover = "DELETE FR    OM tarefas WHERE id = {$id}";

    mysqli_query($conexao, $sqlRemover);
}