<?php
session_start();

// include('verificaLogin.php');
?>


<?php include ('header.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lif4Pets-Pets Cadastrados</title>

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
            <li class="nav-item active">
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
                        <li class='nav-item dropdown no-arrow mx-1'    >

                                                    
                                                    <div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in
                                                        aria-labelledby=alertsDropdown'>
                                                        <h6 class='dropdown-header border-0 style=background-color: rgb(0, 201, 221);'>
                                                            Notificações
                                                        </h6>

                        <?php
                            include('select_notificacao.php');
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

                <!-- php para fazer o modal de edição funcionar (não abre sem) -->
                <?php
                    $racaOptions = '';
                    $especieOptions = '';

                    // Preenchendo as opções de raça
                    $selectRacas = "SELECT id, raca FROM tb_racas";
                    $resultadoRacas = $mysqli->query($selectRacas);
                    while ($raca = $resultadoRacas->fetch_assoc()) {
                        $racaOptions .= "<option value='{$raca['id']}'>{$raca['raca']}</option>";
                    }

                    // Preenchendo as opções de espécie
                    $selectEspecies = "SELECT id, ds_especie FROM tb_especie";
                    $resultadoEspecies = $mysqli->query($selectEspecies);
                    while ($especie = $resultadoEspecies->fetch_assoc()) {
                        $especieOptions .= "<option value='{$especie['id']}'>{$especie['ds_especie']}</option>";
                    }
                ?>

                <div class="container-fluid">
                    <!-- HEADER CONTEÚDO -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-center">
                            <h3 class="m-0 font-weight-bold " style="color: #0e213b">Pets Cadastrados</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="color: #0e213b">
                                            <th> Nome do Animal </th>
                                            <th> Idade </th>
                                            <th> Peso </th>
                                            <th> Cor </th>
                                            <th> Sexo </th>
                                            <th> Castrado </th>
                                            <th> Raça </th>
                                            <th> Espécie </th>
                                            <th> Ações </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $select3 = "SELECT 
                                                p.id,
                                                p.nm_animal, 
                                                p.idade, 
                                                p.peso, 
                                                p.cor, 
                                                p.sexo, 
                                                p.castrado, 
                                                r.raca, 
                                                e.ds_especie
                                            FROM 
                                                tb_paciente AS p 
                                            INNER JOIN 
                                                tb_especie AS e ON p.especie_id = e.id
                                            INNER JOIN 
                                                tb_racas AS r ON p.raca_id = r.id
                                            INNER JOIN 
                                                tb_cliente AS cli ON p.cliente_id = cli.id
                                            WHERE 
                                                cli.clinica_id = $id";

                                            $resultado3 = $mysqli->query($select3);
                                            if ($resultado3->num_rows > 0) {
                                                while ($dados3 = $resultado3->fetch_assoc()) {

                                                    $nm_animal = $dados3['nm_animal'];
                                                    $idade = $dados3['idade'];
                                                    $peso = $dados3['peso'];
                                                    $cor = $dados3['cor'];
                                                    $sexo = $dados3['sexo'];
                                                    $castrado = $dados3['castrado'];
                                                    $raca = $dados3['raca'];
                                                    $ds_especie = $dados3['ds_especie'];

                                                    echo "<tr>";
                                                    echo "<td>$nm_animal</td>";
                                                    echo "<td>$idade</td>";
                                                    echo "<td>$peso</td>";
                                                    echo "<td>$cor</td>";
                                                    echo "<td>$sexo</td>";
                                                    echo "<td>$castrado</td>";
                                                    echo "<td>$raca</td>";
                                                    echo "<td>$ds_especie</td>";
                                                    echo "<td>
                                                            <button class='btn btn-info btn-sm btn-update' data-id='{$dados3['id']}' data-nome='$nm_animal' data-idade='$idade' data-peso='$peso' data-cor='$cor' data-sexo='$sexo' data-castrado='$castrado' data-raca-id='{$dados3['raca']}' data-especie-id='{$dados3['ds_especie']}'> ATUALIZAR </button>

                                                            <a href='deletePet.php?id={$dados3['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que quer deletar esse pet?\")'> DELETAR </a> 
                                                        </td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<script>alert('Nenhum Pet encontrado!'); window.location.href = 'user.php';</script>";
                                            }
                                            ?>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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

    <!-- Modal Editar Pet-->
    <div class="modal fade" id="editPetModal" tabindex="-1" role="dialog" aria-labelledby="editPetModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPetModalLabel">Editar Pet</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="editPetForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editPetId">
                        <div class="form-group">
                            <label for="editPetNome">Nome do animal</label>
                            <input type="text" class="form-control" name="nm_animal" id="editPetNome" required>
                        </div>
                        <div class="form-group">
                            <label for="editPetIdade">Idade</label>
                            <input type="number" class="form-control" name="idade" id="editPetIdade" required>
                        </div>
                        <div class="form-group">
                            <label for="editPetPeso">Peso</label>
                            <input type="text" class="form-control" name="peso" id="editPetPeso" required>
                        </div>
                        <div class="form-group">
                            <label for="editPetCor">Cor</label>
                            <input type="text" class="form-control" name="cor" id="editPetCor" required>
                        </div>
                        <div class="form-group">
                            <label for="editPetSexo">Sexo</label>
                            <select class="form-control" name="sexo" id="editPetSexo" required>
                                <option value="Macho">Macho</option>
                                <option value="Femea">Fêmea</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editPetCastrado">Castrado</label>
                            <select class="form-control" name="castrado" id="editPetCastrado" required>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editPetRaca">Raça</label>
                            <select class="form-control" name="raca_id" id="editPetRaca" required>
                                <!-- Options serão carregadas dinamicamente -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editPetEspecie">Espécie</label>
                            <select class="form-control" name="especie_id" id="editPetEspecie" required>

                                <!-- Options serão carregadas dinamicamente -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>
                </form>
            </div>
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


    <!-- Modal ATUALIZAR pet -->
    <script>
        $(document).ready(function () {
            $('.btn-update').click(function () {
                var id = $(this).data('id');
                var nome = $(this).data('nome');
                var idade = $(this).data('idade');
                var peso = $(this).data('peso');
                var cor = $(this).data('cor');
                var sexo = $(this).data('sexo');
                var castrado = $(this).data('castrado');
                var racaId = $(this).data('raca-id');
                var especieId = $(this).data('especie-id');

                $('#editPetId').val(id);
                $('#editPetNome').val(nome);
                $('#editPetIdade').val(idade);
                $('#editPetPeso').val(peso);
                $('#editPetCor').val(cor);
                $('#editPetSexo').val(sexo);
                $('#editPetCastrado').val(castrado);

                // Definir as opções de raça e espécie, e selecionar a opção correta
                $('#editPetRaca').html(`<?php echo $racaOptions; ?>`);
                $('#editPetRaca').val(racaId);
                $('#editPetEspecie').html(`<?php echo $especieOptions; ?>`);
                $('#editPetEspecie').val(especieId);

                $('#editPetModal').modal('show');
            });

            $('#editPetForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: 'editPet.php',  // Arquivo PHP correto
                    data: formData,
                    success: function (response) {
                        alert(response);
                        $('#editPetModal').modal('hide');
                        location.reload();
                    },
                    error: function () {
                        alert('Erro ao atualizar o pet. Por favor, tente novamente.');
                    }
                });
            });
        });
</script>



</body>

</html>