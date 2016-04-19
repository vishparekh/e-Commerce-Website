<?php

class Admin extends CI_Controller
{
    
    function index()
    {
        //show login page if already login redirect to loggedin function
         if($this->input->get('message'))
            {
                $data['message']= $this->input->get('message');
            } 
            else
            {
                $data['message'] = 'Welcome';
            }

        if($this->session->userdata('logged_in') && ($this->session->userdata('username')=='admin'))
        {
            $this->logged_in();
        }
        else
        {
            $this->load->view('admin_login',$data); 
        }
       
    }

    function login()
    {
        //check if the user data matches and log in 
         if($this->session->userdata('logged_in') && ($this->session->userdata('username')=='admin'))
         {
             $this->logged_in();
         }
         elseif($this->input->post('submit'))
         {
             $this->load->library('form_validation');
             $this->form_validation->set_rules('username','Username', 'required');
             $this->form_validation->set_rules('password','Password', 'required');
              
             if($this->form_validation->run()==FALSE)
             {
                 $this->load->view('admin_login');
         

             }
             else
             {  
                //echo $this->input->post('username');
                //echo "<br />"
                //echo $this->input->post('password');
                $a=$this->mhome->login();
                 if($a)
                 {
                     $message = "WELCOME";
                 }
                 else
                 {
                     $message = "Username/Password is invalid";

                 }
                 redirect('/admin/index/?message='.urlencode($message));
             }
        
         }
        
    }

    function logged_in()
    {
        //check if user is logged in 
        if($this->input->get('message'))
            {
                $data['message']= $this->input->get('message');
            } 
            else
            {
                $data['message'] = 'Welcome';
            }

         if($this->session->userdata('logged_in') && ($this->session->userdata('username')=='admin'))
         {
            
            //load view with admin control
            $this->load->view('admin_control',$data);
         }
         else
         {
             $this->index();
         }
         

    }

    function show_all_products()
    {
        if($this->session->userdata('logged_in'))
        {
            $data['categories'] = $this->mhome->get_categories();
            $data['products'] = $this->mhome->admin_get_products();
            $this->load->view('admin_showproducts',$data);
        }
        else
        {
            redirect('/admin');
        }

    }

    //function to edit single product
    function edit_single_product($prod_id)
    {
        if($this->session->userdata('logged_in'))
        {
            $data['product'] = $this->mhome->admin_get_product($prod_id); 
            $data['categories'] = $this->mhome->get_categories();
            $this->load->view('admin_showproducts',$data);
        }
          else
        {
            redirect('/admin');
        }
    }
    function save_edited_product()
    {
        if($this->session->userdata('logged_in'))
        {
            if($this->mhome->save_edited_product())
            {
                
                $message = 'Product was saved successfully';
            }
        
             else
            {
                $message = 'Product was not saved. Please make sure the fields marked required are present and the image doesnt exceed the limit.';

             }
             redirect('/admin/show_all_products/message',$message);
        }
        else
        {
            redirect('/admin');
        }
    }

    //function to delete product using incoming prod id
    function remove_product($prod_id =NULL )
    {
        if($this->session->userdata('logged_in'))
        {
            if(!is_null($prod_id))
            {
                $this->mhome->delete_product($prod_id);
            }
            $this->show_all_products();

        }
        else
        {
            redirect('/admin');
        }
    }

    //function to add a new product
        function add_product()
        {
             if($this->session->userdata('logged_in'))
             {
                 if($this->mhome->addproduct())
                 {
                    $message = 'Product was added successfully';   
                 }
                 else
                 {
                     $message = 'Product was not added. Please check and try again.';
                 }
                  redirect('/admin/show_all_products/message',$message);
             }
             else
             {
                  redirect('/admin');
             }
        }

        //function to add/modify categories
        function show_categories()
        {
             if($this->session->userdata('logged_in'))
             {
                 if($this->input->get('message'))
                 {
                     $data['message'] = $this->input->get('message');
                 }
                 $data['categories'] = $this->mhome->get_categories();
                 $this->load->view('admin_showcategories',$data);
             }
              else
             {
                  redirect('/admin');
             }
        }

        //function  to add a single category
        function add_a_category()
        {
             if($this->session->userdata('logged_in'))
             {
                 if($this->mhome->add_a_category())
                 {
                     $message = 'Category was added successfully';
                 }
                 else
                 {
                     $message = 'Category was not added . Please check if category already exists and it is below 100 characters.';
                 }
                redirect('/admin/show_categories/?message='.urlencode($message));
             }
             else
             {
                 redirect('/admin');
             }
        }

        //function to edit a category
            function edit_category($cat_id = NULL)
            {
                 if($this->session->userdata('logged_in'))
                 {
                     if(!is_null($cat_id))
                     {
                         $data['single_cat'] = $this->mhome->get_a_category($cat_id);
                     }
                      $data['categories'] = $this->mhome->get_categories();
                      $this->load->view('admin_showcategories',$data);
                     
                 }
                 else
                 {
                    redirect('/admin');
                 }

            }
            //function to save edited category
            function save_edited_cat()
            {
                 if($this->session->userdata('logged_in'))
                 {
                   $this->mhome->save_edited_cat();
                   $this->show_categories();
                 }
                 else
                 {
                    redirect('/admin');
                 }
                
                
            }

            //function to delete a category
            function delete_category($cat_id=NULL)
            {
                 if($this->session->userdata('logged_in'))
                 {
                     if(!is_null($cat_id))
                     {
                         $this->mhome->delete_category($cat_id);
                     }
                     $this->show_categories();
                 }
                 else
                 {
                    redirect('/admin');
                 }
                
            }
            //function to logout
            function logout()
            {
                $this->session->sess_destroy();
                redirect('/admin/?message=Logged+out');
            }
}