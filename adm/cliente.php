<div class="card mt-2">
    <div class="d-flex justify-content-between card-header bg-dark">
        <h5 class="fs-2 text-white"><i class="bi bi-person-fill"></i> Cliente</h5>
        <button type="button" class="btn verdeBtn botaoRadius" data-bs-toggle="modal" data-bs-target="#mdlCadCliente">Cadastrar</button>
    </div>
    <div class="card-body bg-dark">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col" width="10%">#</th>
                    <th scope="col" width="30%">Nome</th>
                    <th scope="col" width="20%">Data de Nascimento</th>
                    <th scope="col" width="40%">Opções</th>
                </tr>
            </thead>
            <tbody>
                <!-- Foreach puxando os dados do banco -->
                <?php
                $cliente = listarTabela('*', 'cliente', 'idcliente');
                if ($cliente != 'Vazio') {
                    foreach ($cliente as $clienteItem) {
                        $id = $clienteItem->idcliente;
                        $nome = $clienteItem->nome;
                        $nascimento = $clienteItem->nascimento;
                        $cadastro = $clienteItem->cadastro;
                        $cpf = $clienteItem->cpf;
                        $nascimentoc = implode("/", array_reverse(explode("-", $nascimento)));
                ?>
                        <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $nascimentoc; ?></td>
                            <td>

                                <button type="button" class="btn verdeBtn botaoRadius" data-bs-toggle="modal" data-bs-target="#vermais<?php echo $id ?>">Ver mais</button>
                                <!-- Modal ver mais-->
                                <div class="modal fade" id="vermais<?php echo $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cliente <?php echo $nome ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-dark">
                                                <div class="card-body text-black bg-dark">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Nome do cliente:</b></p>
                                                                <p><?php echo $nome ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>Data de nascimento</b></p>
                                                                <p><?php echo $nascimentoc ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="rounded bg-secondary text-center">
                                                                <p><b>CPF do <?php echo $nome?>:</b></p>
                                                                <p><?php echo $cpf ?></p>
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
                                                <button type="button" class="btn vermelhoBtn botaoRadius" data-bs-dismiss="modal">Voltar</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn azulBtn botaoRadius" onclick="abrirModalEdicaoCliente('<?php echo $nome ?>','<?php echo $nascimento ?>','<?php echo $cpf ?>','<?php echo $id?>')">Alterar</button>
                                <button type="button" class="btn vermelhoBtn botaoRadius" onclick="deletarCliente('apagarCliente', <?php echo $id?>)">Apagar</button>

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

