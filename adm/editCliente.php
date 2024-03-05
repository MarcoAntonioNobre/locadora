<?php

include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';

// $conn = conectar();
// // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// //     if (isset($_POST['cadGenero']) && !empty($_POST['cadGenero'])) {
// //         $genero = $_POST['cadGenero'];
// //     }
// //     $cadGenero = cadGenero($genero, DATATIMEATUAL);
// // }

 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados) && isset($dados)) {
    $nomeCliente = isset($dados['inpEditNomeCliente']) ? addslashes(mb_strtoupper($dados['inpEditNomeCliente'], 'UTF-8')) : '';
    $nascimento = isset($dados['inpEditNascimento']) ? addslashes($dados['inpEditNascimento']) : '';
    $cpf = isset($dados['inpEditCpf']) ? addslashes($dados['inpEditCpf']) : '';
    $id = isset($dados['idEditCliente']) ? addslashes($dados['idEditCliente']) : 0;
    $retornoUpdate = editCliente($nomeCliente,$nascimento, $cpf, $id);
    if ($retornoUpdate > 0) {
        echo json_encode(['success' => true, 'message' => "Cliente $nomeCliente editado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não editado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Cliente não encontrado!']));
}


//echo json_encode($dados);