<?php
include('../conexao.php');
session_start();
////////////////////////// FUNCIONANDO atualizado ////////////////////////
include('header.php');


    // Obtém os dados do formulário
    $nm_animal = $_POST['nm_animal'];
    $idade = $_POST['idade'];
    $especie_id = $_POST['especie_id'];
    $raca_id = $_POST['raca_id'];
    $peso = $_POST['peso'];
    $cor = $_POST['cor'];
    $sexo = $_POST['sexo'];
    $castrado = $_POST['castrado'];

    // Valida se todos os campos obrigatórios foram preenchidos
    if (!empty($nm_animal) && !empty($idade) && !empty($especie_id) && !empty($raca_id) && !empty($peso) && !empty($cor) && !empty($sexo) && !empty($castrado)) {
        // Prepara a consulta SQL para inserção dos dados
        $sql = "INSERT INTO tb_paciente (nm_animal, idade, especie_id, raca_id, peso, cor, sexo, castrado, cliente_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Liga os parâmetros à consulta
            $stmt->bind_param('siisssssi', $nm_animal, $idade, $especie_id, $raca_id, $peso, $cor, $sexo, $castrado, $id);

            // Executa a consulta
            if ($stmt->execute()) {
                // Redireciona para uma página de sucesso ou exibe uma mensagem de sucesso
                echo "<script>alert('Pet cadastrado com sucesso!'); window.location.href = 'petsCadastrados.php';</script>";
            } else {
                // Exibe uma mensagem de erro
                echo "Erro ao cadastrar o pet: " . $stmt->error;
            }

            // Fecha a declaração
            $stmt->close();
        } else {
            // Exibe uma mensagem de erro
            echo "Erro na preparação da consulta: " . $mysqli->error;
            echo $cliente_id;
        }
    } else {
        // Exibe uma mensagem de erro se algum campo obrigatório não foi preenchido
        echo "Por favor, preencha todos os campos obrigatórios.";
    }



// Fechar conexão
$mysqli->close();
?>
