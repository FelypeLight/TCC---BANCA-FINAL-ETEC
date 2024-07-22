<?php
include 'header.php';
require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

date_default_timezone_set('America/Sao_Paulo');
$dateTime = date('d/m/Y');
$dateHora = date('H:i');



$html = "<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='UTF-8'>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
<title>Lif4Pets - PDF</title>
<style>
    body { font-family: DejaVu Sans, sans-serif; }
    .header { display: flex; justify-content: space-between; align-items: center; }
    .header img { max-width: 150px; }
    h1 { text-align: center; }
    table { width: 100%; margin-top: 20px; border-collapse: collapse; }
    th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
    th { background-color: #f2f2f2; }
    td { word-wrap: break-word; overflow-wrap: break-word; }
    th, td { font-size: 12px; } /* Ajuste o tamanho da fonte conforme necessário */
    .table-responsive { overflow-x: auto; }
    /* Remova a largura fixa */
</style>

</head>
<body>
<div class='header'>
    <img src='http://localhost/TccVeterinario8.5/imgUser/LogoSFundo.jpg' alt='Logo'>
    <img src='http://localhost/TccVeterinario8.5/clinica/{$imagem}' style='float: right  ; width:100px;' alt='Logo'>
    
</div>
<div class='container-fluid'>
    <div class='card shadow mb-4  mt-4'>
        <div class='card-header '>
            <h3 class='m-0 font-weight-bold text-center'>Agendamentos</h3>
        </div>";





if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verifica se as datas foram enviadas através do método POST
    if (isset($_GET['data_inicio']) && isset($_GET['data_final'])) {
        $data_inicio1 = $_GET['data_inicio'];
        $data_final1 = $_GET['data_final'];
        $data_inicio = date("d/m/Y", strtotime($data_inicio1));
        $data_final = date("d/m/Y", strtotime($data_final1));
        $html .= "<div style='display: flex; justify-content: space-between;'>"; // Container flexível para alinhar os elementos na mesma linha
        $html .= "<div><p style='margin-top: 20px; margin-bottom: 20px; margin-left: 20px;'><strong>Nome da Unidade:</strong> {$nm_unidade}</p></div>"; // Nome da unidade à esquerda
        $html .= "<div style='text-align: right; margin-right: 20px;'><strong>Data:</strong> {$dateTime}</div>"; // Hora
        $html .= "<div style='text-align: right; margin-right: 20px;'><strong>Hora:</strong> {$dateHora}</div>"; // Hora
        $html .= "<div>"; // Container para a data e hora à direita

        
        $html .= "<div style='text-align: center; margin-left: 20px;'><strong>Periodo:</strong></div>";
        $html .= "<div style='text-align: center  ; margin-left: 20px;'><strong>Início:  </strong>{$data_inicio} <strong>Final:  </strong>{$data_final} </div>";
    
        $html .= "</div>"; // Fim do container para a data e hora
        $html .= "</div>"; // Fim do container flexível
$html .= "<div class='card-body'>
            <div class='table-responsive'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Data da Consulta</th>
                            <th>Horário da Consulta</th>
                            <th>Tutor</th>
                            <th>Paciente</th>
                            <th>Especialidade</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Protocolo</th>
                        </tr>
                    </thead>
                    <tbody>";



        $select3 = "SELECT cons.status, cons.hr_consulta, cons.dt_consulta, cons.ds_consulta, cons.ds_medicacao, cli.nm_responsavel, p.nm_animal, clini.nm_unidade, v.especialidade, cons.protocolo
FROM tb_consulta as cons
INNER JOIN tb_cliente as cli ON cons.cliente_id = cli.id
INNER JOIN tb_paciente as p ON cons.paciente_id = p.id
INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
INNER JOIN tb_clinica as clini ON v.clinica_id = clini.id
WHERE v.clinica_id = '$id' AND cons.dt_consulta >= '$data_inicio1' AND cons.dt_consulta <= '$data_final1'
;";

        $resultado3 = $mysqli->query($select3);
        if ($resultado3->num_rows > 0) {
            while ($dados3 = $resultado3->fetch_array()) {
                $html .= "<tr>
                    <td>" . date("d/m/Y", strtotime($dados3['dt_consulta'])) . "</td>
                    <td>" . $dados3['hr_consulta'] . "</td>
                    <td>" . $dados3['nm_responsavel'] . "</td>
                    <td>" . $dados3['nm_animal'] . "</td>
                    <td>" . $dados3['especialidade'] . "</td>
                    <td>" . $dados3['ds_consulta'] . "</td>
                    <td>" . $dados3['status'] . "</td>
                    <td>" . $dados3['protocolo'] . "</td>
                  </tr>";

            }
            
        } else {
            $html .= "<tr><td colspan='8'>Nenhuma consulta encontrada neste intervalo de tempo!</td></tr>";
        }


    } else {
        $html .= "<h2>Nenhuma data selecionada. Por favor, preencha o formulário.</h2>";
    }
}
$html .= "</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>";



//  // Caminho onde deseja salvar o PDF
//  $file_path = './pdfs/Agendamentos.pdf';

//  // Salva o PDF no sistema de arquivos
//  file_put_contents($file_path, $dompdf->output());

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape'); // Tente usar paisagem se o retrato não for suficiente
$dompdf->render();
$dompdf->stream("Agendamentos.pdf", ["Attachment" => 0]);


