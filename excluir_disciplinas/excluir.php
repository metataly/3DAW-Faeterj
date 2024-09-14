<?php
$sigla = $_GET["sigla"];
$arquivo = "disciplina.txt";
$coluna;

//verif se o arquivo existe
if (file_exists($arquivo)){


    $linhas = file($arquivo);

    //abrindo o arqivo para escrita
    //'arquivoHandle' = recurso chamado "handle" que representa o arquivo aberto
    $arquivoHandle = fopen($arquivo, 'w') or die("Erro ao abrir o arquivo");

    foreach ($linhas as $linha) {
        //divide a linha em colunas usando o ponto e vírgula como separador
        $coluna = explode(';', $linha);

        if (trim($coluna[1]) != $sigla) {
            // escrevendo a linha de volta no arquivo pq nao é a disciplina q o usuário quer
            fwrite($arquivoHandle, $linha);
            echo "<ul style = 'background-color: antiquewhite; width: 35vw; font-family: Cambria; list-style: square;'><li>" . $linha . "</li></ul>";
        }
    }
    fclose($arquivoHandle);

} else {
    echo "Arquivo ou disciplina não encontrado.";
}

echo "<br><br><a href='excluir.html'> Voltar </a>";
?>