<?php

if(!empty($_GET['id'])){
    session_start();
    include_once('conexao.php');
    $email = $_SESSION['email'];
    $id = $_GET['id'];

    if($email == "lurdinha@adm.com"){
    $sql = "SELECT * FROM agendamento
    WHERE id_agendamento=$id";
    }else{
        $sql = "SELECT * FROM agendamento
        WHERE id_agendamento=$id and usuario_email='$email'";  
    }

    $result = $conexao->query($sql);
    if($result->num_rows>0){
        $sqldeletar = "DELETE FROM agendamento WHERE id_agendamento = $id";
        $resultdeletar = $conexao->query($sqldeletar);

    }
}
header('Location: agendamento_lista.php');


















?>