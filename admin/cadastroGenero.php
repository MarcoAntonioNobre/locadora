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

if (!empty($dados) && isset($dados)){
    $genero = isset($dados['inpGeneroCadastro']) ?  addslashes(mb_strtoupper($dados['inpGeneroCadastro'], 'UTF-8')) : '';

    $retornoInsert =  cadGenero($genero, DATATIMEATUAL);
    if ($retornoInsert > 0){
        echo json_encode(['success' => true, 'message' => "Gênero $genero cadastrado com sucesso!"]);
    }else{
        echo json_encode(['success' => false, 'message' => "Gênero não cadastrado!"]);
    }
}else {
    echo json_encode((['success' => false, 'message' => 'Gênero não encontrado!']));
}