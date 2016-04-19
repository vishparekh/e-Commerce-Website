<?php
class mhome extends CI_Model{

    function get_header()
    {
        //get latest news
        $this->db->select('news_item');
        $this->db->where('chosen','yes');
        $this->db->order_by('posted_at', 'desc');
        $this->db->limit(4);
        $query= $this->db->get('latest_news'); 
        $return['news'] = $query->result_array();

        //get submenu for products
        $this->db->select('category_id,category_name');
        $this->db->order_by('no_of_times_viewed', 'desc');
        $this->db->limit(3);
        $query =  $this->db->get('categories');
        $return['product_submenu'] = $query->result_array();
        return $return;
    }

    function get_slideshow()
    {
        //this function gives slideshow data accordingly
        $this->db->where('chosen','yes');
        $this->db->order_by('posted_at','desc');
        $this->db->limit(4);
        $query = $this->db->get('slideshow');
        return $query->result_array();

    }

    function get_footer()
    {
        //this function gives footer of 10 popular products images
        $this->db->select('product_id,product_name,product_image');
        $this->db->order_by('no_of_times_viewed','desc');
        $this->db->limit(10);
        $query = $this->db->get('products');
        return $query->result_array();
        
    }
    
    function get_latest_products()
    {
        //this will give latest poducts to homepage

        $this->db->select('product_id,product_name,product_price,product_description,product_image,posted_at');
        $this->db->order_by('posted_at','desc');
        $this->db->limit(6);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    function get_categories()
    {
        //this will give you all categories
        $this->db->select('category_id,category_name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    function get_aboutusdata()
    {
        //this will give all the aboutus data from aboutus table
        $query = $this->db->get('aboutus');
        return $query->result_array();
    }
    function get_products()
    {
        //this will give all products according to categories
        $cats = $this->mhome->get_categories();
        $i=0;
        foreach($cats as $cat)
        {
            //get the producrs
            $return[$i]['cat'] = $cat['category_name'];
            $return[$i]['cat_id'] = $cat['category_id'];
            $this->db->where('category_id',$cat['category_id']);
            
            $query  = $this->db->get('products');
            $return[$i]['products'] = $query->result_array();
            $i++;
        }
        return $return;
    }
    function get_product($id)
    {
        //this will return single product according to id
        $this->db->where('product_id',$id);
        $query = $this->db->get('products');
        //increase the number of views for product
        $array = $query->row_array();
        $new_views = $array['no_of_times_viewed']+1;
        $data = array('no_of_times_viewed'=>$new_views);

        $this->db->where('product_id',$id);
        $this->db->update('products',$data);

        //increase the number of views for category
        $this->db->select('no_of_times_viewed');
        $this->db->where('category_id',$array['category_id']);
        $newquery = $this->db->get('categories');
        if($newquery->num_rows()>0)
        {
              $newarray = $newquery->row_array();
              $newdata = array('no_of_times_viewed' => $newarray['no_of_times_viewed']+1);
              $this->db->where('category_id',$array['category_id']);
              $this->db->update('categories',$newdata);
      
      
        }
        return $query ->row_array();


        //echo $array['no_of_times_viewed'];
        //echo '<br>';
        //echo $new_views;
        //return $query->row_array();
    }
    public function get_cat_name($cat_id)
    {
        //function returns the cat name by cat id
        $this->db->where('category_id',$cat_id);
        $query = $this->db->get('categories');
        if($query->num_rows()>0)
        {
            $array = $query->row_array();
            return $array['category_name'];

        }
        
    }
    function add_product()
    {
       //check if cart has products and update . if its the same product being added again and return false.
       //else  
        
        $data = array(
        'id'      => $this->input->post('product_id'),
        'qty'     => 1,
        'price'   => $this->input->post('product_price'),
        'name'    => $this->input->post('product_name')
        //'options' => array('Size' => 'L', 'Color' => 'Red')
         );
        // echo '<pre>';
         //var_dump($data);

         $this->cart->insert($data);
         return TRUE;
    }

    function update_products()
    {
        //this function updates the product 
        $quantities = $this->input->post('qty');
        $prod_ids = $this->input->post('prodid');
        $row_ids = $this->input->post('rowid');
        foreach($prod_ids as $id)
        {
            $count = count($this->input->post('prodid'));
            for($i=0;$i<$count;$i++)
            {
                $array[$i]  = array('qty' => $quantities[$i],
                                     'rowid' => $row_ids[$i]
                );
            }
        }
        $this->cart->update($array);
        return TRUE;

    }

    function remove_from_cart($rowid)
    {
        //this function removes product

        $data = array(
        'rowid' => $rowid,
        'qty'   => '0'
        );
       // var_dump($data);
        $this->cart->update($data);

    }
    
   function create_order()
    {
    //creates order
      $contents = $this->cart->contents();
      $i = 0;
      foreach($contents as $content)
      {
          $names[$i] = $content['name'];
          $prices[$i] = $content['price'];
          $qtys[$i] = $content['qty'];
          $i++;
      }
      $data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'email_id' => $this->input->post('email_id'),
      'phone_no' => $this->input->post('phone_no'),
      'address_line1' => $this->input->post('address_line1'),
      'address_line2' => $this->input->post('address_line2'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'pincode' => $this->input->post('pincode'),
      'company_name' => $this->input->post('company_name'),

      'product_names' => implode('|',$names),
      'product_prices' => implode('|',$prices),
      'product_qtys' => implode('|',$qtys),
      'order_total' => $this->cart->total(),
      'ordered_date' => time()
       );

      //if first name and order date is same return true

      $this->db->select('first_name,product_names,order_total');
      $this->db->order_by('order_id','desc');
      $this->db->limit(2);
      $query = $this->db->get('orders');
      $recent_order =  $query->row_array();

      if($recent_order['first_name']= $data['first_name'] && $recent_order['order_total']= $data['order_total'] && $recent_order['product_names']= $data['product_names'] )
      {
          return FALSE;
      }
      else
      {
       //create order and add details into the database
      //return true
      //mail to admin email id
        $this->email->from('your@example.com', 'Admin');
        $this->email->to($data['email_id']);
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Your Order was created succesfully');
        $tabledata = array(
        $data['product_names'],
        $data['product_prices'],
        $data['product_qtys']
        );
        $this->email->message(
        
        "Your order was created for following products \n "
        //"Order Total was: ".$data['order_total']."\n".
       // $this->table->generate($tabledata) 
        );

        $this->email->send();
        $this->email->clear();

        $this->email->from('your@example.com', 'Admin');
        $this->email->to($data['email_id']);
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Your Order is Placed');
        $this->email->message(
        
    /*    "Order Details\n "
       "First Name: ".$data['first_name']."\n".
       "Last Name: ".$data['last_name']."\n".
       "Email Id:".$data['email_id']."\n".
       "Phone Number:".$data['phone_no']."\n".
       "Address Line1:".$data['address_line1']."\n".
       "Address Line2".$data['address_line2']."\n".
       "City".$data['city']."\n".
       "State".$data['state']."\n".
       "Pin Code".$data['pincode']."\n".
       "Company Name".$data['company_name']."\n".

        "Order Total was: ".$data['order_total']."\n"
        $this->table->generate($tabledata) */
       
        );

        $this->email->send();
        //enter it into db return true and destroy the cart
        $this->db->insert('orders',$data);
        $this->cart->desttroy();

        return TRUE;

        }

        }
        function contact_us()
        {
            //this function will  send the email to admin and confirmation mail to user

        $this->email->from('your@example.com', 'Admin');
        $this->email->to('your@example.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject($this->input->post('subject'));
        $message = "Name".$this->input->post('full_name')."\n"
                    ."Email".$this->input->post('email')."\n"
                    ."Phone Number".$this->input->post('phone')."\n" 
                    ."Company Name".$this->input->post('company_name')."\n"
                    ."Subject".$this->input->post('subject')."\n"
                    ."Message".$this->input->post('message');

        $this->email->message($message);
      
        $this->email->send();
        $this->email->clear();


        $this->email->from('your@example.com', 'Admin');
        $this->email->to($this->input->post('email'));
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Contact form was filled');
        $newmessage = "Thank You for filling the contact us form on the website"."\n"
                     .$this->input->post('full_name')."\n"
                    ."We will be contacting you shortly. Thank You.";
        $this->email->message($newmessage);
      
        $this->email->send();
         
        }


        public function login()
        {
          
            //this function will logged in the user as admin if data matches and save it in the session

            $sha1pass = sha1($this->input->post('password'));
            $this->db->where('username',$this->input->post('username'))->where('password',$sha1pass);
           // $this->db;
          
            $query = $this->db->get('admin');
            $q=$query->result_array();
            //var_dump($q);
            if(count($q)==1)
            {
             $array = $query->row_array();
             $data = array(
                    'logged_in' => TRUE,
                    'username' => 'admin'
             
                             );     
             $this->session->set_userdata($data);
             return TRUE;
            }
            else
            {
                //echo $this->input->post('username');

                return FALSE;
            }

        }
        
        //funtion gets all products to show in the showproducts page to the admin
        function admin_get_products()
        {
           $query = $this->db->get('products');
           $array = $query->result_array();
           foreach($array as $key=>$value)
           {
               $array[$key]['category_name'] = $this->mhome->get_cat_name($array[$key]['category_id']);
           }
           return $array;
        }
            
        function admin_get_product($prod_id)
        {
            $this->db->where('product_id',$prod_id);
            $query = $this->db->get('products');
            $array =  $query->row_array();
            $array['category_name'] = $this->mhome->get_cat_name($array['category_id']);
            return $array;
        }
        
        //function deletes the product according to the product id
        function delete_product($prod_id)
        {
            $this->db->where('product_id',$prod_id);
            $this->db->delete('products');
        }

        //function saves the edited product
        function save_edited_product()
        {
          $this->load->library('form_validation');
            $this->form_validation->set_rules('product_name','Product Name','required');
            $this->form_validation->set_rules('product_price','Product Price','required');
            $this->form_validation->set_rules('product_description','Product Description','required');
            if($this->form_validation->run() == FALSE)
            {
                echo 'false';
                return FALSE;   
            }
            else
            {
                if($_FILES['product_image']['size']>0)
                {
                    $config['upload_path'] = './images/.';
                    $config['allowed_types']  = 'gif|jpg|png';
                    $config['max_size'] = '100000';
                    $config['max_width'] = '2000';
                    $config['max_height'] ='1600';
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('poduct_image'))
                    {
                        return FALSE;
                    }
                    else
                    {
                        $upload_data = $this->upload->data();   
                    }
                }
                if(isset($upload_data))
                {
                    $product_image = $upload_data['file_name'];
                }
                else
                {
                    $product_image = 'default.jpg';
                }

                if($_FILES['product_extraimages']['size'][0]>0)
                {
                    $reconfig['upload_path'] = './images/.';
                    $reconfig['allowed_types']  = 'gif|jpg|png';
                    $reconfig['max_size'] = '100000';
                    $reconfig['max_width'] = '2000';
                    $reconfig['max_height'] ='1600';
                    $this->upload->initialize($reconfig);
                    $images_upload_data = $this->upload->do_multi_upload('extra_images');
                    if(!$images_upload_data)
                    {
                        return FALSE;
                    }
                    else
                    {
                        $i = 0;
                        foreach($images_upload_data as $data)
                        {
                            $extra_images_filename[$i] = $data['filename'];
                                $i++;
                        }
                    }
                }
                if(isset($extra_images_filename))
                {
                    $product_extraimages = implode('|','$extra_images_filename');
                }
                else
                {
                    $product_extraimages = ' ';
                }
                $product_id = $this->input->post('product_id');
                $product_data_array = array(
                        'product_name' => $this->input->post('product_name'),
                        'product_price' => $this->input->post('product_price'),
                        'product_description' => $this->input->post('product_description'),
                        'product_image' => $product_image,
                        'product_extraimages' => $product_extraimages,
                        'category_id' =>$this->input->post('category_id'),
                        'no_of_times_viewed' => 0,
                        'posted_at' => time()
                          );
                        $this->db->where('product_id',$product_id);
                        $this->db->update('products',$product_data_array);
                        return TRUE;
                }
          
        }




        //function to add new product in db
        function addproduct()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('product_name','Product Name','required');
            $this->form_validation->set_rules('product_price','Product Price','required');
            $this->form_validation->set_rules('product_description','Product Description','required');
            if($this->form_validation->run() == FALSE)
            {
                return FALSE;   
            }
            else
            {
                if($_FILES['product_image']['size']>0)
                {
                    $config['upload_path'] = './images/.';
                    $config['allowed_types']  = 'gif|jpg|png';
                    $config['max_size'] = '100000';
                    $config['max_width'] = '2000';
                    $config['max_height'] ='1600';
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('poduct_image'))
                    {
                        return FALSE;
                    }
                    else
                    {
                        $upload_data = $this->upload->data();   
                    }
                }
                if(isset($upload_data))
                {
                    $product_image = $upload_data['file_name'];
                }
                else
                {
                    $product_image = 'default.jpg';
                }

                if($_FILES['product_extraimages']['size'][0]>0)
                {
                    $reconfig['upload_path'] = './images/.';
                    $reconfig['allowed_types']  = 'gif|jpg|png';
                    $reconfig['max_size'] = '100000';
                    $reconfig['max_width'] = '2000';
                    $reconfig['max_height'] ='1600';
                    $this->upload->initialize($reconfig);
                    $images_upload_data = $this->upload->do_multi_upload('extra_images');
                    if(!$images_upload_data)
                    {
                        return FALSE;
                    }
                    else
                    {
                        $i = 0;
                        foreach($images_upload_data as $data)
                        {
                            $extra_images_filename[$i] = $data['filename'];
                                $i++;
                        }
                    }
                }
                if(isset($extra_images_filename))
                {
                    $product_extraimages = implode('|','$extra_images_filename');
                }
                else
                {
                    $product_extraimages = ' ';
                }

                $product_data_array = array(
                        'product_name' => $this->input->post('product_name'),
                        'product_price' => $this->input->post('product_price'),
                        'product_description' => $this->input->post('product_description'),
                        'product_image' => $product_image,
                        'product_extraimages' => $product_extraimages,
                        'category_id' =>$this->input->post('category_id'),
                        'no_of_times_viewed' => 0,
                        'posted_at' => time()
                          );
                        $this->db->insert('products',$product_data_array);
                        return TRUE;
                }
            }

            //function to add a category
            function add_a_category()
            {
                $this->form_validation->set_rules('category_name','Category Name','required');
                //  |xss_clean|max_length[100]|is_unique[categories.category_name]
              if($this->form_validation->run()==FALSE)
               {
                    return FALSE;
               }
                else
                {
                    $data = array(
                                  'category_name' => $this->input->post('category_name')
                                       
                                  );
                                  $this->db->insert('categories',$data);
                                  return TRUE;

                    
                }
            }

            //function to get a category based on cat_id
            function get_a_category($cat_id)
            {
                $this->db->where('category_id',$cat_id);
                $query = $this->db->get('categories');
                return $query->row_array();
            }
         //function to save edited category
         function save_edited_cat()
         {
             $this->form_validation->set_rules('category_name','Category Name','required');
             if($this->form_validation->run()== FALSE )
             {
                 //echo 'false';
                 return FALSE;
             }
             else
             {
                 $data = array(
                                    'category_name' => $this->input->post('category_name')
                                );
                                $this->db->where('category_id',$this->input->post('category_id'));
                                $this->db->update('categories',$data);
                                //echo 'true';
                                return TRUE;
             }
         }

         //function to delete a category
         function delete_category($cat_id)
         {
             $this->db->where('category_id',$cat_id);
             $this->db->delete('categories');
         }
}