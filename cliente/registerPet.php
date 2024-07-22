<?php

session_start();
include ('../conexao.php');
include ('header.php');

// Consulta SQL para selecionar todos os registros da tabela tb_paciente
$sql = "SELECT id AS especie_id, ds_especie AS especie FROM tb_especie";
$result = $mysqli->query($sql);

$especies = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $especies[] = $row;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lif4Pets - Pets Cadastrados</title>

    <!-- Custom fonts for this template-->
    <link href="../vendorUser/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
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

            <li class="nav-item">
                <a class="nav-link" href="minhasConsultas.php">
                    <i class="fas fa-calendar fa-2x"></i>
                    <span>Minhas consultas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item ">
                <a class="nav-link" href="petsCadastrados.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                    <span>Pets cadastrados</span></a>
            </li>
            <li class="nav-item active">
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
                <div class="container-fluid pb-4">
                    <div class="card shadow col-lg-12 p-0">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-center text-info">Cadastrar Pet</h3>
                        </div>
                        <div class="card-body">

                            <form class="user" method="post" action="cadastraPet.php">


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="nm_animal" class="font-weight-bold">Nome do animal:</label>
                                        <input name="nm_animal" class="form-control" type="text"
                                            placeholder="Nome do animal">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="idade" class="font-weight-bold">Idade:</label>
                                        <input name="idade" class="form-control" type="number" placeholder="Idade">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="especie_id" class="font-weight-bold">Espécie:</label>
                                    <select id="especie_id" name="especie_id" class="form-control">
                                        <option value="">Selecione uma espécie</option>
                                        <?php foreach ($especies as $especie): ?>
                                            <option value="<?php echo $especie['especie_id']; ?>"><?php echo $especie['especie']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="raca_id" class="font-weight-bold">Raça:</label>
                                    <select id="raca_id" name="raca_id" class="form-control">
                                        <option value="">Selecione uma raça</option>
                                    </select>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="peso" class="font-weight-bold">Peso:</label>
                                        <input name="peso" class="form-control" type="text" placeholder="Peso">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cor" class="font-weight-bold">Cor:</label>
                                        <input name="cor" class="form-control" type="text" placeholder="Cor">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="sexo" class="font-weight-bold">Sexo:</label>
                                        <select name="sexo" class="form-control">
                                            <option value="">Selecione o sexo</option>
                                            <option value="Macho">Macho</option>
                                            <option value="Femea">Fêmea</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="castrado" class="font-weight-bold">Castrado:</label>
                                        <select name="castrado" class="form-control">
                                            <option value="">Selecione uma opção</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="pt-4 col-md-3 d-flex justify-content-center">
                                        <input type="submit" class="btn btn-info roverr" value="Cadastrar"
                                            style="background-color: rgb(0, 201, 221); color: white">
                                    </div>
                                </div>

                            </form>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#especie_id').change(function() {
                var especie_id = $(this).val();

                if (especie_id) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_racas.php',
                        data: { especie_id: especie_id },
                        dataType: 'json',
                        success: function(response) {
                            $('#raca_id').empty();
                            $('#raca_id').append('<option value="">Selecione uma raça</option>');
                            $.each(response, function(index, value) {
                                $('#raca_id').append('<option value="' + value.id + '">' + value.raca + '</option>');
                            });
                        }
                    });
                } else {
                    $('#raca_id').empty();
                    $('#raca_id').append('<option value="">Selecione uma raça</option>');
                }
            });
        });
    </script>


</body>

</html>