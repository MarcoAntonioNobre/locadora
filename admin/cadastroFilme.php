<?php

include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nomeFilme']) && !empty($_POST['nomeFilme'])) {
        $nomeFilme = $_POST['nomeFilme'];
    }
    if (isset($_POST['diretor']) && !empty($_POST['diretor'])) {
        $diretor = $_POST['diretor'];
    }
    if (isset($_POST['dataLancamento']) && !empty($_POST['dataLancamento'])) {
        $dataLancamento = $_POST['dataLancamento'];
    }
    if (isset($_POST['classificacao']) && !empty($_POST['classificacao'])) {
        $classificacao = $_POST['classificacao'];
    }
    if (isset($_POST['slcgenero']) && !empty($_POST['slcgenero'])) {
        $slcgenero = $_POST['slcgenero'];
    }
   
    

    $cadFilme = cadFilme( $slcgenero, $classificacao,$nomeFilme, $diretor, $dataLancamento, DATATIMEATUAL);
    header('location: adm.php?page=filme');



}