
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login Page</title>
    </head>
    <body>
        <?php echo validation_errors(); ?>
        <?php if(isset($message)){echo $message;}
 
         ?>
        <form  autocomplete="off" action="<?php echo base_url();?>index.php/admin/login" method="post">
            <label>Username</label>
            <input type="text" name="username"  value="<?php echo set_value('username'); ?>"><br>
           

            <label>Password</label>
            <input type="text" name="password" value="<?php echo set_value('password'); ?>"><br>


            <input type="submit" name="submit" value="Login">


        </form>
        
    </body>
</html>
