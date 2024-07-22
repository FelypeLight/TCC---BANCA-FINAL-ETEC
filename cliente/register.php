<?php
// PHP para o popup funcionar

// Checa se o link dos termos de serviço é clicado
if(isset($_GET['popup'])) {
    // Mostra o popup modal
    echo '<div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>This is a popup!</p>
            </div>
          </div>';
}

// Lê o txt
function readTextFile($filename) {
    $content = file_get_contents($filename); // Lê o arquvio
    return $content; // Retorna
}

$pdfTextFile = '../termos/Termos de Uso e Serviços (Lif4Pets).txt';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* Modal styles */
        .modal {
            display: none; /* Escondido por padrão */
            position: fixed;
            z-index: 1; /* topo */
            left: 0;
            top: 0;
            width: 100%; /* Largura máxima */
            height: 100%; /* Altura máxima */
            overflow: auto; /* Usa a rodinha do mouse pra mover texto caso necessário */
            background-color: rgba(0,0,0,0.4); /* Preto (ou era pra ser) com opacidade */
            margin-right: 10px;
        }

        /* conteúdo Modal */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% topo e centro */
            padding: 20px;
            border: 1px solid #888;
            width: 100%; /* Pode ser mais ou menos, dependendo da tela */
            max-width: 800px;
            white-space: pre-wrap; /* Preserve line breaks */
            margin-top: 30px; /* Adjust the margin top to move the content up */
        }

        /* botão de fechar */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* container com conteudo */
        .content-container {
                max-height: 800px; /* tamanho máximno do container */
                overflow-y: auto; /* habilitar ir pra vertical? Caso o texto for mais verticalmente longo que o site. (muito comum com modal, vai por mim) */
                margin-top: 15px; /* Era pra mover a caixa de texto pra cima, mas apenas aumenta/diminui a caixa em que o X fica. Ainda útil. */
                margin-left: 10px;
                margin-right: 10px;
                margin-bottom: 1px;
        }

        h3, h4 {
            text-align: center;
        }

    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Cliente | Lif4Pets</title>

    <!-- Fontes customizáveis pra template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Estilos pra template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: rgb(0, 201, 221);">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie uma conta!</h1>
                            </div>
                            <form class="user" method="post" action="cadastro.php">

                                <div class="form-group row">
                                    <!-- nome -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="nm_responsavel">Nome: </label>
                                        <input name="nm_responsavel" class="form-control form-control-user" type="text"
                                            placeholder="Nome">
                                    </div>

                                    <!-- email -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="email">Email: </label>
                                        <input name="email" class="form-control form-control-user" type="email"
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- Cpf -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="documento_cpf">CPF: </label>
                                        <input name="documento_cpf" class="form-control form-control-user" type="text"
                                            placeholder="CPF">
                                    </div>

                                    <!-- Celular -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="celular">Celular: </label>
                                        <input name="celular" class="form-control form-control-user" type="text"
                                            placeholder="CEL">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- Login -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="login">Login: </label>
                                        <input name="login" class="form-control form-control-user" type="text"
                                            placeholder="Nome Login">
                                    </div>

                                    <!-- Senha -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="senha">Senha: </label>
                                        <input name="senha" class="form-control form-control-user" type="password"
                                            placeholder="Senha">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- cep -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="cep">Cep: </label>
                                        <!-- campo de CEP -->
                                        <input name="cep" id="cep" class="form-control form-control-user" type="text"
                                            placeholder="CEP" oninput="buscaCEP()">

                                    </div>

                                    <!-- estado -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="estado">Estado: </label>
                                        <input name="estado" id="estado" class="form-control form-control-user"
                                            type="text" placeholder="Estado">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- cidade -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="cidade">Cidade: </label>
                                        <input name="cidade" id="cidade" class="form-control form-control-user"
                                            type="text" placeholder="Cidade">
                                    </div>
                                    <!-- bairro -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="bairro">Bairro: </label>
                                        <input name="bairro" id="bairro" class="form-control form-control-user"
                                            type="text" placeholder="Bairro">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- rua -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="rua">Rua: </label>
                                        <input name="rua" id="rua" class="form-control form-control-user" type="text"
                                            placeholder="Rua">
                                    </div>

                                    <!-- Número -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="nr">Número: </label>
                                        <input name="nr" class="form-control form-control-user" type="text"
                                            placeholder="Número">
                                    </div>
                                </div>

                                <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2" required>
                                                <label class="custom-control-label" for="customCheck2">Eu li e concordo com
                                                    <a href="#" id="openModal">os Termos de Serviço.</a>
                                                </label>
                                            </div>
                                </div>

                                <!-- Modal -->
                                <div id="myModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <div class="content-container">
                                            <?php
                                            // Lê o que tem no TXT
                                            $fileContent = readTextFile($pdfTextFile);
                                            // Preserva quebras de linhas no txt
                                             echo $fileContent;
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    // Function pra abrir modal
                                    function openModal() {
                                        document.getElementById("myModal").style.display = "block";
                                    }

                                    // Function pra fechar o modal
                                    function closeModal() {
                                        document.getElementById("myModal").style.display = "none";
                                    }

                                    // Quando o documento é carregado
                                    document.addEventListener("DOMContentLoaded", function() {
                                        // Event listener pra abrir o modal
                                        document.getElementById("openModal").addEventListener("click", function(event) {
                                            event.preventDefault(); // Faz a página NÃO recarregar ao clicar no link de termos (me estressou)
                                            openModal();
                                        });

                                        // Event listener pra fechar o modal
                                        document.getElementsByClassName("close")[0].addEventListener("click", function() {
                                            closeModal();
                                        });

                                        // Event listener pra fechar o modal CLICANDO FORA dele
                                        window.addEventListener("click", function(event) {
                                            if (event.target == document.getElementById("myModal")) {
                                                closeModal();
                                            }
                                        });
                                    });
                                </script>

                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Cadastrar">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Esqueceu a senha?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Já tem conta? Faça o login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="../index.php">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function buscaCEP() {
            var cep = document.getElementById('cep').value;
            cep = cep.replace(/\D/g, ''); // Remove caracteres não numéricos

            // Verifica se o CEP possui 8 dígitos
            if (cep.length == 8) {
                console.log("CEP digitado: " + cep); // Depuração: verifica se o CEP está sendo capturado corretamente

                // Faz a requisição AJAX para o ViaCEP
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "https://viacep.com.br/ws/" + cep + "/json/", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        console.log("Resposta do ViaCEP: ", response); // Depuração: verifica a resposta do ViaCEP

                        if (!response.erro) {
                            // Preenche os campos de endereço com os dados do ViaCEP
                            document.getElementById('estado').value = response.uf;
                            document.getElementById('cidade').value = response.localidade;
                            document.getElementById('bairro').value = response.bairro;
                            document.getElementById('rua').value = response.logradouro;
                            // Você pode preencher outros campos de endereço, se necessário
                        } else {
                            alert("CEP não encontrado.");
                        }
                    }
                };
                xhr.send();
            }
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>