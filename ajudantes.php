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