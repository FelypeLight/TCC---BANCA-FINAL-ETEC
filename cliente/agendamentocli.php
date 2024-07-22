<?php
session_start();
include ('../conexao.php');
include ('header.php');

// Consulta SQL para selecionar todos os registros da tabela tb_paciente
$sql = "SELECT cliente_id, cliente_nome, nome_pet, especie_pet, paciente_id
FROM (
    SELECT p.cliente_id AS cliente_id, c.nm_responsavel AS cliente_nome, p.nm_animal AS nome_pet, e.ds_especie AS especie_pet, p.id AS paciente_id,
    ROW_NUMBER() OVER (PARTITION BY c.id, p.nm_animal ORDER BY p.id) AS row_num
    FROM tb_paciente AS p
    INNER JOIN tb_cliente AS c ON p.cliente_id = c.id
    INNER JOIN tb_especie AS e ON p.especie_id = e.id

) AS sub
WHERE row_num = 1 AND cliente_id = $id ";


$result = $mysqli->query($sql);

$pets = [];

// Verificando se há registros retornados pela consulta
if ($result->num_rows > 0) {
    // Iterando sobre cada linha de resultados
    while ($row = $result->fetch_assoc()) {
        // Adicionando os dados do pet ao array
        $pet = [
            'nome' => $row["nome_pet"],
            'especie' => $row["especie_pet"],
            'paciente_id' => $row['paciente_id']
        ];

        // Adicionando o pet ao array de pets
        array_push($pets, $pet);
    }
} else {
    echo "Não foram encontrados registros na tabela.";
}
/////////////
// Consulta SQL para selecionar todas as consultas marcadas em uma determinada data
$query_consultas = "SELECT hr_consulta, veterinario_id FROM tb_consulta WHERE dt_consulta = ?";
$stmt_consultas = $mysqli->prepare($query_consultas);
$stmt_consultas->bind_param("s", $data_consulta);
$data_consulta = ''; // Defina a data de consulta aqui
$stmt_consultas->execute();
$resultado_consultas = $stmt_consultas->get_result();

// Array para armazenar as horas já marcadas
$horas_marcadas = array();
while ($row_consulta = $resultado_consultas->fetch_assoc()) {
    $horas_marcadas[$row_consulta['veterinario_id']][] = $row_consulta['hr_consulta'];
}


// Verificar se o parâmetro 'clinica' foi enviado via POST
if (isset($_POST['clinica'])) {
    $clinicaSelecionada = $_POST['clinica'];
    // Faça o que precisar com a clínica selecionada, como armazená-la em uma sessão
    $_SESSION['clinicaSelecionada'] = $clinicaSelecionada;


} else {
    // Redirecionar de volta para a página anterior ou exibir uma mensagem de erro
    // header("Location: petsCadastrados.php");
    exit(); // Garantir que o código seja interrompido após redirecionar
}

// Verificar se o parâmetro 'clinica' foi enviado via POST
if (isset($_POST['id'])) {
    $id_clinica = $_POST['id'];
    // Faça o que precisar com a clínica selecionada, como armazená-la em uma sessão
    $_SESSION['id_clinica'] = $id_clinica
    ;
} else {
    // Redirecionar de volta para a página anterior ou exibir uma mensagem de erro
    // header("Location: petsCadastrados.php");
    exit(); // Garantir que o código seja interrompido após redirecionar
}
$cliniid = $id_clinica;
$clinica_id = (int) $cliniid;


////////////





$sql2 = "SELECT v.nm_vet as nome_vet, v.id AS veterinario_id
FROM tb_veterinario as v
INNER JOIN tb_clinica as clini ON clini.id = v.clinica_id
WHERE v.clinica_id = $clinica_id ";

$result2 = $mysqli->query($sql2);

$vets = [];

