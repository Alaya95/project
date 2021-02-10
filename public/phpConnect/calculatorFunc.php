<?php
/*
 if(empty($_GET)){
    echo "good";
}
if(empty($_GET['operation'])){
    echo "Не передана операция";
}
if(empty($_GET['a'] || $_GET['b'])){
    echo "Нет аргументов";
}

$a = $_GET['a'];
$operation = $_GET['operation'];
$b = $_GET['b'];
*/

if(empty($_POST)){
    echo "good";
}
if(empty($_POST['operation'])){
    echo "Не передана операция";
}
if(empty($_POST['a'] || $_POST['b'])){
    echo "Нет аргументов";
}

$a = $_POST['a'];
$operation = $_POST['operation'];
$b = $_POST['b'];


function mathOperation($a, $b, $operation)
{
    $result = "";
    switch ($operation) {
        case "+":
            return $a + $b;
            break;
        case "*":
            return $a * $b;
            break;
        case "-":
            return $a - $b;
            break;
        case "/":
           if ($b == 0) {
                return "на ноль делить нельзя";
            } else {
                return $a / $b;
            }
            break;
    }
    return $result;
}

echo "<br> result: " . mathOperation($a, $b, $operation);