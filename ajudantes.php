<?php

/**
 * Transforma a prioridade de números para níveis
 * escritos
 *
 * @param integer $prioridade Prioridade (1, 2 ou 3)
 * @return string
 */
function traduz_prioridade($prioridade) {
    switch($prioridade) {
        case 1:
            return "Baixa";
        case 2:
            return "Média";
        case 3:
            return "Alta";
    }
}

/**
 * Traduz a data do formato brasileiro para 
 * o padrão americado com hifens 
 * 
 *    dd/mm/yyyy => mm-dd-yyyy
 *
 * @param string $data Data em português (dd/mm/yyyy)  
 * @return string
 */
function traduz_data_para_banco($data) {
    if ($data == "") {
        return "";
    }

    $dados = explode("/", $data);

    //                ano         mês        dia
    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_mysql;
}

function traduz_data_para_exibir($data) {
    if ($data == "" OR $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $data_exibir;
}

/**
 * Traduz um inteiro (0 ou 1) para "Sim" ou "Não"
 *
 * @param integer $concluida Concluida ou não (0 ou 1)
 * @return string
 */
function traduiz_concluida($concluida) {
    if ($concluida == 1) {
        return "Sim";
    } else if ($concluida == 0) {
        return "Não";
    }
}

/**
 * Verifica se um parâmetro $_GET ou $_POST existe e não é
 * igual a ''
 *
 * @param string $parametro parametro da requisição
 * @param bool $post Caso o parâmetro seja $_POST
 * @return bool
 */
function parametro_requisicao($parametro, $post = false) {
    // Caso não seja especificado, use $_GET
    $request = (!$post) ? $_GET : $_POST;

    // Verifica se o parametro foi definido 
    // e se tem algum conteúdo
    $valid_request = (
        isset($request[$parametro]) &&
        $request[$parametro] != ''
    );

    if ($valid_request) {
        return true;
    } else {
        return false;
    }
}


/**
 * Verifica se todos os dados informados em uma
 * string são números e retorna falso caso não seja
 *
 * @param string $string String a ser analisada
 * @return int|bool
 */
function filtrar_numeros($string) {
    $valid_numeric = ctype_xdigit($string);

    if ($valid_numeric) {
        return (int)$string;
    } else {
        return false;
    }
}
