<?php

/**
 * Created by PhpStorm.
 * User: jrmromao
 * Date: 20/01/2017
 * Time: 10:23
 */
class WishlistModel extends CI_Model
{
    public function __construct()
{
    $this->load->database();
}

    public function addProduct($data)
    {
            $this->db->insert('wishlist', $data);
        return true;

    }


    public function ckeckWishlist_table($data){

        $productID = $data['productID'];
        $customerID = $data['customerID'];




        $this->db->select('productID');
        $this->db->from('wishlist');
        $this->db->where('productID', $productID);
        $this->db->where('customerID', $customerID);
        $query = $this->db->get();


        if ($this->db->affected_rows($query) == 0) {
            return  true;
        } else
            return false;
    }



    public function getWishlist($customerID){

        $this->db->select ( '*' );
        $this->db->from ( 'products' );
        $this->db->join ( 'wishlist', "wishlist.productID = products.productCode" );
        $this->db->where_in('wishlist.customerID', $customerID);
        $query = $this->db->get ();

//SELECT * FROM products inner join wishlist WHERE `productID` = productCode And wishlist.customerID = 12154
        return $query->result_array();

    }


    public function getProductDetails($productID){

        $this->db->select ( '*' );
        $this->db->from ( 'products' );
        $this->db->where ( 'productCode', $productID);
        $query = $this->db->get ();

        return $query->result_array();

    }

//
//  remove item from wishlist
//

    public function removeItem($wishlistID){

        $this->db->where('wishlist_ItemID', $wishlistID);
        $this->db->delete('wishlist');

       return true;
    }

    public  function removeAll($customerID){

        $this->db->where('customerID', $customerID);
        $this->db->delete('wishlist');
        return true;
    }


}