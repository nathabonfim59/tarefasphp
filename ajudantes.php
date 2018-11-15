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