<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        if($this->input->get('message'))
        {
            $data['message'] = $this->input->get('message');
        }
        $data['header'] = $this->mhome->get_header();
        $data['slideshow'] = $this->mhome->get_slideshow(); 
        $data['lat_prods'] = $this->mhome->get_latest_products();
        $data['categories'] = $this->mhome->get_categories();
        $data['footer'] = $this->mhome->get_footer();
		$this->load->view('home_page',$data);
	}
    public function aboutus()
    {
        $data['header'] = $this->mhome->get_header();
        $data['about'] =$this->mhome->get_aboutusdata();
        $data['categories'] = $this->mhome->get_categories();
        $data['footer'] = $this->mhome->get_footer();
        $this->load->view('about_us',$data);
	
    }
    public function products()
    {
        $data['header'] = $this->mhome->get_header();
        $data['products'] = $this->mhome->get_products();
        $data['categories'] = $this->mhome->get_categories();
        $data['footer'] = $this->mhome->get_footer();
        $this->load->view('products_page',$data);
    }
    public function product($id=NULL)
    {
        if(is_null($id))
        {
            redirect('/index');

        }
        else{
            $data['header'] = $this->mhome->get_header();
            $data['product'] = $this->mhome->get_product($id);
            $data['categories'] = $this->mhome->get_categories();
            $data['footer'] = $this->mhome->get_footer();
       
            $this->load->view('single_product_page',$data);
        }
    }
  

    public function add_to_cart()
    {
        //validate the data
        //send email
        //autodirect to page where  the add to cart is happening
        //we can update a session with cart data
       

        if($this->mhome->add_product())
        {
           // echo 'Done';
            $message='Poduct has been added to cart';

        }
        else
        {
            echo 'Not Done';
            $message= 'Product has been updated to in the cart';
        }
        
        echo $message.' '.anchor("home/show_cart","Show the cart");

    }
    function show_cart()
    {
        //check if there are products in cart
        if($this->cart->total_items()>=0)
        {
            $data['contents'] = $this->cart->contents();
            $this->load->view('cart',$data);

        }
        else{
            redirect('/home');
        }
    }
    function update_cart()
    {
        //updtae the session as well
        if(($this->cart->total_items()>0) && ($this->input->post('submit')))
        {
            $this->mhome->update_products();
            $this->show_cart();
        }
        else{
            redirect('/home');
        }
    }

    function remove_from_cart($rowid=NULL)
    {
       if($rowid==NULL)
       {
           redirect('/home');
       } 
       else
       {
            $this->mhome->remove_from_cart($rowid);
            $this->show_cart();
       
       }
    }
    function buy()
    {
        //validate the data and send the email to the admin with the user details and product ordered
     $this->load->library('form_validation');
     $this->form_validation->set_rules('first_name','First Name','required|xss_clean|max_length[200]');
     $this->form_validation->set_rules('last_name','Last Name','required|xss_clean|max_length[200]');
     $this->form_validation->set_rules('email_id','Email Address','required|xss_clean|valid_email');
     $this->form_validation->set_rules('phone_no','Phone Number','required|xss_clean|integer');
     $this->form_validation->set_rules('address_line1','Address Line1','required|xss_clean|max_length[200]');
     $this->form_validation->set_rules('address_line2','Address Line2','required|xss_clean|max_length[200]');
     $this->form_validation->set_rules('city','City','required|xss_clean|max_length[100]');
     $this->form_validation->set_rules('state','State','required|xss_clean|max_length[100]');
     $this->form_validation->set_rules('pincode','Pincode','required|xss_clean|integer|max_length[8]|min_length[6]');
     $this->form_validation->set_rules('company_name','Company Name','xss_clean|max_length[100]');

     if($this->form_validation->run() == FALSE)
     {
         $this->show_cart();
     }
     else
     {
         if($this->mhome->create_order())
         {
            $message = "Order was Placed Successfully, you will be contacted soon.";   
         }
         else
         {
             $message = "Order was not created, please tyr again or contact us";
         }
         redirect('/home/?message'.urlencode($message));
     }
    
    }
    function contact()
    {
        $this->load->view('contact_us');
    }

    function contact_us_data()
    {
        if($this->input->post('submit'))
        {
           $this->load->library('form_validation');
           $this->form_validation->set_rules('full_name','Full Name','required|xss_clean');
           $this->form_validation->set_rules('email','Email','required|vaild_email|xss_clean');
           $this->form_validation->set_rules('phone','Phone Number','required|integer|xss_clean');
           $this->form_validation->set_rules('company_name','Company Name','required|xss_clean');
           $this->form_validation->set_rules('subject','Subject','required|xss_clean');
           $this->form_validation->set_rules('message','Message','required|xss_clean');
          
          
           if($this->form_validation->run()==FALSE )
           {
               $this->contact();
           }
           else
           {
               $this->mhome->contact_us();
           }
            $message = 'Your Information was sent successfully, we will be contacting you soon';
            redirect('/home/?message'.urlencode($message));
        }
        else
        {
            redirect('/home');
        }
    }
}

        