<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 18/01/2017
 * Time: 15:30
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('AccountModel');
        $this->load->model('UserModel');
        $this->load->library('table');
        $this->load->model('VendorModel');

        $this->load->library('user_agent');
    }


    public function vendorProducts()
    {


        if (!$this->session->userdata('logged_in')) {

            redirect('Home');
        } else {
            $productVendorLink = $this->uri->segment(3);
            $productVendor = urldecode($productVendorLink);

            $data['product'] = $this->VendorModel->getProductVendor($productVendor);//the product code is coming from the url
            $data['title'] = "$productVendor";
            $this->load->view('user_products', $data);

        }
    }
    public function addProducts(){

        if (!$this->session->userdata('logged_in')) {

            redirect('Home');
        }else {
        $productVendorLink = $this->uri->segment(3);
        $productVendor = urldecode($productVendorLink);

        $data['product'] = $this->VendorModel->getProductVendor($productVendor);//the product code is coming from the url
        $data['title'] = "$productVendor";

        $this->load->view('user_products', $data);

    }
    }

    public function updateCredit(){

        $data['customerNumber'] = $this->input->post('customerNumber');
        $data['creditLimit'] = $this->input->post('creditLimit');


        if ( $this->UserModel->updateCredit($data))
            redirect($this->agent->referrer());
        else
            return false;


    }






}