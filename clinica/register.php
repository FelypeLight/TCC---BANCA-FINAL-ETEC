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
                overflow-y: auto; /* habilitar ir pra vertical? Caso o texto for mais verticalmente longo que o site. (muito comum com modal, vai por mim)*/
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

    <title>Registrar Clínica</title>

    <!-- Fontes customizáveis pra template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Estilos pra template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilobuton.css">
    <style>
        .label-input {
            display: block;
            margin-bottom: 5px;
        }

        .border-separated {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Para espaçar os elementos uniformemente */
            border: 1px solid #ccc;
            /* Adiciona uma borda */
            border-radius: 20px;
            /* Arredonda as bordas */
            padding: 5px;
            /* Espaçamento interno */
        }

        .border-separated select,
        .border-separated input[type="time"] {
            flex: 1;
            border: none;
            /* Remove as bordas dos selects e inputs de tempo */
            outline: none;
            /* Remove o contorno ao focar */
        }

        .border-separated select {
            margin-right: 5px;
            /* Adiciona um espaço entre o select e o input de tempo */
        }

        .border-separated::before,
        .border-separated::after {
            content: '';
            display: block;
            width: 1px;
            height: 80%;
            /* Altura da linha vertical */
            background-color: #ccc;
            margin: 0 5px;
            /* Espaçamento horizontal */
        }
    </style>
</head>

