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

const generoModal = document.getElementById('mdlCadGenero');
const inGenero = document.getElementById('genero');
const btnBotao = document.getElementById('btnCadGenero');

// inGenero.value = 'Marco';

if (generoModal) {
    const formGenero = document.getElementById('frmCadGenero');

    generoModal.addEventListener('shown.bs.modal', () => {
        inGenero.focus()
        const submitHandler = function (event) {
            //event.preventDefault();
            btnBotao.disabled = true;
            mostrarLoading()
            var form = event.target;
            var formData = new FormData(form);
            formData.append('controle', 'generoAdd')

            var msg = document.getElementById('msg');
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    fecharLoading();
                    console.log(data);
                    if (data.success) {
                        msg.innerHTML = data.message;
                        msg.style.display = 'block';
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



