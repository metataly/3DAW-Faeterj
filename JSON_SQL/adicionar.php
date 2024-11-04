<?php 
header('Content-Type: application/json'); 

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'cadastro');

$conn = new MySQLi(HOST, USER, PASS, BASE);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $perg = $_POST['pergunta'];
    $alterA = $_POST['respostaA'];
    $alterB = $_POST['respostaB'];
    $alterC = $_POST['respostaC'];
    $alterD = $_POST['respostaD'];
    $respCorreta = $_POST['respostaCorreta'];

    // Prepare a inserção no banco de dados
    $stmt = $conn->prepare("INSERT INTO perguntas (pergunta, resposta_a, resposta_b, resposta_c, resposta_d, resposta_correta) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $perg, $alterA, $alterB, $alterC, $alterD, $respCorreta);

    // Executa a inserção
    if ($stmt->execute()) {
        echo json_encode(["mensagem" => "Dados armazenados com sucesso!", "status" => "sucesso"]);
    } else {
        echo json_encode(["mensagem" => "Erro ao armazenar os dados: " . $stmt->error, "status" => "erro"]);
    }

    // Fecha a declaração
    $stmt->close();
} else {
    echo json_encode(["mensagem" => "Preencha todos os dados.", "status" => "erro"]);
}

// Fecha a conexão
$conn->close();
?>
