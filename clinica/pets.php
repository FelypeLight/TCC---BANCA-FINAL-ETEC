<?php
include('../conexao.php');

// Dados para inserção na tabela de cliente
$nm_animal = $mysqli->real_escape_string($_POST['nm_animal']);
$idade = $mysqli->real_escape_string($_POST['idade']);
$peso = $mysqli->real_escape_string($_POST['peso']);
$cor = $mysqli->real_escape_string($_POST['cor']);
$sexo = $mysqli->real_escape_string($_POST['sexo']);
$castrado = $mysqli->real_escape_string($_POST['castrado']);
$cliente_id = intval($_POST['cliente_id']);
$especie_id = intval($_POST['especie_id']);
$raca_id = intval($_POST['raca_id']); // Certifique-se de que raca_id seja tratado como um número inteiro

$sql1 = "SELECT clinica_id, nm_responsavel FROM tb_cliente WHERE id = $cliente_id";
$stmt1 = $mysqli->prepare($sql1);
if ($stmt1->execute()) {
    // Obter resultados
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_assoc();
    $nm_responsavel = $row1['nm_responsavel'];
    $clinica_id = $row1['clinica_id'];
} else {
    echo "Erro ao executar a consulta: " . $stmt1->error;
}
$notificacao = 'Parabéns, você cadastrou um Pet para o ' . $nm_responsavel;
$status = '0';
$data = date("Y-m-d");
try {
    // Inserir dados na tabela de cliente com a chave estrangeira para login_id
    $sql_pet1 = "INSERT INTO tb_paciente (nm_animal, idade, peso, cor, especie_id, raca_id, sexo, castrado, cliente_id) VALUES ('$nm_animal', '$idade', '$peso', '$cor', '$especie_id', '$raca_id', '$sexo', '$castrado', '$cliente_id')";
    $mysqli->query($sql_pet1);

    // Confirmar a transação
    $mysqli->commit();

    // Inserir notificação do cliente
    $sql_notification = "INSERT INTO notifications (clinica_id, notificacao, status, data) VALUES ('$clinica_id', '$notificacao', '$status', '$data')";
    $mysqli->query($sql_notification);

    echo "<script>alert('Dados inseridos com sucesso.'); window.location.href = 'petsCadastrados.php';</script>";
} catch (Exception $e) {
    // Reverter a transação em caso de erro
    $mysqli->rollback();

    echo "<script>alert('Erro ao inserir dados: " . $e->getMessage() . "'); window.location.href = 'user.php';</script>";
}

// Fechar conexão
$mysqli->close();
?>
