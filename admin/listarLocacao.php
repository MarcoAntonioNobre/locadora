<div class="card mt-2">
    <div class="d-flex justify-content-between card-header cinza">
        <h5 class="fs-2 text-black"><i class="bi bi-person-fill text-black"></i> Locações</h5>
        <button type="button" class="btn verdeBtn botaoRadius" data-bs-toggle="modal" data-bs-target="#">Cadastrar
        </button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" width="10%">#</th>
                <th scope="col" width="30%">Nome</th>
                <th scope="col" width="20%">Nome do filme</th>
                <th scope="col" width="20%">Data de locação</th>
                <th scope="col" width="40%">Opções</th>
            </tr>
            </thead>
            <tbody>
            <!-- Foreach puxando os dados do banco -->
            <?php
            $locacao = listarTabela('l.idlocar, c.nome, f.nomeFilme , l.dataLocacao, l.cadastro', 'locar l INNER JOIN filme f ON l.idfilme = f.idfilme INNER JOIN cliente c ON l.idcliente = c.idcliente', 'idlocar');
            if ($locacao != 'Vazio') {
            foreach ($locacao

            as $locacaoItem) {
            $id = $locacaoItem->idlocar;
            $nome = $locacaoItem->nome;
            $nomeFilme = $locacaoItem->nomeFilme;
            $dataLocacao = $locacaoItem->dataLocacao;
            $cadastro = $locacaoItem->cadastro;
            //Conversão de datas = implode("/", array_reverse(explode("-", variável com a data a ser convertida)));
            ?>
            <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $nome; ?></td>
                <td><?php echo $nomeFilme; ?></td>
                <td><?php echo $dataLocacao; ?></td>
                <td>

                    <button type="button" class="btn verdeBtn botaoRadius" data-bs-toggle="modal"
                            data-bs-target="#vermais<?php echo $id ?>">Ver mais
                    </button>
                    <!-- Modal ver mais-->
                    <div class="modal fade" id="vermais<?php echo $id ?>" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header cinza">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Locação
                                        de <?php echo $nome ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div>
                                            <b>Nome do Filme:</b> <?php echo $nomeFilme ?>
                                        </div>
                                        <hr>
                                        <div>
                                            <b>Data de locação</b> <?php echo $dataLocacao ?>
                                        </div>
                                        <hr>
                                        <div>
                                            <b>Data de cadastro:</b> <?php echo $cadastro ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn vermelhoBtn botaoRadius" data-bs-dismiss="modal">
                                    Voltar
                                </button>
                            </div>
                        </div>
                    </div>
    </div>
    <button type="button" class="btn azulBtn botaoRadius">Alterar</button>
    <button type="button" class="btn vermelhoBtn botaoRadius">Apagar</button>

    </td>
    </tr>
    <?php
    }
    }
    ?>
    </tbody>
    </table>
</div>
</div>

<!-- Modal -->
<!--<div class="modal fade" id="cadastroCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header bg-dark text-white">-->
<!--                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de cliente</h1>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <div class="card-body">-->
<!--                    <form action="#" method="post" name="">-->
<!--                        <div>-->
<!--                            <label for="nomeCliente" class="label-control">Nome:</label>-->
<!--                            <input type="text" required="required" name="nomeCliente" id="nomeCliente" class="form-control">-->
<!--                        </div>-->
<!--                        <div>-->
<!--                            <label for="nascimento" class="label-control">Nascimento:</label>-->
<!--                            <input type="date" required="required" class="form-control" name="nascimento" id="nascimento">-->
<!--                        </div>-->
<!--                        <div>-->
<!--                            <label for="cpf" class="label-control">CPF:</label>-->
<!--                            <input type="text" required="required" class="form-control" name="cpf" id="cpf">-->
<!--                        </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>-->
<!--                <button type="submit" class="btn btn-success">Cadastrar</button>-->
<!--            </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->