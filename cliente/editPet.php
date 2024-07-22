<?php
include('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nm_animal'];
    $idade = $_POST['idade'];
    $peso = $_POST['peso'];
    $cor = $_POST['cor'];
    $sexo = $_POST['sexo'];
    $castrado = $_POST['castrado'];
    $raca_id = $_POST['raca_id'];
    $especie_id = $_POST['especie_id'];

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
    $notificacao = 'Você atualizou as informações do '. $nome  . '.';
    $status = '0';
    $data = date("Y-m-d");
    // Atualizando os dados no banco de dados
    $updateQuery = "UPDATE tb_paciente SET 
                    nm_animal = '$nome', 
                    idade = '$idade', 
                    peso = '$peso', 
                    cor = '$cor', 
                    sexo = '$sexo', 
                    castrado = '$castrado', 
                    raca_id = '$raca_id', 
                    especie_id = '$especie_id'
                    WHERE id = '$id'";

        // Inserir notificação do cliente
        $sql_notification = "INSERT INTO notifications_cliente (cliente_id, notificacao, status, data) VALUES ('$cliente_id', '$notificacao', '$status', '$data')";
        $mysqli->query($sql_notification);

    if ($mysqli->query($updateQuery)) {
        echo "Pet atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o pet: " . $mysqli->error;
    }
}
?>
