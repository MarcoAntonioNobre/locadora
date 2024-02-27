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
        include_once 'cliente.php';
        break;
    case 'listarGenero';
        include_once 'genero.php';
        break;
    case 'listarFilme';
        include_once 'filme.php';
        break;
    case 'listarAdm';
        include_once 'administrador.php';
        break;
    case 'generoAdd';
        include_once 'cadGenero.php';
        break;
    default:
        echo 'Menu inexistente!';
}

// if(isset($controle) && !empty($controle)){
//     if($controle == 'listarCliente'){
//         echo 'Você clicou no botão listar cliente!';
//     }else if($controle == 'listarGenero'){
//         echo 'Você clicou no botão listar genero!';
//     }else if($controle == 'listarFilme'){
//         echo 'Você clicou no botão listar filme!';
//     }else{
//         echo 'Menu inexistente!';
//     }
// }else{
//     echo "Página não encontrada!";
// }
