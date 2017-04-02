<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 22/01/2017
 * Time: 00:09
 */
class Update extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('AccountModel');
        $this->load->model('UserModel');
        $this->load->library('user_agent');

    }
public function update_order(){

         $data['orderNumber'] = $this->input->post('orderNumber');
         $data['requiredDate'] = $this->input->post('requiredDate');
         $data['comments'] = $this->input->post('comment');
         $data1['quantityOrdered'] = $this->input->post('qty');
         $data1['productCode'] = $this->input->post('productCode');



   if($this->AccountModel->UpdateOrder($data) && $this->AccountModel->UpdateOrderQTY($data1)){

       $this->session->set_flashdata('update','<script>alert("Order Updated!"); </script>');
       redirect($this->agent->referrer());
   }

    else
        $this->session->set_flashdata('NoUpdate','<script>alert("Something Went Wrong with the Update!"); </script>');

}






    public function delete(){


$orderCode  = $this->uri->segment(3);


        if($this->AccountModel->DeleteOrder($orderCode)){

            $this->session->set_flashdata('Delete','<script>alert("Order Canceled!"); </script>');
            redirect('Account/profile');
        }

        else{
            $this->session->set_flashdata('NoDelete','<script>alert("Order could not be deleted!"); </script>');
            redirect('Account/profile');
        }


    }

}