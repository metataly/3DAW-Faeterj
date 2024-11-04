<?php
$nome = $_GET["nome"];
$email = $_GET["email"];
$senha = $_GET["senha"];

if(!file_exists("usuario.txt")){

    $arquivo = fopen("usuario.txt", "w") or die ("erro ao criar arquivo!");
    fwrite ($arquivo, $linha);
    fclose ($arquivo);
}
$arquivo = fopen ("usuario.txt", "a") or die("erro ao adicionar nova disciplina!");

$linha = $nome . ";" . $email . ";" . $senha . ";" . "\n";
fwrite ($arquivo, $linha);
fclose ($arquivo);

echo "$nome cadastrado com sucesso!";

echo "<br><br>
    <a href='opcoes.html' style='display:flex; flex-direction: column; align-items: center; background-color: rgb(253, 204, 212);'>
    Continuar</a>";
?>
