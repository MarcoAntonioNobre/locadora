<?php
include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM Locadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="fundoADMlogin">
    <div class="container-fluid">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card cardADMlogin">
                <h5 class="card-header text-center h3 text-white bg-dark">Área restrita
                    <?php
                    $option = [
                        'cost' => 12,
                    ];
                    // $senha = '12345678';
                    // $senhaHash = password_hash($senha, PASSWORD_BCRYPT, $option);
                    // //echo $senhaHash;
                   
                    ?>
                </h5>
                <div class="card-body">
                    <form action="#" method="post" id="frmLogin">
                        <div>
                            <label for="inpemail" class="form-label">Email:</label>
                            <input type="email" name="email" id="inpemail" required="required" class="form-control formEmailAdm">
                        </div>
                        <div>
                            <label for="inpsenha" class="form-label labelAdm">Senha:</label>
                            <input type="password" name="senha" id="inpsenha" required="required" class="form-control formSenhaAdm">
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-primary" onclick="fazerlogin()">Entrar</button>
                        </div>
                    </form>
                </div>
                <div class="alert alert-danger msgerro text-center" role="alert" id="erromsg">

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>

</html>