if (document.getElementById("inpemail")) {
    document.getElementById("inpemail").focus();
}

function fazerlogin() {
    var email = document.getElementById('inpemail').value;
    var senha = document.getElementById('inpsenha').value;
    var erromsg = document.getElementById('erromsg');
    if (email === '') {
        erromsg.style.display = 'block';
        erromsg.innerHTML = "O campo de <b>e-mail</b> está vazio. <br> Por favor, preencha-o.";
        return;
    } else {
        erromsg.style.display = 'none';
    }
    if (senha === '') {
        erromsg.style.display = 'block';
        erromsg.innerHTML = "O campo de <b>senha</b> está vazio. <br> Por favor, preencha-o.";
        return;
    } else {
        if (senha.length < 8) {
            erromsg.style.display = 'block';
            erromsg.innerHTML = "A senha deve conter mais de 8 dígitos";
            return;
        } else {
            erromsg.style.display = 'none';
        }
    }

    mostrarLoading()

    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'email=' + encodeURIComponent(email) + '&senha=' + encodeURIComponent(senha)
    })
        .then(response => response.json())
        .then(data => {
            fecharLoading();
            if (data.success) {
                erromsg.classList.remove('alert-danger');
                erromsg.classList.add('alert-success');
                erromsg.innerHTML = data.message;
                erromsg.style.display = 'block';
                setTimeout(function () {
                    window.location.href = 'admin.php';
                }, 2000);
            } else {
                erromsg.style.display = 'block';
                erromsg.innerHTML = data.message;
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}

function mostrarLoading() {
    var divProcessando = document.createElement('div');
    divProcessando.id = 'processandoDiv';
    divProcessando.style.position = 'fixed';
    divProcessando.style.top = '40%';
    divProcessando.style.left = '50%';
    divProcessando.style.transform = 'translate(-50%, -50%)';
    divProcessando.innerHTML = '<img src="../img/loading/loading.gif" width="150px" alt="Processando..." title="Processando...">';
    document.body.appendChild(divProcessando);
}

function fecharLoading() {
    var divProcessando = document.getElementById('processandoDiv');
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}

function carregarConteudo(controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('show').innerHTML = data;
        })
        .catch(error => console.error('Erro na requisição:', error));
}

const generoModalInstancia = new bootstrap.Modal(document.getElementById('mdlGeneroCadastro'));
const generoModal = document.getElementById('mdlGeneroCadastro');
const inGenero = document.getElementById('inpGeneroCadastro');
const btnBotao = document.getElementById('btnCadGenero');

if (generoModal) {
    const formGenero = document.getElementById('frmGeneroCadastro');

    generoModal.addEventListener('shown.bs.modal', () => {
        inGenero.focus()
        const submitHandler = function (event) {
            event.preventDefault();
            btnBotao.disabled = true;
            generoModalInstancia.hide();
            mostrarLoading();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'generoAdd')
            const msg = document.getElementById('msg');

            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    fecharLoading();
                    console.log(data);
                    if (data.success) {
                        alert(data['message']);
                        carregarConteudo('listarGenero');
                    } else {
                        alert(data['message']);
                    }
                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                });
        }
        formGenero.addEventListener('submit', submitHandler);
    })


}

const editGeneroModal = new bootstrap.Modal(document.getElementById('mdlGeneroEdicao'));
const generoEditModal = document.getElementById('mdlGeneroEdicao');
const inpEditGenero = document.getElementById('inpGeneroEdicao');
const btnEditGenero = document.getElementById('btnEditGenero');

function abrirModalEdicao(genero, idgenero) {
    var inGeneroEdit = document.getElementById('inpGeneroEdicao');
    if (inGeneroEdit) {
        inGeneroEdit.focus();
    }
    inGeneroEdit.value = genero;
    document.getElementById('idEditGenero').value = idgenero
    abrirFecharModalJs('mdlGeneroEdicao', 'A');
}

function abrirFecharModalJs(idModal, abrirOuFechar) {
    var modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar == 'A') {
        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}

document.getElementById('frmGeneroEdicao').addEventListener('submit', function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('controle', 'generoEdicao');
    fetch('controle.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                alert(data['message']);
                carregarConteudo('listarGenero');
            } else {
                alert(data['message']);
            }
        })
        .catch(error => {
            console.error('Erro na requisição: ', error);
        })
})

// function abrirModalApagarGenero(id) {
//     document.getElementById('idApagarGenero').value = id;
//     abrirFecharModalJsCliente('mdlApagarGenero', 'A');
// }
// function abrirFecharModalJsGenero(idModal, abrirOuFechar) {
//     var modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
//     if (abrirOuFechar == 'A') {
//         modalInstancia.show();
//     } else {
//         modalInstancia.hide();
//     }
// }

