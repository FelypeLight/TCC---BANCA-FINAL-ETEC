<?php
session_start();
include ('../conexao.php');
include ('header.php');
$select5 = "select count(cons.id), cli.nm_responsavel
FROM tb_consulta as cons
INNER JOIN tb_cliente AS cli ON cons.cliente_id = cli.id
WHERE cons.cliente_id = '$id';";
$resultado5 = $mysqli->query($select5);

if ($resultado5->num_rows > 0) {
    while ($dados3 = $resultado5->fetch_array()) {
        $contc = $dados3['count(cons.id)'];
        // $nm_responsavel = $dados3['cli.nm_responsavel'];

    }
}

$select6 = "select count(p.id), cli.nm_responsavel
FROM  tb_cliente AS cli 
INNER JOIN tb_paciente AS p ON p.cliente_id = cli.id
WHERE p.cliente_id ='$id';";
$resultado6 = $mysqli->query($select6);

if ($resultado6->num_rows > 0) {
    while ($dados6 = $resultado6->fetch_array()) {
        $contp = $dados6['count(p.id)'];
        // $nm_responsavel = $dados3['cli.nm_responsavel'];

    }
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Cliente</title>

    <!-- Custom fonts for this template-->
    <link href="../vendorUser/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../cssUser/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<style>
    .custom-prev-icon {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns%3D"http%3A//www.w3.org/2000/svg" fill%3D"%23000000" viewBox%3D"0 0 16 16"%3E%3Cpath d%3D"M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/%3E%3C/svg%3E');
    }

    .custom-next-icon {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns%3D"http%3A//www.w3.org/2000/svg" fill%3D"%23000000" viewBox%3D"0 0 16 16"%3E%3Cpath d%3D"M4.646 1.646a.5.5 0 0 0 0 .708L10.293 8l-5.647 5.646a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708l-6-6a.5.5 0 0 0-.708 0z"/%3E%3C/svg%3E');
    }

    .carousel-item {
        transition: transform 0.5s ease-in-out;
        /* Ajuste a velocidade da transição aqui */
    }

    .carousel-item img {
        width: 100%;
        height: 500px;
        /* Define a altura fixa para todas as imagens */
        object-fit: cover;
        /* Mantém a proporção da imagem */
    }

    .carousel-control-prev,
    .carousel-control-next {
        background-color: transparent;
        /* Fundo transparente para os botões */
        width: 5%;
        /* Ajuste a largura conforme necessário */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: black;
        /* Ícones em cor preta */
    }

    strong {
        color: #36b9cc;
    }

    p {
        font-weight: bold;

    }
</style>

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
            <li class="nav-item active">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-home fa-sm"></i>
                    <span>Home</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="buscarCli.php">
                    <i class="fas fa-search fa-sm"></i>
                    <span>Buscar clínicas</span></a>
            </li>

            <li class="nav-item">
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

                <!-- Begin Page Content -->
                <div class="container-fluid ">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-center text-info">Seja Bem Vindo!</h3>
                            <h3 class="m-0 font-weight-bold text-center text-dark"> Tutor <span class="text-info"><?php echo $nm_responsavel ?></span> </h3>
                        </div>
                    </div>



                    <!-- <p class="lead text-gray-800">Você ja agendou  -->
                    <?php
                    // echo $contc;
                    ?>
                    <!-- consultas! </p> -->
                    <!-- <p class="lead text-gray-800">Você tem  -->
                    <?php
                    //echo $contp;
                    ?>
                    <!-- pets cadastrados! </p> -->


                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
                                <div class="carousel-inner rounded">
                                    <div class="carousel-item active">
                                        <img src="../assets/img/cliente/vacinaRaiva.jpg" class="d-block mx-auto"
                                            alt="..." style="width: 100%; height: auto;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/img/cliente/orientacaoPosRebolada.jpg"
                                            class="d-block mx-auto" alt="..." style="width: 100%; height: auto;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/img/cliente/antiraba.png" class="d-block mx-auto"
                                            alt="..." style="width: 100%; height: auto;">
                                    </div>
                                </div>
                                <button class="carousel-control-prev border-0" type="button"
                                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <!-- <span class="visually-hidden">Anterior</span> -->
                                </button>
                                <button class="carousel-control-next border-0" type="button"
                                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                    <span class="carousel-control-next-icon " aria-hidden="true"></span>
                                    <!-- <span class="visually-hidden">Próximo</span> -->
                                </button>
                            </div>
                        </div>


                        <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-4">
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script> <!--botao do sidebar-->

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>