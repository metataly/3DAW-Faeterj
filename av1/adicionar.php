<?php

if (($_SERVER["REQUEST_METHOD"] == "GET") && (!file_exists("usuario.txt"))){

    $perg = ($_GET['pergunta']);
    $numPerg = ($_GET['numperg']);
    $alterA = ($_GET['alternativaA']);
    $alterB = ($_GET['alternativaB']);
    $alterC = ($_GET['alternativaC']);
    $alterD = ($_GET['alternativaD']);
    $respCorreta = ($_GET['respostaCorreta']);

    $arquivo = 'usuario.txt';

    $arquivo= fopen ("usuario.txt", "a") or die("erro ao adicionar pergunta");

    $linha = $numPerg . ";" . $perg . ";" . $alternA . ";" . $alterB. ";" . $alterC . ";" . $alterD . ";" . $respCorreta "\n";
    fwrite ($arquivo, $linha);
    fclose ($arquivo);

    echo "Dados armazenados com sucesso!";
} else {
    echo "Algo deu errado!";
}
?>