<?php
    $arquivo = fopen("usuario.txt","r") or die("Erro ao abrir aqruivo");
    
    while(!feof($arquivo)) {
        $linha = fgets($arquivo);

        echo "<div style='display: flex; justify-content: center;'>
        <ul style = 'background-color: #fdccd4; width: 55vw; font-family: Cambria; list-style: none;'>
        <li>" . $linha . "</li></ul></div>";
    }

    fclose($arquivo);
   
    echo "<br><br>
    <a href='opcoes.html' style='display:flex; flex-direction: column; align-items: center;'>
    Página inicial</a>";

?>