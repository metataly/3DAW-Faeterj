<?php
$mat = $_GET["matricula"];
$arquivo = "alunos.txt";
$coluna;

if (file_exists($arquivo)){

    $linhas = file($arquivo);

    $arquivoHandle = fopen($arquivo, 'w') or die("Erro ao abrir o arquivo");

    foreach ($linhas as $linha) {
        $coluna = explode(';', $linha);

        if (trim($coluna[2]) != $mat) {
            fwrite($arquivoHandle, $linha);
            echo "<div style='display: flex; justify-content: center;'>
            <ul style = 'background-color: #fdccd4; width: 55vw; font-family: Cambria; list-style: none;'>
            <li>" . "Nome:" . $coluna[0] . ";CPF:" . $coluna[1] . ";Matricula:" .  $coluna[2] . ";Nascimento:" .  $coluna[3] . "</li></ul></div>";
        }
    }
    fclose($arquivoHandle);

} else {
    echo "Arquivo ou disciplina não encontrado.";
}
echo "<br><br>
    <a href='index.html' style='display:flex; flex-direction: column; align-items: center;'>
    Página inicial</a>";
?>