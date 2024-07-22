<?php
session_start();
include ('./header.php');
include ('../conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

$idc = $_POST['id'];
$cliente_id = $_POST['cliente_id'];

$sql1 = "SELECT  p.nm_animal, cons.dt_consulta FROM tb_consulta as cons
INNER JOIN tb_paciente as p ON cons.paciente_id = p.id
  WHERE cons.id = '$idc';";
$stmt1 = $mysqli->prepare($sql1);
if ($stmt1->execute()) {
    // Obter resultados
    $result1 = $stmt1->get_result();

    $row1 = $result1->fetch_assoc();
    $nm_animal = $row1['nm_animal'];
    $dt_consulta = $row1['dt_consulta'];

} else {
    echo "Erro ao executar a consulta: " . $stmt1->error;
}

$dataObjeto = new DateTime($dt_consulta);
$dataFormatada = $dataObjeto->format('d/m/Y');
$notificacao = 'Você cancelou uma consulta do '. $nm_animal .', para o dia, ' . $dataFormatada . '.';
$status = '0';
$data = date("Y-m-d");
if (isset($idc) && isset($cliente_id)) {
    $sql = "UPDATE tb_consulta
            SET status='cancelada'
            WHERE id='$idc' AND cliente_id='$cliente_id'";
    
        // Inserir notificação do cliente
        $sql_notification = "INSERT INTO notifications (clinica_id, notificacao, status, data) VALUES ('$id', '$notificacao', '$status', '$data')";
        $mysqli->query($sql_notification);

    if ($mysqli->query($sql) === TRUE) {
        echo "Consulta cancelada com sucesso!";
        header ('Location: agendamentosDia.php');
    } else {
        echo "Erro ao atualizar informações: " . $mysqli->error;
    }
} else {
    echo "Dados incompletos.";
}

$mysqli->close();
?>
