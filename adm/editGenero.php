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
    $generoEdit = isset($dados['inEditGenero']) ? addslashes(mb_strtoupper($dados['inEditGenero'], 'UTF-8')) : '';
    $id = isset($dados['idEditGenero']) ? intval($dados['idEditGenero']) : 0;
    $retornoUpdate = editGenero($generoEdit, $id);
    if ($retornoUpdate > 0) {
        echo json_encode(['success' => true, 'message' => "Gênero editado com sucesso! Novo gênero $generoEdit"]);
    } else {
        echo json_encode(['success' => false, 'message' => "Gênero não editado!"]);
    }
} else {
    echo json_encode((['success' => false, 'message' => 'Novo gênero não encotrado!']));
}