function deletarGenero(controle, id){
    //alert(controle + id)
    fetch('controle.php', {
        method: 'POST',
        body: 'controle=' + encodeURIComponent(controle) + '&idGenero=' + encodeURIComponent(id),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                alert(data.message)
                carregarConteudo('listarGenero')
            }else{
                alert(data.message)
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}

// ------------------------------------Cliente-------------------------------------------
const clienteCadInstancia = new bootstrap.Modal(document.getElementById('mdlClienteCadastro'));
const modalCadCliente = document.getElementById('mdlClienteCadastro');
const inpNomeFocus = document.getElementById('inpNome');
const btnCadCliente = document.getElementById('btnClienteCadastro');

if (modalCadCliente) {
    const formCadCliente = document.getElementById('frmClienteCadastro');

    modalCadCliente.addEventListener('shown.bs.modal', () => {
        inpNomeFocus.focus();

        const submitHandler = function (event) {
            event.preventDefault();
            btnCadCliente.disabled = true;
            clienteCadInstancia.hide();
            mostrarLoading();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'clienteAdd');
            //const msg = document.getElementById('msg');
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(dataCliente => {
                    fecharLoading();
                    console.log(dataCliente);
                    if (dataCliente.success) {
                        alert(dataCliente['message']);
                        //msg.innerHTML = dataCliente.message;
                        //msg.style.display = 'block';
                        carregarConteudo('listarCliente');
                    } else {
                        alert(dataCliente['message']);
                        alert(data['message']);
                        //msg.classList.remove('alert-success');
                        //msg.classList.add('alert-danger');
                        //msg.innerHTML = dataCliente.message;
                        //msg.style.display = 'block';
                    }
                });
        }
        formCadCliente.addEventListener('submit', submitHandler);
    })
}

function abrirModalEdicaoCliente(nome, nascimento, cpf, idcliente) {
    const nomeEdit = document.getElementById('inpNomeEdicao');
    const nascimentoEdit = document.getElementById('inpEditNascimento');
    const cpfEdit = document.getElementById('inpEditCpf');

    if (nomeEdit) {
        nomeEdit.focus();
    }
    nomeEdit.value = nome;
    nascimentoEdit.value = nascimento;
    cpfEdit.value = cpf;
    document.getElementById('idEditCliente').value = idcliente
    abrirFecharModalJsCliente('mdlClienteEdicao', 'A');
}

function abrirFecharModalJsCliente(idModal, abrirOuFechar) {
    var modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar == 'A') {
        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}

const clienteEditInstancia = new bootstrap.Modal(document.getElementById('mdlClienteEdicao'));
const modalEditCliente = document.getElementById('mdlClienteEdicao');
const inpEditNomeFocus = document.getElementById('inpNomeEdicao');
const btnEditCliente = document.getElementById('btnClienteEdicao');

// if (modalEditCliente) {
//     const formEditCliente = document.getElementById('frmEditCliente');

//     modalEditCliente.addEventListener('shown.bs.modal', () => {
//         inpEditNomeFocus.focus();

//         const submitHandler = function (event) {
//             event.preventDefault();
//             btnEditCliente.disabled = true;
//             clienteEditInstancia.hide();
//             mostrarLoading()
//             const form = event.target;
//             const formData = new FormData(form);
//             formData.append('controle', 'editCliente')
//             //const msg = document.getElementById('msg');
//             fetch('controle.php', {
//                 method: 'POST',
//                 body: formData,
//             })
//                 .then(response => response.json())
//                 .then(data => {
//                     fecharLoading()
//                     console.log(data)
//                     if (data.success) {
//                         alert(data['message'])
//                     } else {
//                         alert(data['message'])
//                     }
//                 })
//         }
//         formEditCliente.addEventListener('submit', submitHandler);
//     })
// }



document.getElementById('frmClienteEdicao').addEventListener('submit', function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('controle', 'clienteEdit');
    fetch('controle.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                alert(data['message']);
                carregarConteudo('listarCliente');
            } else {
                alert(data['message']);
            }
        })
        .catch(error => {
            console.error('Erro na requisição: ', error);
        })
})



function deletarCliente(controle, id){
    //alert(controle + id)
    fetch('controle.php', {
        method: 'POST',
        body: 'controle=' + encodeURIComponent(controle) + '&idApagarCliente=' + encodeURIComponent(id),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                alert(data.message)
                carregarConteudo('listarCliente')
            }else{
                alert(data.message)
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}
