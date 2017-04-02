<?php


class HomeModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllCategories()
    {
        $sql = "SELECT DISTINCT productLine FROM products";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    //get feature items
    public function getFeatureItems()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by("views", "desc");
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getLowItemPRice()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by("buyPrice", "asc");
        $this->db->limit(6);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function getAllProducts()
    {
        $this->db->select('*');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }






    public function getAllProductVendor()
    {
        $sql = "SELECT DISTINCT productVendor FROM products";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}


