<?php
session_start();

include ('../conexao.php');
// include('verificaLogin.php');
include ('header.php');
$select5 = "select count(cons.id)
FROM tb_consulta as cons
INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
INNER JOIN tb_clinica AS c ON v.clinica_id = c.id
WHERE v.clinica_id = '$id' AND cons.status = 'agendada';";
$resultado5 = $mysqli->query($select5);
if ($resultado5->num_rows > 0) {
    while ($dados3 = $resultado5->fetch_array()) {

        $cont_a = $dados3['count(cons.id)'];
        echo $cont_a;
    }
}
$select5 = "select count(cons.id)
FROM tb_consulta as cons
INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
INNER JOIN tb_clinica AS c ON v.clinica_id = c.id
WHERE v.clinica_id = '$id' AND cons.status = 'remarcada';";
$resultado5 = $mysqli->query($select5);
if ($resultado5->num_rows > 0) {
    while ($dados3 = $resultado5->fetch_array()) {

        $cont_r = $dados3['count(cons.id)'];
        echo $cont_r;
    }
}
$select5 = "select count(cons.id)
FROM tb_consulta as cons
INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
INNER JOIN tb_clinica AS c ON v.clinica_id = c.id
WHERE v.clinica_id = '$id' AND cons.status = 'cancelada';";
$resultado5 = $mysqli->query($select5);
if ($resultado5->num_rows > 0) {
    while ($dados3 = $resultado5->fetch_array()) {

        $cont_c = $dados3['count(cons.id)'];
        echo $cont_c;
    }
}
$select5 = "select count(clinica_id)
FROM tb_cliente
WHERE clinica_id = '$id' ;";
$resultado5 = $mysqli->query($select5);
if ($resultado5->num_rows > 0) {
    while ($dados3 = $resultado5->fetch_array()) {

        $cont_cli = $dados3['count(clinica_id)'];
        echo $cont_cli;
    }
}

$select5 = "select count(cons.cliente_id)
FROM tb_consulta as cons
INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
INNER JOIN tb_clinica AS c ON v.clinica_id = c.id
WHERE v.clinica_id = '$id' ;";
$resultado5 = $mysqli->query($select5);
if ($resultado5->num_rows > 0) {
    while ($dados3 = $resultado5->fetch_array()) {

        $cont_cad = $dados3['count(cons.cliente_id)'];
        echo $cont_cad;
    }
}
echo $imagem;

$resultado6 = "SELECT 
    CASE 
        WHEN MONTH(cons.dt_consulta) = 1 THEN 'Jan'
        WHEN MONTH(cons.dt_consulta) = 2 THEN 'Fev'
        WHEN MONTH(cons.dt_consulta) = 3 THEN 'Mar'
        WHEN MONTH(cons.dt_consulta) = 4 THEN 'Abr'
        WHEN MONTH(cons.dt_consulta) = 5 THEN 'Mai'
        WHEN MONTH(cons.dt_consulta) = 6 THEN 'Jun'
        WHEN MONTH(cons.dt_consulta) = 7 THEN 'Jul'
        WHEN MONTH(cons.dt_consulta) = 8 THEN 'Ago'
        WHEN MONTH(cons.dt_consulta) = 9 THEN 'Set'
        WHEN MONTH(cons.dt_consulta) = 10 THEN 'Out'
        WHEN MONTH(cons.dt_consulta) = 11 THEN 'Nov'
        WHEN MONTH(cons.dt_consulta) = 12 THEN 'Dez'
    END AS Mes,
    SUM(t.vl_atendimento) AS total_valor
FROM tb_consulta AS cons
INNER JOIN tb_veterinario AS v ON cons.veterinario_id = v.id
INNER JOIN tb_clinica AS clini ON v.clinica_id = clini.id
INNER JOIN tb_tipoatendimento AS t ON cons.tipo_id = t.id
WHERE v.clinica_id = '$id'
GROUP BY Mes;";

$result6 = $mysqli->query($resultado6);

$dataPoints = array();
while ($row6 = $result6->fetch_assoc()) {
    $dataPoints[] = array("mes" => $row6['Mes'], "total" => $row6['total_valor']);
}



?>

<?php
// Simulação de dados (substitua isso com seus próprios dados)
// $cont_a = 100; // Número de consultas agendadas
// $cont_r = 50;  // Número de consultas remarcadas
// $cont_c = 30;  // Número de consultas canceladas
// $cont_cli = 200;  // Número de clientes cadastrados pela clínica
// $cont_cad = 150;  // Número de clientes com agendamentos na clínica

