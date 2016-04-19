
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
        
    </body>
</html>
