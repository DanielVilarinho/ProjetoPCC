<?php

    include("conexao.php");

    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $telefone= $_POST['telefone'];
    $senha= $_POST['senha'];    


    $sql = "SELECT * FROM usuarios WHERE email = '$email' ";

    $resultado = $conexao->query($sql);

    if(mysqli_num_rows($resultado)<1){
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,senha) VALUES('$nome','$email','$telefone','$senha')");
        header('Location: logint.html');
    }else{
        header('Location: cadastrot.php');
    }


?>
