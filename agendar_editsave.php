<?php
include('conexao.php');

if(isset($_POST['editar'])){
    $id_agendamento = $_POST['id'];
    $id_categoria= $_POST['categoria'];
    $id_servico= $_POST['servico'];
    $data= $_POST['data'];
    $horario= $_POST['horario'];

    $sqlrdit = "UPDATE agendamento
     SET id_categoria = '$id_categoria', id_servico = '$id_servico', data_m = '$data', horario = '$horario'
     WHERE id_agendamento = '$id_agendamento'";
     $result = $conexao->query($sqlrdit);

}
header('Location: agendamento_lista.php')
















?>