<?php 
$valor1 = $_GET["num1"];
$valor2 = $_GET["num2"];
$oper = $_GET["operador"];
$result = 0;

if($oper=="sub"){
    $result=$valor1-$valor2;
    echo "<h2>Resultado da Subtração: $result</h2>";
}
elseif ($oper=="som") {
    $result=$valor1+$valor2;
    echo "<h2>Resultado da Soma: $result</h2>";
}
elseif ($oper=="mult") {
    $result=$valor1*$valor2;
    echo "<h2>Resultado da Multiplicação: $result</h2>";
}
else {
    $result=$valor1/$valor2;
    echo "<h2>Resultado da Divisão: $result</h2>";
}
?>