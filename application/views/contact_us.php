
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Contact Us</title>
    </head>
    <body>
        <h1>Contact Us Page</h1>
        <?php echo validation_errors(); ?>
        <form action="<?php echo base_url();?>index.php/home/contact_us_data" method="post">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?php echo set_value('full_name'); ?>"><br>

            <label>Your Email</label>
            <input type="email" name="email" value="<?php echo set_value('email'); ?>"><br>
            
            <label>Your Phone number</label>
            <input type="text" name="phone" value="<?php echo set_value('phone'); ?>"><br>
            
            <label>Company Name</label>
            <input type="text" name="company_name" value="<?php echo set_value('company_nmae'); ?>"><br>
            
            <label>Subject</label>
            <input type="text" name="subject" value="<?php echo set_value('subject'); ?>"><br>
            
            <label>Message</label>
            <textarea name="message"><?php echo set_value('message'); ?></textarea><br>

            <input type="submit" name="submit" value="Send Message">
       
        </form>
    </body>
</html>
