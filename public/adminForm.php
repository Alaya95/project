<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="src/layout/styles/css/adminStyle.css">
</head>
<body>




    <!--    При нажатии на кнопку будет вызвана страница downloadImg.php    -->
    <form enctype="multipart/form-data" action="phpConnect/downloadImg.php" method="POST">

       <label>
           <span>Product Brand: </span>
           <input type="text" name="product_brand" list="productBrand">
            <datalist id="productBrand">
                <?php
                    include_once "phpConnect/dbConnect.php";
                    echo "<br>";
                    $result = mysqli_query($db, "SELECT * FROM brand");
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option  value=\"" . $row['name'] . "\">" . $row['name'] . "</option>";
                    }
                ?>

            </datalist>
       </label>

       <label>
           <span>Product Type: </span>
           <input type="text" name="productTypes" list="productType">
           <datalist id="productType">
               <?php
                   include_once "phpConnect/dbConnect.php";
                   echo "<br>";
                   $result = mysqli_query($db, "SELECT * FROM product_type");
                   while($row = mysqli_fetch_assoc($result)){
                       echo "<option  value=\"" . $row['name']. "\">" . $row['name'] . "</option>";
                   }
               ?>
           </datalist>
       </label>

       <label>
          <span>Product category: </span>
          <input type="text" name="product_category" list="productCategory">
          <datalist id="productCategory">
              <?php
              include_once "phpConnect/dbConnect.php";
              echo "<br>";
              $result = mysqli_query($db, "SELECT * FROM category");
              while($row = mysqli_fetch_assoc($result)){
                  echo "<option  value=\"" . $row['name']. "\">" . $row['name'] . "</option>";
              }
              ?>
          </datalist>
       </label>


       <label><span>Product price: </span><input type="text" name="product_price"></label>

        <!-- Поле MAX_FILE_SIZE - максимально допустимый размер файла, должно быть указано до поля загрузки файла -->
        <label><input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        <!-- вставка о превышении размера или недопустимого формата файла
         Название элемента input определяет имя в массиве $_FILES -->
        <span>Product image: </span><input name="product_image" type="file"></label>
        <label><input type="submit" value="Отправить файл"></label>
        <!-- <button>Отправить</button>-->
    </form>

</body>
</html>

