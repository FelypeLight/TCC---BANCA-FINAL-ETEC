<?php

session_start();
include ('../conexao.php');
include ('header.php');
$clinica_id = $id;
function getClientes($mysqli, $clinica_id)
{
    $sql = "SELECT nm_responsavel , clinica_id, id FROM tb_cliente WHERE clinica_id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $clinica_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $clientes = [];

    // Verifica se há resultados a serem processados
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $clientes[] = [
                'nome' => $row['nm_responsavel'],
                'clinica_id' => $row['clinica_id'],
                'cliente_id' => $row['id']
            ];
        }
    }

    // Libera recursos
    $stmt->close();

    return $clientes;
}
$clientes = getClientes($mysqli, $clinica_id);

// Verificar se o cookie 'cliente_id' está definido
// if(isset($_COOKIE['cliente_id'])) {
//     $cliente_id = $_COOKIE['cliente_id'];
// } else {
//     // Se o cookie 'cliente_id' não estiver definido, redirecionar para onde quer que seja apropriado
//     header("Location: alguma_pagina.php");
//     exit();
// }

// Use $cliente_id conforme necessário na página

// Consulta SQL para selecionar todos os registros da tabela tb_paciente
$sql = " SELECT raca_id, especie, raca, especie_id FROM (SELECT e.id AS especie_id, e.ds_especie AS especie, r.raca AS raca, r.id AS raca_id, ROW_NUMBER() OVER (PARTITION BY e.id, e.ds_especie ORDER BY e.id) AS row_num
FROM tb_racas AS r
INNER JOIN tb_especie AS e ON r.especie_id = e.id) AS sub
WHERE row_num = 1;";


$result = $mysqli->query($sql);

$pets = [];

// Verificando se há registros retornados pela consulta
if ($result->num_rows > 0) {
    // Iterando sobre cada linha de resultados
    while ($row = $result->fetch_assoc()) {
        // Adicionando os dados do pet ao array
        $pet = [
            'especie' => $row["especie"],
            'raca' => $row["raca"],
            'raca_id' => $row["raca_id"],
            'especie_id' => $row["especie_id"]
        ];

        // Adicionando o pet ao array de pets
        array_push($pets, $pet);
    }
} else {
    echo "Não foram encontrados registros na tabela.";
}

$especies = [];
foreach ($pets as $pet) {
    $especies[$pet['especie_id']] = $pet['especie'];
}

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
                        <a class="collapse-item active" href="cadastraPets.php">Pets</a>
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
                        <div class="card shadow col-lg-10 p-0">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-center" style="color: #0e213b">Cadastrar Animal</h3>
                            </div>
                            <div class="card-body">
                                <form class="user" method="post" action="pets.php">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Cliente</label>
                                            <select id="selectCliente" name="cliente_id" class="form-control" required>
                                                <option value="">Selecione um cliente</option>
                                                <?php foreach ($clientes as $cliente): ?>
                                                    <option value="<?php echo $cliente['cliente_id']; ?>" <?php if (isset($_POST['cliente_id']) && $_POST['cliente_id'] == $cliente['cliente_id']) echo "selected"; ?>>
                                                        <?php echo $cliente['nome']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label class="label-input" for="nm_animal">Nome do animal:</label>
                                            <input name="nm_animal" class="form-control" type="text" placeholder="Nome do animal">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-input" for="idade">Idade:</label>
                                            <input name="idade" class="form-control" type="number" placeholder="Idade">
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label>Especie</label>
                                            <select id="especie" name="especie_id" class="form-control" required>
                                                <option value="">Selecione uma especie</option>
                                                <?php foreach ($pets as $pet): ?>
                                                    <option value="<?php echo $pet['especie_id']; ?>">
                                                        <?php echo $pet['especie']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Raça</label>
                                            <select id="raca" name="raca_id" class="form-control" required>
                                                <option value="">Selecione uma raça</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label class="label-input" for="peso">Peso:</label>
                                            <input name="peso" class="form-control" type="text" placeholder="Peso">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-input" for="cor">Cor:</label>
                                            <input name="cor" class="form-control" type="text" placeholder="Cor">
                                        </div>
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label>Sexo</label>
                                            <select name="sexo" class="form-control">
                                                <option value="">Selecione o sexo</option>
                                                <option value="Macho">Macho</option>
                                                <option value="Femea">Femea</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Castrado</label>
                                            <select name="castrado" class="form-control">
                                                <option value="">Selecione uma opção</option>
                                                <option value="Sim">Sim</option>
                                                <option value="Não">Não</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center align-items-center">
                                        <div class="pt-4 col-md-3">
                                            <input type="submit" class="btn btn-user btn-block roverr" value="Cadastrar" style="background-color: #0e213b; color: white">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#especie').change(function() {
                            var especie_id = $(this).val();
                            $.ajax({
                                url: 'getRacas.php',
                                type: 'GET',
                                data: { especie_id: especie_id },
                                dataType: 'json',
                                success: function(racas) {
                                    $('#raca').empty();
                                    $('#raca').append('<option value="">Selecione uma raça</option>');
                                    $.each(racas, function(index, raca) {
                                        $('#raca').append('<option value="' + raca.raca_id + '">' + raca.raca + '</option>');
                                    });
                                }
                            });
                        });
                    });
                </script>




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
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js\locales\bootstrap-datetimepicker.pt-BR.js"></script>



    <script src="../js/sb-admin-2.min.js"></script> <!--botao do sidebar-->

</body>


</html>