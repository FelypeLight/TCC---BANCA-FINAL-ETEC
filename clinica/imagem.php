<?php
include('../conexao.php');
session_start();
// Suponha que você tenha o ID da clínica
$clinica_id = $_GET['id'];

// Consulta para recuperar o caminho da imagem da clínica com base no ID
$sql = "SELECT imagem FROM tb_clinica WHERE id = $clinica_id";
$resultado = $mysqli->query($sql);

// Verifica se a consulta retornou algum resultado
if ($resultado->num_rows > 0) {
    // Extrai os dados da imagem
    $dados_imagem = $resultado->fetch_assoc();
    
    // Caminho da imagem
    $caminho_imagem = $dados_imagem['imagem'];
    
    // Exibe a imagem na página
    echo "<img src='$caminho_imagem' alt='Imagem da Clínica'>";
} else {
    echo "Nenhuma imagem encontrada.";
}

// Fechar conexão
$mysqli->close();
?>
