<?php
include('../conexao.php');
session_start();
//////////////////////////           FUNCIONANDO atualizado         ////////////////////////
include('header.php');
// Verifique se o ID da espécie foi fornecido na solicitação AJAX
if (isset($_GET['especie_id'])) {
    // Sanitize o ID da espécie
    $especie_id = $_GET['especie_id'];

    // Consulta SQL para obter as raças da espécie selecionada
    $sql1 = "SELECT raca_id, especie, raca, especie_id FROM (SELECT r.especie_id AS especie_id, e.ds_especie AS especie, r.raca AS raca, r.id AS raca_id, ROW_NUMBER() OVER (PARTITION BY r.id, r.raca ORDER BY e.id) AS row_num FROM tb_racas AS r INNER JOIN tb_especie AS e ON r.especie_id = e.id) AS sub WHERE row_num = 1 AND especie_id = ?";

    // Prepare a declaração SQL
    $stmt1 = $mysqli->prepare($sql1);
    
    // Vincule o parâmetro
    $stmt1->bind_param("i", $especie_id);
    
    // Execute a consulta
    $stmt1->execute();
    
    // Obtenha o resultado da consulta
    $result1 = $stmt1->get_result();
    
    // Inicialize um array para armazenar as raças
    $pets1 = [];
    
    // Verificando se há registros retornados pela consulta
    if ($result1->num_rows > 0) {
        // Iterando sobre cada linha de resultados
        while ($row = $result1->fetch_assoc()) {
            // Adicionando os dados do pet ao array
            $pet1 = [
                'raca' => $row["raca"],
                'raca_id' => $row["raca_id"]
          ];

            // Adicionando o pet ao array de pets
            array_push($pets1, $pet1);
        }
    } else {
        echo "Não foram encontrados registros na tabela.";
    }
    
    // Feche a declaração
    $stmt1->close();
    
    // Converta o array para o formato JSON e imprima-o para a resposta AJAX
    echo json_encode($pets1);
} else {
    // Se o ID da espécie não foi fornecido, retorne um erro
    echo "ID da espécie não fornecido na solicitação.";
}
?>
