<?php 
//1º passo para ligar ao banco de dados
    $dbHost = 'localhost:4306';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'loginteste';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    /*if($conexao->connect_errno){ teste para saber se conectou
        echo "Erro";
    }
    else {
        echo "Conexão feita com sucesso";
    }*/

?>