<?php

// include('verificaLogin.php');
include ('header.php'); ?>
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lif4Pets - Home</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="../css/cardDia.css"> -->

    <style>
        .pdf-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dd4b39;
            /* Cor de fundo vermelha */
            color: white;
            /* Texto branco */
            text-decoration: none;
            /* Remover sublinhado */
            border-radius: 5px;
            /* Borda arredondada */
            font-family: Arial, sans-serif;
            /* Fonte do texto */
            font-size: 16px;
            /* Tamanho do texto */
            transition: background-color 0.3s;
            /* Suavização na transição de cor */
            font-weight: bold;
        }

        .pdf-button:hover {
            background-color: #bf3b30;
            /* Cor de fundo ao passar o mouse */
            color: white;
            text-decoration: none;
        }

        .pdf-button i {
            margin-right: 5px;
            /* Espaço entre o ícone e o texto */
        }

        .disabled-time {
            display: none;
        }

        .roverr:hover {
            background-color: #0e213bad !important;
        }

        label {
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-plus-circle"></i>
                    <span>Cadastrar</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Adicionar</h6>
                        <a class="collapse-item" href="cadastraPets.php">Pets</a>
                        <a class="collapse-item" href="agendar.php">Cliente</a>
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

            <li class="nav-item active">
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


                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" id="searchTutor" class="form-control bg-light border-0 small"
                                placeholder="Buscar Tutor..." aria-label="Search" aria-describedby="basic-addon2"
                                onkeyup="filterTable()">
                            <div class="input-group-append">
                                <button class="btn" style="background-color: #0e213b; color: white;" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar . . ." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn" style="background-color: #0e213b; color: white;"
                                                type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->

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
                    <!-- HEADER CONTEÚDO -->


                    <div class='col-lg-12 d-flex justify-content-center align-items-center pb-2'>
                        <div class="card shadow col-lg-12 p-0">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-center" style="color: #0e213b">Selecione as datas
                                    de início e final:</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="data_inicio">Data de Início:</label>
                                                <input type="date" id="data_inicio" name="data_inicio"
                                                    class="form-control" value="<?php echo $data_inicio; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="data_final">Data Final:</label>
                                                <input type="date" id="data_final" name="data_final"
                                                    class="form-control" value="<?php echo $data_final; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="pt-4 col-md-2">
                                            <input type="submit" class="btn btn-user btn-block" value="Enviar"
                                                style="background-color: #0e213b; color: white">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="color: #0e213b">
                                        <th>Data da Consulta</th>
                                        <th>Horario da Consulta</th>
                                        <th>Tutor</th>
                                        <th>Paciente</th>
                                        <th>especialidade</th>
                                        <th>Descrição</th>
                                        <th>Status</th>
                                        <th>Protocolo</th>
                                    </tr>
                                </thead>
                                <tbody id="appointmentTable">

                                    <tr >

                                        <?php
                                        // Inicializa as variáveis de data
                                        

                                        // Verifica se o formulário foi enviado
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            // Verifica se as datas foram enviadas através do método POST
                                            if (isset($_POST['data_inicio']) && isset($_POST['data_final'])) {
                                                $data_inicio = $_POST['data_inicio'];
                                                $data_final = $_POST['data_final'];



                                                $select3 = "SELECT cons.status, cons.hr_consulta, cons.dt_consulta, cons.ds_consulta, cons.ds_medicacao, cli.nm_responsavel, p.nm_animal, clini.nm_unidade, v.especialidade, cons.protocolo
FROM tb_consulta as cons
INNER JOIN tb_cliente as cli ON cons.cliente_id = cli.id
INNER JOIN tb_paciente as p ON cons.paciente_id = p.id
INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
INNER JOIN tb_clinica as clini ON v.clinica_id = clini.id
    WHERE v.clinica_id = '$id' AND cons.dt_consulta >= '$data_inicio' AND cons.dt_consulta <= '$data_final'
    ;";

                                                $resultado3 = $mysqli->query($select3);
                                                if ($resultado3->num_rows > 0) {
                                                    while ($dados3 = $resultado3->fetch_array()) {
                                                        $dt_consulta = date("d/m/Y", strtotime($dados3['dt_consulta']));
                                                        $status = $dados3['status'];
                                                        $hr_consulta = $dados3['hr_consulta'];
                                                        $ds_consulta = $dados3['ds_consulta'];
                                                        // $tipo_exame = $dados3['tipo_exame'];
                                                        $nm_responsavel = $dados3['nm_responsavel'];
                                                        $nm_animal = $dados3['nm_animal'];
                                                        $especialidade = $dados3['especialidade'];
                                                        $protocolo = $dados3['protocolo'];
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $dt_consulta; ?></td>
                                                        <td><?php echo $hr_consulta; ?></td>
                                                        <td><?php echo $nm_responsavel; ?></td>
                                                        <td><?php echo $nm_animal; ?></td>
                                                        <td><?php echo $especialidade; ?></td>
                                                        <td><?php echo $ds_consulta; ?></td>
                                                        <td><?php echo $status; ?></td>
                                                        <td><?php echo $protocolo; ?></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    $gerar = "<a href='pdfrelatorio.php?data_inicio=$data_inicio&data_final=$data_final' target='_blank'class='pdf-button'>
                                                <i class='fa fa-file-pdf'></i> Gerar PDF</a>";

                                                    ?>
                                                <div class="container-fluid d-flex justify-content-end pr-0 pb-1">
                                                    <?php
                                                    echo $gerar;
                                                    ?>
                                                </div>
                                                <?php

                                                } else {
                                                    echo "<tr><td colspan='8'>Nenhuma consulta encontrada neste intervalo de tempo!</td></tr>";
                                                }


                                            } else {
                                                echo "<h2>Nenhuma data selecionada. Por favor, preencha o formulário.</h2>";
                                            }
                                        }
                                        ?>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Sair-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Clique em sair logo abaixo para confirmar logout!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script> <!--serve pra tabela tambem-->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script> <!--botao do sidebar-->

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <!--Js pra funcionar os filtros da tabela-->
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchTutor");
            filter = input.value.toUpperCase();
            table = document.getElementById("appointmentTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2]; // Change this number to the column where Tutor names are located
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>