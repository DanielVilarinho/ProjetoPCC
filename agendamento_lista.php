<?php

include_once('conn.php');
session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: logint.html');  
}
$log = $_SESSION['email'];

if($log == "lurdinha@adm.com"){
    $query = $conn->query("SELECT agendamento.id_agendamento, servicos.nome_servico, servicos.valor_servico,categoria_servico.nome_categoria ,agendamento.data_m, agendamento.horario, usuarios.email
FROM agendamento
INNER JOIN categoria_servico ON agendamento.id_categoria=categoria_servico.id_categoria
INNER JOIN servicos ON agendamento.id_servico=servicos.id_servico
INNER JOIN usuarios ON agendamento.usuario_email=usuarios.email
ORDER BY `agendamento`.`id_agendamento` ASC;");

    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}else{

$query = $conn->prepare("SELECT agendamento.id_agendamento, servicos.nome_servico, servicos.valor_servico,categoria_servico.nome_categoria ,agendamento.data_m, agendamento.horario
FROM agendamento
INNER JOIN categoria_servico ON agendamento.id_categoria=categoria_servico.id_categoria
INNER JOIN servicos ON agendamento.id_servico=servicos.id_servico
WHERE agendamento.usuario_email=:usuario_email
ORDER BY `agendamento`.`id_agendamento` ASC;");

$usme = ['usuario_email' => $log];
$query->execute($usme);
$result = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>




<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Salão da Lurdinha</title>
        <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link href="agendar.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="./assets/Lurdinha-OG.ico">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
       
    </head> 
<body >
    <header>
        <nav>
            <a id="linklogo" href="./index.html">
            <img id="logo" src="./assets/Lurdinha OG.png" alt="Logo Salão">
             </a>
            <div class="navbar">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="navlist">
                <li><a href="./produtos.php">Produtos</a></li>
                <li><a href="./servicos.html">Serviços</a></li>
                <li class="contscroll">Contato</li>
                <li><a href="./cadastro.html" id="ec">Entrar/Cadastrar</a></li>

            </ul>
        </nav>
    </header>  
    <main>
        <div>
            <?php

            if($log == "lurdinha@adm.com"){
            echo "<table class='tabela'>";

                echo "<thead>";
                    "<tr>";
}?>
                        <?php


                    if($log == "lurdinha@adm.com"){
                        echo "<h1 class='h1tb'>Agendamentos</h1>";
                        echo "<th scope='col'>id</th>";
                        echo "<th scope='col'>Email Cliente</th>";
                        echo "<th scope='col'>Categoria</th>";
                        echo "<th scope='col'>Serviço</th>";
                        echo "<th scope='col'>Data</th>";
                        echo "<th scope='col'>Horario</th>";
                        echo "<th scope='col'>Preço</th>";
                        echo "<th scope='col'>Situação</th>";
                        echo "<th scope='col'>Ações</th>";
                    }
                        ?>
                    </tr>

                </thead>
                <tbody>
                    <?php

                        if($log == "lurdinha@adm.com"){
                            foreach($result as $agendas){
                            echo "<tr>";
                            echo "<td>".$agendas['id_agendamento']."</td>";
                            echo "<td>".$agendas['email']."</td>";
                            echo "<td>".$agendas['nome_categoria']."</td>";
                            echo "<td>".$agendas['nome_servico']."</td>";
                            echo "<td>".$agendas['data_m']."</td>";
                            echo "<td>".$agendas['horario']."</td>";
                            echo "<td>"."R$ ".$agendas['valor_servico']."</td>";
                            echo "<td></td>";
                            echo "<td> <a class='btn_delete' href='agendar_delete.php?id=$agendas[id_agendamento]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='red' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>

                        </a></td>";
                            echo "</tr>";
                            }
                        }

                    ?>
                </tbody>
            </table>
            </div>

                        <div>



                    <?php
                        if($log != "lurdinha@adm.com"){
                            echo "<h1 class='h1tb'>Meus Agendamentos</h1>";
                            foreach($result as $agendas){

                            echo "<div class='agendacentro'>
                                    <div class='cardagenda'>
                                        <div class='textoagenda'>
                                        <p>Categoria: $agendas[nome_categoria]</p>
                                        <p>Serviço: $agendas[nome_servico]</p>
                                        <p>Agendado para: $agendas[data_m]</p>
                                        <p>Horario: $agendas[horario]</p>
                                        <p>Preco: R$ $agendas[valor_servico]</p>
                                        </div>    
                                        <div class='btnsagenda'>
                                            <div class='backed'>
                                                <div class='editagenda'>
                                                    <a class='btn_edit' href='agendar_edit.php?id=$agendas[id_agendamento]'>
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='white' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>

                <div class='backdel'>
                    <div class='deletagenda'>
                        <a class='btn_delete' href='agendar_delete.php?id=$agendas[id_agendamento]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='23' height='23' fill='white' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                    </div>
                </div>
             </div>
        </div>   
     </div>";

                            }}




     ?>
        </div>

        <footer>
        <div class="rodape-container">
            <div class="rodape">
                <div class="rodcoluna">
                    <h3>Horário de Funcionamento</h3>
                    <ul>
                        <li>Segunda a sábado: 9h às 19h</li>
                        <li>Domingo: 9h às 14h</li>
                    </ul>
                </div>

                <div class="rodcoluna">
                    <h3>Localização</h3>
                    <ul>
                        <li>Quadra 20 lote 16</li>
                        <li>Santo Antonio do descoberto - GO</li>
                    </ul>
                </div>
                <div class="rodcoluna">
                    <h3>Contatos</h3>
                    <ul>
                        <li id="contzap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="iconinsta" viewBox="0 0 24 24">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                              </svg>
                            <a href="https://web.whatsapp.com/send?phone=5561993753229" id="contlink" target="_blank">55+ (61) 993753229</a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="iconinsta" viewBox="0 0 24 24">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                              </svg>   
                            <a href="https://www.instagram.com/lurdinhacabeleira2/" id="contlink" target="_blank">@lurdinhacabeleira2</a>                       
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="iconinsta" viewBox="0 0 24 24">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                              </svg> 
                            <a href="https://www.facebook.com/lurdinha.maravilha.7" id="contlink" target="_blank">lurdinha.maravilha.7</a>                           
                        </li>
                    </ul>
                </div>
        <div class="rodtext">© 2022. Lurdinha Cabeleireira | Todos os direitos reservados. Site desenvolvido por alunos de graduação em Ciência da Computação</div>
    </footer>
        <script src="./mobile.js"> </script>
        <script src="./agendar.js"> </script>
</body>

</html>
            