<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "", "autopeca");


    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }


    $nome = $_POST['nome'];
    $fornecedor = $_POST['fornecedor'];
    $valor_compra = $_POST['valor_compra'];
    $valor_venda = $_POST['valor_venda'];
    $qtd = $_POST['qtd'];



    $sql = "INSERT INTO peca (nome, fornecedor, valor_compra, valor_venda, qtd) VALUES ('$nome', '$fornecedor', '$valor_compra', '$valor_venda', '$qtd')";

    if ($conn->query($sql) === TRUE) {
        echo "Peça cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar a peça: " . $conn->error;
    }


    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Peças</title>
    <link rel="stylesheet" href="_css/cadastro.css">
</head>
<body>
    <a href="index.php">Voltar</a>
    <div class="container mt-5">
        <h2>Cadastro de Peças</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="login-page">
  <div class="form">
    <form class="register-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="text" placeholder="Nome da Peça" name="nome" required/>
      <input type="text" placeholder="Fornecedor" name="fornecedor" required/>
      <input type="number" placeholder="Valor de Compra" name="valor_compra" step="0.01" required/>
      <input type="number" placeholder="Quantidade" name="qtd" step="0.01" required/>
      <input type="number" placeholder="Valor de Venda" name="valor_venda" step="0.01" required/>
      <button type="submit">Cadastrar</button>
    </form>
  </div>
</div>

        </form>
    </div>
</body>
</html>
