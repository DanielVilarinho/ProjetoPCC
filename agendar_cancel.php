<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['confirmar'] ) || isset($_POST['sim'])){
    include('conexao.php');
    include('conn.php');

    session_start();
    $email = $_SESSION['email'];
    $id_agendamento = $_POST['id'];
    $motivo = $_POST['motivo'];

    if($email == "lurdinha@adm.com"){
    $sql = "SELECT *,categoria_servico.nome_categoria,servicos.nome_servico FROM agendamento 
    INNER JOIN categoria_servico ON agendamento.id_categoria=categoria_servico.id_categoria
    INNER JOIN servicos ON agendamento.id_servico=servicos.id_servico
    WHERE id_agendamento=$id_agendamento";
    
    $result = $conexao->query($sql);

        if($result->num_rows>0){
            $sqlcancel = "UPDATE agendamento
             SET status_ag='Cancelado'
             WHERE id_agendamento = $id_agendamento";
            $resultcancel = $conexao->query($sqlcancel);
    
            $sqlmail = "SELECT *,categoria_servico.nome_categoria,servicos.nome_servico FROM agendamento 
            INNER JOIN categoria_servico ON agendamento.id_categoria=categoria_servico.id_categoria
            INNER JOIN servicos ON agendamento.id_servico=servicos.id_servico
            WHERE id_agendamento=$id_agendamento";
    
            $resultmail = $conexao->query($sqlmail);
    
            while($resmail= mysqli_fetch_assoc($resultmail)){
                $nome_servico = $resmail['nome_servico'];
                $nome_categoria = $resmail['nome_categoria'];
                $id_categoria = $resmail['id_categoria'];
                $id_agendamento = $resmail['id_agendamento'];
                $id_servico = $resmail['id_servico'];
                $data_m = $resmail['data_m'];
                $horario = $resmail['horario'];
                $usuario_email = $resmail['usuario_email'];
        }
    
    
            $mail = new PHPMailer(true);
    
            try {
    
                 $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   
                 $mail->isSMTP();                                            
                 $mail->Host       = 'smtp.gmail.com';                     
                 $mail->SMTPAuth   = true;                                   
                 $mail->Username   = 'lurdinhacabeleireira1@gmail.com';                     
                 $mail->Password   = 'wyvmsiobsyfuirng';                               
                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                 $mail->Port       = 465;                                   
             
    
                 $mail->setFrom('lurdinhacabeleireira1@gmail.com', 'Lurdinha Cabeleireira');
                 $mail->addAddress('lurdinhacabeleireira1@gmail.com', 'Lurdinha'); 
          
                 $mail->addReplyTo('lurdinhacabeleireira1@gmail.com', 'Lurdinha');
    
             
                 //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');   //      //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //  //Optional name
             
                 //Content
                 $mail->isHTML(true);                                  //Set email format to HTML
                 $mail->Subject = 'Agendamento Cancelado';
                 
                 
                 $body = "Você teve um agendamento cancelado:<br><br>
                      <b>Categoria</b>: $nome_categoria<br>
                      <b>Tipo de Serviço</b>: $nome_servico<br>
                      <b>Data</b>: $data_m<br>
                      <b>Horario</b>: $horario<br>
                      <b>Motivo do Cancelameto</b>: $motivo<br><br>
                      Para visualizar os seu agendamentos <a href='http://localhost/ProjetoPcc/agendamento_lista.php' target='_blank'>Clique aqui</a>.";
         
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
    }else{
        $sql = "SELECT * FROM agendamento
        WHERE id_agendamento=$id_agendamento and usuario_email='$email'";  

        $result = $conexao->query($sql);

        if($result->num_rows>0){
            $sqlcancel = "UPDATE agendamento
            SET status_ag='Cancelado'
            WHERE id_agendamento = $id_agendamento";
           $resultcancel = $conexao->query($sqlcancel);
        }
    }}


header('Location: agendamento_lista.php');


















?>