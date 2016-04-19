

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Shop</title>
    </head>
    <body>
        <div id="products">
            <ul>
                <?php
                    foreach($products as $product){
                ?>
                <li>
                <?php echo form_open('shop/add')?>
                    <div class="name">
                    <?php echo $product->product_name; ?>
                    </div>
                 
                    <div class="price">
                        <?php echo $product->product_price;?>
                    </div>
                    <?php echo form_hidden('id',$product->product_id); ?>
                    <?php echo form_submit('action','Add to Cart'); ?>
                    <?php echo form_close(); ?>
                  
                
                </li>
                <?php                    } ?>
            </ul>
        </div>
        <h4>Cart</h4>
        <?php if($cart=$this->cart->contents()) ?>
        <div id="cart">
        <table>
        <thead>
        <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th></th>
        </tr>
        </thead>
            <?php foreach($cart as $item): ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td></td>
                <td>$<?php echo $item['subtotal']; ?></td>
                <td  class="remove"><?php echo anchor('shop/remove/'.$item['rowid'],'X')?></td>
            </tr>
        <?php endforeach; ?>
            <tr class="total"><td colspan="2">Total</td>
            </td><?php echo $this->cart->total(); ?></td>
            </tr>
        </table>
        </div>
    </body>
</html>
