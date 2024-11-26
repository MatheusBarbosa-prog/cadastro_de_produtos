<?php 

    if(!empty($_GET['id'])){

        include_once('../phpconfig/configcadastro.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM cadastro WHERE id=$id";

        $result = $conexao->query($sqlSelect);
        
        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
            
                $nome= $user_data['nome'];
                $quant = $user_data['quant'];
                $local = $user_data['localp'];
                $codigo = $user_data['codigo'];
                $tipo = $user_data['tipo'];
                $data = $user_data['datar'];
            }
        }
        else{
            header('Location:produtos.php');
        }
    }
    else {
        header('Location:produtos.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <header>
        <h1>Projeto Web</h1>
    </header>
    <nav>
        <a href="produtos.php">Home</a>
        <a href="#">Informações</a>
        <a href="#">Dúvidas</a>
        <a href="cadastro.php">Cadastrar produtos</a>
        <a href="produtos.php">Tabela</a>
    </nav>
    <main>
        <div class="campo">
            <form action="../phpconfig/salvaredit.php" method="post">
                <fieldset>
                    <legend>Informe os dados do produto que deseja editar</legend>
                    <div class="campo1">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" value="<?php echo $nome ?>" required>
                    </div>
                    <div class="campo2">
                        <label for="quant">Quant.</label>
                        <input type="number" name="quant" value="<?php echo $quant ?>" required>
                    </div>
                    <div class="campo1">
                        <label for="local">Local</label>
                        <input type="text" name="localp" value="<?php echo $local ?>" required>
                    </div>
                    <div class="campoc">
                        <label for="codigo">Código</label>
                        <input type="text" name="codigo" value="<?php echo $codigo ?>" required>
                    </div>
                    <div class="campotip">
                        <label for="tipo">Tipo</label>
                        <input type="text" name="tipo" value="<?php echo $tipo ?>" required>
                    </div>
                    <div class="campo3">
                        <label for="data">Data</label>
                        <input type="date" name="datar" value="<?php echo $data ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" value="Confirmar">
                    <input type="reset" value="Cancelar">
                </fieldset>
            </form>
        </div>
    </main>
</body>
</html>