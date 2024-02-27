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
  <title>ADM Locadora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css" &gt;>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-dark text-white">


  <div class="container-fluid text-center bg-dark text-white">
    <div class="fs-3">Painel de Controle</div>
  </div>
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="adm.php"><i class="bi bi-person-circle fs-2"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="adm.php">Home</a>
          </li>
        </ul>
        <a href="sair.php" class="btn btn-danger" type="submit">Sair</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 bgAside text-white">
        <div class="gap-1">
          <button class="btn wCad" type="button" data-bs-toggle="collapse" data-bs-target="#cadastros" aria-expanded="false" aria-controls="collapseExample">
            Cadastros
          </button>
        </div>
        <div class="collapse" id="cadastros">
          <div class="card card-body colapse">
            <button type="button" class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarCliente')">Cliente</button>
            <hr>
            <button type="button" class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarGenero')">Gênero</button>
            <hr>
            <button type="button" class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarFilme')">Filme</button>
          </div>
        </div>

        <div class="">
          <button class="btn wAdm" type="button" data-bs-toggle="collapse" data-bs-target="#adm" aria-expanded="false" aria-controls="collapseExample">
            Administradores
          </button>
        </div>
        <div class="collapse" id="adm">
          <div class="card card-body colapse">
            <button class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarAdm')">Listar</button>
          </div>
        </div>
        <div class="justify-content-center">
          <button class="btn wAdm" type="button" data-bs-toggle="collapse" data-bs-target="#locacao" aria-expanded="false" aria-controls="collapseExample">
            Locações
          </button>
        </div>
        <div class="collapse" id="locacao">
          <div class="card card-body colapse">
            <button class="btn fs-3 opcoesADM" onclick="carregarConteudo('listarLocacao')">Listar</button></li>
          </div>
        </div>
        <div>

        </div>


      </div>
      <div class="col-lg-10">
        <div id="show"> <?php
          echo " <div class='position-absolute top-50 start-50 translate-middle fs-1 text-white'>Bem Vindo!</div>";
        ?></div>
        <!-- Include_once com php para adicionar as paginas de cadastro e alteração -->
       
      </div>
    </div>
  </div>
  <!-- Modal cadastro cliente -->
<div class="modal fade" id="cadastroCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="#" method="post" name="cadCliente" id="cadCliente">
                        <div>
                            <label for="nomeCliente" class="label-control text-black">Nome:</label>
                            <input type="text" required="required" name="nomeCliente" id="nomeCliente" class="form-control">
                        </div>
                        <div>
                            <label for="nascimento" class="label-control text-black">Nascimento:</label>
                            <input type="date" required="required" class="form-control" name="nascimento" id="nascimento">
                        </div>
                        <div>
                            <label for="cpf" class="label-control text-black">CPF:</label>
                            <input type="text" required="required" class="form-control" name="cpf" id="cpf">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal cadastro genero-->
<div class="modal fade" id="mdlCadGenero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de gênero de filme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="" method="post" name="frmCadGenero" id="frmCadGenero">
                        <div>
                            <label for="genero" class="label-control text-black">Gênero:</label>
                            <input type="text" required="required" placeholder="Digite um gênero" class="form-control" name="inCadGenero" id="genero">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn btn-success" id="btnCadGenero">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal cadastro filme-->
<div class="modal fade" id="cadastroFilme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de filme</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="#" method="post" name="cadFilme" id="cadFilme">
                        <div>
                            <label for="nomeFilme" class="label-control text-black">Nome do filme:</label>
                            <input type="text" required="required" name="nomeFilme" id="nomeFilme" class="form-control">
                        </div>
                        <div>
                            <label for="diretor" class="label-control text-black">Diretor(es):</label>
                            <input type="text" required="required" class="form-control" name="diretor" id="diretor">
                        </div>
                        <div>
                            <label for="dataLancamento" class="label-control text-black">Data de lançamento:</label>
                            <input type="date" required="required" class="form-control" name="dataLancamento" id="dataLancamento">
                        </div>
                        <div>
                            <label for="classificacao" class="label-control text-black">Classificação:</label>
                            <select name="classificacao" id="classificacao" class="form-control">
                                <option>Selecione uma opção</option>
                                <?php
                                $classificacao = listarTabela('*', 'classificacao', 'classificacao DESC');
                                foreach ($classificacao as $classificacaoItem) {
                                    $id = $classificacaoItem->idclassificacao;
                                    $classificacao = $classificacaoItem->classificacao;
                                ?>
                                    <option value="<?php echo $id ?>"><?php echo $classificacao ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="genero" class="label-control text-black">Gênero:</label>
                            <select name="slcgenero" id="slcgenero" class="form-control">
                                <option>Selecione uma opção</option>
                                <?php
                                $genero = listarTabela('*', 'genero', 'nome');
                                foreach ($genero as $generoItem) {
                                    $id = $generoItem->idgenero;
                                    $nomeGenero = $generoItem->nome;
                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $nomeGenero; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
</body>

</html>