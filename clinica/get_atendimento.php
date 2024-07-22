<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../conexao.php');

if (isset($_POST['veterinario_id'])) {
    $veterinario_id = $_POST['veterinario_id'];

    $stmt = $mysqli->prepare("SELECT id, nm_atendimento, vl_atendimento FROM tb_tipoatendimento WHERE veterinario_id = ?");
    $stmt->bind_param('i', $veterinario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $tipo = [];
    while ($row = $result->fetch_assoc()) {
        $tipo[] = $row;
    }

    if (empty($tipo)) {
        echo json_encode(['error' => 'Nenhum tipo de atendimento encontrado para este veterinário.']);
    } else {
        echo json_encode($tipo);
    }
} else {
    echo json_encode(['error' => 'Parâmetro veterinario_id não foi recebido.']);
}
?>
