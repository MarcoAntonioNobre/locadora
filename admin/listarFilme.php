<div class="card mt-2">
    <div class="d-flex justify-content-between card-header cinza">
        <h5 class="fs-2 text-black"><i class="bi bi-film text-black"></i> Filmes</h5>
        <button type="button" class="btn verdeBtn botaoRadius" data-bs-toggle="modal" data-bs-target="#cadastroFilme">
            Cadastrar
        </button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col" width="8%">#</th>
                <th scope="col" width="30%">Nome do filme</th>
                <th scope="col" width="19%">Diretor(es)</th>
                <th scope="col" width="12%">Data de Lançamento</th>
                <th scope="col" width="11%">Classificação</th>
                <th scope="col" width="20%">Opções</th>
            </tr>
            </thead>
            <tbody>
            <!-- Foreach puxando os dados do banco -->
            <?php
            $filme = listarTabela('f.idfilme, f.nomeFilme, f.diretor,f.dataLancamento,f.cadastro, g.nome, c.classificacao, c.idclassificacao', 'filme f
                INNER JOIN genero g ON g.idgenero=f.idgenero
                INNER JOIN classificacao c ON c.idclassificacao=f.idclassificacao', 'idfilme');
            if ($filme != 'Vazio') {
                foreach ($filme

                         as $filmeItem) {
                    $id = $filmeItem->idfilme;
                    $listID = $id - 1;
                    $nome = $filmeItem->nomeFilme;
                    $genero = $filmeItem->nome;
                    $diretor = $filmeItem->diretor;
                    $dataLancamento = $filmeItem->dataLancamento;
                    $classificacao = $filmeItem->classificacao;
                    $idclassificacao = $filmeItem->idclassificacao;
                    $cadastro = $filmeItem->cadastro;
                    $data = implode("/", array_reverse(explode("-", $dataLancamento)));
                    ?>
                    <tr>
                        <th scope="row"><?php echo $listID; ?></th>
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $diretor; ?></td>
                        <td><?php echo $data; ?></td>
                        <td><?php echo $classificacao; ?></td>
                        <td>

                            <button type="button" class="btn verdeBtn botaoRadius" data-bs-toggle="modal"
                                    data-bs-target="#vermais<?php echo $id ?>">Ver mais
                            </button>
                            <!-- Modal ver mais-->
                            <div class="modal fade" id="vermais<?php echo $id ?>" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header cinza">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $nome ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div>
                                                    <b>Nome do filme:</b> <?php echo $nome ?>
                                                </div>
                                                <hr>
                                                <div>
                                                    <b>Diretor(es):</b> <?php echo $diretor ?>
                                                </div>
                                                <hr>
                                                <div>
                                                    <b>Data de lançamento:</b> <?php echo $data ?>
                                                </div>
                                                <hr>
                                                <?php
                                                if ($idclassificacao == 1) {
                                                    ?>
                                                    <div>
                                                        <b>Classificação:</b> <?php echo $classificacao ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if ($idclassificacao == 2) {
                                                    ?>
                                                    <div>
                                                        <b>Classificação:</b> <?php echo $classificacao ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if ($idclassificacao == 3) {
                                                    ?>
                                                    <div>
                                                        <b>Classificação:</b> <?php echo $classificacao ?>
                                                    </div>

                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if ($idclassificacao == 4) {
                                                    ?>
                                                    <div>
                                                        <b>Classificação:</b> <?php echo $classificacao ?>
                                                    </div>

                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if ($idclassificacao == 5) {
                                                    ?>
                                                    <div>
                                                        <b>Classificação:</b> <?php echo $classificacao ?>
                                                    </div>

                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if ($idclassificacao == 6) {
                                                    ?>
                                                    <div>
                                                        <b>Classificação:</b> <?php echo $classificacao ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <hr>
                                                <div>
                                                    <b>Gênero:</b> <?php echo $genero ?>
                                                </div>
                                                <hr>
                                                <div>
                                                    <b>Data de cadastro:</b> <?php echo $cadastro ?>
                                                </div>

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

                            <button type="button" class="btn azulBtn botaoRadius" data-bs-toggle="modal"
                                    data-bs-target="#alterar<?php echo $id ?>">
                                Alterar
                            </button>
                            <!-- Modal alterar-->
                            <div class="modal fade" id="alterar<?php echo $id ?>" tabindex="-1"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header cinza text-black">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $nome ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <form action="#" method="post" name="atlFilme">
                                                    <div>
                                                        <label for="nomeFilme" class="label-control">Nome do
                                                            filme:</label>
                                                        <input type="text" required="required"
                                                               value="<?php echo $nome ?>" name="nomeFilme"
                                                               id="nomeFilme" class="form-control">
                                                    </div>
                                                    <div>
                                                        <label for="diretor" class="label-control">Diretor(es):</label>
                                                        <input type="text" required="required"
                                                               value="<?php echo $diretor ?>"
                                                               class="form-control" name="diretor"
                                                               id="diretor">
                                                    </div>
                                                    <div>
                                                        <label for="dataLancamento" class="label-control">Data de
                                                            lançamento:</label>
                                                        <input type="date" required="required"
                                                               value="<?php echo $dataLancamento ?>"
                                                               class="form-control"
                                                               name="dataLancamento" id="dataLancamento">
                                                    </div>
                                                    <div>
                                                        <label for="classificacao"
                                                               class="label-control">Classificação:</label>
                                                        <select name="classificacao" id="classificacao"
                                                                class="form-control">
                                                            <option class=""
                                                                    selected><?php echo $classificacao ?></option>
                                                            <?php
                                                            $classificacao = listarTabela('*', 'classificacao', 'classificacao');
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
                                                        <label for="genero" class="label-control">Gênero:</label>
                                                        <select name="slcgenero" id="slcgenero"
                                                                class="form-control">
                                                            <option class=""><?php echo $genero ?></option>
                                                            <?php
                                                            $genero = listarTabela('*', 'genero', 'nome');
                                                            foreach ($genero as $generoItem) {
                                                                $id = $generoItem->idgenero;
                                                                $nomeGenero = $generoItem->nome;
                                                                ?>
                                                                <option class=""
                                                                        value="<?php echo $id ?>"><?php echo $nomeGenero ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn vermelhoBtn botaoRadius"
                                                    data-bs-dismiss="modal">Voltar
                                            </button>
                                            <button type="submit" class="btn azulBtn botaoRadius">Alterar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
