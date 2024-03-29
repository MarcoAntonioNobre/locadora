<?php
include_once '../config/constantes.php';
include_once '../config/conexao.php';
include_once '../funcao/funcoes.php';


if ($_SESSION['idadm']) {
    $idUsuario = $_SESSION['idadm'];
    //echo '<p class="text-white">'.$idUsuario.'</p>';
} else {
    session_destroy();
    header('location: index.php?error=404');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css"
          &gt;>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="">


<div class="container-fluid text-center">
    <div class="fs-3">Painel de Controle</div>
</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="btn btnChamaOffCanva" type="button" data-bs-toggle="offcanvas" data-bs-target="#opcoes"
                aria-controls="offcanvasExample">
            <i class="bi bi-list"></i>
        </button>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
                </li>
            </ul>
             
            <img src="" alt=""><i class="bi bi-person-circle fs-2 text-black"></i>
             
            <?php
            $admin = listarTabela('*', 'adm', 'idadm');
            if ($admin != 'Vazio') {
                foreach ($admin as $adminItem) {
                    $id = $adminItem->idadm;
                    if ($id == $idUsuario) {
                        $nomeAdm = $adminItem->nome;
                    }
                }
            }
            echo "<div class='text-black'>$nomeAdm</div>";
            ?>
             
            <a href="sair.php" class="btn vermelhoBtn" type="submit">Sair</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div id="show"> <?php
                $admin = listarTabela('*', 'adm', 'idadm');
                if ($admin != 'Vazio') {
                    foreach ($admin as $adminItem) {
                        $id = $adminItem->idadm;
                        if ($id == $idUsuario) {
                            $nomeAdm = $adminItem->nome;
                        }
                    }
                }
                echo " <div class='position-absolute top-50 start-50 translate-middle fs-1 text-white'>Bem Vindo(a), $nomeAdm!</div>";
                ?></div>
        </div>
    </div>
</div>


<!-- Modal cadastro cliente -->
<div class="modal fade" id="mdlClienteCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header cinza">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="#" method="post" name="frmClienteCadastro" id="frmClienteCadastro">
                        <div>
                            <label for="inpNome" class="label-control">Nome:</label>
                            <input type="text" required="required" name="inpNome" id="inpNome"
                                   class="form-control">
                        </div>
                        <div>
                            <label for="inpNascimento" class="label-control">Nascimento:</label>
                            <input type="date" required="required" class="form-control" name="inpNascimento"
                                   id="inpNascimento">
                        </div>
                        <div>
                            <label for="inpCpf" class="label-control">CPF:</label>
                            <input type="text" required="required" class="form-control" name="inpCpf" id="inpCpf">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn botaoRadius vermelhoBtn" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn botaoRadius verdeBtn" id="btnClienteCadastro">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--modal de edicao de cliente-->

<div class="modal fade" id="mdlClienteEdicao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header cinza">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="#" method="post" name="frmClienteEdicao" id="frmClienteEdicao">
                        <div>
                            <label for="inpNomeEdicao" class="label-control">Nome:</label>
                            <input type="text" required="required" name="inpNomeEdicao" id="inpNomeEdicao"
                                   class="form-control">
                        </div>
                        <div>
                            <label for="inpEditNascimento" class="label-control">Nascimento:</label>
                            <input type="date" required="required" class="form-control" name="inpEditNascimento"
                                   id="inpEditNascimento">
                        </div>
                        <div>
                            <label for="inpEditCpf" class="label-control">CPF:</label>
                            <input type="text" required="required" class="form-control" name="inpEditCpf" id="inpEditCpf">
                        </div>
                        <input type="hidden" name="idEditCliente" id="idEditCliente">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn botaoRadius vermelhoBtn" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn botaoRadius azulBtn" id="btnClienteEdicao">Alterar</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal cadastro genero-->
<div class="modal fade" id="mdlGeneroCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header cinza text-black">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de gênero de filme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="" method="post" name="frmGeneroCadastro" id="frmGeneroCadastro">
                        <div>
                            <label for="inpGeneroCadastro" class="label-control">Gênero:</label>
                            <input type="text" required="required" placeholder="Digite um gênero"
                                   class="form-control"
                                   name="inpGeneroCadastro" id="inpGeneroCadastro">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn botaoRadius vermelhoBtn" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn botaoRadius verdeBtn" id="btnCadGenero">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal editar genero-->
<div class="modal fade" id="mdlGeneroEdicao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-black cinza">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edição de gênero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="" method="post" name="frmGeneroEdicao" id="frmGeneroEdicao">
                        <div>
                            <label for="inpGeneroEdicao" class="label-control">Novo gênero:</label>
                            <input type="text" required="required" placeholder="Digite um gênero"
                                   class="form-control"
                                   name="inpGeneroEdicao" id="inpGeneroEdicao">
                        </div>
                        <input type="hidden" name="idEditGenero" id="idEditGenero">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn botaoRadius vermelhoBtn" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn botaoRadius azulBtn" id="btnEditGenero">Alterar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal apagar genero -->
<!--<div class="modal fade" id="mdlApagarGenero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header bg-dark text-white">-->
<!--                <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar gênero</h1>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body bg-dark text-white">-->
<!--                <div class="card-body bg-dark">-->
<!--                    <form action="" method="post" name="frmApagarGenero" id="frmApagarGenero">-->
<!--                        <div>-->
<!--                            <h5>Tem certeza que deseja apagar esse gênero?</h5>-->
<!--                            <p>Essa ação é irreversível!</p>-->
<!--                        </div>-->
<!--                        <input type="text" name="idApagarGenero" id="idApagarGenero">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer bg-dark">-->
<!--                <button type="button" class="btn botaoRadius verdeBtn" data-bs-dismiss="modal">Voltar</button>-->
<!--                <button type="submit" class="btn botaoRadius vermelhoBtn" id="btnApagarGenero">Apagar</button>-->
<!--            </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!-- Modal cadastro filme-->
<div class="modal fade" id="cadastroFilme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header cinza text-black">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de filme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="#" method="post" name="cadFilme" id="frmCadCliente">
                        <div>
                            <label for="nomeFilme" class="label-control">Nome do filme:</label>
                            <input type="text" required="required" name="nomeFilme" id="nomeFilme"
                                   class="form-control">
                        </div>
                        <div>
                            <label for="diretor" class="label-control">Diretor(es):</label>
                            <input type="text" required="required" class="form-control"
                                   name="diretor" id="diretor">
                        </div>
                        <div>
                            <label for="dataLancamento" class="label-control">Data de lançamento:</label>
                            <input type="date" required="required" class="form-control"
                                   name="dataLancamento"
                                   id="dataLancamento">
                        </div>
                        <div>
                            <label for="classificacao" class="label-control">Classificação:</label>
                            <select name="classificacao" id="classificacao" class="form-control">
                                <option class="">Selecione uma opção</option>
                                <?php
                                $classificacao = listarTabela('*', 'classificacao', 'classificacao DESC');
                                foreach ($classificacao as $classificacaoItem) {
                                    $id = $classificacaoItem->idclassificacao;
                                    $classificacao = $classificacaoItem->classificacao;
                                    ?>
                                    <option class=""
                                            value="<?php echo $id ?>"><?php echo $classificacao ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="slcgenero" class="label-control">Gênero:</label>
                            <select name="slcgenero" id="slcgenero" class="form-control">
                                <option>Selecione uma opção</option>
                                <?php
                                $genero = listarTabela('*', 'genero', 'nome');
                                foreach ($genero as $generoItem) {
                                    $id = $generoItem->idgenero;
                                    $nomeGenero = $generoItem->nome;
                                    ?>
                                    <option class=""
                                            value="<?php echo $id; ?>"><?php echo $nomeGenero; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn vermelhoBtn
                 botaoRadius" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn verdeBtn botaoRadius">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--Off canvas-->


<div class="offcanvas offcanvas-start" tabindex="-1" id="opcoes" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header cinzaCanva">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Opções do Administrador</h5>
        <button type="button" class="btn-close btnOffCanvas" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body cinzaCanva">
        <button type="button" class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarCliente')">
            Cliente
        </button>
        <hr>
        <button type="button" class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarGenero')">Gênero
        </button>
        <hr>
        <button type="button" class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarFilme')">Filme
        </button>
        <hr>
        <button class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarAdmin')">Administradores</button>
        <hr>
        <button class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarLocacao')">Locações</button>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
</body>

</html>