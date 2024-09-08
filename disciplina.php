<?php 
$nomeD = $_GET["disc"];
$sigla = $_GET["sig"];
$horas = $_GET["horas"];
$arquivo;
$linha;

//verificando se o arquivo já existe com a função 'file_exists' (retornando true or false)
if(!file_exists("disciplina.txt")){
            //file open                 w = escrever
    $arquivo = fopen("disciplina.txt", "w") or die ("erro ao criar arquivo!");
    fwrite ($arquivo, $linha);
    fclose ($arquivo);
}
$arquivo = fopen ("disciplina.txt", "a") or die("erro ao adicionar nova disciplina!");

$linha = $nomeD . ";" . $sigla . ";" . $horas . "\n";
fwrite ($arquivo, $linha);
fclose ($arquivo);

echo "Disciplina $sigla - $nomeD, $horas h cadastrada com sucesso!";

?>