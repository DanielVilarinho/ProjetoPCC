<?php

    session_start();
    if((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)){
        $log = $_SESSION['email'];
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
                    <?php

                    if((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)){
                        include_once('conn.php');

                        $query = $conn->prepare("SELECT LEFT(usuarios.nome, POSITION(' ' IN usuarios.nome) - 1) as nome
                         FROM usuarios 
                         WHERE usuarios.email=:usuario_email");
                        $usme = ['usuario_email' => $log];  
                        $query->execute($usme);
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
                        foreach($result as $user){
                        echo "<li class='optlog'><a class='usernome'><figure id='blocoAvatarUsuario' class='sc-eVspGN exeuon'><img src='./assets/Lurdinha-OG.ico' alt='Ninja'></figure>Olá,$user[nome]</a>
                        <ul class='submenu'>
    
                        <li><a class='colorsuba' href='./agendamento_lista.php'>Agendamemtos</a></li>
                        <li><span>| </span></li>
                        <li><a class='colorsubb'href='botaosair.php'>Sair</a></li>
                        </ul>
                    </li> ";  
                    }       
                        
                    }else{
                        echo "<li><a href='./logint.html' id='ec'>Entrar/Cadastrar</a></li>";
                       

                    }
                    ?>

                </ul>
            </nav>
        </header>

        <main>
            <section class="produtos">
                <div class="cards-prod">
                    <div class="prodbox">
                        <img id="imgprod" src="https://images.pexels.com/photos/13875783/pexels-photo-13875783.jpeg?cs=srgb&dl=pexels-k%C3%BCbra-arslaner-13875783.jpg&fm=jpg&_gl=1*1s6xl13*_ga*MTI1NDc1NjQ4Ni4xNjY3NTE3MzM3*_ga_8JE65Q40S6*MTY2NzgzMjIxMS4xMC4xLjE2Njc4MzMyNDIuMC4wLjA." alt="">
                        <p class="descprod">Perfumes O Boticário, Natura, só as melhores marcas para você.</p>
                        <p class="valorprod">Por: <span>R$ 50,00</span></p>
                        <a href="https://www.youtube.com/"> <button class="prodbtn">Fazer pedido</button> </a>
                    </div>
                    <div class="prodbox">
                        <img id="imgprod" src="https://images.pexels.com/photos/208052/pexels-photo-208052.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                        <p class="descprod">Maquiagem das melhores marcas e com os melhores preços.</p>
                        <p class="valorprod">Por: <span>R$ 20,00</span></p>
                        <a href="https://www.youtube.com/"> <button class="prodbtn">Fazer pedido</button> </a>
                    </div>
                    <div class="prodbox">
                        <img id="imgprod" src="https://images.pexels.com/photos/3965545/pexels-photo-3965545.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">

                        <p class="descprod">Últimas tendências em roupas femininas<br><br></p>

                        <p class="descprod">Últimas tendências em roupas femininas.<br><br></p>

                        <p class="valorprod">Por: <span>R$ 20,00</span></p>
                        <a href="https://www.youtube.com/"> <button class="prodbtn">Fazer pedido</button> </a>
                    </div> 

                    <div class="prodbox">
                        <img id="imgprod" src="https://images.pexels.com/photos/13875783/pexels-photo-13875783.jpeg?cs=srgb&dl=pexels-k%C3%BCbra-arslaner-13875783.jpg&fm=jpg&_gl=1*1s6xl13*_ga*MTI1NDc1NjQ4Ni4xNjY3NTE3MzM3*_ga_8JE65Q40S6*MTY2NzgzMjIxMS4xMC4xLjE2Njc4MzMyNDIuMC4wLjA." alt="">
                        <p class="descprod">Perfumes O Boticário, Natura, só as melhores marcas para você.</p>
                        <p class="valorprod">Por: <span>R$ 50,00</span></p>
                        <a href="https://www.youtube.com/"> <button class="prodbtn">Fazer pedido</button> </a>
                    </div>
                    <div class="prodbox">
                        <img id="imgprod" src="https://images.pexels.com/photos/208052/pexels-photo-208052.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                        <p class="descprod">Maquiagem das melhores marcas e com os melhores preços.</p>
                        <p class="valorprod">Por: <span>R$ 20,00</span></p>
                        <a href="https://www.youtube.com/"> <button class="prodbtn">Fazer pedido</button> </a>
                    </div>
                    <div class="prodbox">
                        <img id="imgprod" src="https://images.pexels.com/photos/3965545/pexels-photo-3965545.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                        <p class="descprod">Últimas tendências em roupas femininas.<br><br></p>
                        <p class="valorprod">Por: <span>R$ 20,00</span></p>
                        <a href="https://www.youtube.com/"> <button class="prodbtn">Fazer pedido</button> </a>
                    </div> 
                </div>

            </section>
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
</body>

</html>
        