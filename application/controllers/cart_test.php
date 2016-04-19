<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Cart_test extends CI_Controller {
        
        function add()
        {
            $data = array(
            'id' => '42',
            'name' => 'Pants',
            'qty' => 1,
            'price' => 19.99,
            'options' => array('size' => 'medium')
            );
        

        $this->cart->insert($data);
        echo "add() called";
        }
    
    function show()
    {
        $cart = $this->cart->contents();
    }
    function update()
    {
        $data = array(

              'rowid' =>'',
              'qty' =>'1'       

        );
        $this->cart->update($data);

    }
    function total()
    {
        echo $this->cart->total();
    }
    function remove()
    {
        $data = array(
                'rowid' => '',
                'qty' => '0'
        
        );
        $this->cart->update($data);
    }

    function destroy()
    {
        $this->cart->destroy();
    }
}
   
