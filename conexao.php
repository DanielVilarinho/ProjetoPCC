<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'pcc-cadastro';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    /*if($conexao->connect_errno){
        echo "Erro";
        header('Location: cadastro.html');
    } else{
        echo "Usuario Cadastrado";

    }*/



?>



a