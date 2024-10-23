<?php
// index.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos (nome, preco, quantidade) VALUES ('$nome', '$preco', '$quantidade')";
    if (mysqli_query($conn, $sql)) {
        echo "Produto adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar produto: " . mysqli_error($conn);
    }
}

$result = mysqli_query($conn, "SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Adicionar Produto</h1>
    <form method="post" action="index.php">
        Nome: <input type="text" name="nome"><br>
        Preço: <input type="text" name="preco"><br>
        Quantidade: <input type="text" name="quantidade"><br>
        <input type="submit" value="Adicionar">
    </form>

    <h1>Produtos</h1>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($produto = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $produto['nome'] . "</td>";
                echo "<td>" . $produto['preco'] . "</td>";
                echo "<td>" . $produto['quantidade'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum produto encontrado</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
