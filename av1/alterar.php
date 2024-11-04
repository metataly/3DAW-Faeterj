<?php

    $numPerg = $_GET['numperg'];
    $novaPerg = $_GET['novaP'];
    $op = $_GET['op'];
    $novaResp = $_GET ['novaR'];
    $arquivo = 'usuario.txt';

    if (file_exists($arquivo)) {
        $linhas = file($arquivo);
        $arquivo = fopen($arquivo, 'w') or die("Erro ao abrir o arquivo para escrita");

        foreach ($linhas as $linha) {
            $coluna = explode(';', $linha);

            if ($coluna[0] == $numPerg){
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
            fwrite($arquivo, $linha);
        }
    }
}
    fclose($arquivo);
    echo "Atualizado com sucesso!";
    echo "<br><br><a href='alterar.html' style ='padding: 20px;'>Voltar</a><a href='opcoes.html'>Página inicial";

?>
