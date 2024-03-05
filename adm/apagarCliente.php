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
    $id = isset($dados['idApagarCliente']) ? addslashes($dados['idApagarCliente']) : 0;
    $retornoDelete = apagarCliente($id);
    if ($retornoDelete > 0) {
        echo json_encode(['success' => true, 'message' => "Cliente apagado com sucesso"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Cliente não apagado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Cliente não encontrado!']));
}


//echo json_encode($dados);