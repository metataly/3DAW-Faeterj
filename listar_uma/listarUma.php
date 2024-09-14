<?php
$sigla = $_GET["sigla"];
$arquivo = "disciplina.txt";
$coluna;

//verif se o arquivo existe
if (file_exists($arquivo)){

    $linhas = file($arquivo);

   //lendo o arquivo
    $arquivoHandle = fopen($arquivo, 'r') or die("Erro ao abrir o arquivo");

    foreach ($linhas as $linha) {
        //divide a linha em colunas usando o ponto e vírgula como separador
        $coluna = explode(';', $linha);

        //procurando a sigla e exibindo a materia
        if (trim($coluna[1]) == $sigla) { 
            echo "<ul style = 'background-color: antiquewhite; width: 35vw; font-family: Cambria; list-style: square;'><li>" . $coluna[0] . " - " . $coluna[1] . " - " .  $coluna[2] . "</li></ul>";
        }
       
    }
    fclose($arquivoHandle);

} else {
    echo "Arquivo não encontrado.";
}

echo "<br><br><a href='listarUma.html'> Voltar </a>";
?>