
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Control</title>
    </head>
    <body>
        <?php if($this->input->get('message')){ echo $message.'<br>'; }
        if($this->session->userdata('logged_in'))
        {
            echo 'You are logged in as'.$this->session->userdata('username');
        }
         ?>

         <?php
              $this->load->view('admin_menu');
         ?>
    
        <?php
            if(isset($products))
            {
                 $var = array('Product Name','Price','Description','Image','Category','Extra Images','Viewed','Posted','');
                 $this->table->set_heading($var);

                 foreach($products as $p)
                 {
                       $this->table->add_row(array($p['product_name'],$p['product_price'],$p['product_description'],'<img src="'.base_url().'images/'.$p['product_image'].'" width="50">',$p['category_name'],
                       $p['product_extraimages'],$p['no_of_times_viewed'],$p['posted_at'],'<a href="'.base_url().'index.php/admin/edit_single_product/'.$p['product_id'].'">Edit</a>','<a href="'.base_url().'index.php/admin/remove_product/'.$p['product_id'].'">Delete</a>'));
                
                 }
                 echo $this->table->generate();
             }
             elseif(isset($product))
             {
                ?>
                 <h5>Edit Product</h5>
                <form enctype="multipart/form-data" action="<?php echo base_url();?>index.php/admin/save_edited_product" method="post">
                    <label>Product Name</label>
                    <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>"><br>
                    <label>Category Name</label>
                    <input type="text" name="category_name" value="<?php echo $product['category_name']; ?>" ><br>
                    

                    <img src="<?php echo base_url();?>images/<?php echo $product['product_image']; ?>">
                    <label>Price</label>
                    <input type="text" name="product_price" value="<?php echo $product['product_price']; ?>"><br>
                    <label>Description</label>
                    <textarea name="product_description"><?php echo $product['product_description']; ?></textarea><br>
                    <label>Change Main Image</label>
                    <input type="file" name="product_image"><br>
                    <label>Change the Category</label>
                    <select name="category_id">
                        <?php  foreach($categories as $cat) {?>
                               
                                  <option value="<?php echo $cat['category_id']; ?>"
                                   <?php  if($product['category_id'] == $cat['category_id'])
                                   {
                                       echo 'selected';
                                   } 
                                   ?>
                                   <?php echo $cat['category_name'];?>
                                   </option>
                        <?php  } ?>
                    </select ><br>
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>"><br>
                    <label>Change Extra Images(Select multiple images)</label>
                    <input type="hidden" name="extra_images" value="<?php echo $product['product_extraimages']?>">
                    <?php 
                        $extraimages = explode('|',$product['product_extraimages']);
                        foreach($extraimages as $key=>$img)
                        {?>
                    <img src="<?php echo base_url();?>images/<?php echo $img;?>" width="100px" align="left">
                    <?php }?>
                        
                            
                     <input type="file" name="extra_images[]" multiple><br>
                    <input type="submit" name="submit" value="Save">
                    <a href="<?php echo base_url();?>index.php/admin/show_all_products"><input type="button" name="back" value="Go Back"></a>
                    
                    
                    
                </form>



                <?php
             }
           
        ?>
        <br><br>
        <h5>Add a new Product</h5>
        <form enctype="multipart/form-data" action="<?php echo base_url();?>index.php/admin/add_product" method="post">
            <label>Product Name</label>
            <input type="text" name="product_name" value="<?php  echo set_value('product_name'); ?>"><br>
            <label>Category</label>
            <select name="category_id">
                  <?php  foreach($categories as $cat) {?>
                               
                                  <option value="<?php echo $cat['category_id']; ?>"
                                    <?php if(set_value('category_id')==$cat['category_id'])
                { echo 'selected';} ?> >
                                   <?php echo $cat['category_name'];?>
                                   </option>
                        <?php  } ?> 
            </select>
             <label>Product Price</label>
            <input type="text" name="product_price" value="<?php echo set_value('product_price'); ?>"><br>
              <label>Product Description</label>
            <textarea name="product_description"> <?php echo set_value('product_description'); ?> </textarea><br>
             <label>Main Image</label>
            <input type="file" name="product_image"><br>
              <label>Extra Images</label>
            <input type="file" name="product_extraimages[]" multiple><br>
            <input type="submit" name="submit" value="Save">

        
        </form>

    </body>
</html>
