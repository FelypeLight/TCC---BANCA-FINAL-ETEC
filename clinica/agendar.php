<?php
session_start();
include ('../conexao.php');
include ('header.php');
$clinica_id = $id;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



    <link href="../vendorUser/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <title>Sistema - Agendamento</title>
    <!-- Custom styles for this template-->
    <link href="../cssUser/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <style>
        .disabled-time {
            display: none;
        }

        .roverr:hover {
            background-color: #0e213bad !important;
        }

        label{
            font-weight: bold;
            color: #0e213b;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
            style="background-color: #0e213b;  padding-top: 1rem;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user.php">
                <div class="sidebar-brand-icon">
                    <img src="../imgUser/LogoBrancaTotal.png" alt="" width="130rem" class="pt-2">
                </div>

            </a>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-home fa-sm"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 ">



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-plus-circle"></i>
                    <span>Cadastrar</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Adicionar</h6>
                        <a class="collapse-item " href="cadastraPets.php">Pets</a>
                        <a class="collapse-item active" href="agendar.php">Cliente</a>
                        <a class="collapse-item" href="CadastroVet.php">Veterinário</a>
                    </div>
                </div>
            </li>


            <li class="nav-item ">
                <a class="nav-link" href="buscarCli.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>Agendar</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="agendamentosDia.php">
                    <i class="fas fa-flag"></i>
                    <span>Agendados para Hoje</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="agendadosMes.php">
                    <i class="fas fa-calendar fa-2x"></i>
                    <span> Agendamentos</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="clientes.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                    <span>Clientes</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="petsCadastrados.php">
                    <i class="fas fa-dog"></i>
                    <span>Pets Cadastrados</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="mostraVet.php">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span>Veterinários</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="planos.php">
                    <i class="fas fa-dollar-sign fa mr-2"></i>
                    <span>Assinatura</span></a>
            </li>



            <div class="text-center d-none d-md-inline pt-4">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- UPGRADE DO PLANO -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>Lif4Pets Pro</strong> evolua seu plano e obtenha mais armazenamento de clientes e mais!</p>
                <a class="btn btn-success btn-sm" href="assinatura.html">Evoluir!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"
                        style="color:#0e213b; ;">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class='nav-item dropdown no-arrow mx-1'>


                            <div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in
                                                        aria-labelledby=alertsDropdown'>
                                <h6 class='dropdown-header border-0 style=background-color: rgb(0, 201, 221);'>
                                    Notificações
                                </h6>

                                <?php
                                include ('select_notificacao.php');
                                $restcard = "  <a class='dropdown-item text-center small text-gray-500' href='#'>Mostrar todas as
                            notificações</a>
                    </div>
                    <a class='nav-link dropdown-toggle' href='#' id='alertsDropdown' role='button'
                                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <i class='fas fa-bell fa-fw'></i>
                                                
                                                <span class='badge badge-danger badge-counter'> $contador</span>
                                            </a>";
                                echo $restcard;
                                ?>

                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $login ?></span>
                                <!-- IMAGEM USUARIO -->
                                <img class="img-profile rounded-circle" src="<?php echo $imagem; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./logout.php" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">
                    <div class='col-lg-12 d-flex justify-content-center align-items-center pb-2'>
                        <div class='card shadow col-lg-10 p-0'>
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-center" style="color: #0e213b">Cadastrar Cliente na Clínica</h3>
                            </div>
                            <div class='card-body'>
                                <form class="user" method="post" action="cadastrocli.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="label-input" for="nm_responsavel">Nome:</label>
                                            <input name="nm_responsavel" class="form-control" type="text"
                                                placeholder="Nome" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-input" for="clinica_id">Clínica:</label>
                                            <input name="clinica_id" value="<?php echo $clinica_id; ?>"
                                                class="form-control" type="text" readonly>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label class="label-input" for="documento_cpf">CPF:</label>
                                            <input name="documento_cpf" class="form-control" type="text"
                                                placeholder="CPF" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-input" for="celular">Celular:</label>
                                            <input name="celular" class="form-control" type="text" placeholder="Celular"
                                                required>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label class="label-input" for="cep">CEP:</label>
                                            <input name="cep" id="cep" class="form-control" type="text"
                                                placeholder="CEP" oninput="buscaCEP()" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-input" for="estado">Estado:</label>
                                            <input name="estado" id="estado" class="form-control" type="text"
                                                placeholder="Estado" required>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label class="label-input" for="cidade">Cidade:</label>
                                            <input name="cidade" id="cidade" class="form-control" type="text"
                                                placeholder="Cidade" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-input" for="bairro">Bairro:</label>
                                            <input name="bairro" id="bairro" class="form-control" type="text"
                                                placeholder="Bairro" required>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label class="label-input" for="rua">Rua:</label>
                                            <input name="rua" id="rua" class="form-control" type="text"
                                                placeholder="Rua" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-input" for="nr">Número:</label>
                                            <input name="nr" class="form-control" type="text" placeholder="Número"
                                                required>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center align-items-center">
                                        <div class="pt-4 col-md-3">
                                            <input type="submit" class="btn btn-user btn-block roverr" value="Cadastrar"
                                                style="background-color: #0e213b; color: white">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-sm-offset-3" id="div_conteudo"><!-- div onde será exibido o conteúdo-->
                    <img id="loader" src="loader.gif" style="display:none;margin: 0 auto;">
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lif4Pets</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js\locales\bootstrap-datetimepicker.pt-BR.js"></script>
    <script src="../js/sb-admin-2.min.js"></script> <!--botao do sidebar-->
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
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
    <!-- <script type="text/javascript">
        $(document).ready(function () {// Ao carregar a página faça o conteudo abaixo
            $('.btn_carrega_conteudo').click(function () {// Ao clicar no elemento que contenha a classe .btn_carrega_conteudo faça...
                var carrega_url = this.id; //Carregar url pegando os dados pelo ID
                carrega_url = carrega_url + '_listar.php'; //Carregar a url e o conteudo da página
                $.ajax({ //Carregar a função ajax embutida no jQuery
                    url: carrega_url,
                    //Variável DATA armazena o conteúdo da requisição
                    success: function (data) {//Caso a requisição seja completada com sucesso faça...
                        $('#div_conteudo').html(data);// Incluir o conteúdo dentro da DIV
                    },
                    beforeSend: function () {//Antes do envio do cabeçalho faça...
                        $('#loader').css({ display: "block" });//carregar a imagem de load
                    },
                    complete: function () {//Após o envio do cabeçalho faça...
                        $('#loader').css({ display: "none" });//esconder a imagem de load
                    }
                });
            });

            $('.data_formato').datetimepicker({
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                language: "pt-BR",
                startDate: '-0d'
            });
        });
    </script> -->

    <script src="../js/sb-admin-2.min.js"></script> <!--botao do sidebar-->

</body>


</html>