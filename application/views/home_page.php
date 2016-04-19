<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home Page</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Home Page</h1>
    <?php 
        if($this->input->get('message'))
        {
            echo $this->input->get('message').'<br>';
        }
       
    ?>
    <?php
        $news = $header['news'];
        echo 'The Latest news is'.'<br>';
        foreach($news as $latestnews)
        {
            echo $latestnews['news_item'].'<br>';
        }

        echo '<br>';
        echo '<br>';

        $product_submenu = $header['product_submenu'];
        echo 'Product Submenu is '.'<br>';
        foreach($product_submenu as $submenu)
        {
            echo '<a href=" '.base_url().'index.php/home/products#'.$submenu['category_id'].' ">' . $submenu['category_name'].'</a>'.'<br>';
        }

        echo '<br>';
        echo '<br>';
        echo 'Slideshow is here <br>';
        foreach($slideshow as $slide)
        {
            echo 'this is an img tag Image name = '.$slide['slide_name'].' ';
            echo 'this was posted at ' .unix_to_human((int)$slide['posted_at']).'<br>';

        }

        echo '<br>';
        echo '<br>';

        echo 'Latest Products are';
        $i=1;
        foreach($lat_prods as $prod)
        {
            echo $i .'<br>';
            echo 'Product Price:' . $prod['product_price']. '<br>';
            echo 'Product Image:' . $prod['product_image']. '<br>';
            echo 'Product Name:<a href=" ' .base_url().'index.php/home/product/' .$prod['product_id'].'">' . $prod['product_name']. '</a><br>';
            echo 'Product Description:' . $prod['product_description']. '<br>';
            echo 'Product ID:' . $prod['product_id']. '<br>';
            $i++;
        
        }

        echo '<br>';
        echo '<br>';

        echo 'Categories For sidebar comes here';
        foreach($categories as $cat)
        {
            echo 'Category Name: <a href="'.base_url().'index.php/home/products#'.$cat['category_id'].'">'.$cat['category_name'].'</a><br>';
            echo 'Category ID:'.$cat['category_id'].'<br>';

        }

        echo 'The footer is here(popular products)<br>';
        foreach($footer as $pop)
        {
            echo '<a href = " ' .base_url().'index.php/home/product/' .$pop['product_id'].' ">img src=" '.$pop['product_image'].' " title = " '.$pop['product_name'].' "</a><br>'; 
        }
   
    ?>
</div>

</body>
</html>