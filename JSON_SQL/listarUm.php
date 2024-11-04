<?php
header('Content-Type: application/json');

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'cadastro');

$conn = new MySQLi(HOST, USER, PASS, BASE);

// Verifica a conexão
if ($conn->connect_error) {
    die(json_encode(["erro" => "Erro ao conectar ao banco de dados: " . $conn->connect_error]));
}

$numPerg = isset($_GET["numperg"]) ? $_GET["numperg"] : null; // Verifica se a variável existe

if ($numPerg === null) {
    echo json_encode(["erro" => "Número da pergunta não fornecido."]);
    exit;
}

// SQL
$sql = "SELECT * FROM perguntas WHERE numero_pergunta = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $numPerg);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $linhaCompleta = $result->fetch_assoc(); // Pega a linha encontrada
    echo json_encode(["linha" => $linhaCompleta]);
} else {
    echo json_encode(["erro" => "Pergunta não encontrada."]);
}

$stmt->close();
$conn->close();
?>
