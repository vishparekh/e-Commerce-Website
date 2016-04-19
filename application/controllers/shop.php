<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller
{
    function index()
    {
        $this->load->model('Products_model');
        $data['products'] = $this->Products_model->get_all();

        //echo '<pre>';
       //var_dump($data['products']);
        $this->load->view('products',$data);
    }
    function add()
    {
        $this->load->model('Products_model');
        $product = $this->Products_model->get($this->input->post('product_id'));

        $insert = array(
        
         'id'      => $this->input->post('product_id'),
        'qty'     => 1,
        'price'   => $product->product_price,
        'name'    => $product->product_name
        );

        $this->cart->insert($insert);
        //redirect('shop');
    }
}