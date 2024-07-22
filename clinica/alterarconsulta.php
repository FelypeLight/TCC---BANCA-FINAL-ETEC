<?php
session_start();
include ('../conexao.php');

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

$id = $_POST['id'];
$status = $_POST['status'];
$cliente_id = $_POST['cliente_id'];

    // Atualizar o agendamento no banco de dados
    $stmt_update = $mysqli->prepare("UPDATE tb_consulta SET status=? WHERE id=? AND cliente_id=?");
    $stmt_update->bind_param("ssi", $status, $id, $cliente_id);

    if ($stmt_update->execute()) {
        echo ""; // Não há erro, então retornamos uma string vazia
    } else {
        echo "Erro ao atualizar o agendamento: " . $stmt_update->errno . " - " . $stmt_update->error;
    }


$mysqli->close();
?>
