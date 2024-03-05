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
                    window.location.href = 'adm.php';
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

// cadastro de genero
const generoModalInstancia = new bootstrap.Modal(document.getElementById('mdlCadGenero'));
const generoModal = document.getElementById('mdlCadGenero');
const inGenero = document.getElementById('genero');
const btnBotao = document.getElementById('btnCadGenero');

// inGenero.value = 'Marco';

if (generoModal) {
    const formGenero = document.getElementById('frmCadGenero');

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
                        msg.innerHTML = data.message;
                        msg.style.display = 'block';
                        carregarConteudo('listarGenero');
                    } else {
                        msg.classList.remove('alert-success');
                        msg.classList.add('alert-danger');
                        msg.innerHTML = data.message;
                        msg.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                });
        }
        formGenero.addEventListener('submit', submitHandler);
    })


}

//abrir modal
function abrirModalEdicao(genero, idgenero) {
    var inGeneroEdit = document.getElementById('inEditGenero');
    if (inGeneroEdit) {
        inGeneroEdit.focus();
    }
    inGeneroEdit.value = genero;
    document.getElementById('idEditGenero').value = idgenero
    // $('#generoEditModal').modal('show');
    abrirFecharModalJs('mdlEditGenero', 'A');
}

function abrirFecharModalJs(idModal, abrirOuFechar) {
    var modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar == 'A') {
        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}


// edicao de genero
const editGeneroModal = new bootstrap.Modal(document.getElementById('mdlEditGenero'));
const generoEditModal = document.getElementById('mdlEditGenero');
const inpEditGenero = document.getElementById('inEditGenero');
const btnEditGenero = document.getElementById('btnEditGenero');

// if (generoEditModal) {
//     const formEditGenero = document.getElementById('frmEditGenero')

//     generoEditModal.addEventListener('shown.bs.modal', () => {
//         inpEditGenero.focus();
//         const submitHandler = function (event) {
//             event.preventDefault();
//             btnEditGenero.disabled = true;
//             editGeneroModal.hide();
//             mostrarLoading();
//             //const form = event.target;
//             const formData = new FormData(this);
//             formData.append('controle', 'generoEdit');
//             const msg = document.getElementById('msg');
//             fetch('controle.php', {
//                 method: 'POST',
//                 body: formData,
//             })
//                 .then(response => response.json())
//                 .then(dataEdit => {
//                     fecharLoading();
//                     console.log(dataEdit);
//                     alert('Gênero alterado com successo!');
//                     if (dataEdit.success) {
//                         alert(dataEdit['message']);
//                         //carregarConteudo('listarGenero');
//                         msg.innerHTML = dataEdit.message;
//                         msg.style.display = 'block';
//                         //btnEditGenero.disabled = false;
//                     } else {
//                         alert(dataEdit['message']);
//                         // msg.classList.remove('alert-success');
//                         // msg.classList.add('alert-danger');
//                         // msg.innerHTML = dataEdit.message;
//                         // msg.style.display = 'block';
//                     }
//                 });
//         }
//         formEditGenero.addEventListener('submit', submitHandler);
//     })
// }

document.getElementById('frmEditGenero').addEventListener('submit', function (event) {
    event.preventDefault();


    var formData = new FormData(this);
    formData.append('controle', 'generoEdit');
    fetch('controle.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                alert(data['message']);
                editGeneroModal.hide();
                carregarConteudo('listarGenero');
                msg.innerHTML = dataEdit.message;
                msg.style.display = 'block';
            } else {
                alert(data['message']);
                msg.classList.remove('alert-success');
                msg.classList.add('alert-danger');
                msg.innerHTML = dataEdit.message;
                msg.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Erro na requisição: ', error);
        })
})


// Abrir modal para deletar/apagar genero ------------------------------------------



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
        body: 'controle=' + encodeURIComponent(controle) + '&idApagarGenero=' + encodeURIComponent(id),
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

// ------------------------------------------------------------------------------------------
//Cadastro de cliente

const clienteCadInstancia = new bootstrap.Modal(document.getElementById('mdlCadCliente'));
const modalCadCliente = document.getElementById('mdlCadCliente');
const inpNomeFocus = document.getElementById('inpNomeCliente');
const btnCadCliente = document.getElementById('btnCadCliente');

if (modalCadCliente) {
    const formCadCliente = document.getElementById('CadCliente');

    modalCadCliente.addEventListener('shown.bs.modal', () => {
        inpNomeFocus.focus();

        const submitHandler = function (event) {
            event.preventDefault();
            btnCadCliente.disabled = true;
            clienteCadInstancia.hide();
            mostrarLoading();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'addCliente');
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



// Abrir modal de edicao do cliente

function abrirModalEdicaoCliente(nome, nascimento, cpf, idcliente) {
    const nomeEdit = document.getElementById('inpEditNomeCliente');
    const nascimentoEdit = document.getElementById('inpEditNascimento');
    const cpfEdit = document.getElementById('inpEditCpf');

    if (nomeEdit) {
        nomeEdit.focus();
    }
    nomeEdit.value = nome;
    nascimentoEdit.value = nascimento;
    cpfEdit.value = cpf;
    document.getElementById('idEditCliente').value = idcliente
    abrirFecharModalJsCliente('mdlEditCliente', 'A');
}

function abrirFecharModalJsCliente(idModal, abrirOuFechar) {
    var modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar == 'A') {
        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}



// editar cliente

const clienteEditInstancia = new bootstrap.Modal(document.getElementById('mdlEditCliente'));
const modalEditCliente = document.getElementById('mdlEditCliente');
const inpEditNomeFocus = document.getElementById('inpEditNomeCliente');
const btnEditCliente = document.getElementById('btnEditCliente');

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



document.getElementById('frmEditCliente').addEventListener('submit', function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('controle', 'editCliente');
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
