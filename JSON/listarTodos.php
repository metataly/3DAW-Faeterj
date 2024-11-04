<?php
$arquivo = fopen("usuario.txt", "r") or die(json_encode(["erro" => "Erro ao abrir arquivo"]));

$perguntas = [];

while (!feof($arquivo)) {
    $linha = fgets($arquivo);
    if (!empty(trim($linha))) { // Ignora linhas vazias
        $perguntas[] = trim($linha); // Adiciona a linha ao array
    }
}

fclose($arquivo);

// Retorna o array de perguntas em formato JSON
echo json_encode($perguntas);
?>
