<?php
include('../conexao.php');
//////////////////////////           FUNCIONANDO atualizado         ////////////////////////


// Dados para inserção na tabela de login
// $login = $mysqli->real_escape_string($_POST['login']);
// $email = $mysqli->real_escape_string($_POST['email']);
// $senha = password_hash($mysqli->real_escape_string($_POST['senha']), PASSWORD_DEFAULT); // Criptografar a senha

// // Dados para inserção na tabela de cliente
// $nm_unidade = $mysqli->real_escape_string($_POST['nm_unidade']);
// $imagem = $_FILES($_POST['imagem']);
// $cnpj = $mysqli->real_escape_string($_POST['cnpj']);
// $cep = $mysqli->real_escape_string($_POST['cep']);
// $estado = $mysqli->real_escape_string($_POST['estado']);
// $cidade = $mysqli->real_escape_string($_POST['cidade']);
// $bairro = $mysqli->real_escape_string($_POST['bairro']);
// $rua = $mysqli->real_escape_string($_POST['rua']);
// $nr = $mysqli->real_escape_string($_POST['nr']);
// $celular = $mysqli->real_escape_string($_POST['celular']);

// // Verificar se o email já está cadastrado
// $sql_verificar_email = "SELECT id FROM tb_login_clinica WHERE email = '$email'";
// $resultado_verificar_email = $mysqli->query($sql_verificar_email);
// if ($resultado_verificar_email->num_rows > 0) {
//     echo "<script>alert('Este email já está cadastrado.'); window.location.href = 'cadastro.php';</script>";
//     exit; // Parar a execução do script se o email já estiver cadastrado
// }

// // Verificar se o CPF já está cadastrado
// $sql_verificar_cnpj = "SELECT id FROM tb_clinica WHERE cnpj = '$cnpj'";
// $resultado_verificar_cnpj = $mysqli->query($sql_verificar_cnpj);
// if ($resultado_verificar_cnpj->num_rows > 0) {
//     echo "<script>alert('Este CNPJ já está cadastrado.'); window.location.href = 'cadastro.php';</script>";
//     exit; // Parar a execução do script se o CPF já estiver cadastrado
// }

// // Iniciar uma transação
// $mysqli->begin_transaction();

// try {
//     // Inserir dados na tabela de login
//     $sql_login = "INSERT INTO tb_login_clinica (login, email, senha) VALUES ('$login', '$email', '$senha')";
//     $mysqli->query($sql_login);

//     // Recuperar o ID do login inserido
//     $login_clinica = $mysqli->insert_id;

//     // Inserir dados na tabela de cliente com a chave estrangeira para login_id
//     $sql_clinica = "INSERT INTO tb_clinica (nm_unidade, imagem, cnpj, login_clinica, cep, estado, cidade, bairro, rua, nr, celular) VALUES ('$nm_unidade', '$imagem', '$cnpj', '$login_clinica', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$nr', '$celular')";
//     $mysqli->query($sql_clinica);

//     // Confirmar a transação
//     $mysqli->commit();

//     echo "<script>alert('Dados inseridos com sucesso.'); window.location.href = 'login.php';</script>";
// } catch (Exception $e) {
//     // Reverter a transação em caso de erro
//     $mysqli->rollback();

//     echo "<script>alert('Erro ao inserir dados: " . $e->getMessage() . "'); window.location.href = 'cadastro.php';</script>";
// }

// // Fechar conexão
// $mysqli->close();
    
///////////////////////////////////////// TESTE img /////////////////////////


// Primeiro, você precisa estabelecer uma conexão com o banco de dados, se ainda não o fez


// Coletar os dados do formulário da clínica
 // Supondo que você já tenha o ID da clínica

// Coletar os dados do formulário da clínica
$login = $mysqli->real_escape_string($_POST['login']);
$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string($_POST['senha']);   // Criptografar a senha

// Resto dos dados da clínica
$nm_unidade = $mysqli->real_escape_string($_POST['nm_unidade']);
$cnpj = $mysqli->real_escape_string($_POST['cnpj']);
$cep = $mysqli->real_escape_string($_POST['cep']);
$estado = $mysqli->real_escape_string($_POST['estado']);
$cidade = $mysqli->real_escape_string($_POST['cidade']);
$bairro = $mysqli->real_escape_string($_POST['bairro']);
$rua = $mysqli->real_escape_string($_POST['rua']);
$nr_end = $mysqli->real_escape_string($_POST['nr_end']);
$celular = $mysqli->real_escape_string($_POST['celular']);
$emergencia = $mysqli->real_escape_string($_POST['emergencia']);



$notificacao = 'Seja Bem Vindo '. $nm_unidade .', Parabéns pelo cadastro!!';
$status = '0';
$data  = date("Y-m-d");

