<?php

include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['apagarGenero']) && !empty($_POST['apagarGenero'])) {
        $apagar = $_POST['apagarGenero'];
    }
    if (isset($_POST['idapagar']) && !empty($_POST['idapagar'])) {
        $apagar = $_POST['idapagar'];
    }
if($apagar == 'S'){
    $cadGenero = cadGenero($genero, DATATIMEATUAL);
    header('location: adm.php?page=genero');
}

}