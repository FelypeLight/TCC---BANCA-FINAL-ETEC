<?php
session_start();
include ('../conexao.php');
include ('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lif4Pets - Minhas Consultas</title>

    <!-- Custom fonts for this template-->
    <link href="../vendorUser/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../cssUser/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendorUser/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../cssUser/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../cssUser/card.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
            style="background-color: rgb(0, 201, 221); padding-top: 1rem;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user.php">
                <div class="sidebar-brand-icon">
                    <img src="../assets/img/LogoBrancaTotal.png" alt="" width="130rem" class="pt-2" class="primary">
                </div>

            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-home fa-sm"></i>
                    <span>Home</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="buscarCli.php">
                    <i class="fas fa-search fa-sm"></i>
                    <span>Buscar clínicas</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="minhasConsultas.php">
                    <i class="fas fa-calendar fa-2x"></i>
                    <span>Minhas consultas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="petsCadastrados.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                    <span>Pets cadastrados</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registerPet.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>Cadastrar Pets</span></a>
            </li>


            <div class="text-center d-none d-md-inline pt-4">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
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
                        style="color:rgb(0, 201, 221); ;">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $email ?></span>
                                <!-- IMAGEM USUARIO -->
                                <img class="img-profile rounded-circle" src="<?php echo $foto; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->



                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Minhas Consultas</h1>
                    <?php
                    $cliente_id = $id;
                    $select3 = "SELECT cons.cliente_id, cons.id, cons.veterinario_id, cons.status, cons.hr_consulta, cons.dt_consulta, cons.ds_consulta, cons.ds_medicacao, cli.nm_responsavel, p.nm_animal, clini.nm_unidade, v.nm_vet, v.especialidade, t.nm_atendimento
    FROM tb_consulta as cons
    INNER JOIN tb_cliente as cli ON cons.cliente_id = cli.id
    INNER JOIN tb_paciente as p ON cons.paciente_id = p.id
    INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
    INNER JOIN tb_clinica as clini ON v.clinica_id = clini.id
    INNER JOIN tb_tipoatendimento as t ON cons.tipo_id = t.id
    WHERE cons.cliente_id = '$cliente_id' AND (cons.status = 'agendada' OR cons.status = 'remarcada');";
                    $resultado3 = $mysqli->query($select3);
                    while ($dados3 = $resultado3->fetch_array()) {
                        $idc = $dados3['id'];
                        $dt_consulta = date("Y-m-d", strtotime($dados3['dt_consulta']));
                        $status = $dados3['status'];
                        $hr_consulta = $dados3['hr_consulta'];
                        $ds_consulta = $dados3['ds_consulta'];
                        $veterinario_id = $dados3['veterinario_id'];
                        $nm_responsavel = $dados3['nm_responsavel'];
                        $nm_animal = $dados3['nm_animal'];
                        $nm_unidade = $dados3['nm_unidade'];
                        $nm_vet = $dados3['nm_vet'];
                        $especialidade = $dados3['especialidade'];
                        $nm_atendimento = $dados3['nm_atendimento'];
                        echo "
        <div class='col-6 mb-4'>
            <div class='card border-left-info shadow h-100 d-flex flex-column'>
                <div class='card-body d-flex flex-column flex-grow-1'>
                    <div class='row no-gutters flex-grow-1'>
                        <div class='col'>
                            <div class='h6 font-weight-bold text-info text-uppercase mb-1'>
                                <h2>" . date("d/m/Y", strtotime($dados3['dt_consulta'])) . "</h2>
                            </div>
                            <div class='h5 mb-0 font-weight-bold text-gray-800 text-info'>
                                <h6> <span class='font-weight-bold'>Status:</span> $status </h6>
                                <h2 class='text-info'><strong> <span class='font-weight-bold'>Clínica:</span> $nm_unidade <strong></h2>
                                <h6> <span class='font-weight-bold'>Horário:</span> $hr_consulta </h6>
                                <h6 class='pt-3'> <span class='font-weight-bold'>Descrição:</span> $ds_consulta </h6>
                                <h6> <span class='font-weight-bold'>Animal:</span> $nm_animal </h6>
                                <h6> <span class='font-weight-bold'>Tutor:</span> $nm_responsavel </h6>
                                <h6> <span class='font-weight-bold'>Veterinário:</span> $nm_vet </h6>
                                <h6> <span class='font-weight-bold'>Especialidade:</span> $especialidade </h6>
                                <h6> <span class='font-weight-bold'>Nome do atendimento:</span> $nm_atendimento </h6>
                            </div>
                        </div>
                    </div>
                    <div class='d-flex justify-content-end mt-auto'>
                        <button type='button' class='btn btn-info btnRemarcarAgendamento' 
                        data-id='$idc' data-toggle='modal' data-target='#remarcarModal' 
                        data-dt_consulta='$dt_consulta' data-hr_consulta='$hr_consulta' 
                        data-vet='$veterinario_id'>Remarcar</button>
                        <button type='button' class='btn btn-danger ml-2 btnConfirmarCancelamento' 
                        data-id='$idc' data-toggle='modal' data-target='#cancelarModal'>Cancelar</button>

                        <button type='button' class='btn btn-danger ml-2  btnGerarPdf' 
                        data-id='$idc' data-toggle='modal' data-target='#gerarpdf'>Gerar Pdf</button>
                    </div>
                </div>
            </div>
        </div>";
                        ?>
                        <?php
                    }
                    // $gerar = "<a href='pdfrelatorio.php?data_inicio=$data_inicio&data_final=$data_final' target='_blank'class='pdf-button'>
                    //                             <i class='fa fa-file-pdf'></i> Gerar PDF</a>";

                    ?>
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
                        <input type='hidden' name='cliente_id' value='<?php echo $cliente_id; ?>'>
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

 <!-- Modal protocolo agendamento -->
 <div class="modal fade" id="gerarpdf" tabindex="-1" role="dialog" aria-labelledby="gerarPdfLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gerarPdfLabel">Confirmação</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pretende mesmo gerar o pdf?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form id="gerar-form" action='pdfrelatorio.php' method='POST'>
                        <input type='hidden' name='id' id='gerar-consulta-id' value='<?php echo $idc; ?>'>
                        <input type='hidden' name='cliente_id' value='<?php echo $cliente_id; ?>'>
                        <button type='submit' class='btn'
                            style='background-color: rgb(0, 201, 221); color: white;'>Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.btnGerarPdf').forEach(function (button) {
                button.addEventListener('click', function () {
                    var consultaId = this.getAttribute('data-id');

                    document.getElementById('gerar-consulta-id').value = consultaId;
                });
            });
        });
    </script>
    
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
                        <input type='hidden' name='cliente_id' value='<?php echo $cliente_id; ?>'>
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
</body>

</html>