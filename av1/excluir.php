
<?php
$arquivo = "usuario.txt"; 

if (isset($_GET['excluir'])) {

    $numPergunta = $_GET['numperg'];

    if (file_exists($arquivo)) {

        $linhas = file($arquivo);
        $arquivoHandle = fopen($arquivo, 'w') or die("Erro ao abrir o arquivo");

        foreach ($linhas as $linha) {
            $coluna = explode(';', $linha);
            if (trim($coluna[0]) != $numPergunta) {
                fwrite($arquivoHandle, $linha);
            }
        }
        fclose($arquivoHandle);
        echo "Pergunta excluída com sucesso!";
    } else {
        echo "Arquivo não encontrado.";
    }
}
?>