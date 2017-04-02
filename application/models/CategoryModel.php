<?php

/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 09/12/2016
 * Time: 11:38
 */
class CategoryModel extends CI_Model
{
    public function __construct()
{
    $this->load->database();
}


public function getProductCat($category){

    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('productLine', $category);
  //  $this->db->like('productLine', $category);

    $query = $this->db->get();
    return $query->result_array();

}

}