<?php 
include("header.php");


$select3 = "SELECT cons.status, cons.hr_consulta, cons.dt_consulta, cons.ds_consulta, cons.ds_medicacao, cli.nm_responsavel, p.nm_animal, clini.nm_unidade, v.especialidade
FROM tb_consulta as cons
    INNER JOIN tb_cliente as cli ON cons.cliente_id = cli.id
        INNER JOIN tb_paciente as p ON cons.paciente_id = p.id
                INNER JOIN tb_veterinario as v ON cons.veterinario_id = v.id
                INNER JOIN tb_clinica as clini ON v.clinica_id = clini.id
                    WHERE v.clinica_id = $id AND cons.dt_consulta >= 'data_inicio' AND cons.dt_consulta <= 'data_final'
                    ;";

                             $resultado3 = $mysqli->query($select3);
                             if ($resultado3->num_rows > 0) {
                                 while ($dados3 = $resultado3->fetch_array()) {
                                     $dt_consulta = date("d/m/Y", strtotime($dados3['dt_consulta']));
                                     $status = $dados3['status'];
                                     $hr_consulta = $dados3['hr_consulta'];
                                     $ds_consulta = $dados3['ds_consulta'];
                                     // $tipo_exame = $dados3['tipo_exame'];
                                     $nm_responsavel = $dados3['nm_responsavel'];
                                     $nm_animal = $dados3['nm_animal'];
                                     $especialidade = $dados3['especialidade'];
                                     ?>
                                 <tr>
                                     <td><?php echo $dt_consulta; ?></td>
                                     <td><?php echo $hr_consulta; ?></td>
                                     <td><?php echo $nm_responsavel; ?></td>
                                     <td><?php echo $nm_animal; ?></td>
                                     <td><?php echo $especialidade; ?></td>
                                     <td><?php echo $ds_consulta; ?></td>
                                     <td><?php echo $status; ?></td>
                                 </tr>
                                 <?php
                                 }
                             } else {
                                 echo "<tr><td colspan='8'>Nenhuma consulta encontrada para hoje!</td></tr>";
                             }

?>