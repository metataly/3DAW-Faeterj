<?php
header('Content-Type: application/json');

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'cadastro');

$conn = new mysqli(HOST, USER, PASS, BASE);

// Verifica a conexão
if ($conn->connect_error) {
    die(json_encode(["erro" => "Erro ao conectar ao banco de dados: " . $conn->connect_error]));
}

// Prepara a consulta SQL para buscar as perguntas
$sql = "SELECT numero_pergunta, pergunta, resposta_a, resposta_b, resposta_c, resposta_d, resposta_correta FROM perguntas";
$result = $conn->query($sql);

$perguntas = [];

if ($result->num_rows > 0) {
    // Fetch todos os registros e os adiciona ao array
    while ($row = $result->fetch_assoc()) {
        $perguntas[] = $row;
    }
} else {
    echo json_encode(["erro" => "Nenhuma pergunta encontrada."]);
    exit;
}

$conn->close();

echo json_encode($perguntas);
?>
