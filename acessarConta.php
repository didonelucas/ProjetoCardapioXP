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
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    $sql = "SELECT * FROM cliente WHERE EmailCliente = '$email' AND SenhaCliente = '$senha'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        echo "Login bem-sucedido!";
    } 
    else {
        echo "Email ou senha incorretos!";
    }

    $conn->close();
}
?>