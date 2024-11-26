<?php 
//Conexão com o banco de dados
    $dbHost = 'Localhost:4306';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'loginteste';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    /*if($conexao->connect_errno){
        echo "Erro";
    }else{
        echo "Conexão efetuada";
    }*/


?>