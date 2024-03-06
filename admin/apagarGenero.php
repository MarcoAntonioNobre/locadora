<?php

include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';

$conn = conectar();
// // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// //     if (isset($_POST['cadGenero']) && !empty($_POST['cadGenero'])) {
// //         $genero = $_POST['cadGenero'];
// //     }
// //     $cadGenero = cadGenero($genero, DATATIMEATUAL);
// // }

 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados) && isset($dados)) {
    $id = isset($dados['idGenero'])? intval($dados['idGenero']) : 0;
    
    $retornoApagar = apagarGenero($id);
    if ($retornoApagar > 0) {
        echo json_encode(['success' => true, 'message' => "Gênero apagado com sucesso!"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Gênero não apagado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Gênero não encotrado!']));
}

//echo json_encode($dados);