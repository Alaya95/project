<?php
include_once "dbConnect.php";
$uploadDir = "../src/assets/imgs/"; // Папка для хранения картинок
$uploadFile = $uploadDir . basename($_FILES['product_image']['name']);
$maxSizeFile = 5000000;
$minSizeFile = 30000;
echo "<br>";
print_r($_FILES['product_image']['name']);
echo "<br>";

if (is_uploaded_file( $_FILES['product_image']['tmp_name']))
{
    print_r($_FILES['product_image']['tmp_name']);
    if ($_FILES['product_image']['size'] <= $maxSizeFile && $_FILES['product_image']['size'] >= $minSizeFile)
    {

        if (!@copy($_FILES['product_image']['tmp_name'], $uploadFile)) {
            echo "<br> Что-то пошло не так <br>";
        } else {
            echo "<br> Файл успешно загружен <br>";
            $productImageName = $_FILES['product_image']['name'];
            echo $productImageName;
        }


    } else {
        echo "Недопустимый размер файла. Файл должен быть больше 30 000 кб и меньше 5 000 000 кб";
    }
} else {
    echo "Недопустимый размер файла. Файл должен быть больше 30 000 кб и меньше 5 000 000 кб!\n";
}



echo 'Некоторая отладочная информация:';
print_r($_FILES);
echo "<br>";

$product_price = htmlentities($_POST['product_price']);
echo "<br> Product price";
print_r($product_price);
echo "<br> POST";
print_r($_POST);


$brandName = $_POST['product_brand'];
$brandId = "";
if(isset($brandName))
{
    $result = mysqli_query($db, "SELECT brand.id, brand.name FROM brand WHERE brand.name='{$brandName}'");
    $row = mysqli_fetch_assoc($result);

    if ($brandName == $row['name'])
    {
        $brandId = $row['id'];

    }else {
        echo "Несоответствие данных";
    }
}

$productTypeName = $_POST['productTypes'];
$productTypeID = "";
if(isset($productTypeName))
{
    $result = mysqli_query($db, "SELECT id, name FROM product_type WHERE product_type.name='{$productTypeName}'");
    $row = mysqli_fetch_assoc($result);

    if ($productTypeName == $row['name'])
    {
        $productTypeID = $row['id'];
        echo $row['id'];
    }else {
        echo "Несоответствие данных";
    }
}

$categoryName = $_POST['product_category'];
$categoryID = "";
if(isset($categoryName))
{
    $result = mysqli_query($db, "SELECT id, name FROM category WHERE category.name='{$categoryName}'");
    $row = mysqli_fetch_assoc($result);

    echo "<br>";
    if ($categoryName == $row['name']) // доп проверка соответствия
    {
        $categoryID = $row['id']; // присвоение id
        echo $categoryID;
    }else {
        echo "Несоответствие данных";
    }
}


if (isset($_POST)) {
    //Вставляем данные, подставляя их в запрос

    $sql = mysqli_query($db, "INSERT INTO `product` (`brand_id`, `product_type_id`, `category_id`, `price`, `image`) VALUES ('{$brandId}', '{$productTypeID}', '{$categoryID}', '{$_POST['product_price']}', '{$productImageName}')");
    //Если вставка прошла успешно
    if ($sql) {
        echo '<p>Данные успешно добавлены в таблицу.</p>';


    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';

    }
}
