<?php
session_start();
include ('../conexao.php');
include ('header.php');
    
    
    $nm_unidade = $_POST['nm_unidade'];
    $celular = $_POST['celular'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $cep = $_POST['cep'];
    $nr_end = $_POST['nr_end'];     

    if ($mysqli->connect_error) {
        die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    

    // Atualiza os dados no banco de dados
    $sql = "UPDATE tb_clinica SET nm_unidade='$nm_unidade', cep='$cep', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', nr_end='$nr_end', celular='$celular' WHERE id='$id'";
    if (mysqli_query($mysqli, $sql)) {
        var_dump($_POST);
        print_r($_POST);

        $_SESSION['msg'] = "<div class='alert alert-success'>Agendamento realizado com sucesso.</div>";
        header("Location: perfil.php");
        exit();
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Erro1 ao realizar o agendamento: " . mysqli_error($mysqli) . "</div>";
            header("Location: user.php");
            exit();
    }
    
    // Fecha a conexão com o banco de dados
    $conexao->close();

?>

