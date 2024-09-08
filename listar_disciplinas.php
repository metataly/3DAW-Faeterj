<?php 
    $nomeD = $_GET["disc"];
    $sigla = $_GET["sig"];
    $horas = $_GET["horas"];
    $opcao = $_GET["op"];
    $arquivo;
    $linha;
    $coluna;
        
    if($opcao == "cadastrar"){
    //verificando se o arquivo já existe com a função 'file_exists' (retornando true or false)
        if(!file_exists("disciplina.txt")){
                //file open                 w = escrever
        $arquivo = fopen("disciplina.txt", "w") or die ("Erro ao criar arquivo!");
        fwrite ($arquivo, $linha);
        fclose ($arquivo);
        }

        $arquivo = fopen ("disciplina.txt", "a") or die("Erro ao adicionar nova disciplina!");

        $linha = $nomeD . ";  " . $sigla . ";  " . $horas . "\n";
        fwrite ($arquivo, $linha);
        fclose ($arquivo);

        echo "Disciplina $sigla - $nomeD, $horas h cadastrada com sucesso!";

        echo "<br><br> <a href='listar_disciplinas.html'> Voltar </a>";
    }
    else{
        //listando disciplinas
                                         //r = read
        $arquivo = fopen("disciplina.txt","r") or die("Erro ao abrir aqruivo");
 
        while(!feof($arquivo)) {
            $linha = fgets($arquivo);

            echo "<ul style = 'background-color: antiquewhite; width: 35vw; font-family: Cambria; list-style: square;'><li>" . $linha . "</li></ul>";
        }
 
        fclose($arquivo);
    }

    
    

    


?>