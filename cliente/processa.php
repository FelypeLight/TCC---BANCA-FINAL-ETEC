<?php
session_start();
var_dump($_POST);
// Incluir a conexão com o BD
include_once ("../conexao.php");
$veterinario_id = intval($_POST['veterinario_id']);
if (isset($_POST['tipo'])) {
    $tipo_id = intval($_POST['tipo']);
    echo "tipo_id recebido: " . $tipo_id . "<br>";

    $sql1 = "SELECT  v.nm_vet, v.clinica_id, clini.nm_unidade 
FROM tb_veterinario as v 
INNER JOIN tb_clinica as clini ON v.clinica_id = clini.id
WHERE v.id = $veterinario_id";
    $stmt1 = $mysqli->prepare($sql1);
    if ($stmt1->execute()) {
        // Obter resultados
        $result1 = $stmt1->get_result();

        $row1 = $result1->fetch_assoc();
        $nm_vet = $row1['nm_vet'];
        $clinica_id = $row1['clinica_id'];
        $nm_unidade = $row1['nm_unidade'];

    } else {
        echo "Erro ao executar a consulta: " . $stmt1->error;
    }

    $notificacao = 'Parabéns, um agendamento realizado para o veterinário: ' . $nm_vet;
    $status1 = '0';
    $data = date("Y-m-d");

    // Obter os valores do formulário
    $cliente_id = intval($_POST['cliente_id']);
    $paciente_id = intval($_POST['paciente_id']);

    $dt_consulta = $_POST['dt_consulta'];
    $hr_consulta = $_POST['hr_consulta'];
    $ds_consulta = $_POST['ds_consulta'];
    $status = 'agendada';
    $prot = date('YmHis');

    $protocolo = $prot . $cliente_id . $paciente_id . $veterinario_id;
    // Verificar se os campos obrigatórios estão preenchidos
// if (empty($cliente_id) || empty($paciente_id) || empty($veterinario_id) || empty($dt_consulta) || empty($hr_consulta)) {
//     $_SESSION['msg'] = "<div class='alert alert-warning'>Preencha os campos obrigatórios corretamente</div>";
//     header("Location: user.php");
//     exit();
// }

    // Verificar se já existe um agendamento no mesmo dia e horário para o mesmo veterinário
    $query_check = "SELECT * FROM tb_consulta WHERE dt_consulta = ? AND hr_consulta = ? AND veterinario_id = ?";
    $stmt = $mysqli->prepare($query_check);
    $stmt->bind_param("ssi", $dt_consulta, $hr_consulta, $veterinario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: buscarCli.php");
        $_SESSION['msg'] = "<div class='alert alert-danger'>Já existe um agendamento para este horário e veterinário.</div>";
        exit();

    } else {
        // Inserir o novo agendamento no banco de dados
        $query_insert = "INSERT INTO tb_consulta (dt_consulta, hr_consulta, status, ds_consulta, cliente_id, paciente_id, veterinario_id, protocolo, tipo_id) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $mysqli->prepare($query_insert);
        $stmt_insert->bind_param("sssssiiii", $dt_consulta, $hr_consulta, $status, $ds_consulta, $cliente_id, $paciente_id, $veterinario_id, $protocolo, $tipo_id);

        // Inserir notificação do cliente
        $sql_notification = "INSERT INTO notifications_cliente (cliente_id, notificacao, status, data) VALUES ('$cliente_id', '$notificacao', '$status1', '$data')";
        $mysqli->query($sql_notification);

        if ($stmt_insert->execute()) {
            header("Location: minhasConsultas.php");
            $_SESSION['msg'] = "<div class='alert alert-success'>Agendamento realizado com sucesso.</div>";

            exit();

        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao realizar o agendamento: " . $stmt_insert->errno . " - " . $stmt_insert->error . "</div>";
            header("Location: buscarCli.php");
            exit();
        }
    }
} else {
    echo "tipo_id não recebido do formulário.<br>";
}
?>