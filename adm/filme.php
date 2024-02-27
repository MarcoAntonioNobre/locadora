<div class="card mt-2">
    <div class="d-flex justify-content-between card-header bg-dark">
        <h5 class="fs-2 text-white"><i class="bi bi-film"></i> Filmes</h5>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadastroFilme">Cadastrar</button>
    </div>
    <div class="card-body bg-dark">
        <table class="table table-dark table-striped">
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
                    foreach ($filme as $filmeItem) {
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

                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#vermais<?php echo $id ?>">Ver mais</button>
                                <!-- Modal ver mais-->
                                <div class="modal fade" id="vermais<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $nome ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-dark">
                                                <div class="card-body text-black bg-dark">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Nome do filme:</b></p>
                                                                <p><?php echo $nome ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Diretor(es)</b></p>
                                                                <p><?php echo $diretor ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Data de lançamento:</b></p>
                                                                <p><?php echo $data ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <?php
                                                            if ($idclassificacao == 1) {
                                                            ?>
                                                                <div class="rounded verde text-center">
                                                                    <p><b>Classificação:</b></p>
                                                                    <p><?php echo $classificacao ?></p>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($idclassificacao == 2) {
                                                            ?>
                                                                <div class="rounded azul text-center">
                                                                    <p><b>Classificação:</b></p>
                                                                    <p><?php echo $classificacao ?></p>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($idclassificacao == 3) {
                                                            ?>
                                                                <div class="rounded amarelo text-center">
                                                                    <p><b>Classificação:</b></p>
                                                                    <p><?php echo $classificacao ?></p>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($idclassificacao == 4) {
                                                            ?>
                                                                <div class="rounded laranja text-center">
                                                                    <p><b>Classificação:</b></p>
                                                                    <p><?php echo $classificacao ?></p>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($idclassificacao == 5) {
                                                            ?>
                                                                <div class="rounded vermelho text-center">
                                                                    <p><b>Classificação:</b></p>
                                                                    <p><?php echo $classificacao ?></p>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($idclassificacao == 6) {
                                                            ?>
                                                                <div class="rounded preto text-center">
                                                                    <p><b>Classificação:</b></p>
                                                                    <p><?php echo $classificacao ?></p>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Gênero:</b></p>
                                                                <p><?php echo $genero ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Data de cadastro:</b></p>
                                                                <p><?php echo $cadastro ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-dark">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#alterar<?php echo $id ?>">Alterar</button>
                                <!-- Modal alterar-->
                                <div class="modal fade" id="alterar<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $nome ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-dark">
                                                <div class="card-body text-white bg-dark">
                                                    <form action="altFilme.php" method="post" name="atlFilme">
                                                        <div>
                                                            <label for="nomeFilme" class="label-control">Nome do filme:</label>
                                                            <input type="text" required="required" value="<?php echo $nome ?>" name="nomeFilme" id="nomeFilme" class="form-control">
                                                        </div>
                                                        <div>
                                                            <label for="diretor" class="label-control">Diretor(es):</label>
                                                            <input type="text" required="required" value="<?php echo $diretor ?>" class="form-control" name="diretor" id="diretor">
                                                        </div>
                                                        <div>
                                                            <label for="dataLancamento" class="label-control">Data de lançamento:</label>
                                                            <input type="date" required="required" value="<?php echo $dataLancamento ?>" class="form-control" name="dataLancamento" id="dataLancamento">
                                                        </div>
                                                        <div>
                                                            <label for="classificacao" class="label-control">Classificação:</label>
                                                            <select name="classificacao" id="classificacao" class="form-control">
                                                                <option selected><?php echo $classificacao ?></option>
                                                                <?php
                                                                $classificacao = listarTabela('*', 'classificacao', 'classificacao');
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
                                                            <label for="genero" class="label-control">Gênero:</label>
                                                            <select name="slcgenero" id="slcgenero" class="form-control">
                                                                <option><?php echo $genero ?></option>
                                                                <?php
                                                                $genero = listarTabela('*', 'genero', 'nome');
                                                                foreach ($genero as $generoItem) {
                                                                    $id = $generoItem->idgenero;
                                                                    $nomeGenero = $generoItem->nome;
                                                                ?>
                                                                    <option value="<?php echo $id ?>"><?php echo $nomeGenero ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-dark">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Voltar</button>
                                                <button type="submit" class="btn btn-primary">Alterar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm">Apagar</button>

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