// Criando arrays de dados para os gráficos de consultas e clientes
$dadosConsultas = array(
    array("Tipo", "Quantidade"),
    array("Agendadas", $cont_a),
    array("Remarcadas", $cont_r),
    array("Canceladas", $cont_c)
);

$dadosClientes = array(
    array("Tipo", "Quantidade"),
    array("Cadastrados", $cont_cli),
    array("Com Agendamentos", $cont_cad)
);

// Convertendo os dados para o formato JSON para serem usados por JavaScript
$jsonDadosConsultas = json_encode($dadosConsultas);
$jsonDadosClientes = json_encode($dadosClientes);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lif4Pets - Home</title>

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
            <li class="nav-item active">
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

                <!-- Begin Page Content -->
                <div class="container-fluid d-flex align-items-center justify-content-center"
                    style="padding-top: 10vh;">

                    <div class="row md-12">
                        <div class="text-center">
                            <h1 class="fw-bold">Seja Bem Vindo de Volta!</h1>
                            <p class="lead text-gray-800 mb-3"><?php echo $nm_unidade ?></p>
                        </div>
                    </div>

                </div>

                <div class="row md-12">
                    <div class=" md-6" style="width: 600px; margin: 0 auto;">
                        <!-- Elemento HTML onde o gráfico de clientes será renderizado -->
                        <canvas id="graficoClientes"></canvas>
                    </div>

                    <div class=" md-6" style="width: 600px; margin: 0 auto;">
                        <!-- Elemento HTML onde o gráfico de consultas será renderizado -->
                        <canvas id="graficoConsultas"></canvas>
                    </div>
                </div>

                <div class=" md-6" style="width: 600px; margin: 0 auto;">
                    <h1 class="mt-4">Faturamento Mensal</h1>
                    <canvas id="myChart"></canvas>
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // Obtendo os dados de clientes e consultas do PHP
        var dadosClientes = <?php echo $jsonDadosClientes; ?>;
        var dadosConsultas = <?php echo $jsonDadosConsultas; ?>;

        // Configurando os rótulos e valores para clientes
        var rotulosClientes = dadosClientes.map(function (value, index) {
            return value[0];
        });
        var valoresClientes = dadosClientes.map(function (value, index) {
            return value[1];
        });

        // Configurando os rótulos e valores para consultas
        var rotulosConsultas = dadosConsultas.map(function (value, index) {
            return value[0];
        });
        var valoresConsultas = dadosConsultas.map(function (value, index) {
            return value[1];
        });

        // Configurando o gráfico de clientes usando Chart.js
        var ctxClientes = document.getElementById('graficoClientes').getContext('2d');
        var graficoClientes = new Chart(ctxClientes, {
            type: 'bar',
            data: {
                labels: rotulosClientes,
                datasets: [{
                    label: 'Clientes',
                    data: valoresClientes,
                    backgroundColor: '#0e213bad',
                    borderColor: 'white',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        // Configurando o gráfico de consultas usando Chart.js
        var ctxConsultas = document.getElementById('graficoConsultas').getContext('2d');
        var graficoConsultas = new Chart(ctxConsultas, {
            type: 'line',
            data: {
                labels: rotulosConsultas,
                datasets: [{
                    label: 'Consultas',
                    data: valoresConsultas,
                    backgroundColor: '#0e213b',
                    borderColor: 'black',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
        <!-- Incluindo Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="js/sb-admin-2.min.js"></script> <!--botao do sidebar-->

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script>
    $(document).ready(function(){
        var ctx = document.getElementById('myChart').getContext('2d');

        // Dados dos meses e valores totais
        var meses = [<?php foreach ($dataPoints as $data) { echo "'" . substr($data['mes'], 0, 3) . "', "; } ?>];
        var valores = [<?php foreach ($dataPoints as $data) { echo $data['total'] . ", "; } ?>];

        // Array para armazenar os valores totais por mês
        var valoresMensais = [];

        // Criando um array com valores para todos os meses do ano
        var mesesDoAno = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

        // Preenchendo os valores para todos os meses do ano
        for (var i = 0; i < mesesDoAno.length; i++) {
            var index = meses.indexOf(mesesDoAno[i]);
            if (index !== -1) {
                valoresMensais.push(valores[index]);
            } else {
                valoresMensais.push(0); // Se não houver dados para o mês, define o valor como zero
            }
        }

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: mesesDoAno,
                datasets: [{
                    label: 'Valor Total',
                    data: valoresMensais,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
</script>




</body>

</html>