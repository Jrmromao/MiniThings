<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountModel
 *
 * @author Joao
 */
class AccountModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getCustomerAccount($customerMum){
    $query = $this->db->get_where('customers', array('customerNumber' => $customerMum));

    if($query->num_rows())
        return $query->row();
}



    public function getOrderByCus($customerMum){
        $query = $this->db->get_where('orders', array('customerNumber' => $customerMum));

        if($query->num_rows())
            return $query->result_array();

    }



    public function getOrderStatusByCus($orderNum){
    $query = $this->db->get_where('orders', array('orderNumber' => $orderNum));

    if($query->num_rows())
        return $query->result_array();

}



    public function UpdateOrder($data){

        $orderNumber = $data['orderNumber'];
        $comment     = $data['comments'];
        $requiredDate   = $data['requiredDate'];


        $data1 = array(
            'comments' => $comment,
            'requiredDate' => $requiredDate
        );


        $this->db->where('orderNumber', $orderNumber);
        $this->db->update('orders', $data1);
        $this->db->where('orderNumber', $orderNumber);

    return true;

    }


    public function UpdateOrderQTY($data){

        $quantityOrdered = $data['quantityOrdered'];
        $productCode = $data['productCode'];


        $this->db->set('quantityOrdered', $quantityOrdered);
        $this->db->where('productCode', $productCode);
       $query =  $this->db->update('orderDetails');
      //  $query = $this->db->affected_rows() > 0;
        if ($query)
            return true;

        else
            return false;

    }

    public function DeleteOrder($orderCode){
        $this->db->where('orderNumber', $orderCode);
        $this->db->delete('orderDetails');
        $this->db->where('orderNumber', $orderCode);
        $this->db->delete('orders');


        return true;

    }
}
