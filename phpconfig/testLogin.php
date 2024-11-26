<?php 
//2º parte testando se há dados no banco
    
    session_start();//Sempre que trabalha com sessões é necessario iniciar session_start
    
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
//O if diz que para tal verificação é necessário ter um botao submit, variaveis email e senha
        
        include_once('configlogin.php');//inclusão da conexão com banco de dados
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //print_r('Email: ' . $email);
        //print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
// Aqui ele fará a consulta no banco de dados e verificará se a variavel email e/ou senha estão iguais
        
        $result = $conexao->query($sql);
        /*print_r($result); Irá mostrar a linha que esta os parâmetros*/

        if(mysqli_num_rows($result) < 1){
            //Mostrará se a senha e email existe ou não; if: se não existir e else: se existir
            unset($_SESSION['email']);
            unset($_SESSION['senha']);//Caso não exista ele destrói as variaveis inexistentes
            echo "<script>alert('Email e/ou senha incorreto(s)');</script>";
            echo "<script>location.href='../view/login.html';</script>";
        }
        else {
            $_SESSION['email'] = $email;//Cria duas variaveis pela session email e senha
            $_SESSION['senha'] = $senha;
            header('Location: ../php/produtos.php');
        }
    }
    else {
        
        header('Location: ../view/login.html');
    }

?>