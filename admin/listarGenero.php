<div class="card mt-2">
    <div class="d-flex justify-content-between card-header cinza">
        <h5 class="fs-2 text-black"><i class="bi bi-hash text-black"></i> Gêneros</h5>
        <button type="button" class="btn verdeBtn botaoRadius" data-bs-toggle="modal" data-bs-target="#mdlGeneroCadastro">Cadastrar</button>
    </div>
    <div class="card-body">
        <table class="table">
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
                                <button type="button" class="btn verdeBtn botaoRadius" data-bs-toggle="modal" data-bs-target="#vermais<?php echo $id ?>">Ver mais</button>
                                <!-- Modal ver mais-->
                                <div class="modal fade" id="vermais<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header cinza text-black">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Gênero <?php echo $nome ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <div>
                                                        <b>Gênero:</b> <?php echo $nome ?>
                                                    </div>
                                                    <hr>
                                                    <div>
                                                        <b>Data de cadastro</b> <?php echo $cadastro ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn vermelhoBtn botaoRadius" data-bs-dismiss="modal">Voltar</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn azulBtn botaoRadius" onclick="abrirModalEdicao('<?php echo $nome;?>','<?php  echo  $id?>')">Alterar</button>
                                <button type="button" class="btn vermelhoBtn botaoRadius" onclick="deletarGenero('apagarGenero',<?php echo $id; ?>)">Apagar</button>

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

