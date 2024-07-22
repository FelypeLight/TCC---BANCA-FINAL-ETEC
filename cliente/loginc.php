<?php   
include('../conexao.php');

/////////// Login
if(isset($_POST['login'])){


    if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    }else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM tb_login_cliente WHERE email = '$email' AND senha = '$senha'";

        $sql_query = $mysqli->query($sql_code) or die("Falha na execução" . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)){
            // Inicia a sessão
            session_start();

            // Define as variáveis de sessão
            $_SESSION['user'] = $usuario['id'];
            // $_SESSION['email'] = $usuario['email'];
            setcookie("email", $email);
            setcookie("id", $id);   
            // Define o cookie (opcional)

            $userId = $_SESSION['user'];

            }
            // Redireciona para a página do usuário
            header('Location: user.php');
            exit; // Garante que o script pare de ser executado após o redirecionamento
        } else {
            echo "<script>alert('Falha ao logar! E-mail ou senha incorretos!'); window.location.href = 'login.php';</script>";

    
        }        

    }
    }
}
?>