<?php
include ('../conexao.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar a conexão com o banco de dados
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

echo "Passou da verificação de conexão.<br>";

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Dados recebidos via POST.<br>";

    // Verificar se todos os campos esperados estão presentes no POST
    $required_fields = ['nm_responsavel', 'documento_cpf', 'cep', 'estado', 'cidade', 'bairro', 'rua', 'nr', 'celular', 'clinica_id'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field])) {
            die("Campo obrigatório ausente: $field");
        }
    }

    echo "Todos os campos obrigatórios estão presentes.<br>";

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
    $clinica_id = $mysqli->real_escape_string($_POST['clinica_id']);

    $notificacao = 'Parabéns ' . $nm_unidade . ',  você cadastrou o ' . $nm_responsavel;
    $status = '0';
    $data = date("Y-m-d");
    
    echo "Dados foram escapados com sucesso.<br>";

    // Iniciar uma transação
    $mysqli->begin_transaction();

    try {
        // Inserir dados na tabela de cliente com a chave estrangeira para login_id
        $sql_cliente1 = "INSERT INTO tb_cliente (nm_responsavel, documento_cpf, cep, estado, cidade, bairro, rua, nr, celular, clinica_id) VALUES ('$nm_responsavel', '$documento_cpf', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$nr', '$celular', '$clinica_id')";

        if (!$mysqli->query($sql_cliente1)) {
            throw new Exception("Erro ao inserir dados na tabela de cliente: " . $mysqli->error);
        }

        // Recuperar o ID do cliente recém-criado

        // Confirmar a transação
        $mysqli->commit();

        // Inserir notificação do cliente
        $sql_notification = "INSERT INTO notifications (clinica_id, notificacao, status, data) VALUES ('$clinica_id', '$notificacao', '$status', '$data')";
        $mysqli->query($sql_notification);

        echo "Dados inseridos com sucesso.<br>";

        // Redirecionar para cadastraPets.php
        header("Location: clientes.php");
        exit(); // Certifique-se de sair após redirecionar
    } catch (Exception $e) {
        // Reverter a transação em caso de erro
        $mysqli->rollback();

        echo "Erro ao inserir dados: " . $e->getMessage() . "<br>";
        echo "<script>alert('Erro ao inserir dados: " . $e->getMessage() . "'); window.location.href = 'agendar.php';</script>";
    }


    // Fechar conexão
    $mysqli->close();
} else {
    echo "Nenhum dado foi enviado via POST.<br>";
}
?>