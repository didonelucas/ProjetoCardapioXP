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
    $nomeCompleto = htmlspecialchars($_POST['nomeCompleto']);
    $email = htmlspecialchars($_POST['email']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $celular = htmlspecialchars($_POST['celular']);
    $senha = htmlspecialchars($_POST['senha']);
    $confirmarSenha = htmlspecialchars($_POST['confirmarSenha']);
    
    if ($confirmarSenha == $senha) {
    $sql = "INSERT INTO cliente (NomeCliente, EmailCliente, CPFCliente, CelularCliente, SenhaCliente) VALUES ('$nomeCompleto', '$email', '$cpf', '$celular', '$confirmarSenha')";
       if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso!";
        } 
        else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } 
    else {
        echo "Falha no cadastro";
    }    
    
    $conn->close();
}
?>