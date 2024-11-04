<?php
header('Content-Type: application/json');

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'cadastro');

$conn = new mysqli(HOST, USER, PASS, BASE);

// Verifica a conexão
if ($conn->connect_error) {
    die(json_encode(["mensagem" => "ERRO: Conexão falhou: " . $conn->connect_error, "status" => "erro"]));
}

$numPergunta = $_POST['numperg'];

// Prepara a consulta SQL para excluir o registro
$sql = "DELETE FROM perguntas WHERE numero_pergunta = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $numPergunta);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(["mensagem" => "Excluído com sucesso!", "status" => "sucesso"]);
    } else {
        echo json_encode(["mensagem" => "Nenhuma linha correspondente.", "status" => "info"]);
    }
} else {
    echo json_encode(["mensagem" => "ERRO ao excluir: " . $stmt->error, "status" => "erro"]);
}

$stmt->close();
$conn->close();
?>
