<?php

include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nomeCliente']) && !empty($_POST['nomeCliente'])) {
        $nomeCliente = $_POST['nomeCliente'];
    }
    if (isset($_POST['nascimento']) && !empty($_POST['nascimento'])) {
        $nascimento = $_POST['nascimento'];
    }
    if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {
        $cpf = $_POST['cpf'];
    }

    $cadCliente = cadCliente($nomeCliente, $nascimento, $cpf, DATATIMEATUAL);
    header('location: adm.php?page=cliente');





//    $retornoExisteEmail = listarTabela('email', "usuario WHERE email='$email'");
//    if ($retornoExisteEmail == 'Vazio') {
//        $cadastrousuario = cadastrousuario($nome, $email, $senha, DATATIMEATUAL);
//        header('location:adm.php?page=usuario&msg=cadastrado');
//    } else {
//        header('location:adm.php?page=usuario&msg=existe');
//        die;
//    }


  // $tabela = verificarEmail('email', "aluno WHERE email='$emailCadAluno'");
  // if ($tabela == 'Vazio') {
  //     $cadastroAluno = cadastroAluno($nomeCadAluno, $emailCadAluno, $senhaCadAluno, DATATIMEATUAL);
  //     header('location: adm.php?page=aluno&msg=cadastrado');
  // } else {
  //     header('location: adm.php?page=aluno&msg=naocadastrado');
  //     die;
  // }

}
