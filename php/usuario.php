<?php 
    include_once('../phpconfig/configcadastro.php');

    $sql = "SELECT * FROM cadastro";
    
    $result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../css/usuariostyle.css">
</head>
<body>
    <header>
        <h1>Projeto web</h1>
    </header>
    <main>
        <h2>Lista de produtos</h2>
        <div id="tab">
            <table class="tabela">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Quant.</th>
                        <th scope="col">Local</th>
                        <th scope="col">Código</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$user_data['nome']."</td>";
                            echo "<td>".$user_data['quant']."</td>";
                            echo "<td>".$user_data['localp']."</td>";
                            echo "<td>".$user_data['codigo']."</td>";
                            echo "<td>".$user_data['tipo']."</td>";
                            echo "<td>".$user_data['datar']."</td>";
                            echo "</tr>";
                        }                   
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>