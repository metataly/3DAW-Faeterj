<?php
$numPerg = $_GET["numperg"];
$arquivo = "usuario.txt";

if (file_exists($arquivo)) {
    $linhas = file($arquivo);
    $linhaCompleta = null;

    foreach ($linhas as $linha) {
        $coluna = explode(';', $linha);

        // Verifica se o número da pergunta corresponde
        if (trim($coluna[0]) == $numPerg) { 
            $linhaCompleta = trim($linha);
            break;
        }
    }

    if ($linhaCompleta) {
        echo json_encode(["linha" => $linhaCompleta]);
    } else {
    
        echo json_encode(["erro" => "Pergunta não encontrada."]);
    }
}
?>
