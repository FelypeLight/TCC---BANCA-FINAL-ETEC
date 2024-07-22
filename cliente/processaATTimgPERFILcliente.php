<?php
session_start();
include ('../conexao.php');

// Verifica se um arquivo foi enviado
if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $nomeArquivo = $_FILES['foto']['name'];
    $caminhoTemporario = $_FILES['imagem']['tmp_name'];
    $caminhoFinal = '(document.getElementById("foto")' . $nomeArquivo;

    // Move o arquivo para o destino final
    if(move_uploaded_file($caminhoTemporario, $caminhoFinal)) {
        // Atualiza o caminho da imagem no banco de dados
        $id = $_SESSION['id'];
        $sql = "UPDATE tb_cliente SET foto='$caminhoFinal' WHERE id='$id'";
        if(mysqli_query($mysqli, $sql)) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Imagem atualizada com sucesso.</div>";
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao atualizar imagem: " . mysqli_error($mysqli) . "</div>";
        }
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao fazer upload da imagem.</div>";
    }
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Nenhum arquivo enviado ou ocorreu um erro no envio.</div>";
}

// Redireciona de volta para a página do perfil
header("Location: perfil.php");
exit();
?>
