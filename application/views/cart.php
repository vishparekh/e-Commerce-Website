
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Shoping Cart</title>
    </head>
    <body>

        <h1>Shopping Cart</h1>
        <?php validation_errors(); ?>
        <form action= "<?php  echo base_url(); ?>index.php/home/update_cart" method="post">
            <table>
                 
               

                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                 <tbody>
                     <?php foreach($contents as $key=>$content)
                { ?>
                    <tr>
                        <td><?php echo $content['name']; ?></td>
                        <td><input type="text" name="qty[]" value="<?php echo $content['qty']; ?>"></td>
                        <td><?php echo $content['price']; ?></td>
                        <td><?php echo $content['subtotal']; ?></td>
                        <td><a href="<?php echo base_url();?>index.php/home/remove_from_cart/<?php echo $content['rowid']; ?>">X</a></td>
                    </tr>
                <input type="hidden" name="rowid[]" value="<?php echo $content['rowid']; ?>">
                <input type="hidden" name="prodid[]" value="<?php echo $content['id'];?>">


               <?php } ?> 

                <tr>
                    <td>Total</td>
                    <td><?php echo $this->cart->total(); ?></td>
                </tr>

 
               
                </tbody>
            </table>
            <input type="submit" name="submit" value="update" >
           </form>

        <br><br>
        <h5>Buy Product</h5>
        <form action="<?php echo base_url();?>index.php/home/buy" method="post">

            <label>*First Name</label>
                <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" required>
            <label>*Last Name</label>
                <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" required><br>
         
            <label>*Email Address</label>
               <input type="email" name="email_id" value="<?php echo set_value('email_id'); ?>" required>
         
            <label>*Phone Number</label>
               <input type="text" name="phone_no" value="<?php echo set_value('phone_no'); ?>" required><br>
         
            <label>*Address Line1</label>
               <input type="text" name="address_line1" value="<?php echo set_value('address_line1'); ?>" required><br>
         
            <label>*Address Line2</label>
               <input type="text" name="address_line2" value="<?php echo set_value('address_line2'); ?>" required><br>
         
            <label>*City</label>
               <input type="text" name="city" value="<?php echo set_value('city'); ?>" required>
         
            <label>*State</label>
               <input type="text" name="state" value="<?php echo set_value('state'); ?>" required>
         
            <label>*Pincode</label>
               <input type="text" name="pincode" value="<?php echo set_value('pincode'); ?>" required><br>
         
            <label>Company Name</label>
               <input type="text" name="company_name" value="<?php echo set_value('company_name'); ?>" ><br>
         

            <input type="submit" name="submit" value="Buy now">
        
            
        </form>
    </body>
</html>
