<?php
$numPerg = $_GET["numperg"];
$arquivo = "usuario.txt";

if (file_exists($arquivo)){

    $linhas = file($arquivo);

    $arquivo = fopen($arquivo, 'r') or die("Erro ao abrir o arquivo");

    foreach ($linhas as $linha) {
        $coluna = explode(';', $linha);

        if (trim($coluna[0]) == $numPerg) { 
            echo "<div style='display: flex; justify-content: center;'>
            <ul style = 'background-color: #fdccd4; width: 55vw; font-family: Cambria; list-style: none;'>
            <li>" . "Numero:" . $coluna[0] . ";Pergunta:" . $coluna[1] . ";OpçãoA:" .  $coluna[2] . ";OpçãoB:" . $coluna[3] . ";OpçãoC:" .  $coluna[4] . ";OpçãoD:" .  $coluna[5] . ";Resposta:" . $coluna[6] . "</li></ul></div>";
            
        }
       
    }
    fclose($arquivo);

} else {
    echo "Arquivo não encontrado.";
}
    echo "<br><br>
    <a href='opcoes.html' style='display:flex; flex-direction: column; align-items: center;'>
    Página inicial</a>";
?>
