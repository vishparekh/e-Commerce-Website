<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin show/add/edit Categories</title>
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
          $count = count($categories);
          if($count<12)
          {?>
              
        <h5>Add a category</h5>
        <form action="<?php echo base_url(); ?>index.php/admin/add_a_category" method="post">
            <label>Category Name</label>
            <input type="text" name="category_name" >
            <input type="submit" name="submit" value="Add">
        </form>
            

    <?php }

        //show all categories
        $var = array('Category Name','Edit','Delete');
        $this->table->set_heading($var);
        foreach($categories as $category)
        {
            $this->table->add_row(array($category['category_name'],'<a href="'.base_url().'index.php/admin/edit_category/'. $category['category_id'].'">Edit</a>',
            '<a href="'.base_url().'index.php/admin/delete_category/'. $category[   'category_id'].'">Delete</a>'));
        }

        echo $this->table->generate();

        //create a conditional to edit a single category
        if(isset($single_cat))
        {
        ?>
        <h5>Edit Category</h5>
        <form action="<?php echo base_url();?>index.php/admin/save_edited_cat" method="post">
            <label>Change Category name</label>
            <input type="text" name="category_name" value="<?php echo $single_cat['category_name']; ?>" ><br>
            <input type="hidden" name="category_id" value="<?php echo $single_cat['category_id']; ?>"><br>
            <input type="submit" name="submit" value="Save">
        
        </form>


        <?php
        }


       ?> 
    </body>
</html>
