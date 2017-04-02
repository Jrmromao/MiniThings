<?php
class Account extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('AccountModel');
        $this->load->model('UserModel');
        $this->load->model('VendorModel');
        $this->load->model('HomeModel');
        $this->load->model('WishlistModel');

    }
    public function profile(){
        $session_data = $this->session->userdata('logged_in');

        switch (@$session_data['user_cat']) {
            case "Administrator":
                $data['details']    = $this->UserModel->getUser($session_data['userID']);
                $data['products']   = $this->VendorModel->getProductVendor($session_data['Vendor_Representative']);
                $data['customer']   = $this->UserModel->getAllCustumers();
                $data['session']    = $this->UserModel->getVisitors();
                $data['customersLIMIT15'] = $this->UserModel->getAllCustumersLimit15();
                $data['views'] = $this->HomeModel->getAllProducts();
                $data['title']      =  "Administrator";
                $this->load->view('user_page', $data);
                break;
            case "Vendor":
                $data['details'] = $this->UserModel->getUser($session_data['userID']);
                $data['products'] = $this->VendorModel->getProductVendor($session_data['Vendor_Representative']);
                $data['customer'] = $this->UserModel->getAllCustumers();
                $data['session']    = $this->UserModel->getVisitors();
                $data['customersLIMIT15'] = $this->UserModel->getAllCustumersLimit15();
                $data['title'] =  "Vendor";
                $data['views'] = $this->HomeModel->getAllProducts();
                $this->load->view('user_page', $data);
                break;
            default:

                $data['customerNum'] = $session_data['userID'];
                $customerNumber =  $data['customerNum'];
                $data['customerDetails'] = $this->AccountModel->getCustomerAccount($customerNumber);
                $data['custOrder'] = $this->AccountModel->getOrderByCus($customerNumber);
                $data['title'] = "myAccount";
                $this->load->view('profile', $data);
                break;
        }




        }






}