<?php

if (isset($_GET['matricula']) && isset($_GET['novo'])) {
    $mat = $_GET['matricula'];
    $novoNome = $_GET['novo'];
    $arquivo = 'alunos.txt';

    if (file_exists($arquivo)) {
        $linhas = file($arquivo);
        $arquivo = fopen($arquivo, 'w') or die("Erro ao abrir o arquivo para escrita");

        foreach ($linhas as $linha) {
            $coluna = explode(';', $linha);
            if (trim($coluna[2]) == trim($mat)){
                $linha = $novoNome . "; " . $coluna[1] . "; " . $coluna[2]  . "; " . $coluna[3] . "\n";
            }
            fwrite($arquivo, $linha);
        }
    }
    fclose($arquivo);
    echo "Nome atualizado com sucesso!";
    echo "<br><br><a href='alterar.html' style ='padding: 20px;'>Voltar</a><a href='index.html'>Página inicial";


    } else {
         echo "Arquivo de disciplinas não encontrado.";
        }
?>