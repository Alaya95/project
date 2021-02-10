<?php
$db = mysqli_connect('localhost', 'root', 'root', 'shop', '3307');

if (!$db) {
    echo "ошибка подключения";
    echo "Номер ошибки" . mysqli_connect_errno() . "<br>";
    echo "Ошибка" . mysqli_connect_error();
    exit();
}

/*
echo "<br>";
$result = mysqli_query($db, "SELECT * FROM brand");
while($row = mysqli_fetch_assoc($result)){
    print_r($row);
    echo "<br>";
}
echo "<br>";
$result = mysqli_query($db, "SELECT * FROM product_type");
while($row = mysqli_fetch_assoc($result)){
    print_r($row);
    echo "<br>";
}
echo "<br>";
$result = mysqli_query($db, "SELECT * FROM category");
while($row = mysqli_fetch_assoc($result)){
    print_r($row);
    echo "<br>";
}*/

