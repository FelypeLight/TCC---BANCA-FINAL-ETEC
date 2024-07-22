<?php
include('../conexao.php');

if (isset($_POST['especie_id'])) {
    $especie_id = $_POST['especie_id'];

    $stmt = $mysqli->prepare("SELECT id, raca FROM tb_racas WHERE especie_id = ?");
    $stmt->bind_param('i', $especie_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $racas = [];
    while ($row = $result->fetch_assoc()) {
        $racas[] = $row;
    }

    echo json_encode($racas);
}
?>
