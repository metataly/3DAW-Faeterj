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
elseif ($oper=="div"){
    $result=$valor1/$valor2;
    echo "<h2>Resultado da Divisão: $result</h2>";
}
elseif ($oper=="raiz") {
    $result=sqrt($valor1);
    echo "<h2>Resultado da Raiz Quadrada: $result</h2>";
}
elseif ($oper=="invert") {
    $result=-$valor1;
    echo "<h2>Resultado da Inversão de Sinal: $result</h2>";
}
elseif ($oper=="sen") {
    $result=sin(deg2rad($valor1));
    echo "<h2>Resultado do Seno: $result</h2>";
}
elseif ($oper=="cos") {
    $result=cos(deg2rad($valor1));
    echo "<h2>Resultado do Cosseno: $result</h2>";
}
else {
    $result=tan(deg2rad($valor1));
    echo "<h2>Resultado da Tangente: $result</h2>";
}
?>