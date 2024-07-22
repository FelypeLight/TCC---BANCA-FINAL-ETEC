<?php
session_start();
include ('../conexao.php');
include ('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lif4Pets- Veterinários Cadastrados</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-vu2Vv8T0VP0qMUjm0KOKXpTvMw9x4hxKjB0STJCjx0B02tqB2tkT7WK7yKBP29Zf" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom styles for this page -->
    <!-- <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

<style>
    strong, h5{
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

            <li class="nav-item">
                <a class="nav-link" href="agendadosMes.php">
                    <i class="fas fa-calendar fa-2x"></i>
                    <span> Agendamentos</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item ">
                <a class="nav-link" href="clientes.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                    <span>Clientes</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="petsCadastrados.php">
                    <i class="fas fa-dog"></i>
                    <span>Pets Cadastrados</span></a>
            </li>

            <li class="nav-item active">
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
                <!-- End of Topbar -->

                <div class="container-fluid col-12">
                    <!-- HEADER CONTEÚDO -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Meus Veterinários</h1>
                    </div>

                    <div class="row">
                        <?php
                        $select2 = "SELECT img_vet, idade_vet, ds_vet, nm_vet, crmv, especialidade FROM tb_veterinario WHERE clinica_id = $id;";
                        $result2 = $mysqli->query($select2);
                        while ($dados2 = $result2->fetch_array()) {
                            $img_vet = $dados2['img_vet'];
                            $idade_vet = $dados2['idade_vet'];
                            $ds_vet = $dados2['ds_vet'];
                            $nm_vet = $dados2['nm_vet'];
                            $crmv = $dados2['crmv'];
                            $especialidade = $dados2['especialidade'];
                            ?>
                            <div class="col-lg-4 mb-4">
                                <div class="card mb-3 border-left-primary shadow" style="max-width: 540px; height: 300px;">
                                    <div class="row g-0 h-100">
                                        <div class="col-md-4 h-100">
                                            <img src="<?php echo $img_vet; ?>" class="img-fluid rounded-start h-100 w-100"
                                                style="object-fit: cover;" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $nm_vet; ?></h5>
                                                <p class="card-text"><strong>Idade:</strong> <?php echo $idade_vet; ?> anos
                                                </p>
                                                <p class="card-text"><strong>Descrição:</strong> <?php echo $ds_vet; ?></p>
                                                <p class="card-text"><strong>CRMV:</strong> <?php echo $crmv; ?></p>
                                                <p class="card-text"><strong>Especialidade:</strong>
                                                    <?php echo $especialidade; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>

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
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script> <!--Js pra funcionar os filtros da tabela-->
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>