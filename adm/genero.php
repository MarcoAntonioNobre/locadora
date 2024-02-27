<div class="card mt-2">
    <div class="d-flex justify-content-between card-header bg-dark">
        <h5 class="fs-2 text-white"><i class="bi bi-hash"></i> Gêneros</h5>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#mdlCadGenero">Cadastrar</button>
    </div>
    <div class="card-body bg-dark">
        <div id="msg" class="alert alert-success text-center" role="alert"></div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col" width="10%">#</th>
                    <th scope="col" width="30%">Gênero</th>
                    <th scope="col" width="30%">Cadastro</th>
                    <th scope="col" width="30%">Opções</th>
                </tr>
            </thead>
            <tbody>
                <!-- Foreach puxando os dados do banco -->
                <?php
                $cont = 0;
                $genero = listarTabela('*', 'genero', 'idgenero');
                if ($genero != 'Vazio') {
                    foreach ($genero as $generoItem) {
                        $id = $generoItem->idgenero;
                        $nome = $generoItem->nome;
                        $cadastro = $generoItem->cadastro;
                ?>
                        <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $cadastro; ?></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#vermais<?php echo $id ?>">Ver mais</button>
                                <!-- Modal ver mais-->
                                <div class="modal fade" id="vermais<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Gênero <?php echo $nome ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-dark">
                                                <div class="card-body text-black bg-dark">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Gênero:</b></p>
                                                                <p><?php echo $nome ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Data de cadastro</b></p>
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
                                <button type="button" class="btn btn-primary btn-sm">Alterar</button>
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

