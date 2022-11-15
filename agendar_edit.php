<?php

include_once('conn.php');
include_once('conexao.php');
session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: logint.html');  
}
$log = $_SESSION['email'];

if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT *,categoria_servico.nome_categoria,servicos.nome_servico FROM agendamento 
    INNER JOIN categoria_servico ON agendamento.id_categoria=categoria_servico.id_categoria
    INNER JOIN servicos ON agendamento.id_servico=servicos.id_servico
    WHERE id_agendamento=$id";

    $result = $conexao->query($sql);

    if($result->num_rows>0){

        while($resagen = mysqli_fetch_assoc($result)){
            $nome_servico = $resagen['nome_servico'];
            $nome_categoria = $resagen['nome_categoria'];
            $id_categoria = $resagen['id_categoria'];
            $id_agendamento = $resagen['id_agendamento'];
            $id_servico = $resagen['id_servico'];
            $data_m = $resagen['data_m'];
            $horario = $resagen['horario'];
            $usuario_email = $resagen['usuario_email'];
    }}else{
        header('Location: agendamento_lista.php');
    }
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
            <form action="agendar_editsave.php" method="POST">
            <div class="centro">
            <div class="topo">
            <H1>Agendar Serviço</H1>
            <label class="lbtesterc" for="tester">Categoria</label>
            <select id="categoria" name="categoria" class="tester" required>
            <option value="1"
                <?php 
                    if($id_categoria == 1)
                    {
                        echo "selected";
                    }
                ?>>Designer de sobrancelha</option>

            <option value="2"
                <?php 
                    if($id_categoria == 2)
                    {
                        echo "selected";
                    }
                ?>>Manicure</option>

            <option value="3"
                <?php 
                    if($id_categoria == 3)
                    {
                        echo "selected";
                    }
                ?>>Cabelo</option>

            <option value="4"
                <?php 
                    if($id_categoria == 4)
                    {
                        echo "selected";
                    }
                ?>>Maquiagem</option>

           </select>

           <label class="lbtesters" for="tester">Serviço</label>

           <select id="servico" name="servico" class="tester" required>
            <option value=""><?php echo $nome_servico ?></option>
           </select>
           
           <label class="lbtesterd" for="tester">Data</label>
           <input type="date" id="testerdata" name="data" class="tester" value="<?php echo $data_m ?>" required>

           <label class="lbtesterh" for="tester">Horario</label>
           <input type="time" id="testerhora" name="horario" class="tester" value="<?php echo $horario ?>" required>
            
           <input type="hidden" name="id" value="<?php echo $id ?>">
           <input type="submit" value="Editar" name="editar" class="btnagendar"></input>
           </div>
        </div>
        </form>
        </main>

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