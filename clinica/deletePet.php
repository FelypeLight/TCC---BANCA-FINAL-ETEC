<?php
session_start();
include('../conexao.php');

// Verifica se o ID foi passado e se é um número
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
if (!$id) {
    echo "<script>alert('ID de pet inválido!'); window.location.href = 'petsCadastrados.php';</script>";
    exit;
}

// Inicia uma transação
$mysqli->begin_transaction();

$sql1 = "SELECT  cliente_id, nm_animal FROM tb_paciente as p
  WHERE p.id = '$id' ;";
$stmt1 = $mysqli->prepare($sql1);
if ($stmt1->execute()) {
    // Obter resultados
    $result1 = $stmt1->get_result();

    $row1 = $result1->fetch_assoc();
    $nm_animal = $row1['nm_animal'];
    $cliente_id = $row1['cliente_id'];

    // $dt_consulta1 = $row1['dt_consulta'];

} else {
    echo "Erro ao executar a consulta: " . $stmt1->error;
}

$notificacao = 'Você excluiu o '. $nm_animal . '.';
$status = '0';
$data = date("Y-m-d");
try {
    // Exclui as referências na tabela tb_consulta
    $deleteConsultasQuery = "DELETE FROM tb_consulta WHERE paciente_id = ?";
    if ($stmtConsultas = $mysqli->prepare($deleteConsultasQuery)) {
        $stmtConsultas->bind_param("i", $id);
        if (!$stmtConsultas->execute()) {
            throw new Exception($stmtConsultas->error);
        }
        $stmtConsultas->close();
    } else {
        throw new Exception($mysqli->error);
    }

    // Exclui o pet na tabela tb_paciente
    $deletePetQuery = "DELETE FROM tb_paciente WHERE id = ?";
    if ($stmtPet = $mysqli->prepare($deletePetQuery)) {
        $stmtPet->bind_param("i", $id);
        if (!$stmtPet->execute()) {
            throw new Exception($stmtPet->error);
        }
        $stmtPet->close();
    } else {
        throw new Exception($mysqli->error);
    }
        // Inserir notificação do cliente
        $sql_notification = "INSERT INTO notifications_cliente (cliente_id, notificacao, status, data) VALUES ('$cliente_id', '$notificacao', '$status', '$data')";
        $mysqli->query($sql_notification);
    // Comita a transação
    $mysqli->commit();
    echo "<script>alert('Pet excluído com sucesso!'); window.location.href = 'petsCadastrados.php';</script>";
} catch (Exception $e) {
    // Se algo deu errado, faz o rollback da transação
    $mysqli->rollback();
    echo "<script>alert('Erro excluindo pet: " . $e->getMessage() . "'); window.location.href = 'petsCadastrados.php';</script>";
}
?>
