<?php

if(!empty($_GET['id'])){
    include_once('conexao.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM agendamento
    WHERE id_agendamento=$id";

    $result = $conexao->query($sql);
    if($result->num_rows>0){
        $sqldeletar = "DELETE FROM agendamento WHERE id_agendamento = $id";
        $resultdeletar = $conexao->query($sqldeletar);

    }
}
header('Location: agendamento_lista.php');


















?>