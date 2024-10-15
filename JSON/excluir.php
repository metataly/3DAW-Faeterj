<?php
$arquivo = "usuario.txt"; 
$numPergunta = $_POST['numperg'];

    if (file_exists($arquivo)) {

        $linhas = file($arquivo);
        $arquivoHandle = fopen($arquivo, 'w') or die( echo json_encode(["mensagem" => "ERRO: Arquivo não existe!", "status" => "erro"]););

        foreach ($linhas as $linha) {
            $coluna = explode(';', $linha);
            if (trim($coluna[0]) != $numPergunta) {
                fwrite($arquivoHandle, $linha);
            }
        }
        fclose($arquivoHandle);
        echo json_encode(["mensagem" => "Excluído com sucesso!", "status" => "sucesso"]);
    }
?>