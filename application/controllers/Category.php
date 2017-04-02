<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 09/12/2016
 * Time: 11:36
 */
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('CategoryModel');
    }

public function category(){


    $productLine = $this->uri->segment(3);

    $productDecode = urldecode($productLine);

    $data['categories'] = $this->CategoryModel->getProductCat($productDecode);//the product code is coming from the url
    $data['title'] = "Category";

    $this->load->view('category', $data);

}



}