<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){


    if (file_exists("usuario.txt")){

        $perg = ($_POST['pergunta']);
        $numPerg = ($_POST['numperg']);
        $alterA = ($_POST['respostaA']);
        $alterB = ($_POST['respostaB']);
        $alterC = ($_POST['respostaC']);
        $alterD = ($_POST['respostaD']);
        $respCorreta = ($_POST['respostaCorreta']);

        $arquivo = "usuario.txt";

        $arquivo= fopen ("usuario.txt", "a") or die("erro ao adicionar pergunta");

        $linha = $numPerg . ";" . $perg . ";" . $alterA . ";" . $alterB. ";" . $alterC . ";" . $alterD . ";" . $respCorreta . "\n";
        
        fwrite ($arquivo, $linha);
        fclose ($arquivo);

        echo "Dados armazenados com sucesso!";
    } else {
        echo "Algo deu errado!";
    }

    echo "<br><br>
    <a href='opcoes.html' style='display:flex; flex-direction: column; align-items: center;'>
    Página inicial</a>";
}
?>