// Verificar se o email já está cadastrado
$sql_verificar_email = "SELECT id FROM tb_login_clinica WHERE email = '$email'";
$resultado_verificar_email = $mysqli->query($sql_verificar_email);
if ($resultado_verificar_email->num_rows > 0) {
    echo "<script>alert('Este email já está cadastrado.'); window.location.href = 'cadastro.php';</script>";
    exit; // Parar a execução do script se o email já estiver cadastrado
}

// Verificar se o CPF já está cadastrado
$sql_verificar_cnpj = "SELECT id FROM tb_clinica WHERE cnpj = '$cnpj'";
$resultado_verificar_cnpj = $mysqli->query($sql_verificar_cnpj);
if ($resultado_verificar_cnpj->num_rows > 0) {
    echo "<script>alert('Este CNPJ já está cadastrado.'); window.location.href = 'cadastro.php';</script>";
    exit; // Parar a execução do script se o CPF já estiver cadastrado
}

// Iniciar uma transação
$mysqli->begin_transaction();

try {
    // Inserir dados na tabela de login
    $sql_login = "INSERT INTO tb_login_clinica (login, email, senha) VALUES ('$login', '$email', '$senha')";
    $mysqli->query($sql_login);

    // Recuperar o ID do login inserido
    $login_clinica = $mysqli->insert_id;

    // Tratar o upload da imagem
    if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {
        $imagem = "../assets/img/clinica/" . $_FILES["imagem"]["name"];
         move_uploaded_file($_FILES["imagem"]["tmp_name"] ,$imagem);

    } else {
        // $imagem = "";
    }
    $sql_clinica = "INSERT INTO tb_clinica (nm_unidade, cnpj, login_clinica, cep, estado, cidade, bairro, rua, nr_end, celular, imagem, emergencia) VALUES ('$nm_unidade', '$cnpj', '$login_clinica', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$nr_end', '$celular', '$imagem', '$emergencia')";
    $mysqli->query($sql_clinica);
    // Confirmar a transação
    $mysqli->commit();

    // Inserir notificação do cliente
    $sql_notification = "INSERT INTO notifications (clinica_id, notificacao, status, data) VALUES ('$clinica_id', '$notificacao', '$status', '$data')";
    $mysqli->query($sql_notification);
    
    echo "<script>alert('Dados inseridos com sucesso.'); window.location.href = 'login.php';</script>";
} catch (Exception $e) {
    // Reverter a transação em caso de erro
    $mysqli->rollback();

    echo "<script>alert('Erro ao inserir dados: " . $e->getMessage() . "'); window.location.href = 'cadastro.php';</script>";
}






$clinica_id = $mysqli->insert_id;

// Inserir os horários de funcionamento
inserirHorario($mysqli, $clinica_id, "segunda", $_POST['segunda_abertura'], $_POST['segunda_fechamento'], $_POST['status_segunda']);
inserirHorario($mysqli, $clinica_id, "terca", $_POST['terca_abertura'], $_POST['terca_fechamento'], $_POST['status_terca']);
inserirHorario($mysqli, $clinica_id, "quarta", $_POST['quarta_abertura'], $_POST['quarta_fechamento'], $_POST['status_quarta']);
inserirHorario($mysqli, $clinica_id, "quinta", $_POST['quinta_abertura'], $_POST['quinta_fechamento'], $_POST['status_quinta']);
inserirHorario($mysqli, $clinica_id, "sexta", $_POST['sexta_abertura'], $_POST['sexta_fechamento'], $_POST['status_sexta']);
inserirHorario($mysqli, $clinica_id, "sabado", $_POST['sabado_abertura'], $_POST['sabado_fechamento'], $_POST['status_sabado']);
inserirHorario($mysqli, $clinica_id, "domingo", $_POST['domingo_abertura'], $_POST['domingo_fechamento'], $_POST['status_domingo']);

// Função para inserir horário no banco de dados
function inserirHorario($mysqli, $clinica_id, $dia, $abertura, $fechamento, $status) {
    if ($status === 'aberto') {
        $sql = "INSERT INTO tb_horarios_funcionamento (clinica_id, dia_semana, hora_abertura, hora_fechamento, status) VALUES ('$clinica_id','$dia', '$abertura', '$fechamento', '$status')";
        if ($mysqli->query($sql) !== TRUE) {
            echo "<script>alert('Cadastro realizado com sucesso.'); window.location.href = 'login.php';</script>";
        }
        echo "<script>alert('Cadastro realizado com sucesso.'); window.location.href = 'login.php';</script>";
    } else {
        $sql = "INSERT INTO tb_horarios_funcionamento (clinica_id, dia_semana, status) VALUES ('$clinica_id','$dia', '$status')";
        if ($mysqli->query($sql) !== TRUE) {
            echo "<script>alert('Cadastro realizado com sucesso.'); window.location.href = 'login.php';</script>";
        }
        echo "<script>alert('Cadastro realizado com sucesso.'); window.location.href = 'login.php';</script>";
    }
}



// Fechar conexão
$mysqli->close();

?>