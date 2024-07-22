<?php
include('../conexao.php');

if (isset($_GET['especie_id'])) {
    $especie_id = intval($_GET['especie_id']);
    $sql = "SELECT id, raca FROM tb_racas WHERE especie_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $especie_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $racas = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $racas[] = [
                'raca_id' => $row['id'],
                'raca' => $row['raca']
            ];
        }
    }
    $stmt->close();
    echo json_encode($racas);
}
?>
