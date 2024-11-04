<?php 
header('Content-Type: application/json'); 

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'cadastro');

$conn = new MySQLi(HOST, USER, PASS, BASE);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$numPerg = $_POST['numperg']; // O id da pergunta
$novaPerg = $_POST['novaP'];
$op = $_POST['op'];
$novaResp = $_POST['novaR'];

// Consulta no SQL
$sql = "SELECT * FROM perguntas WHERE numero_pergunta = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $numPerg);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $updateFields = [];
    $params = [];
    
    // Verifica se é a pergunta a ser alterada
    if (!empty($novaPerg)) {
        $updateFields[] = "pergunta = ?";
        $params[] = $novaPerg;
    }

    // Verifica se é a resposta
    if (!empty($novaResp)) {
        switch ($op) {
            case 'A':
                $updateFields[] = "resposta_a = ?";
                $params[] = $novaResp;
                break;
            case 'B':
                $updateFields[] = "resposta_b = ?";
                $params[] = $novaResp;
                break;
            case 'C':
                $updateFields[] = "resposta_c = ?";
                $params[] = $novaResp;
                break;
            case 'D':
                $updateFields[] = "resposta_d = ?";
                $params[] = $novaResp;
                break;
            default:
                break;
        }
    }

    if (!empty($updateFields)) {
        $sqlUpdate = "UPDATE perguntas SET " . implode(", ", $updateFields) . " WHERE numero_pergunta = ?";
        $params[] = $numPerg; // Adiciona o número da pergunta como último parâmetro
        $stmtUpdate = $conn->prepare($sqlUpdate);
        
        $types = str_repeat("s", count($params) - 1) . "i"; 
        $stmtUpdate->bind_param($types, ...$params);
        
        if ($stmtUpdate->execute()) {
            echo json_encode(["mensagem" => "Atualizado com sucesso!", "status" => "sucesso"]);
        } else {
            echo json_encode(["mensagem" => "Erro ao atualizar: " . $stmtUpdate->error, "status" => "erro"]);
        }

        $stmtUpdate->close();
    } else {
        echo json_encode(["mensagem" => "Nada para atualizar.", "status" => "info"]);
    }
} else {
    echo json_encode(["mensagem" => "Pergunta não encontrada.", "status" => "erro"]);
}

$stmt->close();
$conn->close();
?>
