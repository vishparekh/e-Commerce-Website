
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Products Page</title>
    </head>
    <body>
        <h1>Products Page</h1>
        <?php
        foreach($products as $prod)
            { ?>
        <form action="<?php echo base_url();?>index.php/home/add_to_cart/" method="post">
        <?php
            
            
               if(count($prod['products'])!=0)
                {
                    echo '<a name="'.$prod['cat_id'].'"><h3>Category Name:' .$prod['cat'].'</h3></a>';

                }
                //echo '<pre>';
                //var_dump($prod['products']);
                
                foreach($prod['products'] as $product)
                {
                    echo '<h5>Product ID</h5>:'.$product['product_id'].'<br>';
                     ?>  <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">  <?php
             
                    echo 'Product Name:<a href=" ' .base_url().'index.php/home/product/' .$product['product_id'].'">'.$product['product_name'].'</a ><br>';
                  ?>  <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">  <?php
             
                    echo 'Product Image'.$product['product_image'].'<br>';
                    echo 'Product Price'.$product['product_price'].'<br>';
                      ?>   <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">  <?php
             
                    echo 'Product Description'.$product['product_description'].'<br>';
                  //  echo form_hidden('id',$product['product_id']);
                       ?>
                  
                            <input type="submit" value="Add to cart" name="submit">
                    <?php
                    
                       
                }
                 
                ?>   </form> <?php

            }
        ?>
            
    </body>
</html>
