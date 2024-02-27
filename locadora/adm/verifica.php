<?php
include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['senha']) && !empty($_POST['senha'])) {
        $senha = $_POST['senha'];
    }

    $verificacao = verificarUser('idadm,nome,email,senha', 'adm', 'email', $email, 'senha', $senha , 'ativo', 'a');
    if ($verificacao != 'Vazio') {
        foreach ($verificacao as $user) {
            $iduser = $user->idusuario;
            $emailv = $user->email;
            $senhav = $user->senha;
            $_SESSION['id'] = $iduser;
            header('location: adm.php');
        }
    } else {
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <body class='bg-dark'>
        <div class='position-absolute top-50 start-50 translate-middle fs-1 text-danger'>Senha ou email inválidos!
         <div class='mt-2 text-center'>
        <a href='index.php' class='btn btn-outline-danger'>Voltar</a>
</div></div>
       </body>>
        ";
    }
} else {
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <div class='position-absolute top-50 start-50 translate-middle fs-1'>Formulário não reconhecido.
         <div class='mt-2 text-center'>
        <a href='index.php' class='btn btn-outline-danger'>Voltar</a>
</div></div>";
}
