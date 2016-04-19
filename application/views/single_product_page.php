<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Single Product id: <?php echo $product['product_id'];?> </title>
    </head>
    <body>
        <h1><?php echo $product['product_name']; ?></h1>
        <p> Product Price:<?php echo $product['product_price']; ?></p>
        <p>Product Description:<?php echo $product['product_description']; ?></p>
        <p>Product Image:<?php echo $product['product_image']; ?></p>
        <p>Product ExtraImages:<?php echo $product['product_extraimages']; ?></p>
        <p>Product views:<?php echo $product['no_of_times_viewed']; ?></p>

       
    </body>
</html>
    