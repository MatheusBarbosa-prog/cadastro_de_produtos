<?php 
//2ª parte inclui a configuração com o banco de dados, verifica se existe um botão do tipo submit através do isset, se existir recebe o nome e aloca em suas variavéis e o result faz a conexão entre config e as variaveis e salva no banco de dados
    include_once('../phpconfig/configcadastro.php');

    if(isset($_POST['submit'])){
        $nome= $_POST['nome'];
        $quant = $_POST['quant'];
        $local = $_POST['localp'];
        $codigo = $_POST['codigo'];
        $tipo = $_POST['tipo'];
        $data = $_POST['datar'];

        $result = mysqli_query($conexao, "INSERT INTO cadastro(nome, quant, localp, codigo ,tipo , datar) VALUES ('$nome', '$quant', '$local', '$codigo', '$tipo', '$data')");

        header('Location: ../view/cadastrook.html');
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
        <a href="produtos.php">Tabela</a>
    </nav>
    <main>
        <div class="campo">
            <form action="cadastro.php" method="post" id="form">
                <fieldset>
                    <legend>Informe os dados do produto que deseja cadastrar</legend>
                    <div class="campo1">
                        <label for="nome">Nome</label>
                        <input type="text" class="required" name="nome" oninput="nomeValidate()" required>
                        <span class="s-required">*O nome do produto deve conter + de 4 caracteres</span>
                    </div>
                    <div class="campo2">
                        <label for="quant">Quant.</label>
                        <input type="number" name="quant" required>
                    </div>
                    <div class="campo1">
                        <label for="local">Local</label>
                        <input type="text" class="required" name="localp" oninput="localValidate()" required>
                        <span class="s-required">*Lembrete: Digite o local correto</span>
                    </div>
                    <div class="campoc">
                        <label for="codigo">Código</label>
                        <input type="text" class="required" name="codigo" oninput="codValidate()" required>
                        <span class="s-required">*Padrão: VG#FR3</span>
                    </div>
                    <div class="campotip">
                        <label for="tipo">Tipo</label>
                        <input type="text" class="required" name="tipo" oninput="tipoValidate()" required>
                        <span class="s-required">O tipo deve conter + de 3 caracteres</span>
                    </div>
                    <div class="campo3">
                        <label for="data">Data</label>
                        <input type="date" name="datar" required>
                    </div>
                    <input type="submit" name="submit" value="Cadastrar">
                    <input type="reset" value="Cancelar">
                </fieldset>
            </form>
        </div>
    </main>
</body>
<script src="../javascript/funçoes.js">
</script>
</html>