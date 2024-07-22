<?php
include ('../conexao.php');

// Conecte-se ao banco de dados aqui
$updateQuery = "UPDATE notifications_cliente SET status = '1';";
if ($mysqli->query($updateQuery)) {
    echo "status com sucesso!";
} else {
    echo "Erro ao atualizar o status: " . $mysqli->error;
}
$status = $_POST['status'];
// Faça o necessário para atualizar o contador no banco de dados
// Exemplo: definir o contador como 0
$status = 1;

// Retorne qualquer resposta que você deseja enviar de volta para o JavaScript
echo "Contador atualizado para 0 com sucesso!";
?>