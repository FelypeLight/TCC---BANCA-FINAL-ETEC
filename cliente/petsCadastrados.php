<?php
session_start();
include ('../conexao.php');
include ('header.php');

function getOptions($table, $idColumn, $nameColumn)
{
    global $mysqli;
    $options = "";
    $query = "SELECT $idColumn, $nameColumn FROM $table";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row[$idColumn]}'>{$row[$nameColumn]}</option>";
    }
    return $options;
}

$especieOptions = getOptions('tb_especie', 'id', 'ds_especie');
$racaOptions = getOptions('tb_racas', 'id', 'raca');






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

            <li class="nav-item active">
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
                    <a id='sino-notificacao'class='nav-link dropdown-toggle' href='#' id='alertsDropdown' role='button'
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
                    <!-- HEADER CONTEÚDO -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-center text-info">Meus Pets</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome do animal</th>
                                            <th> idade </th>
                                            <th> Peso </th>
                                            <th> Cor</th>
                                            <th> Sexo </th>
                                            <th> Castrado </th>
                                            <th> Raça </th>
                                            <th> Especie </th>
                                            <th>Ações</th>
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
                                            WHERE 
                                                p.cliente_id = $id";

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
                                                            <button class='btn btn-info btn-sm btn-update' data-id='{$dados3['id']}' data-nome='$nm_animal' data-idade='$idade' data-peso='$peso' data-cor='$cor' data-sexo='$sexo' data-castrado='$castrado' data-raca='$raca' data-especie='$ds_especie'> ATUALIZAR </button>
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

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lif4Pets</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

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
                                <option value="Femea">Femea</option>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>





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
                $('#editPetRaca').html(`<?php echo $racaOptions; ?>`).val(racaId);
                $('#editPetEspecie').html(`<?php echo $especieOptions; ?>`).val(especieId);

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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script>
$(document).ready(function(){
    $("#sino-notificacao").click(function(e){
        e.preventDefault();
        $.ajax({
            url: "atualizar_status.php",
            method: "POST",
            data: { status: 0 }, // Definindo o contador como 0
            success: function(response){
                // Atualize o contador visualmente
                $("#sino-notificacao .badge-counter").text(contador);
                // Adicione o código para atualizar o status das notificações no banco de dados
            }
        });
    });
});
</script> -->

</body>

</html>