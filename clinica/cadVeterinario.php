<?php
session_start();
include('../conexao.php');
include ('header.php'); 



$nm_vet = $mysqli->real_escape_string($_POST['nm_vet']);
$crmv = $mysqli->real_escape_string($_POST['crmv']);
$ds_vet = $mysqli->real_escape_string($_POST['ds_vet']);
$idade_vet = $mysqli->real_escape_string($_POST['idade_vet']);
$especialidade = $mysqli->real_escape_string($_POST['especialidade']);
$clinica_id = intval($_POST['clinica_id']);



$notificacao = 'Você cadastrou um novo veterinario, o '. $nm_vet .', Parabéns!!';
$status = '0';
$data  = date("Y-m-d");
// Verificar se o CRMV já está cadastrado
// $sql_verificar_crmv = "SELECT id FROM tb_veterinario WHERE crmv = '$crmv'";
// $resultado_verificar_crmv = $mysqli->query($sql_verificar_cnpj);
// if ($resultado_verificar_crmv->num_rows > 0) {
//     echo "<script>alert('Este CRMV já está cadastrado.'); window.location.href = 'cadastro.php';</script>";
//     exit; // Parar a execução do script se o crmv já estiver cadastrado
// }

// // Iniciar uma transação
// $mysqli->begin_transaction();

try {
    
    // Recuperar o ID do login inserido
    $clinica_id = $id;

    // Tratar o upload da imagem
    if(isset($_FILES["img_vet"]) && !empty($_FILES["img_vet"])) {
        $img_vet = "../assets/img/veterinario/" . $_FILES["img_vet"]["name"];
         move_uploaded_file($_FILES["img_vet"]["tmp_name"] ,$img_vet);

    } else {
        // $imagem = "";
    }
    $sql_vet = "INSERT INTO tb_veterinario (nm_vet, crmv, ds_vet, idade_vet, especialidade, img_vet, clinica_id) VALUES ('$nm_vet', '$crmv', '$ds_vet', '$idade_vet', '$especialidade', '$img_vet', '$clinica_id')";
    $mysqli->query($sql_vet);
    // Confirmar a transação
    $mysqli->commit();

    // Inserir notificação do cliente
    $sql_notification = "INSERT INTO notifications (clinica_id, notificacao, status, data) VALUES ('$clinica_id', '$notificacao', '$status', '$data')";
    $mysqli->query($sql_notification);

    echo "<script>alert('Dados inseridos com sucesso.');</script>";
    header("location: user.php");
} catch (Exception $e) {
    // Reverter a transação em caso de erro
    $mysqli->rollback();

    echo "<script>alert('Erro ao inserir dados: " . $e->getMessage() . "'); window.location.href = 'cadastroVet.php';</script>";
}


// Fechar conexão
$mysqli->close();

?>