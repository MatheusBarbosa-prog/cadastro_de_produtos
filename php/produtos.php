<?php 
    session_start();
    include_once('../phpconfig/configcadastro.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    //Se não existir email e senha retorna a página inicial de login    
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../view/login.html');
    }
    $logado = $_SESSION['email'];

    //Verificando se há o parâmetro "Search"
    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        //Pegando dados do formulário no banco de dados:
        $sql = "SELECT * FROM cadastro WHERE id LIKE '%$data%' or nome LIKE '%$data%' or codigo LIKE '%$data%'";
        //A pesquisa será feita pelo id, nome ou email e fará verificação se os mesmos estão iguais a variavéis, a porcentagem diz que qualquer letra pode ser pesquisada
    }
    else{
        $sql = "SELECT * FROM cadastro";
    }
    //Executando o select no banco de dados
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <title>Produtos</title>
    <link rel="stylesheet" href="../css/2style.css">
</head>
<body>
    <header>
        <h1>Projeto Web</h1>
        <h3>Bem-vindo <?php print_r($logado); ?>
        <a href="sair.php"><span class='material-symbols-outlined'>Logout</span></a>
        </h3>    
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="#">Informações</a>
        <a href="#">Dúvidas</a>
        <a href="cadastro.php">Cadastrar produtos</a>
        
    </nav>
    <main>
        <div class="search">
            <input type="search" class="searc-text"  placeholder="Pesquise por produto" name="pesquisar" id="pesquisar">
            <button onclick="searchData()"><span class="material-symbols-outlined">search</span></button>
        </div>
        <h2>Listas dos produtos em estoque</h2>
        <div id="tab">
            <table class="tabela">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Quant.</th>
                        <th scope="col">Local</th>
                        <th scope="col">Código</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //bloco que retorna uma matriz associativa
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";//Para cada registro será criado uma nova linha
                            echo "<td>".$user_data['id']."</td>";
                            echo "<td>".$user_data['nome']."</td>";
                            echo "<td>".$user_data['quant']."</td>";
                            echo "<td>".$user_data['localp']."</td>";
                            echo "<td>".$user_data['codigo']."</td>";
                            echo "<td>".$user_data['tipo']."</td>";
                            echo "<td>".$user_data['datar']."</td>";
                            echo "<td>
                                    <a class = 'ed' href='editar.php?id=$user_data[id]'>
                                    <span class='material-symbols-outlined'>Stylus</span>
                                    </a>
            
                                    <a class = 'del' href='../phpconfig/apagar.php?id=$user_data[id]'>
                                    <span class='material-symbols-outlined' >Delete</span>
                                    </a>
            
                                </td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>Site criado por Matheus Barbosa</p>
    </footer>
</body>
<script src="../javascript/pesquisar.js">    
</script>
</html>