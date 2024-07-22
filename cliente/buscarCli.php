<?php
session_start();
include ('../conexao.php');
include ('header.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Clínica</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Custom fonts for this template-->
    <link href="../vendorUser/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../cssUser/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        h5,
        strong {
            color: black;
            font-weight: bold;
        }
    </style>
    <style>
        /* Estilo para o modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #map {
            height: 300px;
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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input id="clinicSearchInput" type="text" class="form-control bg-light border-0 small"
                                placeholder="Buscar clínica..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn"
                                    style="background-color: rgb(0, 201, 221); color: white; border-radius: 5px;"
                                    type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>

                                <div class="btn-group">
                                    <button class="btn ml-1"
                                        style="background-color: rgb(0, 201, 221); color: white;  border-radius: 5px;"
                                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-filter"></i> Filtros
                                    </button>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="#" data-filter="todos">Todos</a>
                                        <a class="dropdown-item" href="#" data-filter="24horas">24 Horas</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar clínicas. . ." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn"
                                                style="background-color: rgb(0, 201, 221); color: white;" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

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

                <div class="container-fluid col-12">
                    <!-- HEADER CONTEÚDO -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Clínicas</h1>
                    </div>

                    <div class="row ">
                        <?php

                        function getLatLong($enderecoc, $cidadec, $estadoc)
                        {
                            // Substitua "YOUR_API_KEY" pela sua chave de API do OpenCage Geocoding
                            $apiKey = "1bd56d0b20ea4f13b6ccd6133cd4a8d3";
                            $endereco = urlencode("$enderecoc, $cidadec, $estadoc, Brasil");
                            $url = "https://api.opencagedata.com/geocode/v1/json?q={$endereco}&key={$apiKey}";

                            // Realiza a solicitação HTTP
                            $response = file_get_contents($url);
                            $json = json_decode($response, true);

                            // Verifica se a solicitação foi bem-sucedida
                            if ($json['status']['code'] == 200) {
                                $latitude = $json['results'][0]['geometry']['lat'];
                                $longitude = $json['results'][0]['geometry']['lng'];
                                return array('latitude' => $latitude, 'longitude' => $longitude);
                            } else {
                                return false;
                            }
                        }

                        $select2 = "SELECT clini.nm_unidade, 
        clini.id, 
        clini.estado, 
        clini.cidade, 
        clini.bairro, 
        clini.rua, 
        clini.nr_end, 
        clini.cep, 
        clini.imagem, 
        clini.celular,
        clini.emergencia,
        GROUP_CONCAT(CONCAT(v.nm_vet, ': ', v.especialidade) SEPARATOR '<br>') AS vet_info,(
            SELECT GROUP_CONCAT(CONCAT(hr.dia_semana,':',hr.hora_abertura,'-',hr.hora_fechamento,'',hr.status)SEPARATOR'<br>')
            FROM tb_horarios_funcionamento AS hr
            WHERE clini.id = hr.clinica_id) AS horario_info
            FROM tb_clinica AS clini INNER JOIN tb_veterinario AS v ON clini.id = v.clinica_id
            GROUP BY clini.id;
            ";

                        // Executar a consulta
                        $result2 = $mysqli->query($select2);
                        $cards = ''; // Inicialize a variável de cards
                        while ($dados2 = $result2->fetch_array()) {
                            $cliniid = $dados2['id'];
                            $imagemc = $dados2['imagem'];
                            $nm_unidadec = $dados2['nm_unidade'];
                            $estadoc = $dados2['estado'];
                            $cidadec = $dados2['cidade'];
                            $bairroc = $dados2['bairro'];
                            $ruac = $dados2['rua'];
                            $nr_endc = $dados2['nr_end'];
                            $cepc = $dados2['cep'];
                            $celcli = $dados2['celular'];
                            $vet_info = $dados2['vet_info'];
                            $horario_info = $dados2['horario_info'];
                            $emergencia = $dados2['emergencia'];
                            $enderecoc = $ruac . ',' . $nr_endc . '-' . $bairroc;
                            // Chamada da função para obter as coordenadas
                            $coordinates = getLatLong($enderecoc, $cidadec, $estadoc);
                            // Define the availability status
                            $emergencyAvailability = $dados2['emergencia'] == '24 Horas' ? '24horas' : 'not-24horas';
                            $status = 'aberta'; // You need to define logic to determine if the clinic is open or closed
                        
                            // Concatene os cards em uma variável
                            $cards .= "
            <div class='col-lg-6 mb-4 d-flex justify-content-center ' >
                <div class='card mb-3 border-left-info shadow' data-emergency='$emergencyAvailability' data-status='$status' style='max-width: 600px; height: 100%;'>
                    <div class='row g-0 h-100'>
                        <div class='col-md-4 h-100'>
                            <img src='$imagemc' class='img-fluid rounded-start h-100 w-100' style='object-fit: contain;' alt='Imagem da clínica'>
                        </div>
                        <div class='col-md-8'>
                            <div class='card-body d-flex flex-column justify-content-between'>
                                <div>
                                    <h5 class='card-title'>$nm_unidadec</h5>
                                    <p class='card-text'><strong>Localização:</strong> $ruac, $nr_endc - $bairroc, $cidadec, $estadoc</p>
                                    <button onclick='openModal()' class='btn btn-info'>Mapa</button>



                                    <p class='card-text'><strong>CEP:</strong> $cepc</p>
                                    <p class='card-text'><strong>Telefone:</strong> $celcli</p>
                                    <p class='card-text'><strong>Veterinários:</strong><br> $vet_info</p>
                                    <p class='card-text'><strong>Horários de Funcionamento:</strong><br> $horario_info</p>
                                    <p class='card-text'><strong>Emergência:</strong> $emergencia</p>
                                    
                                    

                                </div>
                                <div class='text-right'>
                                    <form action='agendamentocli.php' method='POST'>
                                        <input type='hidden' name='clinica' value='" . htmlspecialchars($nm_unidadec) . "'>
                                        <input type='hidden' name='id' value='" . htmlspecialchars($cliniid) . "'>
                                        <button type='submit' class='btn btn-info'>Agendar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id='myModal' class='modal'>
            <div class='modal-content'>
                <span class='close' onclick='closeModal()'>&times;</span>
                <a class='btn btn-danger'
                    href='https://www.google.com/maps?q= + $ruac + , + $nr_endc + - + $bairroc + , + $cidadec + , + $estadoc   '
                    target='_blank'>Abrir no Google Maps</a>
    
                <div id='map'></div>
            </div>
        </div>
        ";
                        }

                        // Agora a variável $cards contém todos os cards gerados
                        // Você pode usá-la conforme necessário
                        echo $cards; // Se você deseja imprimir os cards agora, você pode fazer isso
                        ?>
                    </div>
                </div>




                <!-- End of Main Content -->
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
    <script>
        // Função para abrir o modal
        function openModal() {
            document.getElementById('myModal').style.display = "block";

            // Chamada da função para obter as coordenadas e carregar o mapa
            getCoordinatesAndLoadMap();
        }

        // Função para fechar o modal
        function closeModal() {
            document.getElementById('myModal').style.display = "none";
        }

        // Função para obter as coordenadas e carregar o mapa
        function getCoordinatesAndLoadMap() {
            // Coordenadas do ponto obtidas pela API do OpenCage Geocoding (PHP gera esses valores)
            var latitude = <?php echo $coordinates['latitude']; ?>;
            var longitude = <?php echo $coordinates['longitude']; ?>;

            // Inicializa o mapa dentro do modal
            var map = L.map('map').setView([latitude, longitude], 15);

            // Adiciona camada de mapa
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Adiciona marcador
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup('<b>Endereço:</b> <?php echo $enderecoc; ?>').openPopup();

            // Adiciona evento de clique ao marcador para abrir o Google Maps
            marker.on('click', function () {
                var url = 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent('<?php echo $enderecoc; ?>');
                window.open(url, '_blank');
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const clinics = document.querySelectorAll('.card'); // Assume each clinic is represented by a card
            const filterItems = document.querySelectorAll('.dropdown-item');

            filterItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    const filter = this.getAttribute('data-filter');

                    clinics.forEach(clinic => {
                        const emergencyAvailability = clinic.getAttribute('data-emergency');
                        const status = clinic.getAttribute('data-status');

                        if (filter === 'todos' || (filter === '24horas' && emergencyAvailability === '24horas') || (filter === 'abertas' && status === 'aberta')) {
                            clinic.style.display = 'block'; // Mostra a clínica
                        } else {
                            clinic.style.display = 'none'; // Esconde a clínica
                        }
                    });
                });
            });
        });



        document.addEventListener("DOMContentLoaded", function () {
            const clinicFilter = document.getElementById('clinicFilter');
            const clinics = document.querySelectorAll('.card'); // Supondo que cada clínica seja representada por um card

            clinicFilter.addEventListener('change', function () {
                const selectedOption = clinicFilter.value;
                const currentDay = new Date().getDay(); // Obtém o dia da semana atual (0 para domingo, 1 para segunda-feira, etc.)
                const currentHour = new Date().getHours(); // Obtém a hora atual

                clinics.forEach(function (clinic) {
                    const status = clinic.dataset.status;
                    const openingHours = clinic.dataset.openingHours.split(';'); // Assume que o horário de funcionamento está no formato "hora_abertura;hora_fechamento"

                    if (selectedOption === 'todos' || (selectedOption === 'abertas' && status === 'aberta' && isClinicOpen(openingHours, currentDay, currentHour))) {
                        clinic.style.display = 'block'; // Mostra a clínica se ela corresponder à opção selecionada e estiver aberta
                    } else {
                        clinic.style.display = 'none'; // Esconde a clínica se ela não corresponder à opção selecionada ou não estiver aberta
                    }
                });
            });

            // Função para verificar se a clínica está aberta com base no horário de funcionamento
            function isClinicOpen(openingHours, currentDay, currentHour) {
                const [openingHour, closingHour] = openingHours[currentDay].split('-');
                const [openingHourHour, openingHourMinute] = openingHour.split(':');
                const [closingHourHour, closingHourMinute] = closingHour.split(':');

                // Converte o horário atual e de abertura/fechamento para minutos para facilitar a comparação
                const currentMinutes = currentHour * 60;
                const openingMinutes = parseInt(openingHourHour) * 60 + parseInt(openingHourMinute);
                const closingMinutes = parseInt(closingHourHour) * 60 + parseInt(closingHourMinute);

                // Verifica se o horário atual está dentro do intervalo de abertura/fechamento da clínica
                return currentMinutes >= openingMinutes && currentMinutes <= closingMinutes;
            }
        });
    </script>


</body>

</html>