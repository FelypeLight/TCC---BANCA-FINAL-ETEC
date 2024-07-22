<?php
session_start();
include ('../conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

$id = $_POST['id'];
$status1 = 'remarcada';
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

$sql1 = "SELECT  nm_animal FROM tb_consulta as cons
INNER JOIN tb_paciente as p ON cons.paciente_id = p.id
  WHERE cons.id = '$id' AND cons.cliente_id='$cliente_id';";
$stmt1 = $mysqli->prepare($sql1);
if ($stmt1->execute()) {
    // Obter resultados
    $result1 = $stmt1->get_result();

    $row1 = $result1->fetch_assoc();
    $nm_animal = $row1['nm_animal'];
    // $dt_consulta1 = $row1['dt_consulta'];

} else {
    echo "Erro ao executar a consulta: " . $stmt1->error;
}

$dataObjeto = new DateTime($dt_consulta);
$dataFormatada = $dataObjeto->format('d/m/Y');
$notificacao = 'Você remarcou a consulta do '. $nm_animal .', para o dia, ' . $dataFormatada . '.';
$status = '0';
$data = date("Y-m-d");
if ($result->num_rows > 0) {
    echo "Já existe um agendamento para este horário e veterinário.";
} else {
    // Atualizar o agendamento no banco de dados
    $stmt_update = $mysqli->prepare("UPDATE tb_consulta SET status=?, dt_consulta=?, hr_consulta=? WHERE id=? AND cliente_id=?");
    $stmt_update->bind_param("ssssi", $status1, $dt_consulta, $hr_consulta, $id, $cliente_id);

        // Inserir notificação do cliente
        $sql_notification = "INSERT INTO notifications_cliente (cliente_id, notificacao, status, data) VALUES ('$cliente_id', '$notificacao', '$status', '$data')";
        $mysqli->query($sql_notification);

    if ($stmt_update->execute()) {
        echo ""; // Não há erro, então retornamos uma string vazia
    } else {
        echo "Erro ao atualizar o agendamento: " . $stmt_update->errno . " - " . $stmt_update->error;
    }
}

$mysqli->close();
?>
