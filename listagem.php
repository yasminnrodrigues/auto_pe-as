<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Peças</title>
    <link rel="stylesheet" href="_css/listagem.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <a class= "voltar" href="index.php">Voltar</a>
    <div class="container mt-5">
        <h2>Listagem de Peças</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome da Peça</th>
                    <th>Fornecedor</th>
                    <th>Quantidade</th>
                    <th>Valor de Compra</th>
                    <th>Valor de Venda</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $conn = new mysqli("localhost", "root", "", "autopeca");
                
               
                $sql = "SELECT nome, fornecedor, valor_compra, valor_venda, qtd FROM peca";
                $result = $conn->query($sql);

                
                if ($result->num_rows > 0) {
                   
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["fornecedor"] . "</td>";
                        echo "<td>" . number_format($row["qtd"], 2, ',', '.') . "</td>";
                        echo "<td>R$ " . number_format($row["valor_compra"], 2, ',', '.') . "</td>";
                        echo "<td>R$ " . number_format($row["valor_venda"], 2, ',', '.') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhuma peça cadastrada.</td></tr>";
                }
                
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
