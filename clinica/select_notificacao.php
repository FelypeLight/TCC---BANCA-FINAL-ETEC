<?php

// include('header'); 
                                			$sql = $mysqli->prepare("SELECT * FROM notifications WHERE clinica_id = $id ORDER BY id DESC");
                                            $sql->execute();
                                            $get = $sql->get_result();
                                            $total = $get->num_rows;
                                
                                            if($total > 0){
												$contador = 0 ;
                                                while($dados = $get->fetch_array()){

                                                    $notificacao = $dados['notificacao'];
                                                    $status = $dados['status'];
                                                    $data=$dados['data'];
                                                    $dataObjeto = new DateTime($data);
                                                    $dataFormatada = $dataObjeto->format('d/m/Y');
                                                    switch($dados['status']){
                                                        case 0:
                                                            $status = "Não lido";
                                                            $contador++;
                                                        break;
                                
                                                        case 1:
                                                            $status = "Lido";
                                                            $contador = 0;
                                                        break;
                                
                                                    }
													 //
                                                    $card = 
													"  <a class='dropdown-item d-flex align-items-center' href=#'>
                                                    <div class='mr-3'>
                                                        <div class='icon-circle bg-primary'>
                                                            <i class='fas fa-file-alt text-white'></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class='small text-gray-500'>$dataFormatada</div>
                                                        <span class='font-weight-bold'>  $notificacao</span>
                                                    </div>
                                                </a>";
                                                echo $card;

                                                    // echo "<li>{$notificacao} | {$status}</li>";
                                                }
                                            }
$contador= $contador++;


                                ?>