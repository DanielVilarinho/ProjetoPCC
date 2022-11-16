<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
include("conn.php");
include("conexao.php");
session_start();

$email = $_SESSION['email'];
$categoria= $_POST['categoria'];
$servico= $_POST['servico'];
$data= $_POST['data'];
$horario= $_POST['horario'];

$resultado = mysqli_query($conexao, "INSERT INTO agendamento(id_categoria,id_servico,data_m,horario,usuario_email) VALUES('$categoria','$servico','$data','$horario','$email')");




if (isset($_POST['agendar'])){
    $mail = new PHPMailer(true);

    $querys = $conn->prepare("SELECT nome_servico FROM servicos WHERE id_servico=:id_servico");
    $queryc = $conn->prepare("SELECT nome_categoria FROM categoria_servico WHERE id_categoria=:id_categoria");
    $queryn = $conn->prepare("SELECT nome, telefone FROM usuarios WHERE email=:email");

    $nm = ['email' => $email ];
    $cat = ['id_categoria' => $categoria];
    $serv = ['id_servico' => $servico];
   
    $queryn->execute($nm);
    $querys->execute($serv);
    $queryc->execute($cat);

    $registroserv = $querys->fetchAll(PDO::FETCH_ASSOC);
    $registroscat = $queryc->fetchAll(PDO::FETCH_ASSOC);
    $registrosnm = $queryn->fetchAll(PDO::FETCH_ASSOC);

    foreach($registroserv as $pserv){
        $pegarservico = $pserv['nome_servico'];}
    foreach($registroscat as $pcat ){
        $pegarcategoria = $pcat['nome_categoria'];}
    foreach($registrosnm as $pnm ){
        $pegarnome = $pnm['nome'];
        $pegartelefone = $pnm['telefone'];
    }

    try {

       // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //                     
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'lurdinhacabeleireira1@gmail.com';                     
        $mail->Password   = 'wyvmsiobsyfuirng';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                   
    
        //Recipients
        $mail->setFrom('lurdinhacabeleireira1@gmail.com', 'Lurdinha Cabeleireira');
        $mail->addAddress('lurdinhacabeleireira1@gmail.com', 'Lurdinha'); 
        //$mail->addAddress($email); //            
        $mail->addReplyTo('lurdinhacabeleireira1@gmail.com', 'Lurdinha');
        //$mail->addCC('cc@example.com');//
        //$mail->addBCC('bcc@example.com');//
    
        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');   //      //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //  //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Novo agendamento';
        
        
        $body = "Novo agendamento realizado:<br><br>
             <b>Nome do Cliente</b>: $pegarnome<br>
             <b>Email</b>: $email<br>
             <b>Telefone</b>: $pegartelefone<br>
             <b>Categoria do Serviço</b>: $pegarcategoria<br>
             <b>Tipo de Serviço</b>: $pegarservico<br>
             <b>Data</b>: $data<br>
             <b>Horario</b>: $horario";

        $mail->Body = $body;



        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';//
    
        $mail->send();
        echo 'Email com Sucesso';

        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}else {
        echo "deu merda";
    }

header('Location: agendamento_lista.php')
?>