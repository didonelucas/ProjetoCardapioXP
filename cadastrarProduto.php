<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancoprojetointegrador";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $NomeProduto = htmlspecialchars($_POST['NomeProduto']);
    $ValorProduto = htmlspecialchars($_POST['ValorProduto']);
    $DescricaoProduto = htmlspecialchars($_POST['DescricaoProduto']);
    $CategoriaProduto = htmlspecialchars($_POST['CategoriaProduto']);
//produto
    $sqlProduto = "INSERT INTO produto (NomeProduto, ValorProduto, descricao) VALUES ('$NomeProduto', '$ValorProduto', '$DescricaoProduto')";
    if ($conn->query($sqlProduto) === TRUE) {
        echo "Novo registro de produto criado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
//categoria
    $sqlCategoria = "INSERT INTO categoria(NomeCategoria) VALUES ('$CategoriaProduto')";
    if ($conn->query($sqlCategoria) === TRUE) {
        echo "Novo registro de categoria criado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
//imagem
    if (isset($_FILES['imagemProduto'])) {
        $arquivo = $_FILES['imagemProduto'];
        $destino = "imagens/" . basename($arquivo['name']);
        if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
            echo "Imagem enviada com sucesso!";
        } else {
            echo "Falha no upload.";
        }
    }

    $conn->close();
}
?>