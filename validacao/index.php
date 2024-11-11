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
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($email) || empty($senha)) {
        echo json_encode(["mensagem" => "Todos os campos são obrigatórios!", "status" => "erro"]);
        exit();
    }

    // Verifica se o email é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["mensagem" => "Email inválido!", "status" => "erro"]);
        exit();
    }

    // Verifica se o email já está cadastrado
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    // Armazenando os resultados da consulta
    $stmt->store_result();
    
    // Verifica se o email já existe
    if ($stmt->num_rows > 0) {
        echo json_encode(["mensagem" => "Este e-mail já está cadastrado!", "status" => "erro"]);
        $stmt->close();
        exit();
    }

    // Criptografando a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senhaHash);

    // Executa a inserção no banco
    if ($stmt->execute()) {
        echo json_encode(["mensagem" => "$nome cadastrado com sucesso!", "status" => "sucesso"]);
    } else {
        echo json_encode(["mensagem" => "Erro ao cadastrar: " . $conn->error, "status" => "erro"]);
    }

    $stmt->close();
} else {
    echo json_encode(["mensagem" => "Método inválido.", "status" => "erro"]);
}

$conn->close();
?>
