<?php

include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';

$conn = conectar();
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if (isset($_POST['cadGenero']) && !empty($_POST['cadGenero'])) {
//         $genero = $_POST['cadGenero'];
//     }
//     $cadGenero = cadGenero($genero, DATATIMEATUAL);
// }

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados) && isset($dados)) {
    $nomeCliente = isset($dados['inpNome']) ? addslashes(mb_strtoupper($dados['inpNome'], 'UTF-8')) : '';
    $nascimento = $dados['inpNascimento'];
    $cpf = $dados['inpCpf'];
    $retornoInsert = cadCliente($nomeCliente,$nascimento, $cpf, DATATIMEATUAL);
    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Cliente $nomeCliente cadastrado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não cadastrado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Cliente não encontrado!']));
}

//echo json_encode($dados);