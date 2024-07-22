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

    <title>Life4Pets - Perfil</title>

    <style>

    </style>


    <!-- Custom fonts for this template-->
    <link href="../vendorUser/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../cssUser/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <img src="../assets/img/LogoBrancaTotal.png" alt="" width="130rem" class="pt-2" class="info">
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

                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="<?php echo $foto ?>" alt="Admin"
                                                class="rounded-circle p-1 bg-info" width="110">
                                            <div class="mt-3">
                                                <h4><?php echo $nm_responsavel; ?></h4>
                                                <p class="text-secondary mb-1">Cliente</p>
                                                <p class="text-muted font-size-sm">
                                                    <?php echo $cidade . ", " . $bairro . ", " . $rua . ", " . $nr; ?>
                                                </p>

                                                <button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    Alterar
                                                </button>

                                                <!-- O modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Formulário de Alteração</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo $resultado ?>" method="post"
                                                                    enctype="multipart/form-data">
                                                                    <!-- Seu formulário aqui -->
                                                                    <div class="form-group">
                                                                        <label for="foto">Selecione uma imagem:</label>
                                                                        <input type="file" class="form-control-file"
                                                                            id="foto" name="foto" value="">
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-info">Enviar</button>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>







                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" id="formu" action="processaATTperfilcliente.php">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Nome</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" id="nome" name="nome"
                                                        value="<?php echo $nm_responsavel; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control"
                                                        value="<?php echo $email ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Celular</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" id="celular" name="celular"
                                                        value="<?php echo $celular; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">CEP</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" id="cep" name="cep"
                                                        value="<?php echo $cep; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Estado</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" id="estado" name="estado"
                                                        value="<?php echo $estado; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Cidade</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" id="cidade" name="cidade"
                                                        value="<?php echo $cidade; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Bairro</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" id="bairro" name="bairro"
                                                        value="<?php echo $bairro; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Rua</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" id="rua" name="rua"
                                                        value="<?php echo $rua; ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Numero</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" id="nr" name="nr"
                                                        value="<?php echo $nr; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-info px-4"
                                                        value="Salvar Informações">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div id="myModal" class="modal">
                            
                            <div class="modal-content">
                                <span class="close" onclick="closeModal()">&times;</span>
                                <h2>Editar Perfil</h2>
                                <form method="post" action="processaATTperfilcliente.php">
                                    <div class="input-group">
                                        <label for="nome">Nome:</label><br>
                                        <input type="text" id="nome" name="nome" value=""><br>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label for="text">Celular:</label><br>
                                        <input type="text" id="celular" name="celular" value=""><br>
                                    </div>
                                    <div class="input-group">
                                        <label for="text">Estado:</label><br>
                                        <input type="text" id="estado" name="estado" value=""><br>
                                    </div>
                                    <div class="input-group">
                                        <label for="text">Cidade:</label><br>
                                        <input type="text" id="cidade" name="cidade" value=""><br>
                                    </div>
                                    <div class="input-group">
                                        <label for="text">Bairro:</label><br>
                                        <input type="text" id="bairro" name="bairro" value=""><br>
                                    </div>
                                    <div class="input-group">
                                        <label for="text">Rua:</label><br>
                                        <input type="text" id="rua" name="rua" value=""><br>
                                    </div>
                                    <div class="input-group">
                                        <label for="text">CEP:</label><br>
                                        <input type="text" id="cep" name="cep" value=""><br>
                                    </div>
                                    <div class="input-group">
                                        <label for="text">Número:</label><br>
                                        <input type="text" id="nr" name="nr" value=""><br>
                                    </div>

                                    <input type="submit" value="Salvar">

                                </form>
                            </div>
                        </div> -->





                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            // Quando o documento estiver pronto
                            $(document).ready(function () {
                                // Quando o botão "Alterar" for clicado
                                $("#btnAlterar").click(function () {
                                    // Mostrar o modal
                                    $("#exampleModal").modal("show");
                                });

                                // Quando o modal for fechado
                                $('#exampleModal').on('hidden.bs.modal', function () {
                                    // Limpar o formulário, se necessário
                                    $("#imagem").val(""); // Limpa o campo de seleção de arquivo
                                });
                            });
                        </script>
                        
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
                        <!-- Bootstrap JavaScript (opcional, necessário para modal) -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script
                            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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