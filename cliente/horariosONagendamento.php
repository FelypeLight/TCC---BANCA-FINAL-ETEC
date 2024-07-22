<?php

// Incluir arquivo de conexão com o banco de dados
include ('../conexao.php');

// Verificar se os dados foram recebidos via POST
if ( isset($_POST['status'])) {
    // Receber os dados do POST
    
    // $status = 'agendada';

    // Consulta SQL para selecionar todas as consultas marcadas em uma determinada data e com um status específico
    $query_consultas = "SELECT cons.hr_consulta, cons.dt_consulta, v.clinica_id, status FROM tb_consulta AS cons INNER JOIN tb_veterinario AS v ON cons.veterinario_id = v.id WHERE (status = 'agendada' OR status = 'remarcada') AND v.clinica_id = '14' AND cons.dt_consulta >= CURDATE()";
    $stmt_consultas = $mysqli->prepare($query_consultas);
    // $stmt_consultas->bind_param("s", $status);  
    $stmt_consultas->execute();
    $resultado_consultas = $stmt_consultas->get_result();

    // Gerar o HTML para exibir os horários
    $horarios_html = '';
    if ($resultado_consultas->num_rows > 0) {
        while ($row_consulta = $resultado_consultas->fetch_assoc()) {
            $dt_consulta = $row_consulta['dt_consulta'];
            $dataObjeto = new DateTime($dt_consulta);
            $dataFormatada = $dataObjeto->format('d/m/Y');
            $horarios_html .= '<tr><td>' . htmlspecialchars($row_consulta['status']) . '</td><td>' . htmlspecialchars($row_consulta['hr_consulta']) . '</td><td>' . $dataFormatada . '</td></tr>';
        }
    } else {
        $horarios_html = '<tr><td colspan="2">Não há horários disponíveis para este status e veterinário.</td></tr>';
    }

    // Fechar a declaração e a conexão
    $stmt_consultas->close();
    $mysqli->close();
    
    // Retornar o HTML gerado
    echo $horarios_html;
} else {
    // Caso os dados não sejam recebidos corretamente
    echo '<tr><td colspan="2">Erro ao receber os dados.</td></tr>';
}
?>
