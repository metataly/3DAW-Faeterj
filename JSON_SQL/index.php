<?php 
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'cadastro');

$conn = new MySQLi(HOST, USER, PASS, BASE);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// Prevenindo SQL Injection
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $senha);

if ($stmt->execute()) {
    // Resposta ao AJAX em formato JSON
    echo json_encode(["mensagem" => "$nome cadastrado com sucesso!", "status" => "sucesso"]);
} else {
    echo json_encode(["mensagem" => "Erro ao cadastrar: " . $conn->error, "status" => "erro"]);
}

$stmt->close();
$conn->close();
?>
