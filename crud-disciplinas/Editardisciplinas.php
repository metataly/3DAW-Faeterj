<?php
   $nomeD = $_GET["disc"]?? '';
   $sigla = $_GET["sig"]?? '';
   $horas = $_GET["horas"]?? '';
   $opcao = $_GET["op"]?? '';

   $arquivo = "disciplina.txt";
      
   if($opcao == "cadastrar"){
   //verificando se o arquivo já existe com a função 'file_exists' (retornando true or false)
       if(!file_exists("disciplina.txt")){

           $arquivo = fopen("disciplina.txt", "w") or die ("Erro ao criar arquivo!");
           fwrite ($arquivo, $linha);
           fclose ($arquivo);
       }
       $arquivo = fopen("disciplina.txt", "a") or die("Erro ao adicionar nova disciplina!");
       $linha = $nomeD . ";  " . $sigla . ";  " . $horas . "\n";
       
       fwrite ($arquivo, $linha);
       fclose ($arquivo);


       echo "Disciplina $sigla - $nomeD, $horas h cadastrada com sucesso!";


       echo "<br><br> <a href='EditarDisciplinas.html'> Voltar </a>";
   }
   else if($opcao == "listar"){
       //listando disciplinas
                                        //r = read
       $arquivo = fopen("disciplina.txt","r") or die("Erro ao abrir aqruivo");
       while(!feof($arquivo)) {
           $linha = fgets($arquivo);
           $coluna = explode(";", $linha);

           echo "<ul style = 'background-color: antiquewhite; width: 35vw; font-family: Cambria; list-style: square;'><li>" . $linha . "</li></ul>";
       }
       fclose($arquivo);
   }
   //alterando disciplinas

   else if($opcao == "alterar"){
    echo "<h1>Qual sigla deseja alterar?</h1>
    <form action='Editardisciplinas.php' method='get'>
        <input type='text' name='sigla' placeholder='Digite a sigla a alterar' required>
        <input type='text' name='nova' placeholder='Nova Sigla' required>
        <input type='hidden' name='op' value='alterar'>
        <br>
        <input type='submit' value='Editar'>
    </form>";

    if (isset($_GET['sigla']) && isset($_GET['nova'])) {
        $siglaAntiga = $_GET['sigla'];
        $novaSigla = $_GET['nova'];
        $arquivo = 'disciplina.txt';

        if (file_exists($arquivo)) {
            $linhas = file($arquivo);
            $arquivoHandle = fopen($arquivo, 'w') or die("Erro ao abrir o arquivo para escrita");

            foreach ($linhas as $linha) {
                $coluna = explode(';', $linha);
                if (trim($coluna[1]) == trim($siglaAntiga)) 
                    $linha = $coluna[0] . "; " . $novaSigla . "; " . $coluna[2] . "\n";
                }
                fwrite($arquivoHandle, $linha);
            }

            fclose($arquivoHandle);
            echo "Sigla atualizada com sucesso!";
            echo "<br><br><a href='EditarDisciplinas.html'> Voltar </a>";
        } else {
            echo "Arquivo de disciplinas não encontrado.";
        }
    }
?>