<?php
session_start();
include ('../conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

$id = $_POST['id'];
$status = 'remarcada';
$veterinario_id = intval($_POST['veterinario_id']);
$cliente_id = $_POST['cliente_id'];
$hr_consulta = $_POST['hr_consulta'];
$dt_consulta = $_POST['dt_consulta'];

// Verificar se já existe um agendamento no mesmo dia e horário para o mesmo veterinário
$query_check = "SELECT * FROM tb_consulta WHERE dt_consulta = ? AND hr_consulta = ? AND veterinario_id = ?";
$stmt = $mysqli->prepare($query_check);
$stmt->bind_param("ssi", $dt_consulta, $hr_consulta, $veterinario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Já existe um agendamento para este horário e veterinário.";
} else {
    // Atualizar o agendamento no banco de dados
    $stmt_update = $mysqli->prepare("UPDATE tb_consulta SET status=?, dt_consulta=?, hr_consulta=? WHERE id=? AND cliente_id=?");
    $stmt_update->bind_param("ssssi", $status, $dt_consulta, $hr_consulta, $id, $cliente_id);

    if ($stmt_update->execute()) {
        echo ""; // Não há erro, então retornamos uma string vazia
    } else {
        echo "Erro ao atualizar o agendamento: " . $stmt_update->errno . " - " . $stmt_update->error;
    }
}

$mysqli->close();
?>
