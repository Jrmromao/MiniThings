<?php
/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 26/01/2017
 * Time: 21:39
 */

class View extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('AccountModel');
        $this->load->model('OrderModel');
        $this->load->library('user_agent');


    }
    public function viewOrder(){
        $session_data = $this->session->userdata('logged_in');

        $data['orderNumber'] = $this->uri->segment(3);
        $orderNum = $this->uri->segment(3);

        $data['customerNumber'] = $session_data['userID'];

        $data['status'] = $this->AccountModel->getOrderStatusByCus($orderNum);



        $data['orderDetails'] = $this->OrderModel->getOrder($data);
        $this->load->view('viewOrder', $data);

    }






}