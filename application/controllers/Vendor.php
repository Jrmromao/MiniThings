<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 18/01/2017
 * Time: 14:25
 */
class Vendor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('VendorModel');

    }

    public function vendor()
    {
        $productVendorLink = $this->uri->segment(3);
        $productVendor = urldecode($productVendorLink);

        $data['categories'] = $this->VendorModel->getProductVendor($productVendor);//the product code is coming from the url
        $data['title'] = "$productVendor";

        foreach ($data['categories'] as &$row) {
            // $img = $row['image'];
            //$row['image'] =  img("assets/images/products/".$img);
        }


        $this->load->view('category', $data);


    }


}