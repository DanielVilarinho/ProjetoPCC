<?php
    session_start();

    if(isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        include_once('conexao.php');
        $email= $_POST['email'];
        $senha= $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);
    }
        if(mysqli_num_rows($result)<1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: logint.html');
        }else{
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: index.php');
        }










/* 
        print_r('<br>');
        print_r('Senha: ' . $senha);
        print_r($result);*/


?>  


