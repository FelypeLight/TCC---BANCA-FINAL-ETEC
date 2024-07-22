<?php
session_start();
// include('verificaLogin.php');
include ('header.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lif4Pets-Agendamento Dia</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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


            <li class="nav-item active">
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


                <div class="container-fluid col-md-12 ">


                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold  text-center" style='color: #0e213b;'>Agendamentos de Hoje
                                <?php
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
                                date_default_timezone_set('America/Sao_Paulo');
                                // Definindo as variáveis $dia e $mes
                                $dia = date("d");
                                $mes = strftime('%b');

                                ?>

                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper ">
                                        <div class="widget-49-date-primary ">
                                            <span class="widget-49-date-day"><?php echo $dia ?></span>
                                            <span class="widget-49-date-month"><?php echo $mes ?></span>
                                        </div>
                                    </div>
                                </div>
                            </h3>
                        </div>
                    </div>

                    <div class="row pt-0 d-flex justify-content-center mb-4 ">




                        <?php


                        $today = date("Y-m-d");
                        $select3 = "SELECT cons.veterinario_id, cons.id, cons.cliente_id, cons.status, cons.hr_consulta, cons.dt_consulta, cons.ds_consulta, cons.ds_medicacao, cli.nm_responsavel, p.nm_animal, clini.nm_unidade, v.especialidade
                    FROM tb_consulta as cons
                    INNER JOIN tb_cliente as cli ON cons.cliente_id = cli.id
                    INNER JOIN tb_paciente as p ON cons.paciente_id = p.id
                    INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
                    INNER JOIN tb_clinica as clini ON v.clinica_id = clini.id
                    WHERE v.clinica_id = '$id' AND cons.dt_consulta = '$today'
                    ORDER BY dt_consulta";
                        // alterar o valor do dt_consulta para '$today'
                        $resultado3 = $mysqli->query($select3);
                        if ($resultado3->num_rows > 0) {
                            while ($dados3 = $resultado3->fetch_array()) {
                                $cliente_id = $dados3['cliente_id'];
                                $veterinario_id = $dados3['veterinario_id'];
                                $idc = $dados3['id'];
                                $dt_consulta = date("d/m/Y", strtotime($dados3['dt_consulta']));
                                $status = $dados3['status'];
                                $hr_consulta = $dados3['hr_consulta'];
                                $ds_consulta = $dados3['ds_consulta'];
                                $nm_responsavel = $dados3['nm_responsavel'];
                                $nm_animal = $dados3['nm_animal'];
                                $nm_unidade = $dados3['nm_unidade'];
                                $especialidade = $dados3['especialidade'];

                                $card = "<div class='col-md-6 mt-4'>
                                        <div class='card card-margin border-left-primary'>
                                            <div class='card-header no-border'>
                                                <h5 class='card-title pt-3 font-weight-bold' style='color: #0e213b;'>
                                                     $hr_consulta
                                                </h5>
                                            </div>
                                            <div class='card-body pt-0'>
                                                <div class='widget-49'>

                                                    <div class='widget-49-title-info'>
                                                        <h2 class='fs-3 pt-2 font-weight-bold' style='color: #0e213b;'> $especialidade</h2>
                                                        <p class='widget-49-meeting-time font-weight-bold' style='color: #0e213b;'> $nm_unidade</p>
                                                    </div>
                                                    <div class='pt-4'>
                                                        <p class='widget-49-meeting-item font-weight-bold'><span style='color: #0e213b;'>Status:</span>
                                                                 $status
                                                        </p>
                                                        <p class='widget-49-meeting-item font-weight-bold'><span style='color: #0e213b;'>Motivo:</span>
                                                                 $ds_consulta</p>
                                                        <p class='widget-49-meeting-item font-weight-bold'><span style='color: #0e213b;'>Animal:</span>
                                                                 $nm_animal</p>
                                                        <p class='widget-49-meeting-item font-weight-bold'><span style='color: #0e213b;'>Tutor:</span>
                                                                 $nm_responsavel</p>
                                                    </div>
                                                    <div class='widget-49-meeting-action d-flex justify-content-end pb-3'>
                                                                                <button type='button' class='btn btn-success btnAlterarAgendamento mr-2' 
                                data-id='$idc' data-cliente_id='$cliente_id' data-toggle='modal' data-target='#AlterarModal' 
                                >Atendimento</button>
                        <button type='button' class='btn btn-info btnRemarcarAgendamento' 
                        data-id='$idc' data-toggle='modal' data-target='#remarcarModal' 
                        data-dt_consulta='$dt_consulta' data-hr_consulta='$hr_consulta' 
                        data-vet='$veterinario_id' data-cliente_id='$cliente_id'>Remarcar</button>
                        <button type='button' class='btn btn-danger ml-2 btnConfirmarCancelamento' 
                        data-id='$idc' data-cliente_id='$cliente_id' data-toggle='modal' data-target='#cancelarModal'>Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                echo $card;

                            }

                        } else {
                            // Aqui entra o seu novo código HTML em vez do alert de JavaScript
                            echo '<div class="text-center pt-4">
                                <h5 class="fw-bold pt-4">Nenhuma consulta agendada para hoje.</h5>
                              </div>';
                        }
                        ?>
                    </div>

                    

                </div>

            </div>
            <!-- Modal Alterar agendamento -->
            <div class="modal fade" id="AlterarModal" tabindex="-1" role="dialog" aria-labelledby="AlterarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <label>Status do Atendimento</label>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            
                        </div>
                        
                        <form id="Alterar-form" action="AlterarMinhasConsu.php" method="POST">
                            <input type='hidden' name='id' id='Alterar-consulta-id'>
                            <input type='hidden' name='cliente_id' id='Alterar-cliente-id'>

                            <div class="form-group">

                                <select name="status" class="form-control" required>
                                    <option value="">Selecione uma opção</option>
                                    <option value="Realizado">Realizado</option>
                                    <option value="Falta na consulta">Falta na consulta</option>
                                </select>
                            </div>

                            <button type='submit' class='btn'
                                style='background-color: rgb(0, 201, 221); color: white;'>Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>

            <style>
                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                    max-height: 200px;
                    overflow-y: auto;
                }

                .dropdown-item {
                    padding: 12px 16px;
                    cursor: pointer;
                }

                .dropdown-item:hover {
                    background-color: #f1f1f1;
                }
            </style>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    document.querySelectorAll('.btnAlterarAgendamento').forEach(function (button) {
                        button.addEventListener('click', function () {
                            var consultaId = this.getAttribute('data-id');
                            var clienteId = this.getAttribute('data-cliente_id');

                            document.getElementById('Alterar-cliente-id').value = clienteId
                            document.getElementById('Alterar-consulta-id').value = consultaId;

                        });
                    });



                    document.getElementById('Alterar-form').addEventListener('submit', function (event) {
                        event.preventDefault(); // Prevenir o envio do formulário padrão
                        var formData = new FormData(this);

                        fetch('alterarconsulta.php', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.text())
                            .then(data => {
                                if (data.trim() !== '') {
                                    alert(data); // Exibir mensagens de erro do PHP
                                } else {
                                    alert('Alteração feita com sucesso');
                                    window.location.reload(); // Recarregar a página para refletir as atualizações
                                }
                            })
                            .catch(error => {
                                console.error('Erro:', error);
                            });
                    });
                });

            </script>
                <!-- Modal remarcar agendamento -->
    <div class="modal fade" id="remarcarModal" tabindex="-1" role="dialog" aria-labelledby="remarcarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remarcar consulta</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="remarcar-form" action="remarcarMinhasConsu.php" method="POST">
                        <input type='hidden' name='id' id='remarcar-consulta-id'>
                        <input type='hidden' name='cliente_id' id='Alterar-cliente-id'>
                        <input type="hidden" name="veterinario_id" id='remarcar-vet-id'
                            value='<?php echo $veterinario_id; ?>'><br>
                        <div class="input-group">
                            <label for="remarcar_dt_consulta">Data da consulta:</label><br>
                            <input type="date" id="remarcar_dt_consulta" name="dt_consulta"><br>
                        </div>
                        <div class="input-group mb-4">
                            <label for="remarcar_hr_consulta">Hora da consulta:</label><br>
                            <input type="text" id="remarcar_hr_consulta" name="hr_consulta" readonly><br>
                            <div id="time-dropdown" class="dropdown-content">
                                <?php
                                for ($h = 0; $h < 24; $h++) {
                                    for ($m = 0; $m < 60; $m += 30) {
                                        $time = sprintf('%02d:%02d', $h, $m);
                                        echo "<div class='dropdown-item' onclick=\"selectTime('$time')\">$time</div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <button type='submit' class='btn'
                                style='background-color: rgb(0, 201, 221); color: white;'>Confirmar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            max-height: 200px;
            overflow-y: auto;
        }

        .dropdown-item {
            padding: 12px 16px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.btnRemarcarAgendamento').forEach(function (button) {
                button.addEventListener('click', function () {
                    var consultaId = this.getAttribute('data-id');
                    var dt_consulta = this.getAttribute('data-dt_consulta');
                    var hr_consulta = this.getAttribute('data-hr_consulta');
                    var vet = this.getAttribute('data-vet');
                    var clienteId = this.getAttribute('data-cliente_id');

document.getElementById('Alterar-cliente-id').value = clienteId
                    document.getElementById('remarcar-vet-id').value = vet;
                    document.getElementById('remarcar-consulta-id').value = consultaId;
                    document.getElementById('remarcar_dt_consulta').value = dt_consulta;
                    document.getElementById('remarcar_hr_consulta').value = hr_consulta;
                });
            });

            document.getElementById('remarcar_hr_consulta').addEventListener('focus', function () {
                document.getElementById('time-dropdown').style.display = 'block';
            });

            document.getElementById('remarcar_hr_consulta').addEventListener('blur', function () {
                setTimeout(function () {
                    document.getElementById('time-dropdown').style.display = 'none';
                }, 200);  // Delay to allow click to register
            });

            document.getElementById('remarcar-form').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevenir o envio do formulário padrão
                var formData = new FormData(this);

                fetch('remarcarMinhasConsu.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.text())
                    .then(data => {
                        if (data.trim() !== '') {
                            alert(data); // Exibir mensagens de erro do PHP
                        } else {
                            alert('Agendamento atualizado com sucesso');
                            window.location.reload(); // Recarregar a página para refletir as atualizações
                        }
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                    });
            });
        });

        function selectTime(time) {
            document.getElementById('remarcar_hr_consulta').value = time;
            document.getElementById('time-dropdown').style.display = 'none';
        }
    </script>
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
<!-- Modal cancelar agendamento -->
<div class="modal fade" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="cancelarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelarModalLabel">Confirmação</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pretende mesmo cancelar o agendamento?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form id="cancelar-form" action='updateMinhasConsu.php' method='POST'>
                        <input type='hidden' name='id' id='cancelar-consulta-id' value='<?php echo $idc; ?>'>
                        <input type='hidden' name='cliente_id' id='Alterar-cliente-id'>
                        <button type='submit' class='btn'
                            style='background-color: rgb(0, 201, 221); color: white;'>Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.btnConfirmarCancelamento').forEach(function (button) {
                button.addEventListener('click', function () {
                    var consultaId = this.getAttribute('data-id');
                    var clienteId = this.getAttribute('data-cliente_id');

document.getElementById('Alterar-cliente-id').value = clienteId
                    document.getElementById('cancelar-consulta-id').value = consultaId;
                });
            });
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script> <!--botao do sidebar-->

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script>
        function filterTable() {
            const input = document.getElementById('searchTutor');
            const filter = input.value.toLowerCase();
            const cards = document.getElementsByClassName('card-margin');

            for (let i = 0; i < cards.length; i++) {
                const card = cards[i];
                const tutor = card.querySelector('.widget-49-meeting-item span:nth-child(2)').textContent.toLowerCase();
                if (tutor.indexOf(filter) > -1) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }
    </script>
</body>

</html>