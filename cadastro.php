<?php

    include("conexao.php");

    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $telefone= $_POST['telefone'];
    $senha= $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,senha) VALUES('$nome','$email','$telefone','$senha')");
    header('Location: login.html');

?>
a