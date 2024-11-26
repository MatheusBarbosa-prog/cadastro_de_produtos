<?php 
    include_once('configcadastro.php');

    if(isset($_POST['update'])){
        
        $id = $_POST['id'];
        $nome= $_POST['nome'];
        $quant = $_POST['quant'];
        $local = $_POST['localp'];
        $codigo = $_POST['codigo'];
        $tipo = $_POST['tipo'];
        $data = $_POST['datar'];

        $sqlUpdate = "UPDATE cadastro SET nome='$nome', quant='$quant', localp='$local', codigo='$codigo', tipo='$tipo', datar='$data' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    
    header('Location: ../php/produtos.php');


?>