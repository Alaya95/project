<?php
require "dbConnect.php";


function createImgItem ($db){
    $IMAGE_DIRECTORY = "src/assets/imgs/";
   /* $result = mysqli_query($db,
        "SELECT * FROM product
                inner join brand on product.brand_id = brand.id
                inner join product_type on product.product_type_id = product_type.id
                inner join category on product.category_id = category.id;
    ");*/
    $result = mysqli_query($db,
        "SELECT product.id, brand.name as brand_name, product_type.name as product_type_name, category.name as category_name, product.price, product.image FROM product
                inner join brand on product.brand_id = brand.id
                inner join product_type on product.product_type_id = product_type.id
                inner join category on product.category_id = category.id;
    ");

    /*
     * while($row = mysqli_fetch_assoc($result)){
     *  print_r($row);
     * echo "<br>";
     * }
     * 
     * Array ( [id] => 1
     * [brand_name] => mango
     * [product_type] => Tops
     * [category_name] => man
     * [price] => 52.00
     * [image] => Layer_2.jpg)
     */

    if ($result) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            echo  "<br>
                    <div class=\"item\">
                        <div class=\"itemImg\">
                            <div class=\"itemImgHover\">
                                <button>
                                    <img src=\"src/assets/imgs/cart2.png\" alt=\"img\">
                                    Add to Cart
                                </button>
                                <button>
                                    More detailed
                                </button>
            
                            </div>
                            <img src=\"" . $IMAGE_DIRECTORY . $row['image'] . "\" alt=\"img\">
                        </div>
                        <div class=\"itemText\">
                            <a href=\"#\">" . $row['brand_name'] . " " . $row['product_type_name'] . "</a>
                            <p>" . $row['price'] ."</p>
                        </div>
                     </div>";
            ++$i;
        }
    } else {
        echo "no1";
    }
}

createImgItem($db);

mysqli_close($db);