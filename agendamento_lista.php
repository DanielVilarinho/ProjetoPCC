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

            <table class="tabela">

                <thead>
                    <tr>
                        <?php


                    if($log == "lurdinha@adm.com"){
                        echo "<th scope='col'>id</th>";
                        echo "<th scope='col'>Email Cliente</th>";
                        echo "<th scope='col'>Categoria</th>";
                        echo "<th scope='col'>Serviço</th>";
                        echo "<th scope='col'>Data</th>";
                        echo "<th scope='col'>Horario</th>";
                        echo "<th scope='col'>Preço</th>";
                        echo "<th scope='col'>Situação</th>";
                        echo "<th scope='col'>Ações</th>";
                    }else{

                        echo "<th scope='col'>id</th>";
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
                        }else{
                        foreach($result as $agendas){
                            echo "<tr>";
                            echo "<td>".$agendas['id_agendamento']."</td>";
                            echo "<td>".$agendas['nome_categoria']."</td>";
                            echo "<td>".$agendas['nome_servico']."</td>";
                            echo "<td>".$agendas['data_m']."</td>";
                            echo "<td>".$agendas['horario']."</td>";
                            echo "<td>"."R$ ".$agendas['valor_servico']."</td>";
                            echo "<td></td>";
                            echo "<td>
                            <a class='btn_edit' href='agendar_edit.php?id=$agendas[id_agendamento]'>
                                 <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='blue' class='bi bi-pencil' viewBox='0 0 16 16'>
                                     <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                 </svg>
                            </a>

                            <a class='btn_delete' href='agendar_delete.php?id=$agendas[id_agendamento]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='red' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>

                            </a>
                            </td>";
                            echo "</tr>";

                        }}

                    ?>



                </tbody>





            </table>








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
                                <a href="https://web.whatsapp.com/send?phone=5561993753229" id="contlink" target="_blank">55+ (61) 993753229</a>
                               
                            </li>
                            <li>
                                <a href="https://www.instagram.com/lurdinhacabeleira2/" id="contlink" target="_blank">@lurdinhacabeleira2</a>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg" class="iconinsta"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12zm2.91-17.86c-.76-.035-.988-.043-2.91-.043-1.922 0-2.15.008-2.91.042-.701.032-1.083.15-1.336.248a2.23 2.23 0 00-.828.539 2.23 2.23 0 00-.539.828c-.098.253-.216.635-.248 1.337-.034.759-.042.987-.042 2.909 0 1.922.008 2.15.042 2.91.032.701.15 1.083.248 1.336.13.336.287.576.539.828.252.252.492.408.828.539.253.098.635.216 1.337.248.759.034.986.042 2.909.042 1.923 0 2.15-.008 2.91-.042.701-.032 1.083-.15 1.336-.248.336-.13.576-.287.828-.539a2.23 2.23 0 00.539-.828c.098-.253.216-.635.248-1.337.034-.759.042-.987.042-2.909 0-1.922-.008-2.15-.042-2.91-.032-.701-.15-1.083-.248-1.336a2.23 2.23 0 00-.539-.828 2.231 2.231 0 00-.828-.539c-.253-.098-.635-.216-1.337-.248zM9.03 4.842C9.8 4.808 10.045 4.8 12 4.8c1.955 0 2.2.008 2.969.043.766.035 1.29.157 1.747.335.474.184.875.43 1.276.83.4.4.646.802.83 1.276.178.458.3.981.335 1.747.035.768.043 1.014.043 2.969 0 1.955-.008 2.2-.043 2.969-.035.766-.157 1.29-.335 1.747a3.53 3.53 0 01-.83 1.275c-.4.4-.802.647-1.276.831-.458.178-.981.3-1.747.335-.768.035-1.014.043-2.969.043-1.955 0-2.2-.008-2.969-.043-.766-.035-1.29-.157-1.747-.335a3.53 3.53 0 01-1.276-.83c-.4-.4-.646-.802-.83-1.276-.178-.458-.3-.981-.335-1.748C4.808 14.202 4.8 13.956 4.8 12s.008-2.2.043-2.969c.035-.766.157-1.29.335-1.747.184-.474.43-.875.83-1.276.4-.4.802-.646 1.276-.83.458-.178.981-.3 1.747-.335zm2.972 3.463a3.697 3.697 0 100 7.395 3.697 3.697 0 000-7.395zm0 6.097a2.4 2.4 0 110-4.8 2.4 2.4 0 010 4.8zm3.843-5.381a.864.864 0 100-1.728.864.864 0 000 1.728z" fill="#fff"></path></svg> 
                            </li>

                            <li>
                                <a href="https://www.facebook.com/lurdinha.maravilha.7" id="contlink" target="_blank">@lurdinhacabeleira2</a>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="https://www.w3.org/2000/svg" class="iconinsta"><<path fill-rule="evenodd" clip-rule="evenodd" d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12zm1.992-16.356c.318 0 .823.056 1.197.13l.336-2.112c-.729-.15-1.29-.262-2.056-.262-2.207 0-3.085 1.047-3.085 2.917v1.365H9v2.206h1.384V18.6h2.692v-6.712h1.963l.187-2.206h-2.15V8.616c0-.598.056-.972.916-.972z" fill="#fff"></path></svg> 
                            </li>

                        </ul>

            </div>
            <div class="rodtext">© 2022. Lurdinha Cabeleireira | Todos os direitos reservados. Site desenvolvido por alunos de graduação em Ciência da Computação</div>
        </footer>
        <script src="./mobile.js"> </script>
        <script src="./agendar.js"> </script>
</body>

</html>
            