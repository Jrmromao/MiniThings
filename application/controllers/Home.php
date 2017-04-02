<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('HomeModel');


    }
    public function index()
    {

        $data['categories'] = $this->HomeModel->getAllCategories();
        $data['featureItems'] = $this->HomeModel->getFeatureItems();
        $data['productVendor'] = $this->HomeModel->getAllProductVendor();
        $data['lowPrice'] = $this->HomeModel->getLowItemPRice();
        $data['title'] = "Home";


    if($this->session->userdata('logged_in')) {
   
     //get the session data
     $session_data = $this->session->userdata('logged_in');
 	 //get the username from the session and put it in $data
     $data['email'] = $session_data['email'];
	 
	 //load view with the username included in $data
     $this->load->view('index', $data);
   }
   else 
     //if no session, redirect to login page
     $this->load->view('index', $data);
   }//end function index()


    function Admin(){

        if($this->session->userdata('logged_in')) {

            //get the session data
            $session_data = $this->session->userdata('logged_in');
            $data['user_num'] = $session_data['userID'];
            redirect('Account/profile');
        }else{
            $this->load->view('user_login');
        }

    }
   
}