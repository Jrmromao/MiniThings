<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 08/12/2016
 * Time: 22:13
 */
class ProductModel extends CI_Model
{ public function __construct()
{
    $this->load->database();
}

    public function viewProduct()
    {
     //   $productID =  $this->uri->segment(3);
      //  $query = $this->db->get('products', 'productName, productLine, productScale, productDescription, quantityInStock, buyPrice, MSRP, image');
        $this->db->select('productCode, productName, productLine, productScale, productDescription, quantityInStock, buyPrice, MSRP, image');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }

//get the total num of records in the database
    public function getTotalRecords()
    {
        $query = $this->db->get('products');
        return $query->num_rows();
    }


    public function productDetail($productCode){

        $data['productCode'] = $productCode;

        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('productCode', $productCode);
        $query = $this->db->get();
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('productCode', $productCode);

        $this->db->update('products'); // gives UPDATE mytable SET field = field+1 WHERE id = 2



        return $query->result_array();

    }






    public function deleteProduct($productCode){
        $this->db->where('productCode', $productCode);
        $this->db->delete('orderdetails');
        $this->db->where('productCode', $productCode);
        $this->db->delete('products');

        return true;
    }


    public function recommendedProd(){

            $this->db->select('*');
            $this->db->from('products');
            $this->db->limit(12);
            $query = $this->db->get();
            return $query->result_array();
        }



}