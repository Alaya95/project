<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--
<form action="phpConnect/calculatorFunc.php">
    <input type="number" name="a">
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" name="b">
    <input type="submit" value="Посчитать">

    <br>
</form>
-->

<form action="phpConnect/calculatorFunc.php" method="post">
    <input type="number" name="a">
    <input type="number" name="b">
    <button type="submit" value="+" name="operation">+</button>
    <button type="submit" value="-" name="operation">-</button>
    <button type="submit" value="*" name="operation">*</button>
    <button type="submit" value="/" name="operation">/</button>
</form>


</body>
</html>