<?php
    include ('../conexao.php');
    if(isset($_SESSION['user'])){
        $userId = $_SESSION['user'];
        ///////////////////
    
    
        
    ///////////
    //     $sql = "SELECT * FROM tb_login WHERE id = ?";
    //     if ($stmt = $mysqli->prepare($sql)) {
    //         // Vincula o parâmetro
    //         $stmt->bind_param("i", $userId);
            
    //         // Executa a consulta
    //         $stmt->execute();
            
    //         // Obtém o resultado da consulta
    //         $result = $stmt->get_result();
            
    //         // Verifica se algum resultado foi retornado
    //         if ($result->num_rows > 0) {
    //             // Exibe as informações do usuário
    //             $userData = $result->fetch_assoc();
    //             $email = $userData['email'];
                    

    //             // Exibe outras informações do usuário conforme necessário
    //         } else {
    //             echo "Nenhuma informação encontrada para o ID de usuário: $userId";
    //         }
            
    //         // Fecha o statement
    //         $stmt->close();
    //     } else {
    //         echo "Erro ao preparar a declaração SQL: " . $mysqli->error;
    //     }
        
    //     // Fecha a conexão
    //     $mysqli->close();
        
        
    // } else {
    //     echo "Usuário não autenticado.";
    // }


        // Consulta à tabela tb_login para obter informações básicas do usuário
        $sqlLogin = "SELECT * FROM tb_login_cliente WHERE id = ?";
        if ($stmtLogin = $mysqli->prepare($sqlLogin)) {
            // Vincula o parâmetro
            $stmtLogin->bind_param("i", $userId);
            
            // Executa a consulta
            $stmtLogin->execute();
            
            // Obtém o resultado da consulta
            $resultLogin = $stmtLogin->get_result();
            
            // Verifica se algum resultado foi retornado
            if ($resultLogin->num_rows > 0) {
                // Obtém as informações do usuário da tabela tb_login
                $userData = $resultLogin->fetch_assoc();
                $email = $userData['email'];
    
                // Exibe as informações do usuário
                // echo "Informações do usuário:<br>";
                // echo "Email: $email<br>";
                // Exibe outras informações do usuário conforme necessário
    
                $sql1 = "SELECT * FROM tb_cliente WHERE login_cliente = ?";
                $stmt1 = $mysqli->prepare($sql1);

                if ($stmt1) {
                    // Bind do parâmetro
                    $stmt1->bind_param("i", $userId);

                    // Executar a consulta
                    if ($stmt1->execute()) {
                        // Obter resultados
                        $result1 = $stmt1->get_result();

                        // Verificar se há resultados
                        if ($result1->num_rows > 0) {
                            // Loop através dos resultados
                            while ($row = $result1->fetch_assoc()) {
                                // Fazer algo com os dados
                                $id = $row['id'];
                                $foto = $row['foto'];
                                $nm_responsavel = $row['nm_responsavel'];
                                $celular = $row['celular'];
                                $cep = $row['cep'];
                                $estado = $row['estado'];
                                $cidade = $row['cidade'];
                                $bairro = $row['bairro'];
                                $rua = $row['rua'];
                                $nr = $row['nr'];
                                
                                // echo "ID: " . $row['id'] . ", Nome: " . $nm_responsavel . "<br>";
                                
                            }
                        } else {
                            echo "Nenhuma informação encontrada para o ID de usuário: $userId";
                        }
                    } 
                    else {
                        echo "Erro ao executar a consulta: " . $stmt1->error;
                    }

                    // Fechar o statement
                    $stmt1->close();
                } else {
                    echo "Erro ao preparar a declaração SQL para consulta à tabela tb_cliente: " . $mysqli->error;
                }
        // Fecha a conexão

            }else {
        echo "Usuário não autenticado.";
    }
}} 




