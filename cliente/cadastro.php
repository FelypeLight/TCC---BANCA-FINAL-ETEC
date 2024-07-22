<?php
include('../conexao.php');
//////////////////////////           FUNCIONANDO atualizado         ////////////////////////



// Dados para inserção na tabela de login
$login = $mysqli->real_escape_string($_POST['login']);
$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string($_POST['senha']); // Criptografar a senha

// Dados para inserção na tabela de cliente
$nm_responsavel = $mysqli->real_escape_string($_POST['nm_responsavel']);
$documento_cpf = $mysqli->real_escape_string($_POST['documento_cpf']);
$cep = $mysqli->real_escape_string($_POST['cep']);
$estado = $mysqli->real_escape_string($_POST['estado']);
$cidade = $mysqli->real_escape_string($_POST['cidade']);
$bairro = $mysqli->real_escape_string($_POST['bairro']);
$rua = $mysqli->real_escape_string($_POST['rua']);
$nr = $mysqli->real_escape_string($_POST['nr']);
$celular = $mysqli->real_escape_string($_POST['celular']);


$notificacao = 'Seja Bem Vindo '. $nm_responsavel .', ao nosso site de agendamentos.';
$status = '0';
$data  = date("Y-m-d");

// Verificar se o email já está cadastrado
$sql_verificar_email = "SELECT id FROM tb_login_cliente WHERE email = '$email'";
$resultado_verificar_email = $mysqli->query($sql_verificar_email);
if ($resultado_verificar_email->num_rows > 0) {
    echo "<script>alert('Este email já está cadastrado.'); window.location.href = 'cadastro.php';</script>";
    exit; // Parar a execução do script se o email já estiver cadastrado
}

// Verificar se o CPF já está cadastrado
$sql_verificar_cpf = "SELECT id FROM tb_cliente WHERE documento_cpf = '$documento_cpf'";
$resultado_verificar_cpf = $mysqli->query($sql_verificar_cpf);
if ($resultado_verificar_cpf->num_rows > 0) {
    echo "<script>alert('Este CPF já está cadastrado.'); window.location.href = 'cadastro.php';</script>";
    exit; // Parar a execução do script se o CPF já estiver cadastrado
}

// Iniciar uma transação
$mysqli->begin_transaction();

try {
    // Inserir dados na tabela de login
    $sql_login = "INSERT INTO tb_login_cliente (login, email, senha) VALUES ('$login', '$email', '$senha')";
    $mysqli->query($sql_login);

    // Recuperar o ID do login inserido
    $login_cliente = $mysqli->insert_id;

    // Inserir dados na tabela de cliente com a chave estrangeira para login_id
    $sql_cliente = "INSERT INTO tb_cliente (nm_responsavel, documento_cpf, login_cliente, cep, estado, cidade, bairro, rua, nr, celular) VALUES ('$nm_responsavel', '$documento_cpf', '$login_cliente', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$nr', '$celular')";
    $mysqli->query($sql_cliente);

    // Confirmar a transação
    $mysqli->commit();

    // Inserir notificação do cliente
    $sql_notification = "INSERT INTO notifications_cliente (cliente_id, notificacao, status, data) VALUES ('$cliente_id', '$notificacao', '$status', '$data')";
    $mysqli->query($sql_notification);
    
    echo "<script>alert('Dados inseridos com sucesso.'); window.location.href = 'login.php';</script>";
} catch (Exception $e) {
    // Reverter a transação em caso de erro
    $mysqli->rollback();

    echo "<script>alert('Erro ao inserir dados: " . $e->getMessage() . "'); window.location.href = 'register.php';</script>";
}

// Fechar conexão
$mysqli->close();
    

?>