<?php
include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';

// $conn = conectar();

// $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// $acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
// $acaoId = filter_input(INPUT_POST, 'acaoId', FILTER_SANITIZE_NUMBER_INT);
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
// $controleGet = filter_input(INPUT_GET, 'controleGet', FILTER_SANITIZE_STRING);


// switch ($acao) {
// }
switch ($controle) {
    case 'listarCliente';
        include_once 'listarCliente.php';
        break;
    case 'clienteAdd';
        include_once 'cadastroCliente.php';
        break;
    case 'clienteEdit';
        include_once 'edicaoCliente.php';
        break;
    case 'apagarCliente';
        include_once 'apagarCliente.php';
        break;
    case 'listarGenero';
        include_once 'listarGenero.php';
        break;
    case 'apagarGenero';
        include_once 'apagarGenero.php';
        break;
    case 'generoAdd';
        include_once 'cadastroGenero.php';
        break;
    case 'generoEdicao';
        include_once 'edicaoGenero.php';
        break;
    case 'listarFilme';
        include_once 'listarFilme.php';
        break;
    case 'listarAdmin';
        include_once 'listarAdmin.php';
        break;
    case 'listarLocacao';
        include_once 'listarLocacao.php';
        break;

    default:
        echo 'Menu inexistente!';
}