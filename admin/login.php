<?php
include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';

$conn = conectar();

//(trim($dados['senha']));

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$email = (trim($dados['email']));
$senha = (trim($dados['senha']));

// $retornoValidar = verificarUser('idadm,nome,email,senha', 'adm', 'email', $email, 'senha', $senha, 'ativo', 'a');

$retornoValidar = verificarSenhaCriptografia('idadm,nome,email,senha', 'adm', 'email', $email, 'senha', $senha, 'ativo', 'a');

// if ($retornoValidar == 'Vazio') {
//     echo json_encode(['success' => false, 'message' => 'Erro no login!<br> <b>Usuário ou senha incorretos.</b>']);
// } else {
//     foreach ($retornoValidar as $itemValidar) {
//         $idadm = $itemValidar->idadm;
//         $nome = $itemValidar->nome;
//         $emailv = $itemValidar->email;
//     }
//     $_SESSION['idadm'] = $idadm;
//     $_SESSION['nome'] = $nome;
//     $_SESSION['email'] = $emailv;
//     echo json_encode(['success' => true, 'message' => 'Login efetuado com sucesso!<br> Redirecionando...']);   
// }

if($retornoValidar){
    if($retornoValidar == 'usuario'){
        echo json_encode(['success' => false, 'message' => 'Erro no login!<br> <b>Usuário incorreto.</b>']);
    }else if ($retornoValidar == 'senha'){
        echo json_encode(['success' => false, 'message' => 'Erro no login!<br> <b>Senha incorreta.</b>']);
    }else{
        $_SESSION['idadm'] = $retornoValidar -> idadm;
        $_SESSION['nome'] = $retornoValidar -> nome;
        $_SESSION['email'] = $retornoValidar -> email;
        echo json_encode(['success' => true, 'message' => 'Login efetuado com sucesso!']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Erro no login!<br> <b>Usuário ou senha incorretos.</b>']);
}



//$banco = true;
//
//if ($banco) {
//    echo json_encode(['success' => true, 'message' => 'Você logou com sucesso']);
//} else {
//    echo json_encode(['success' => false, 'message' => 'Erro no login! Usuário ou senha incorretos.']);
//}