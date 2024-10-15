<?php
$numPerg = $_POST['numperg'];
$novaPerg = $_POST['novaP'];
$op = $_POST['op'];
$novaResp = $_POST['novaR'];
$arquivo = 'usuario.txt';

if (file_exists($arquivo)) {
    $linhas = file($arquivo);
    $arquivo = fopen($arquivo, 'w') or die(json_encode(["mensagem" => "Erro ao abrir o arquivo para escrita", "status" => "erro"]));

    $atualizado = false; // Para verificar se algo foi atualizado

    foreach ($linhas as $linha) {
        $coluna = explode(';', $linha);

        if ($coluna[0] == $numPerg) {
        
            if (!empty($novaPerg)) {
                $coluna[1] = $novaPerg; // Supondo que a pergunta esteja na segunda coluna
            }
            if (!empty($novaResp)) {
                switch ($op) {
                    case 'A':
                        $coluna[2] = $novaResp;
                        break;
                    case 'B':
                        $coluna[3] = $novaResp;
                        break;
                    case 'C':
                        $coluna[4] = $novaResp;
                        break;
                    case 'D':
                        $coluna[5] = $novaResp;
                        break;
                    default:
                        break;
                }
            }

            // Atualiza a linha no arquivo
            $linhaAtualizada = implode(';', $coluna);

            fwrite($arquivo, $linhaAtualizada . "\n");
            $atualizado = true;
        } else {
            fwrite($arquivo, $linha); // Se não for a linha que estamos atualizando, mantém igual
        }
    }
    fclose($arquivo);
    
    if ($atualizado) {
        echo json_encode(["mensagem" => "Atualizado com sucesso!", "status" => "sucesso"]);
    } else {
        echo json_encode(["mensagem" => "Nenhuma alteração feita.", "status" => "erro"]);
    }
} else {
    echo json_encode(["mensagem" => "ERRO: Arquivo não existe", "status" => "erro"]);
}
?>