<body style="background-color: #0e213b;">

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
                            <form class="user" method="post" action="cadastro.php" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <!-- nome -->
                                    <div class="col-md-6">
                                        <label class="label-input" for="nm_unidade">Nome:</label>
                                        <input name="nm_unidade" class="form-control form-control-user" type="text"
                                            placeholder="Nome">
                                    </div>
                                    <!-- email -->
                                    <div class="col-md-6">
                                        <label class="label-input" for="email">Email:</label>
                                        <input name="email" class="form-control form-control-user" type="email"
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- cnpj -->
                                    <div class="col-md-6">
                                        <label class="label-input" for="cnpj">CNPJ:</label>
                                        <input name="cnpj" class="form-control form-control-user" type="text"
                                            placeholder="CNPJ">
                                    </div>
                                    <!-- celular  -->
                                    <div class="col-md-6">
                                        <label class="label-input" for="celular">CEL:</label>
                                        <input name="celular" class="form-control form-control-user" type="text"
                                            placeholder="CEL">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- Login -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="login">Login: </label>
                                        <input name="login" class="form-control form-control-user" type="text"
                                            placeholder="Login">
                                    </div>
                                    <!-- senha -->
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
                                    <!-- numero -->
                                    <div class="col-sm-6">
                                        <label class="label-input" for="nr_end">Número: </label>
                                        <input name="nr_end" class="form-control form-control-user" type="text"
                                            placeholder="Número">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label >Imagem:</label>
                                            <input type="file" name="imagem" accept="image/*" class="form-control" >
                                    </div>
                                </div>

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900  p-2">Horário de Funcionamento:</h1>
                                </div>

                                <div class="col-sm-6 col-sm-offset-3">
                                    <label> Emergencia 24 Horas</label>
                                    <select name="emergencia" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        <option value="24 Horas ">Sim</option>
                                        <option value=" ">Não</option>
                                    </select>

                                </div>

                                <!-- Domingo -->
                                <label class="label-input" for="domingo">Domingo:</label>
                                <div class="border-separated rounded-pill p-2">
                                    <select id="status_domingo" name="status_domingo"
                                        onchange="habilitarHorario('domingo')">
                                        <option type="text" value="fechado">Fechado</option>
                                        <option type="text" value="aberto">Aberto</option>
                                    </select>
                                    <input class="border-right border-dark m-1" type="time" id="domingo_abertura"
                                        name="domingo_abertura" disabled> -
                                    <input class="m-1" type="time" id="domingo_fechamento" name="domingo_fechamento"
                                        disabled>
                                </div>

                                <!-- Segunda-feira -->
                                <label class="label-input pt-2" for="segunda">Segunda-feira:</label>
                                <div class="border-separated rounded-pill p-2">
                                    <select class="border-right border-dark" id="status_segunda" name="status_segunda"
                                        onchange="habilitarHorario('segunda')">
                                        <option type="text" value="fechado">Fechado</option>
                                        <option type="text" value="aberto">Aberto</option>
                                    </select>
                                    <input class="border-right border-dark m-1" type="time" id="segunda_abertura"
                                        name="segunda_abertura" disabled>
                                    <input class="m-1" type="time" id="segunda_fechamento" name="segunda_fechamento"
                                        disabled>
                                </div>

                                <!-- Terça-feira -->
                                <label class="label-input pt-2" for="terca">Terça-feira:</label>
                                <div class="border-separated rounded-pill p-2">
                                    <select class="border-right border-dark" id="status_terca" name="status_terca"
                                        onchange="habilitarHorario('terca')">
                                        <option type="text" value="fechado">Fechado</option>
                                        <option type="text" value="aberto">Aberto</option>
                                    </select>
                                    <input class="border-right border-dark m-1" type="time" id="terca_abertura"
                                        name="terca_abertura" disabled> -
                                    <input class="m-1" type="time" id="terca_fechamento" name="terca_fechamento"
                                        disabled>
                                </div>

                                <!-- Quarta-feira -->
                                <label class="label-input pt-2" for="quarta">Quarta-feira:</label>
                                <div class="border-separated rounded-pill p-2">
                                    <select class="border-right border-dark" id="status_quarta" name="status_quarta"
                                        onchange="habilitarHorario('quarta')">
                                        <option type="text" value="fechado">Fechado</option>
                                        <option type="text" value="aberto">Aberto</option>
                                    </select>
                                    <input class="border-right border-dark m-1" type="time" id="quarta_abertura"
                                        name="quarta_abertura" disabled> -
                                    <input class="m-1" type="time" id="quarta_fechamento" name="quarta_fechamento"
                                        disabled>
                                </div>

                                <!-- Quinta-feira -->
                                <label class="label-input pt-2" for="quinta">Quinta-feira:</label>
                                <div class="border-separated rounded-pill p-2">
                                    <select id="status_quinta" name="status_quinta"
                                        onchange="habilitarHorario('quinta')">
                                        <option type="text" value="fechado">Fechado</option>
                                        <option type="text" value="aberto">Aberto</option>
                                    </select>
                                    <input class="border-right border-dark m-1" type="time" id="quinta_abertura"
                                        name="quinta_abertura" disabled> -
                                    <input class="m-1" type="time" id="quinta_fechamento" name="quinta_fechamento"
                                        disabled>
                                </div>
                                <!-- Sexta-feira -->

                                <label class="label-input pt-2" for="sexta">Sexta-feira:</label>
                                <div class="border-separated rounded-pill p-2">
                                    <select id="status_sexta" name="status_sexta" onchange="habilitarHorario('sexta')">
                                        <option type="text" value="fechado">Fechado</option>
                                        <option type="text" value="aberto">Aberto</option>
                                    </select>
                                    <input class="border-right border-dark m-1" type="time" id="sexta_abertura"
                                        name="sexta_abertura" disabled> -
                                    <input class="m-1" type="time" id="sexta_fechamento" name="sexta_fechamento"
                                        disabled>
                                </div>


                                <!-- Sábado -->
                                <label class="label-input pt-2" for="sabado">Sábado:</label>
                                <div class="border-separated rounded-pill p-2 ">
                                    <select id="status_sabado" name="status_sabado"
                                        onchange="habilitarHorario('sabado')">
                                        <option type="text" value="fechado">Fechado</option>
                                        <option type="text" value="aberto">Aberto</option>
                                    </select>
                                    <input class="border-right border-dark m-1" type="time" id="sabado_abertura"
                                        name="sabado_abertura" disabled> -
                                    <input class="m-1" type="time" id="sabado_fechamento" name="sabado_fechamento"
                                        disabled>
                                </div>

                                <p></p>

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

                                <div class="pt-4">
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Cadastrar">
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Esqueceu a senha?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Já tem conta? Faça o login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="../homepageClinica.php">Voltar</a>
                            </div>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function habilitarHorario(dia) {
            var status = document.getElementById("status_" + dia).value;
            var aberturaInput = document.getElementById(dia + "_abertura");
            var fechamentoInput = document.getElementById(dia + "_fechamento");

            // Habilita ou desabilita os campos de entrada de acordo com a seleção
            if (status === "aberto") {
                aberturaInput.disabled = false;
                fechamentoInput.disabled = false;
            } else {
                aberturaInput.disabled = true;
                fechamentoInput.disabled = true;
            }
        }
    </script>




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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>