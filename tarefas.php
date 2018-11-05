<?php

session_start();

if (isset($_GET['nome'])) {
    $_SESSION['lista_tarefas'][] = $_GET['nome'];
}

if (isset($_SESSION['lista_tarefas'])) {
    $lista_tarefas = $_SESSION['lista_tarefas'];
} else {
    $lista_tarefas = array();
}

include "template.php";