<?php
$aluno = $_GET["nome"];
$cpf = $_GET["cpf"];
$mat = $_GET["matricula"];
$nasc = $_GET["nascimento"];

if(!file_exists("alunos.txt")){

    $arquivo = fopen("alunos.txt", "w") or die ("erro ao criar arquivo!");
    fwrite ($arquivo, $linha);
    fclose ($arquivo);
}
$arquivo = fopen ("alunos.txt", "a") or die("erro ao adicionar nova disciplina!");

$linha = $aluno . ";" . $cpf . ";" . $mat . ";" . $nasc . ";" . "\n";
fwrite ($arquivo, $linha);
fclose ($arquivo);

echo "O aluno $aluno de matricula $mat cadastrado com sucesso!";

echo "<br><br><a href='adicionar.html' style ='padding: 20px;'>Voltar</a><a href='index.html'>Página inicial";
?>