// Verificando se há registros retornados pela consulta
if ($result2->num_rows > 0) {
    // Iterando sobre cada linha de resultados
    while ($row2 = $result2->fetch_assoc()) {
        // Adicionando os dados do pet ao array
        $vet = [
            'nome' => $row2["nome_vet"],
            'veterinario_id' => $row2['veterinario_id']
        ];

        // Adicionando o veterinario ao array de vets
        array_push($vets, $vet);
    }
} else {
    echo "Não foram encontrados registros na tabela.";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">

    <link href="../vendorUser/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <title>Sistema - Agendamento</title>
    <!-- Custom styles for this template-->
    <link href="../cssUser/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>Sistema - Agendamento</title>
    <style>
        .disabled-time {
            display: none;
        }

        .roverr:hover {
            background-color: #0e213bad !important;
        }

        label {
            font-weight: bold;
            color: black;
        }
    </style>
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
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-home fa-sm"></i>
                    <span>Home</span></a>
            </li>

            <li class="nav-item active">
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

                <div class="container-fluid">
                    <div class='col-lg-12 d-flex justify-content-center align-items-center pb-2'>
                        <div class="card shadow col-lg-10 p-0">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-center" style='color: black'>Agendamento</h3>
                            </div>
                            <div class="card-body">
                                <form class="row justify-content-center" action='processa.php' method='POST'>
                                    <div class="col-12 text-center mb-3">
                                        <div class="form-group">
                                            <label>Cliente: <strong
                                                    style='color: rgb(0, 201, 221)'><?php echo $nm_responsavel; ?></strong></label>
                                            <input type="hidden" name="cliente_id" value="<?php echo $id; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Clínica: <strong
                                                    style='color: rgb(0, 201, 221)'><?php echo $clinicaSelecionada; ?></strong></label>
                                            <input type="hidden" name="clinica_id" value="<?php echo $clinica_id; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pets</label>
                                            <select id="selectPet" name="paciente_id" class="form-control" required>
                                                <option value="">Selecione um pet</option>
                                                <?php foreach ($pets as $pet): ?>
                                                    <option value="<?php echo $pet['paciente_id']; ?>">
                                                        <?php echo $pet['nome']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="veterinario_id" class="font-weight-bold">Veterinário</label>
                                            <select id="veterinario_id" name="veterinario_id" class="form-control"
                                                required>
                                                <option value="">Selecione um veterinário</option>
                                                <?php foreach ($vets as $vet): ?>
                                                    <option value="<?php echo $vet['veterinario_id']; ?>">
                                                        <?php echo $vet['nome']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Data da Consulta</label>
                                            <input type="date" name="dt_consulta" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="remarcar_hr_consulta">Hora da Consulta</label>
                                            <input type="text" id="remarcar_hr_consulta" name="hr_consulta"
                                                class="form-control" readonly required>
                                            <div id="time-dropdown" class="dropdown-content">
                                                <?php
                                                for ($h = 8; $h < 19; $h++) {
                                                    for ($m = 0; $m < 60; $m += 60) {
                                                        $time = sprintf('%02d:%02d', $h, $m);
                                                        echo "<div class='dropdown-item' onclick=\"selectTime('$time')\">$time</div>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo" class="font-weight-bold">Tipo de atendimento:</label>
                                            <select id="tipo" name="tipo" class="form-control">
                                                <option value="">Selecione um Atendimento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Botão para abrir o modal -->
                                    <button type="button" class="btn btn-info ml-2 btnModalHorariosDisponiveis"
                                        data-toggle="modal" data-target="#ModalHorariosDisponiveis"
                                        onclick="mostrarHorariosDisponiveis(1, '2024-06-16')">
                                        Ver horários não disponíveis
                                    </button>

                                    <!-- Modal de horários disponíveis -->
                                    <div class="modal fade" id="ModalHorariosDisponiveis" tabindex="-1" role="dialog"
                                        aria-labelledby="ModalHorariosDisponiveisLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalHorariosDisponiveisLabel">Horários
                                                        não disponíveis</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <th>Hora</th>
                                                                    <th>Data</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="horarios-disponiveis-body">
                                                                <!-- Aqui serão adicionados os horários disponíveis via JavaScript -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control" name="ds_consulta" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="pt-4 col-md-3">
                                                <input type="submit" class="btn btn-user btn-block roverr"
                                                    value="Agendar"
                                                    style="background-color: rgb(0, 201, 221); color: white">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>




            <script>
                function mostrarHorariosDisponiveis(status) {
                    if (status) {
                        $.ajax({
                            url: 'horariosONagendamento.php',
                            type: 'POST',
                            data: {
                                status: status

                            },
                            success: function (response) {
                                const tbody = document.getElementById('horarios-disponiveis-body');
                                tbody.innerHTML = response; // Inserir o HTML diretamente no corpo da tabela

                                // Abrir o modal com os horários disponíveis
                                $('#ModalHorariosDisponiveis').modal('show');
                            },
                            error: function () {
                                // Em caso de erro na requisição AJAX
                                alert('Ocorreu um erro ao carregar os horários disponíveis.');
                            }
                        });
                    }
                }
            </script>



            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="js/bootstrap-datetimepicker.min.js"></script>
            <script src="js\locales\bootstrap-datetimepicker.pt-BR.js"></script>
            <script src="../js/sb-admin-2.min.js"></script> <!--botao do sidebar-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lif4Pets</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>



    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Conteúdo do modal-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Seletor de Horas</h4>
                </div>
                <div class="modal-body">
                    <!-- Adicionando o calendário -->
                    <label for="data_consulta">Data da Consulta:</label>
                    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control" id="data_consulta">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    <br>


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

            // button.addEventListener('click', function() {
            //     var hr_consulta = this.getAttribute('data-hr_consulta');


            //     document.getElementById('remarcar_hr_consulta').value = hr_consulta;
            // });


            document.getElementById('remarcar_hr_consulta').addEventListener('focus', function () {
                document.getElementById('time-dropdown').style.display = 'block';
            });

            document.getElementById('remarcar_hr_consulta').addEventListener('blur', function () {
                setTimeout(function () {
                    document.getElementById('time-dropdown').style.display = 'none';
                }, 200);  // Delay to allow click to register
            });

        });

        function selectTime(time) {
            document.getElementById('remarcar_hr_consulta').value = time;
            document.getElementById('time-dropdown').style.display = 'none';
        }
    </script>



    <script>
        document.getElementById("selectCliente").addEventListener("change", function () {
            var clienteSelecionado = document.getElementById("selectCliente").value;
            var clienteSelecionadoInteiro = parseInt(clienteSelecionado); // Convertendo para inteiro
            document.getElementById("clienteSelecionado").textContent = clienteSelecionadoInteiro;
            document.getElementById("clienteSelecionadoInput").value = clienteSelecionadoInteiro;
        });
    </script>

    <script>

        $(document).ready(function () {
            // Quando o menu suspenso de clientes é alterado
            $('#selectCliente').on('change', function () {
                var clienteId = $(this).val(); // Obtém o ID do cliente selecionado

                // Envia uma solicitação AJAX para buscar os pets do cliente selecionado
                $.ajax({
                    url: 'buscar_pets.php', // Substitua pelo caminho do seu script PHP que busca os pets
                    method: 'POST',
                    data: { cliente_id: clienteId },
                    dataType: 'json',
                    success: function (response) {
                        // Limpa o menu suspenso de pets
                        $('#selectPet').empty();

                        // Adiciona os pets retornados ao menu suspenso de pets
                        $.each(response, function (index, pet) {
                            $('#selectPet').append('<option value="' + pet.id + '">' + pet.nome + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Erro ao buscar os pets:', status, error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#veterinario_id').change(function () {
                var veterinario_id = $(this).val();

                if (veterinario_id) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_atendimento.php', // Caminho para o script PHP que retorna os atendimentos
                        data: { veterinario_id: veterinario_id },
                        dataType: 'json',
                        success: function (response) {
                            $('#tipo').empty();
                            $('#tipo').append('<option value="">Selecione um Atendimento</option>');
                            $.each(response, function (index, value) {
                                $('#tipo').append('<option value="' + value.id + '">' + value.nm_atendimento + '   R$' + value.vl_atendimento +'</option>');
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error('Erro ao buscar os tipos de atendimento:', status, error);
                        }
                    });
                } else {
                    $('#tipo').empty();
                    $('#tipo').append('<option value="">Selecione um Atendimento</option>');
                }
            });
        });
    </script>

</body>




</html>